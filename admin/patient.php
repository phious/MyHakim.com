<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/animations.css">  
    <link rel="stylesheet" href="../css/main.css">  
    <link rel="stylesheet" href="../css/admin.css">
    <link rel="stylesheet" href="../css/style2.css">
        
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

    session_start();

    if(isset($_SESSION["user"])){
        if(($_SESSION["user"])=="" or $_SESSION['usertype']!='a'){
            
        }else{
            $useremail=$_SESSION["user"];
        }
    
    }else{
        header("location: ../login.php");
    }
    
    //import database
    include("../connection.php");
    
    $sqlmain= "SELECT * FROM `webuser` WHERE email=?";
    $stmt = $database->prepare($sqlmain);
    $stmt->bind_param("s",$useremail);
    $stmt->execute();
    $userrow = $stmt->get_result();
    $userfetch=$userrow->fetch_assoc();
    $userid= $userfetch["id"];
    $username=$userfetch["name"];
    

    
    ?>
    <section class="showcase"  >
        <div class="dash-body" style="position: relative; margin-top: -50px">
            <header>
            <div class="toggle"></div>
            </header>

            <div class="dash-body" style="position: relative ; margin-top: -50px ;" >
            <table border="0" width="72%" style=" border-spacing: 0; " >
                        
                        <tr >
                    <td width="13%">

                    <a href="index.php" ><button  class="login-btn btn-primary-soft btn btn-icon-back"  style="padding-top:11px;padding-bottom:11px;margin-left:20px;width:125px"><font class="tn-in-text">Back</font></button></a>
                        
                    </td>
                    <td>
                        
                        <form action="" method="post" class="header-search">

                            <input type="search" name="search" class="input-text header-searchbar" placeholder="Search Patient name or Email" list="patient">&nbsp;&nbsp;
                            
                            <?php
                                echo '<datalist id="patient">';
                                $list11 = $database->query("SELECT  pname,pemail FROM `patient` WHERE hos_ID=1131 ;");

                                for ($y=0;$y<$list11->num_rows;$y++){
                                    $row00=$list11->fetch_assoc();
                                    $d=$row00["pname"];
                                    $c=$row00["pemail"];
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
                        
                        $sqlmain= "SELECT * FROM `patient` WHERE hos_ID=1131 AND pemail='$keyword' OR pname='$keyword' OR pname LIKE '$keyword%' OR pname LIKE '%$keyword' OR pname LIKE '%$keyword%' ";
                    }else{
                        $sqlmain= "SELECT * FROM `patient` WHERE hos_ID=1131 ";

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
                                    
                                    Events
                                    
                                </tr>
                        </thead>
                        <tbody>
                        
                            <?php

                                
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
                                    $pid=$row["pid"];
                                    $name=$row["pname"];
                                    $email=$row["pemail"];
                                    $paddress=$row["paddress"];
                                    $dob=$row["pdob"];
                                    $tel=$row["ptel"];
                                    
                                    echo '<tr>
                                        <td> &nbsp;'.
                                        substr($name,0,35)
                                        .'</td>
                                        
                                        <td>
                                            '.substr($tel,0,10).'
                                        </td>
                                        <td>
                                        '.substr($email,0,20).'
                                         </td>
                                        <td>
                                        '.substr($dob,0,10).'
                                        </td>
                                        <td >
                                        <div style="display:flex;justify-content: center;">
                                        
                                        <a href="?action=add &id='.$pid.'" class="non-style-link"><button  class="btn-primary-soft btn button-icon btn-view"  style="padding-left: 40px; margin-right: 40px; padding-top: 12px;padding-bottom: 12px;margin-top: 10px;"><font class="tn-in-text">View</font></button></a>
                                       
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
     if($_GET){
        
        $action=$_GET["add"];

            echo '
            <div id="popup1" class="overlay">
            <div class="popup">
            <center>
                <a class="close" href="patient.php">&times;</a>
                <div class="content">

                </div>
                <div style="display: flex;justify-content: center;">
                <table width="80%" class="sub-table scrolldown add-doc-form-container" border="0">
                
                    <tr>
                        <td>
                            <p style="padding: 0;margin: 0;text-align: left;font-size: 25px;font-weight: 500;">View Details.</p><br><br>
                        </td>
                    </tr>
                    <tr>
                        
                        <td class="label-td" colspan="2">
                            <label for="name" class="form-label">Patient ID: </label>
                        </td>
                    </tr>
                    <tr>
                        <td class="label-td" colspan="2">
                            P-'.$pid.'<br><br>
                        </td>
                        
                    </tr>
                    
                    <tr>
                        
                        <td class="label-td" colspan="2">
                            <label for="name" class="form-label">Name: </label>
                        </td>
                    </tr>
                    <tr>
                        <td class="label-td" colspan="2">
                            '.$name.'<br><br>
                        </td>
                        
                    </tr>
                    <tr>
                        <td class="label-td" colspan="2">
                            <label for="Email" class="form-label">Email: </label>
                        </td>
                    </tr>
                    <tr>
                        <td class="label-td" colspan="2">
                        '.$email.'<br><br>
                        </td>
                    </tr>
                   
                    
                    <tr>
                        <td class="label-td" colspan="2">
                            <label for="Tele" class="form-label">Telephone: </label>
                        </td>
                    </tr>
                    <tr>
                        <td class="label-td" colspan="2">
                        '.$tel.'<br><br>
                        </td>
                    </tr>
                    <tr>
                        <td class="label-td" colspan="2">
                            <label for="spec" class="form-label">Address: </label>
                            
                        </td>
                    </tr>
                    <tr>
                    <td class="label-td" colspan="2">
                    '.$paddress.'<br><br>
                    </td>
                    </tr>
                    <tr>
                        
                        <td class="label-td" colspan="2">
                            <label for="name" class="form-label">Date of Birth: </label>
                        </td>
                    </tr>
                    <tr>
                        <td class="label-td" colspan="2">
                            '.$dob.'<br><br>
                        </td>
                        
                    </tr>
                    <tr>
                        <td colspan="2">
                            <a href="patient.php"><input type="button" value="OK" class="login-btn btn-primary-soft btn" ></a>
                        
                            
                        </td>
        
                    </tr>
                   

                </table>
                </div>
            </center>
            <br><br>
    </div>
    </div>
    ';
     } 

    
    

?>
</div>

</tbody>

</table>
            </div>
            </center>
    </td> 
    </tr>
        
            
            
</div>           </table>

</section>

<div class="container">
        <div class="menu">
            <table class="menu-container" >
                <tr>
                <td style="padding:10px" colspan="2">

                             <table border="0" class="profile-container">
                         
                             <td style="padding:0px;margin:0px;">
                            
                             <img src="../img/user.png" alt="" width="35%" style="border-radius:60%">

                                 <p class="profile-title"><?php echo substr($username,0,25)  ?>..</p>
                                 <p class="profile-subtitle"><?php echo substr($useremail,0,55)  ?></p>
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
                    <td class="menu-btn menu-icon-doctor menu-active">
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
                    <td class="menu-btn menu-icon-patient  menu-icon-patient-active">
                        <a href="patient.php" class="non-style-link-menu non-style-link-menu-active"><div><p class="menu-text">Patients</p></a></div>
                        </td>
</tr>
</tr>
</table>
</div>


</ul>
</div>


<script  src="../Js/script.js"></script>

</body>
</html>