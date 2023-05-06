<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/animations.css">  
    <link rel="stylesheet" href="../css/main.css""<?php echo time(); ?>">
    <link rel="stylesheet" href="../css/admin.css">
    <link rel="stylesheet" href="../css/style2.css">  
    <link rel="stylesheet" href="../css/hosMediaQueries.css">

   
    <title>Hospitals</title>
    <style>
    
    </style>
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
            <table border="0" width="72%" style=" border-spacing: 0; " >
                        
                        <tr>
                            
                            <td colspan="2" class="nav-bar" >

                                    <input id="search-bar" type="search" name="search" class="input-text header-searchbar" placeholder="Search Hospital name or Address" list="hospitals">&nbsp;&nbsp;
                                   
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
       
&nbsp;
                                    <input id="search-button" type="Submit" value="Search" class="login-btn btn-primary btn">
                                
                                </form>
                                
                            </td>
                            <td width="15%">
                                <p id="date-txt">
                                    Today's Date
                                </p>
                                <p id="time-txt">
                                    <?php 
                                date_default_timezone_set('Asia/Aden');

                                $date = date('Y-m-d');
                                echo $date;
                                ?>
                                </p>
                            </td>
                            <td width="10%">
                                <button id="calender-img"  class="btn-label"><img src="../img/calendar.svg" ></button>
                            </td>


                        </tr>
                    
                        
                        <tr>
                            <td id="hos-txt">
                                <p  >Hospital (<?php echo $list11->num_rows; ?>)</p>
                            </td>
                            <td>
                            <a href="maps.html"class="non-style-link"><button  id="map-button" class="btn-primary btn "><font style="font-size: 11px;  font-weight: 600;"  id="font">Maps</font></button></a>
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
                        <td>
                            <center id="center">
                                <div>
                                <table  id="table-content" class="sub-table scrolldown" border="0">
                                <thead id="table">
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
                                        </th>
                                </tr>
                                </thead>
                                <tbody id="body">
                                
                                    <?php

                                        $sqlmain= "select * from hospital";
                                        $result= $database->query($sqlmain);

                                        if($result->num_rows==5){
                                            echo '<tr>
                                            <td>
                                        
                                            <center>
                                            <img src="../img/notfound.svg" width="25%">
                                            
                                            <br>
                                            <p>No Hospitals Added</p>
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
                                                <td id="selector" > &nbsp;'.
                                                substr($name,0,30)
                                                .'</td>
                                                <td id="selector"> &nbsp;'.
                                                substr($address,0,30)
                                                .'</td>
                                                <td id="selector">
                                                '.substr($email,0,20).'
                                                </td>
                                                <td id="selector">
                                                    '.substr($tele,0,20).'
                                                </td>

                                                <td>
                                                <div">

                                                </div>    
                                                 <a href="makeanappointment.php" id="appo-button"  class="non-style-link"><button id="button" class="btn-primary-soft btn button-icon menu-icon-session-active"><font id="font">Make An Appointment!</font></button></a>

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
                            
                                
                                
        </div>           </table>

                                            <p id="map-txt" style="" class="anime">Hospitals</p>
                                            <p id="map-txt1">Near</p>
                                            <p id="map-txt2">Me</p>

        <div id="maps">
            <iframe src="https://www.google.com/maps/d/embed?mid=1ZAg8EteRrSK9BYzoT13DkyObpzLUJNw&ehbc=2E312F" 
            id="maps" width="300" height="300"  ></iframe>
            </div>
       
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