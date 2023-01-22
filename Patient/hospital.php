<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/animations.css">  
    <link rel="stylesheet" href="../css/main.css""<?php echo time(); ?>">
    <link rel="stylesheet" href="../css/admin.css">
    
   
    <title>Hospitals</title>
    <style>
        .popup{
            animation: transitionIn-Y-bottom 0.5s;
        }
        .sub-table{
            animation: transitionIn-Y-bottom 0.5s;
            
        }
        .dashbord-tables{
            animation: transitionIn-Y-over 0.5s;
        }
        .filter-container{
            animation: transitionIn-X  0.5s;
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
            height:1900px;
            overflow:auto;
           
        }
</style>
</head>
<body>
    <?php

    

    session_start();

    if(isset($_SESSION["user"])){
        if(($_SESSION["user"])=="" or $_SESSION['usertype']!='p'){
            header("location: ../login.php");
        }else{
            $useremail=$_SESSION["user"];
        }

    }else{
        header("location: ../login.php");
    }
    

    //import database
    include("../connection.php");
    $userrow = $database->query("SELECT * FROM `webuser` WHERE email='$useremail'");
    $userfetch=$userrow->fetch_assoc();
    $userid= $userfetch["id"];
    $username=$userfetch["name"];

    ?>
     if($_GET){
        
        $id=$_GET["id"];
        $action=$_GET["action"];
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
                                    <p class="profile-title"><?php echo substr($username,0,13)  ?>..</p>
                                    <p class="profile-subtitle"><?php echo substr($useremail,0,22)  ?></p>
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
                    <td class="menu-btn menu-icon-home " >
                        <a href="index.php" class="non-style-link-menu "><div><p class="menu-text">Home</p></a></div></a>
                    </td>
                </tr>
                <tr class="menu-row">
                    <td class="menu-btn menu-icon-doctor menu-active menu-icon-doctor-active">
                        <a href="hospital.php" class="non-style-link-menu non-style-link-menu-active"><div><p class="menu-text">All Hospital</p></a></div>
                    </td>
                </tr>
                
                <tr class="menu-row" >
                    <td class="menu-btn menu-icon-session">
                        <a href="schedule.php" class="non-style-link-menu"><div><p class="menu-text">Scheduled Sessions</p></div></a>
                    </td>
                </tr>
                <tr class="menu-row" >
                    <td class="menu-btn menu-icon-appoinment">
                        <a href="appointment.php" class="non-style-link-menu"><div><p class="menu-text">My Bookings</p></a></div>
                    </td>
                </tr>
                <tr class="menu-row" >
                    <td class="menu-btn menu-icon-settings">
                        <a href="settings.php" class="non-style-link-menu"><div><p class="menu-text">Settings</p></a></div>
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

                            <input type="search" name="search" class="input-text header-searchbar" placeholder="Search Hospital name or Address" list="hospitals">&nbsp;&nbsp;
                            
                            <?php
                                echo '<datalist id="hospitals">';
                                $list11 = $database->query("select  hosname,hosaddress from hospital;");

                                for ($y=0;$y<$list11->num_rows;$y++){
                                    $row00=$list11->fetch_assoc();
                                    $d=$row00["hosname"];
                                    $a=$row00["hosaddress"];
                                    echo "<option value='$d'><br/>";
                                    echo "<option value='$a'><br/>";
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
                    <td colspan="4" style="padding-top:0px;">
                        <p class="heading-main12" style="margin-left: 45px;font-size:18px;color:rgb(49, 49, 49)">Hospital (<?php echo $list11->num_rows; ?>)</p>
                    </td>
                    
                </tr>
                <?php
                    if($_POST){
                        $keyword=$_POST["search"];
                        
                        $sqlmain= "select * from hospital where hosaddress='$keyword' or hosname='$keyword' or hosname like '$keyword%' or hosname like '%$keyword' or hosname like '%$keyword%'";
                    }else{
                        $sqlmain= "select * from hospital order by hosid desc";

                    }



                ?>
                  
                <tr>
                   <td colspan="4">
                       <center>
                        <div >
                        <table width="90%" class="sub-table scrolldown" border="0">
                        <thead>
                        <tr>
                                <th class="table-headin">     
                                Hospital Name
                                </th>
                                <th class="table-headin">      
                                Address
                                </th>
                                <th class="table-headin">
                                Email
                                </th>
                                <th class="table-headin">     
                                Telephone Number
                                </th>
                                <th class="table-headin"> 
                                 Events
                                </tr>
                        </thead>
                        <tbody>
                        
                            <?php

                                $sqlmain= "select * from hospital";
                                $result= $database->query($sqlmain);

                                if($result->num_rows==5){
                                    echo '<tr>
                                    <td colspan="4">
                                   
                                    <center>
                                    <img src="../img/notfound.svg" width="25%">
                                    
                                    <br>
                                    <p class="heading-main12" style="margin-left: 45px;font-size:20px;color:rgb(49, 49, 49)">No Hospitals Added</p>
                                     </br>
                                    </center>
                                   
                                    </td>
                                    </tr>';
                                    
                                }
                                else{
                                for ( $x=0; $x<$result->num_rows;$x++){
                                    $row=$result->fetch_assoc();
                                    
                                    $name=$row["hosname"];
                                    $address=$row["hosaddress"];
                                    $email=$row["hosemail"];
                                    $tele=$row["hostel"];
                                    
                                    echo '<tr>
                                        <td> &nbsp;'.
                                        substr($name,0,30)
                                        .'</td>
                                        <td> &nbsp;'.
                                        substr($address,0,30)
                                        .'</td>
                                        <td>
                                        '.substr($email,0,20).'
                                        </td>
                                        <td>
                                            '.substr($tele,0,20).'
                                        </td>

                                        <td>
                                        <div style="display:flex;justify-content: left;">

                                       <a href="?action=add&id='.'&name='.$name.'"  class="non-style-link"><button  class="btn-primary-soft btn button-icon menu-icon-session-active"  style="padding-left: 40px;padding-top: 12px;padding-bottom: 12px;margin-top: 10px;"><font class="tn-in-text">Make An Appointment!</font></button></a>
                                        </div>
                                        </td>
                                    </tr>';
                                    
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

         $id = $_GET["id"];
         $action = $_GET["action"];
         if ($action == 'add') {
             $error_1 = $_GET["error"];
             $errorlist = array(
                 '1' => '<label for="promter" class="form-label" style="color:rgb(255, 62, 62);text-align:center;">Already have an account for this Email address.</label>',
                 '2' => '<label for="promter" class="form-label" style="color:rgb(255, 62, 62);text-align:center;">Password Conformation Error! Reconform Password</label>',
                 '3' => '<label for="promter" class="form-label" style="color:rgb(255, 62, 62);text-align:center;"></label>',
                 '4' => "",
                 '0' => '',

             );
             if ($error_1 != '4') {
                 echo '
        
    <div id="popup1" class="overlay">
    
            <div class="popup">
            <center>
            <div class="hyu">
                <a class="close" href="hospital.php">&times;</a> 
               <div class="content">
                <div style="display: flex;justify-content: center;">
                
                <table width="100%" height="50%" class="sub-table scrolldown add-doc-form-container" border="0">
                <tr>
                        <td class="label-td" colspan="2" >' .
                     $errorlist[$error_1]
                     . '</td>
                       
                    </tr>
                    
                    <tr>
                        <td>
                            <p style="padding: 0;margin: 0;text-align: left;font-size: 25px;font-weight: 500;">Make A New Appointment </p><br><br>
                        </td>
                    </tr>
                    
                    <tr>
                        <form action="patient-register.php" method="POST" class="add-new-form">
                        <td class="label-td" colspan="2">
                            <label for="name" class="form-label">Name: </label>
                        </td>
                    </tr>
                    <tr>
                        <td class="label-td" colspan="2">
                            <input type="text" name="name" class="input-text" placeholder="Patient Name" required><br>
                        </td>
                        
                    </tr>
                    <tr>
                        <td class="label-td" colspan="2">
                            <label for="Email" class="form-label">Email: </label>
                        </td>
                    </tr>
                    <tr>
                        <td class="label-td" colspan="2">
                            <input type="email" name="email" class="input-text" placeholder="Email Address" required><br>
                        </td>
                    </tr>
                   
                   
                    
                    <tr>
                        <td class="label-td" colspan="2">
                            <label for="Tele" class="form-label">Telephone: </label>
                        </td>
                    </tr>
                    
                    <tr>
                        <td class="label-td" colspan="2">
                            <input type="tel" name="Tele" class="input-text" placeholder="Telephone Number" required><br>
                        </td>
                    </tr>
                    <tr>
                        <td class="label-td" colspan="2">
                            <label for="usertype" class="form-label">Date of Birth </label>
                        </td>
                    </tr>
                    <tr>
                <td class="label-td" colspan="2">
                    <input type="date" name="sheduledate" id="date" class="input-text filter-container-items" style="margin: 0;width: 95%;">

                </td>
            </tr>
                    <td class="label-td" colspan="2">
                    <label for="usertype" class="form-label">Appointment Date</label>
                </td>
            </tr>
            
                    <tr>
                        <td class="label-td" colspan="2">
                            <input type="date" name="sheduledate" id="date" class="input-text filter-container-items" style="margin: 0;width: 95%;">

                        </td>
                    </tr>
                    <td class="label-td" colspan="2">
                    <label for="usertype" class="form-label">Appointment Time</label>
                </td>
            </tr>
            
                    <tr>
                        <td class="label-td" colspan="2">
                            <input type="time" name="appt" id="appt" class="input-text filter-container-items" style="margin: 0;width: 95%;">

                        </td>
                    </tr>
                    
                    <tr>
                        <td class="label-td" colspan="2">
                            <label for="spec" class="form-label">Choose specialties: </label>
                            
                        </td>
                    </tr>
                    <tr>
                        <td class="label-td" colspan="2">
                            <select name="spec" id="" class="box" >
                            ';


                 $list11 = $database->query("select  * from  specialties order by sname asc;");

                 for ($y = 0; $y < $list11->num_rows; $y++) {
                     $row00 = $list11->fetch_assoc();
                     $sn = $row00["sname"];
                     $id00 = $row00["id"];
                     echo "<option value=" . $id00 . ">$sn</option><br/>";
                 }
                 ;




                 echo '       </select><br>
                        </td>
                    </tr>
                    
                    <td class="label-td" colspan="2">
                    <label for="usertype" class="form-label">If Any Medical Concern</label>
                </td>
            </tr>
            
                    <tr>
                        <td class="label-td" colspan="2">
                            <input type="text" name="text" id="text"  style="margin: top;width: 95%; height: 100px;">

                        </td>
                    </tr>
                    
        
                    <tr>
                        <td colspan="2">
                        <label for="myfile">Attach file (Optional)</label>
                            <input type="file" id="myfile" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

                            <a href="payment-info.php"  class="login-btn btn-primary btn">NEXT</font></button></a>

                        </td>
        
                    </tr>
                   
                    </form>
                    </tr>
                </table>
                </div>
                </div>
                </div>
                
                
               
            </center>
            <br><br>
    </div>
    </div>

    ';
             }
         }
     }
     
?>



</body>
</html>