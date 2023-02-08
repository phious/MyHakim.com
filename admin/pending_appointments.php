
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/animations.css">  
    <link rel="stylesheet" href="../css/main.css">  
    <link rel="stylesheet" href="../css/admin.css">
        
    <title>Patients</title>
    <style>
        .popup{
            animation: transitionIn-Y-bottom 0.5s;
        }
        .sub-table{
            animation: transitionIn-Y-bottom 0.5s;
        }
        div.popup {
    margin: 10px auto;
    
    background: #fff;
    border-radius: 5px;
    width: 50%;
    position: relative;
    transition: all 5s ease-in-out;
  }

        div.hyu {   
            width:80%;
            height:600px;
            overflow:auto;
           
        }
</style>
</head>
<body>
    <?php

    //learn from w3schools.com

    require '../controllers/authController2.php';

    $_SESSION["user"]="";
    $_SESSION["usertype"]="";
    
    // Set the new timezone
    date_default_timezone_set('Asia/Aden');
    $date = date('Y-m-d');
    
    $_SESSION["date"]=$date;
    
    
    //import database
    include("../connection.php");
    
    
    
    
    ?>
    <div class="container">
        <div class="menu">
            <table class="menu-container" border="0">
                <tr>
                    <td style="padding:10px" colspan="2">
                        <table border="0" class="profile-container">
                            <tr>
                                <td width="30%" style="padding-left:20px" >
                                    <img src="../img/user.png" alt="" width="100%" style="border-radius:50%">
                                </td>
                                <td style="padding:0px;margin:0px;">
                                    <p class="profile-title">Kiduspaulos</p>
                                    <p class="profile-subtitle">admin@myhakim.com</p>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                <a href="../logout.php" ><input type="button" value="Log out" class="logout-btn btn-primary-soft btn"></a>
                                </td>
                            </tr>
                    </table>
                    </td>
                </tr>
                <tr class="menu-row" >
                    <td class="menu-btn menu-icon-dashbord" >
                        <a href="index.php" class="non-style-link-menu"><div><p class="menu-text">Dashboard</p></a></div></a>
                    </td>
                </tr>
                <tr class="menu-row">
                    <td class="menu-btn menu-icon-doctor ">
                        <a href="doctors.php" class="non-style-link-menu "><div><p class="menu-text">Doctors</p></a></div>
                    </td>
                </tr>
                <tr class="menu-row" >
                    <td class="menu-btn menu-icon-schedule">
                        <a href="schedule.php" class="non-style-link-menu"><div><p class="menu-text">Schedule</p></div></a>
                    </td>
                </tr>
                <tr class="menu-row">
                    <td class="menu-btn menu-icon-appoinment">
                        <a href="appointment.php" class="non-style-link-menu"><div><p class="menu-text">Appointment</p></a></div>
                    </td>
                </tr>
                <tr class="menu-row">
                    <td class="menu-btn menu-icon-timer ">
                        <a href="Pending_appointments.php" class="non-style-link-menu "><div><p class="menu-text">Pending Appointments</p></a></div>
                    </td>
                </tr>
                <tr class="menu-row" >
                    <td class="menu-btn menu-icon-patient  menu-active menu-icon-patient-active">
                        <a href="patient.php" class="non-style-link-menu  non-style-link-menu-active"><div><p class="menu-text">Patients</p></a></div>
                    </td>
                </tr>

            </table>
        </div>
        <div class="dash-body">
            <table border="0" width="100%" style=" border-spacing: 0;margin:0;padding:0;margin-top:25px; ">
                <tr >
                    <td width="13%">

                    <a href="index.php" ><button  class="login-btn btn-primary-soft btn btn-icon-back"  style="padding-top:11px;padding-bottom:11px;margin-left:20px;width:125px"><font class="tn-in-text">Back</font></button></a>
                        
                    </td>
                    <td>
                        
                        <form action="" method="post" class="header-search">

                            <input type="search" name="search" class="input-text header-searchbar" placeholder="Search Patient name or Email" list="patient">&nbsp;&nbsp;
                            
                            <?php
                                echo '<datalist id="patient">';
                                $list11 = $database->query("SELECT  name,email FROM `pending_patient` WHERE hos_ID=1131 ;");

                                for ($y=0;$y<$list11->num_rows;$y++){
                                    $row00=$list11->fetch_assoc();
                                    $d=$row00["name"];
                                    $c=$row00["email"];
                                    echo "<option value='$d'><br/>";
                                    echo "<option value='$c'><br/>";
                                };

                            echo ' </datalist>';
