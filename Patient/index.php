<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/animations.css">  
    <link rel="stylesheet" href="../css/main.css">  
    <link rel="stylesheet" href="../css/admin.css">
    <link rel="stylesheet" href="../css/patient.css">
    <link rel="stylesheet" href="../css/style2.css">
      
      
    <title>Dashboard</title>
   
    <style>
        .dashbord-tables{
            animation: transitionIn-Y-over 0.5s;
        }
        .filter-container{
            animation: transitionIn-Y-bottom  0.5s;
        }
        .sub-table,.anime{
            animation: transitionIn-Y-bottom 0.5s;
        }
        
    
    </style>
    
    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>

    
    <script type="module" src="./index.js"></script>
</head>
<body>
    <?php

    //learn from w3schools.com

    session_start();

    if(isset($_SESSION["user"])){
        if(($_SESSION["user"])=="" or $_SESSION['usertype']!='p'){
            
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


    //echo $userid;
    //echo $username;
    
    ?>
       
       <section class="showcase"  >
        <div class="dash-body" style="position: relative; margin-top: -50px">
            <header>
            <div class="toggle"></div>
            </header>

            <div class="dash-body" style="position: relative ; margin-top: -50px ;" >
            <table border="0" width="70%" style=" border-spacing: 0; " >
                        
                        <tr >
                            
                            <td colspan="2" class="nav-bar" >
                            <p style="font-size: 23px;padding-left:12px;font-weight: 600;margin-left:20px;">Home</p>
                          
                            </td>
                            <td width="25%">

                            </td>
                            <td width="15%">
                                <p style="font-size: 14px;color: rgb(119, 119, 119);padding: 0;margin: 0;text-align: right;">
                                    Today's Date
                                </p>
                                <p class="heading-sub12" style="padding: 0;margin: 0;">
                                    <?php 
                                date_default_timezone_set('Asia/Aden');
        
                                $today = date('Y-m-d');
                                echo $today;


                                $patientrow = $database->query("SELECT * FROM  `webuser`;");
                                $hospitalrow = $database->query("SELECT  * FROM  hospital;");
                                $appointmentrow = $database->query("SELECT  * FROM  appointment WHERE appodate>='$today';");
                                $schedulerow = $database->query("SELECT * FROM  schedule WHERE scheduledate='$today';");


                                ?>
                                </p>
                            </td>
                            <td width="10%">
                                <button  class="btn-label"  style="display: flex;justify-content: center;align-items: center;"><img src="../img/calendar.svg" width="100%"></button>
                            </td>
        
        
                        </tr>
                <tr>
                    <td colspan="4" >
                        
                    <center>
                    <table class="filter-container doctor-header account-header" style="border: none;width:95%" border="0" >
                    <tr>
                        <td >
                            <h3>Welcome!</h3>
                            <h1><?php echo $username  ?>.</h1>
                            <p>Haven't any idea about doctors? no problem let's jumping to 
                                <a href="hospital.php" class="non-style-link"><b>"All Hospital"</b></a> section or 
                                <a href="schedule.php" class="non-style-link"><b>"Sessions"</b> </a><br>
                                Track your past and future appointments history.<br>Also find out the expected arrival time of your doctor or medical consultant.<br><br>
                            </p>
                            
                            
                            <form action="hospital.php" method="post" style="display: flex">

                                <input type="search" name="search" class="input-text " placeholder="Search Hospitals Here" list="Hospital" style="width:45%;">&nbsp;&nbsp;
                                
                                <?php
                                    echo '<datalist id="hospital">';
                                    $list11 = $database->query("select  hid,hosemail,hosname,hosaddress from hospital;");
    
                                    for ($y=0;$y<$list11->num_rows;$y++){
                                        $row00=$list11->fetch_assoc();
                                        $h=$row00["hid"];
                                        
                                        echo "<option value='$h'><br/>";
                                        
                                    };
    
                                echo ' </datalist>';
    ?>
                                
                           
                                <input type="Submit" value="Search" class="login-btn btn-primary btn" style="padding-left: 25px;padding-right: 25px;padding-top: 10px;padding-bottom: 10px;">
                    
                            <br>
                            <br>
                            
                        </td>
                    </tr>
                    </table>
                    </center>

                </td>
                </tr>
               
                                  
                                <td>


                            
                                    <p style="font-size: 20px;font-weight:600;padding-left: 40px;" class="anime">Your Upcoming Booking</p>
                                    <center>
                                       
                                        <table width="85%" class="sub-table scrolldown" border="0" >
                                        <thead>
                                            
                                        <tr>
                                        <th class="table-headin">
                                                    
                                                
                                                    Appoint. Number
                                                    
                                                    </th>
                                                <th class="table-headin">
                                                    
                                                
                                               Hospital Name
                                                
                                                </th>
                                                
                                                <th class="table-headin">
                                                    Doctor
                                                </th>
                                                <th class="table-headin">
                                                    
                                                    Sheduled Date & Time
                                                    
                                                </th>
                                                    
                                                </tr>
                                        </thead>
                                        <tbody>
                                        
                                            <?php
                                            $nextweek=date("Y-m-d",strtotime("+1 week"));
                                                $sqlmain= "select * from schedule inner join appointment on schedule.scheduleid=appointment.scheduleid inner join webuser on webuser.id=appointment.pid inner join doctor on schedule.docid=doctor.docid inner join hospital on schedule.scheduleid=hospital.hid where  webuser.id=$userid  and schedule.scheduledate>='$today' order by schedule.scheduledate asc";
                                                //echo $sqlmain;
                                                $result= $database->query($sqlmain);
                
                                                if($result->num_rows==0){
                                                    echo '<tr>
                                                    <td colspan="4">
                                                    <br><br><br><br>
                                                    <center>
                                                    <img src="../img/notfound.svg" width="25%">
                                                    
                                                    <br>
                                                    <p class="heading-main12" style="margin-left: 45px;font-size:20px;color:rgb(49, 49, 49)">Nothing to show here!</p>
                                                    <a class="non-style-link" href="schedule.php"><button  class="login-btn btn-primary-soft btn"  style="display: flex;justify-content: center;align-items: center;margin-left:20px;">&nbsp; MAKE AN APPOINTMENT &nbsp;</font></button>
                                                    </a>
                                                    </center>
                                                    <br><br><br><br>
                                                    </td>
                                                    </tr>';
                                                    
                                                }
                                                else{
                                                for ( $x=0; $x<$result->num_rows;$x++){
                                                    $row=$result->fetch_assoc();
                                                    $scheduleid=$row["scheduleid"];
                                                    $title=$row["title"];
                                                    $apponum=$row["apponum"];
                                                    $docname=$row["docname"];
                                                    $hosname=$row["hosname"];
                                                    $scheduledate=$row["scheduledate"];
                                                    $scheduletime=$row["scheduletime"];
                                                   
                                                    echo '<tr>
                                                        <td style="padding:30px;font-size:25px;font-weight:700;"> &nbsp;'.
                                                        $apponum
                                                        .'</td>
                                                        <td style="padding:20px;"> &nbsp;'.
                                                        substr($hosname,0,30)
                                                        .'</td>
                                                        <td>
                                                        '.substr($docname,0,20).'
                                                        </td>
                                                        <td style="text-align:center;">
                                                            '.substr($scheduledate,0,10).' '.substr($scheduletime,0,5).'
                                                        </td>

                
                                                       
                                                    </tr>';
                                                    
                                                }
                                            }
                                                 
                                            ?>
               
                                        </table>
                                        </div>
                                        </center>




                                         <td>


                            
                                    <p style="font-size: 20px;font-weight:600;padding-left: 40px;" class="anime">Hospitals Near Me</p>
                                    <center>
                                       
                                        <table width="85%" class="sub-table scrolldown" border="0" >
                                        <thead>
                                            
                                        
                                         </td>
                                        
               
 
    <div id="map">
    <iframe src="https://www.google.com/maps/d/embed?mid=1ZAg8EteRrSK9BYzoT13DkyObpzLUJNw&ehbc=2E312F" 
    width="400" height="400"></iframe>
    </div>

    <!-- 
     The `defer` attribute causes the callback to execute after the full HTML
     document has been parsed. For non-blocking uses, avoiding race conditions,
     and consistent behavior across browsers, consider loading using Promises
     with https://www.npmjs.com/package/@googlemaps/js-api-loader.
    -->   </tbody>

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
                    <td class="menu-btn menu-icon-home " style="">
                        <a href="index.php" class="non-style-link-menu "><div><p class="menu-text">Home</p></a></div></a>
                    </td>
                </tr>
                <tr class="menu-row">
                    <td class="menu-btn menu-icon-doctor">
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
           
            
    </ul>
  </div>
    

    <script  src="../Js/script.js"></script>
                                      




</body>
</html>
