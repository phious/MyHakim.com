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
        {
  font-family: 'Poppins', sans-serif;
  margin:0; padding:0;
  box-sizing: border-box;
  outline: none; border:none;
  text-transform: capitalize;
  transition: all .2s linear;
}

.container{
  display: flex;
  justify-content: center;
  align-items: center;
  padding:25px;
  min-height: 100vh;
  width: 100%;
  margin-left: auto;
}

.container form{
  padding:20px;
  width:700px;
  background: #ccc;
  box-shadow: 0 5px 10px rgba(0,0,0,.1);
}

.container form .row{
  display: flex;
  flex-wrap: wrap;
  gap:15px;
}

.container form .row .col{
  flex:1 1 250px;
}

.container form .row .col .title{
  font-size: 20px;
  color:#333;
  padding-bottom: 5px;
  text-transform: uppercase;
}

.container form .row .col .inputBox{
  margin:15px 0;
}

.container form .row .col .inputBox span{
  margin-bottom: 10px;
  display: block;
}

.container form .row .col .inputBox input{
  width: 100%;
  border:1px solid #ccc;
  padding:10px 15px;
  font-size: 15px;
  text-transform: none;
}

.container form .row .col .inputBox input:focus{
  border:1px solid #000;
}

.container form .row .col .flex{
  display: flex;
  gap:15px;
}

.container form .row .col .flex .inputBox{
  margin-top: 5px;
}

