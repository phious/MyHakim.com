<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/animations.css">  
    <link rel="stylesheet" href="../css/main.css">  
    <link rel="stylesheet" href="../css/signup.css">
        
    <title>Payment Page</title>
    <style>
        .container{
            animation: transitionIn-X 0.5s;
        }
        .tabs {
	width:100%;
	display:inline-block;
}

/*----- Tab Links -----*/
/* Clearfix */
	.tab-links:after {
	display:block;
	clear:both;
	content:'';
}

.tab-links li {
	margin:0px 5px;
	float:left;
	list-style:none;
}

.tab-links a {
	padding:9px 15px;
	display:inline-block;
	border-radius:3px 3px 0px 0px;
	background:#7FB5DA;
	font-size:16px;
	font-weight:600;
	color:#4c4c4c;
	transition:all linear 0.15s;
}

.tab-links a:hover {
	background:#a7cce5;
	text-decoration:none;
}

li.active a, li.active a:hover {
	background:#fff;
	color:#4c4c4c;
}

/*----- Content of Tabs -----*/
.tab-content {
	padding:15px;
	border-radius:3px;
	box-shadow:-1px 1px 1px rgba(0,0,0,0.15);
	background:#fff;
}

.tab {
	display:none;
}

.tab.active {
	display:block;
}
.popup{
  margin-top: 200px;
  padding-bottom: 150px;
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
    
        
        div.hyu {   
            width:110%;
            height:2000px;
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
.boxa{
         background: ghostwhite; 
            font-size: 20px; 
            width: 200px;
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
{
    padding: 0;
    margin: 0;
}

/* background Color */

.dark {
    background: white;
}

.white {
    background: whitesmoke;
}

/** Background Color **/

.overflow, .circle-line {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
}
.overflow {
   margin-top: 80px;
    width: 10vw;
    height: 10vh;
}

.circle-line {
   
    width: 200px;
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
}

.circle-red,.circle-green,.circle-yellow,.circle-blue{
    position: relative;
    width: 30px;
    height: 30px;
    border-radius: 30px;
    margin: 5px;
}

.circle-red {
    background-color: #EA4335;
    animation: movingUp 1s infinite linear;
  
}

.circle-blue {
    background-color: #4285f4;
    animation: movingUp 1s 0.25s infinite linear;
   
}

.circle-green {
    background-color: #34A853;
    animation: movingUp 1s .4s infinite linear;
    
  
}

.circle-yellow {
    background-color: #FBBC05;
    animation: movingUp 1s .6s infinite linear;
    
}

/* CSS ANIMATION */

@keyframes movingUp {
    0% {
    
        opacity: 1;
        
    }

    100% {
        opacity: 0;
    }
}
    </style>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js">
    </script>
    <script>
        jQuery(document).ready(function() {
	jQuery('.tabs .tab-links a').on('click', function(e) {
		var currentAttrValue = jQuery(this).attr('href');

		// Show/Hide Tabs
		jQuery('.tabs ' + currentAttrValue).show().siblings().hide();

		// Change/remove current tab to active
		jQuery(this).parent('li').addClass('active').siblings().removeClass('active');

		e.preventDefault();
	});
});
</script>
</head>
<body>
<?php




$_SESSION["user"]="";
$_SESSION["usertype"]="";

// Set the new timezone
date_default_timezone_set('Asia/Aden');
$date = date('Y-m-d');

$_SESSION["date"]=$date;


//import database
include("../connection.php");
if ($_POST) {
   



    if (isset($_POST['submit'])) {


        $result = $database->query("select * from pending_patient");
        $fname = $_POST['fname'];
        

        $database->query("insert into pending_patient(name,email,telephone,dateofbirth,appointmentdate,appointmenttime,specialities,medicalconcern) values ('$name','$email','$tele','$dob','$appodate','$appotime','$spec','$medconcern');");

       
    }
}


?>


 
    
    <center>
   
        <table border="0">
            <tr>
                <td colspan="2">
    
   
                    <p class="header-text">Payment Information</p>
                    <p class="sub-text">Please pay the fee below</p>
                </td>
            </tr>
            
</table>
<div class="inputBox" style="margin-left: 900px">
                    <span>Payment accepted :</span>
                    <img src="../img/cbe.png" alt="">
                    <img src="../img/telebirr.png" alt="">
                    <img src="../img/amole.png" alt="">
                    <img src="../img/arifpay.png" alt="">
                </div>
           
           
          
            <div class="tabs">
	<ul class="tab-links">
		<li class="active"><a href="#tab1">COMMERCIAL BANK OF ETHIOPIA (CBE)</a></li>
		<li><a href="#tab2">BoA</a></li>
		<li><a href="#tab3">Tele Birr</a></li>
		<li><a href="#tab4">Arif Pay</a></li>
        <li><a href="#tab5">Amole</a></li>
        <li><a href="#tab6">Chappa</a></li>
        <li><a href="#tab7">Dashen Bank</a></li>
	</ul>

	<div class="tab-content" style="background-color:grey;">
		<div id="tab1" class="tab active">


                <h3 class="title">COMMERCIAL BANK OF ETHIOPIA (CBE) ACCOUNT NUMBER :</h3>
               
                <div class="boxa">                
                   10200232342      
                </div>
                
                <h>Amount of Money :</h>
                <div class="boxa">                
                   520 ETB    
                </div>
                &nbsp;&nbsp;
                <div class="inputBox">
                
                    <span>Transaction ID</span>
                    
                    <input type="number" placeholder="Insert your Transaction ID">
                </div>
                
                

                </div>
				

		<div id="tab2" class="tab">
        <h3 class="title">BANK OF ABBYSINIA (BoA) ACCOUNT NUMBER :</h3>
               
               <div class="boxa">                
                  10200232342      
               </div>
               
               <h>Amount of Money :</h>
               <div class="boxa">                
                  520 ETB    
               </div>
               &nbsp;&nbsp;
               <div class="inputBox">
               
                   <span>Transaction ID</span>
                   
                   <input type="number" placeholder="Insert your Transaction ID">
               </div>
               
               

               </div>
		<div id="tab3" class="tab">
        <h3 class="title">TELE BIRR ACCOUNT NUMBER :</h3>
               
               <div class="boxa">                
                  10200232342      
               </div>
               
               <h>Amount of Money :</h>
               <div class="boxa">                
                  520 ETB    
               </div>
               &nbsp;&nbsp;
               <div class="inputBox">
               
                   <span>Transaction ID</span>
                   
                   <input type="number" placeholder="Insert your Transaction ID">
               </div>
               
               

               </div>

		<div id="tab4" class="tab">
        <h3 class="title">ARIF PAY ACCOUNT NUMBER :</h3>
               
               <div class="boxa">                
                  10200232342      
               </div>
               
               <h>Amount of Money :</h>
               <div class="boxa">                
                  520 ETB    
               </div>
               &nbsp;&nbsp;
               <div class="inputBox">
               
                   <span>Transaction ID</span>
                   
                   <input type="number" placeholder="Insert your Transaction ID">
               </div>
               
               

               </div>
               <div id="tab5" class="tab">
        <h3 class="title">AMOLE ACCOUNT NUMBER :</h3>
               
               <div class="boxa">                
                  10200232342      
               </div>
               
               <h>Amount of Money :</h>
               <div class="boxa">                
                  520 ETB    
               </div>
               &nbsp;&nbsp;
               <div class="inputBox">
               
                   <span>Transaction ID</span>
                   
                   <input type="number" placeholder="Insert your Transaction ID">
               </div>
               
               

               </div>
               <div id="tab6" class="tab">
        <h3 class="title">CHAPPA ACCOUNT NUMBER:</h3>
               
               <div class="boxa">                
                  10200232342      
               </div>
               
               <h>Amount of Money :</h>
               <div class="boxa">                
                  520 ETB    
               </div>
               &nbsp;&nbsp;
               <div class="inputBox">
               
                   <span>Transaction ID</span>
                   
                   <input type="number" placeholder="Insert your Transaction ID">
               </div>
               
               

               </div>
               <div id="tab7" class="tab">
        <h3 class="title">DASHEN BANK ACCOUNT NUMBER :</h3>
               
               <div class="boxa">                
                  10200232342      
               </div>
               
               <h>Amount of Money :</h>
               <div class="boxa">                
                  520 ETB    
               </div>
               &nbsp;&nbsp;
               <div class="inputBox">
               
                   <span>Transaction ID</span>
                   
                   <input type="number" placeholder="Insert your Transaction ID">
               </div>
               </div>
	</div>
</div>
              
               <a href="?action=complete"  class="non-style-link"><button  class="btn-primary-soft btn button-icon menu-icon-session-active"  style="padding-left: 40px;padding-top: 12px;padding-bottom: 12px;margin-top: 10px;"><font class="tn-in-text">Submit the payment</font></button></a>



              
                   
</td>
        
        </tr>
       
                    </tr>
                </table>
                     
                </div>
                </div>
                </div>
                
                
               
            </center>
            <br><br>
    </div>
    </div>
   


    <?php 
    if($_GET){
        
       
        $action=$_GET["action"];
        if($action=='complete'){
            $nameget=$_GET["name"];
            echo '
            <div id="popup1" class="overlay">
                    <div class="popup"  >
                    <center>
                        <h2>Payment confirmation Pending</h2>
                        <a class="close" href="payment_page.php">&times;</a>
                        <div class="content">
                            Dear Customer thank you for making an appointment here !<br>Please wait for the hospital authorized personel to confirm your payment <br> This confirmation might take a while.</br>
                            &nbsp;&nbsp;&nbsp;&nbsp;
                        </div>
                       

                       
                   
                    <div class="circle-line">
                      <div class="circle-red">&nbsp;</div>
                      <div class="circle-blue">&nbsp;</div>
                      <div class="circle-green">&nbsp;</div>
                      <div class="circle-yellow">&nbsp;</div>
                    </div>&nbsp;&nbsp;&nbsp;&nbsp;
                   


                    <div class="overflow dark" id="preload">
                    <a href="hospital.php" class="non-style-link"><button  class="btn-primary btn"  style="display: flex;justify-content: center;align-items: center;margin:10px;padding:10px;"><font class="tn-in-text">&nbsp;&nbsp;OK&nbsp;&nbsp;</font></button></a>
                    </div>
            </div>
           
            </div>
            </center>
            ';
        }}
        ?>
    
</body>
</html>