?>
                            
                       
                            <input type="Submit" value="Search" class="login-btn btn-primary btn" style="padding-left: 25px;padding-right: 25px;padding-top: 10px;padding-bottom: 10px;">
                        
                        </form>
                        
                    </td>
                    <td width="15%">
                        <p style="font-size: 14px;color: rgb(119, 119, 119);padding: 0;margin: 0;text-align: right;">
                            Today's Date
                        </p>
                        <p class="heading-sub12" style="padding: 0;margin: 0;">
                            <?php 
                        date_default_timezone_set('Asia/Aden');

                        $date = date('Y-m-d');
                        echo $date;
                        ?>
                        </p>
                    </td>
                    <td width="10%">
                        <button  class="btn-label"  style="display: flex;justify-content: center;align-items: center;"><img src="../img/calendar.svg" width="100%"></button>
                    </td>


                </tr>
               
                
                <tr>
                    <td colspan="4" style="padding-top:10px;">
                        <p class="heading-main12" style="margin-left: 45px;font-size:18px;color:rgb(49, 49, 49)">All Patients (<?php echo $list11->num_rows; ?>)</p>
                    </td>
                    
                </tr>
                <?php
                    if($_POST){
                        $keyword=$_POST["search"];
                        
                        $sqlmain= "SELECT * FROM `pending_patient` WHERE hos_ID=1131 AND email='$keyword' OR name='$keyword' OR name LIKE '$keyword%' OR name LIKE '%$keyword' OR name LIKE '%$keyword%' ";
                    }else{
                        $sqlmain= "SELECT * FROM `pending_patient` WHERE hos_ID=1131 ";

                    }
                ?>

                
                  
                <tr>
                   <td colspan="4">
                       <center>
                        <div class="abc scroll">
                        <table width="93%" class="sub-table scrolldown"  style="border-spacing:0;">
                        <thead>
                        <tr>
                                <th class="table-headin">
                                    
                                
                                Name
                                
                                </th>
                                
                                <th class="table-headin">
                                
                            
                                Telephone
                                
                                </th>
                                <th class="table-headin">
                                    Email
                                </th>
                                <th class="table-headin">
                                    
                                    Date of Birth
                                    
                                </th>
                                <th class="table-headin">
                                    
                                    Hospital ID
                                    
                                </th>
                                <th class="table-headin">
                                    
                                    Confirmation
                                    
                                </tr>
                        </thead>
                        <tbody>
                        
                            <?php

                               $sqlmain= "SELECT * FROM `pending_patient`  ";

                                $result= $database->query($sqlmain);

                                if($result->num_rows==0){
                                    echo '<tr>
                                    <td colspan="4">
                                    <br><br><br><br>
                                    <center>
                                    <img src="../img/notfound.svg" width="25%">
                                    
                                    <br>
                                    <p class="heading-main12" style="margin-left: 45px;font-size:20px;color:rgb(49, 49, 49)">We  couldnt find anything related to your keywords !</p>
                                    <a class="non-style-link" href="patient.php"><button  class="login-btn btn-primary-soft btn"  style="display: flex;justify-content: center;align-items: center;margin-left:20px;">&nbsp; Show all Patients &nbsp;</font></button>
                                    </a>
                                    </center>
                                    <br><br><br><br>
                                    </td>
                                    </tr>';
                                    
                                }

                                
                                
                                 
                                else{
                                for ( $x=0; $x<$result->num_rows;$x++){
                                    $row=$result->fetch_assoc();
                                    $id=$row["id"];
                                    $name=$row["name"];
                                    $email=$row["email"];
                                
                                    $dob=$row["dateofbirth"];
                                    $tel=$row["telephone"];
                                    $hos_ID=$row["hos_ID"];
                                    
                                    echo '<tr>
                                        <td> &nbsp;'.
                                        substr($name,0,35)
                                        .'</td>
                                        
                                        <td>
                                            '.substr($tel,0,13).'
                                        </td>
                                        <td>
                                        '.substr($email,0,25).'
                                         </td>
                                        <td>
                                        '.substr($dob,0,10).'
                                        </td>
                                        <td>
                                        '.substr($hos_ID,0,5).'
                                        </td>
                                        <td >
                                        <div style="display:flex;justify-content: center;">
                                        
                                        <a href="?action=approve" class="non-style-link"><button  class="btn-primary-soft btn button-icon ok-view"  style=" background-color:#66ff66; padding-left: 40px; margin-right: 40px; padding-top: 12px;padding-bottom: 12px;margin-top: 10px;"><font class="tn-in-text">Approve </font></button></a>
                                        <a href="?action=deny"  class="non-style-link"><button  class="btn-primary-soft btn button-icon notok-view" name="add_history" style=" background-color:#ff6666; padding-left: 40px;padding-top: 12px;padding-bottom: 12px;margin-top: 10px;"><font class="tn-in-text">Deny </font></button></a>
                                       
                                        </div>   
                                                                                           
                                        </td>
                                    </tr>
                                    ';
                                    
                                }
                            }
                                 
                            ?>
                           
                        

                        
 
                            </tbody>

                        </table>
                        </div>
                        </center>
                   </td> 
                </tr>
                       
                        
                        
            </table>
        </div>
    </div>
    <?php
    
        if ($_GET) {
            $action = $_GET["action"];

           
            if ($action == 'approve') {


                

                
                $database->query("insert into patient (pemail,pname,pdob,ptel,hos_ID) values ('$email','$name','$dob','$tel','$hos_ID');");
            
              
        
                $ssqlmain= "delete from pending_patient where email=?;";
                $sstmt = $database->prepare($ssqlmain);
                $sstmt->bind_param("s",$email);
                $sstmt->execute();
                $result = $sstmt->get_result();

                echo '
            <div id="popup1" class="overlay">
                    <div class="popup"  >
                    <center>
                        <h2>Appointment Approval</h2>
                        <a class="close" href="pending_appointments.php">&times;</a>
                        <div class="content">
                        <br> Dear Customer, thank you for approving a patient appointment on time !</br><br>The appointment confirmation email will be sent to the new patient ! .</br><br> This confirmation might take a while.</br>
                            &nbsp;&nbsp;&nbsp;&nbsp;
                        </div>
                       

                       
                   
                  


                    <div class="overflow dark" id="preload">
                    <a href="pending_appointments.php" class="non-style-link"><button  class="btn-primary btn"  style="display: flex;justify-content: center;align-items: center;margin:10px;padding:10px;"><font class="tn-in-text">&nbsp;&nbsp;OK&nbsp;&nbsp;</font></button></a>
                    </div>
            </div>
           
            </div>
            </center>
                    <br><br>
            </div>
            </div>    ';

            if(count($errors) == 0) {
                $sql = "SELECT * FROM pending_patient WHERE email='$email' LIMIT 1 ";
                $result = mysqli_query($database, $sql);
                $user = mysqli_fetch_assoc($result);
                $token = $user['token'];
                sendApprovalEmail($email, $token);
                header('Location: pending_patient.php');
                exit(0);
            }



            } elseif ($action == 'deny') {
              
            
        

                echo '
            <div id="popup1" class="overlay">
                    <div class="popup" style  >
                    <center>
                        <h2>Appointment Denial</h2>
                        <a class="close" href="pending_appointments.php">&times;</a>
                        <div class="content">
                        <br> The appointment is denied ! </br><br>The Denial email will be sent to the new patient !</br><br> This denied patient will be appearing here untill the patient is approved again !</br>
                            &nbsp;&nbsp;&nbsp;&nbsp;
                        </div>

                    <div class="overflow dark" id="preload">
                    <a href="pending_appointments.php" class="non-style-link"><button  class="btn-primary btn"  style="display: flex;justify-content: center;align-items: center;margin:10px;padding:10px;"><font class="tn-in-text">&nbsp;&nbsp;OK&nbsp;&nbsp;</font></button></a>
                    </div>
            </div>
           
            </div>
            </center>
                    <br><br>
            </div>
            </div>    ';

            if(count($errors) == 0) {
                $sql = "SELECT * FROM pending_patient WHERE email='$email' LIMIT 1 ";
                $result = mysqli_query($database, $sql);
                $user = mysqli_fetch_assoc($result);
                $token = $user['token'];
                sendDenialEmail($email, $token);
                header('Location: pending_patient.php');
                exit(0);
            }





            }
        
    }
    
    

?>
</div>

</body>
</html>