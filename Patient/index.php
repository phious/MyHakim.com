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
    <link rel="stylesheet" href="../css/PIMediaQueries.css">   
      
      
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
<body  >
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


    //echo $userid; style="position: relative; margin-left: -25px; margin-top: -28px; width: 90%;"
    //echo $username;      style="position: relative; font-size: 23px;padding-left:30px;  bottom:-20px; font-weight: 600;margin-left:20px;"
    
    ?>
       
       <section class="showcase"  >
                <div  style="position: relative; margin-top: -50px">
                    <header>
                    <div class="toggle"></div>
                    </header>

                    <div class="dash-body" >
                    <table border="0" width="70%" style=" border-spacing: 0; " >
                                
                                <tr >
                                    
                                    <td colspan="2" class="nav-bar" id="home-txt">
                                    <p >Home</p>
                                
                                    </td>
                                  
                                    <td>
                                        <p id="date-txt">
                                            Today's Date
                                        </p>
                                        
                                        <p  id="time-txt" class="heading-sub12">
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
                                    <td >
                                        <button  class="btn-label" id="calender-img"><img src="../img/calendar.svg" style="background-size: 30px;"></button>
                                    </td>
                
                
                                </tr>
                       
                            
                                
                                <center>
                                    <table class="filter-container doctor-header account-header" id= "card" style="" border="0" >
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

                                                                <input type="search" id="search-bar" name="search"  class="input-text " placeholder="Search Hospitals" list="Hospital" style="">&nbsp;&nbsp;
                                                                
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
                                                                
                                                        
                                                                <input type="Submit" value="Search" class="login-btn btn-primary btn" id="search-button" style="">
                                                    
                                                
                                                    
                                                </td>
                                            </tr>
                                                            </form>
                                        </table>
                                </center> 
                            
                    
                                        
                                        


                                    
                                            <p id="show-txt"  class="anime">Your</p>
                                            <p id="show-txt1" class="anime">Upcoming</p>
                                            <p id="show-txt2" class="anime">Booking</p>
                                            <center>
                                                 
                                                <table id="table-content"  class="sub-table scrolldown" border="0" >
                                                            
                                                                
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
                                                
                                            </center>




                                                


                                    
                                          
                    </table>
       
        </section>


        <div class="container">
        <div class="menu" id="menu-side">
            <table>
                <tr>
                <td id="profile-style" colspan="2">

                             <table border="0" class="profile-container">
                         
                             <td style="padding:0px;margin:0px;">
                            
                             <img src="../img/user.png" id="profile-img"  alt="" width="35%">

                                 <p id="pro-title" class="profile-title"><?php echo substr($username,0,25)  ?>..</p>
                                 <p id="pro-subtitle" class="profile-subtitle"><?php echo substr($useremail,0,55)  ?></p>
                            </td>
                         </tr>
                         <tr>
                             <td colspan="2">
                                 <a href="../logout.php" ><input id="logout---btn" type="button" value="Log out" class="logout-btn btn-primary-soft btn"></a>
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