.container form .row .col .inputBox img{
  height: 34px;
  margin-top: 5px;
  filter: drop-shadow(0 0 1px #000);
}

.container form .submit-btn{
  width: 100%;
  padding:12px;
  font-size: 17px;
  background: #27ae60;
  color:#fff;
  margin-top: 5px;
  cursor: pointer;
}

.container form .submit-btn:hover{
  background: #2ecc71;
}
.container form .boxy{
         background: ghostwhite; 
            font-size: 20px; 
            padding: 10px; 
            border: 1px solid lightgray; 
            margin: 10px;"
}
.container form .boxpay{
         background: ghostwhite; 
            font-size: 20px; 
            padding: 10px; 
            border: 1px solid lightgray; 
            margin: 10px;
            height:45px;
            Width:230px;
}
.loader {
    margin-left:-511px;
    margin-top:51px;
  border: 10px solid #f3f3f3;
  border-radius: 50%;
  border-top: 10px solid blue;
  border-bottom: 10px solid blue;
  width: 50px;
  height: 50px;
  -webkit-animation: spin 2s linear infinite;
  animation: spin 2s linear infinite;
}
.ldr {
    margin-left:-221px;
    margin-top:-20px;
    margin-bottom:300px;
    margin-right:-200px;
   width:100%;
    
 

  
}


@-webkit-keyframes spin {
  0% { -webkit-transform: rotate(0deg); }
  100% { -webkit-transform: rotate(360deg); }
}

@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
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

    }
   else{
        header("location: ../login.php");
    }
    if($_POST){

    

        $_SESSION["personal"]=array(
            'name'=>$_POST['name'],
            'email'=>$_POST['email'],
            'Tele'=>$_POST['Tele'],
            'nic'=>$_POST['nic'],
            'dob'=>$_POST['dob'],
            'appodate'=>$_POST['appodate'],
            'appotime'=>$_POST['appotime'],
            'spec'=>$_POST['spec']
        );
    
    
        print_r($_SESSION["personal"]);
        header("location: hospital.php?action=next");
    
    
    
    
    }

    //import database
    include("../connection.php");
    $userrow = $database->query("SELECT * FROM `webuser` WHERE email='$useremail'");
    $userfetch=$userrow->fetch_assoc();
    $userid= $userfetch["id"];
    $username=$userfetch["name"];
    
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

                                        </div>    
                     <a href="makeanappointment.php"  class="non-style-link"><button  class="btn-primary-soft btn button-icon menu-icon-session-active"  style="padding-left: 40px;padding-top: 12px;padding-bottom: 12px;margin-top: 10px;"><font class="tn-in-text">Make An Appointment!</font></button></a>

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

    if($_POST){

        

$_SESSION["personall"]=array(
    'name'=>$_POST['fname'],
    'email'=>$_POST['lname'],
    'Yele'=>$_POST['Tele'],
    'dob'=>$_POST['dob']
    
);


print_r($_SESSION["personall"]);
header("location: http://localhost/MyHakim.com/patient/hospital.php?action=next");




}
?>



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
                 
   
    ';
             }
         }
         elseif ($action == 'next') {
            session_start();
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
            <div >
                <a class="close" href="hospital.php">&times;</a> 
               <div class="content">
                <div style="display: flex;justify-content: center;">
                
                <div class="container">

                <form action="" method="POST" >

        <div class="row">

            <div class="col">

                <h3 class="title">Payment Information</h3>
                <h4>COMMERCIAL BANK OF ETHIOPIA (CBE) ACCOUNT NUMBER :</h4>
                <div class="boxy">                
                   10200232342      
                </div>
                <h4>BANK OF ABYSSINIA (BoA) :</h4>
                <div class="boxy">                
                   10200232342      
                </div>
                <h4>AWASH BANK ACCOUNT NUMBER :</h4>
                <div class="boxy">                
                   10200232342      
                </div>
                <h4>TeleBirr ACCOUNT NUMBER :</h4>
                <div class="boxy">                
                   10200232342      
                </div>

                
                
                   
                

            </div>

            <div class="col">

                <h3 class="title">payment</h3>

                <div class="inputBox">
                    <span>Payment accepted :</span>
                    <img src="../css/cbe.jfif" alt="">
                    <img src="../css/telebirr.png" alt="">
                    <img src="../css/amole.jfif" alt="">
                    <img src="../css/arifpay.png" alt="">
                </div>
                <h>Amount of Money :</h>
                <div class="boxy">                
                   520 ETB    
                </div>
                <div class="inputBox">
                    <span>Transaction ID</span>
                    <input type="number" placeholder="Insert your Transaction ID">
                </div>
                <div class="inputBox">
                  
                    <label for="payment_select">Enter your Preferred Payment Method</label>
                    <div class="boxpay">
<select name="method" id="payment_select">
<option value="">--Please choose an option--</option>
  <option value="CBE">CBE</option>
  <option value="BoA">BoA</option>
  <option value="Awash Bank">Awash Bank</option>
  <option value="Tele Birr">Tele Birr</option>
  <option value="Arif Pay">Arif Pay</option>
  <option value="Hello Cash">Amole</option>
  <option value="Amole">Chappa</option>
</select>
                </div>

                
                </div>

            </div>
    
        </div>
        
         <a  href="hospital.php?action=add&id" class="btn-primary-soft btn button-icon"   style="padding-left: 40px;padding-top: 12px;padding-bottom: 12px;margin-top: 10px;">Back</button>
                        </a> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 
                        <a  href="?action=paymentpending"  class="btn-primary-soft btn button-icon"  style="padding-left: 40px;padding-top: 12px;padding-bottom: 12px;margin-top: 10px;">Procced to Payment</button></a>
    </form>

</div>    
    </div>
    </div>

     

   ';
             }
         } elseif ($action == 'paymentpending') {
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
           <div >
               <a class="close" href="hospital.php">&times;</a> 
            
              
               
               
               <div class="loader"></div>
               <p class="ldr"> <br>Thank You for booking your appointment!</br> 



               <br>Please wait for the hospital personnel to approve your payment</br>
               <br> After you are approved, immedietly you will receive an email comfirmation including all the details  </br></p>
 
       </div>
       
        <a  href="hospital.php?action=add&id" class="btn-primary-soft btn button-icon"   style="padding-left: 40px;padding-top: 12px;padding-bottom: 12px;margin-top: 10px;">Back</button>
                       </a> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 
   </form>

</div>    
   </div>
   </div>

    

  ';
             }
         }
     }
     
?>






</body>
</html>