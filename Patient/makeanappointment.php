<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/animations.css">  
    <link rel="stylesheet" href="../css/main.css">  
    <link rel="stylesheet" href="../css/signup.css">
        
    <title>Make A New Appointment</title>
    <style>
        .container{
            animation: transitionIn-X 0.5s;
        }
        .tabs {
	width:100%;
	display:inline-block;
}


    </style>
  
</head>
<body>
<?php


session_start();

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
        $lname = $_POST['lname'];
        $name = $fname . " " . $lname;
        $email = $_POST['email'];
        $tele = $_POST['tele'];
        $dob = $_POST['dob'];
        $appodate = $_POST['appodate'];
        $appotime = $_POST['appotime'];
        $spec = $_POST['spec'];
        $medconcern = $_POST['medconcern'];
      


        $database->query("insert into pending_patient(name,email,telephone,dateofbirth,appointmentdate,appointmenttime,specialities,medicalconcern) values ('$name','$email','$tele','$dob','$appodate','$appotime','$spec','$medconcern');");

        header('Location: payment_page.php');
    }
}


?>

   
    <center>
    <div class="container">
        <table border="0">
            <tr>
                <td colspan="2">
    
   
                    <p class="header-text">Make A New Appointment</p>
                    <p class="sub-text">Please fill out the form below</p>
                </td>
            </tr>
                
                            
                    <tr>
                        <form action="makeanappointment.php" method="POST" >
                        <td class="label-td" colspan="2">
                            <label for="name" class="form-label">First Name: </label>
                        </td>
                    </tr>
                    <tr>
                        <td class="label-td" colspan="2">
                            <input type="text" name="fname" class="input-text" placeholder="First Name" required><br>
                        </td>
                        
                    </tr>
                             
                    <tr>
                       
                        <td class="label-td" colspan="2">
                            <label for="name" class="form-label"> Last Name: </label>
                        </td>
                    </tr>
                    <tr>
                        <td class="label-td" colspan="2">
                            <input type="text" name="lname" class="input-text" placeholder="Last Name" required><br>
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
                            <input type="tel" name="tele" class="input-text" placeholder="Telephone Number" required><br>
                        </td>
                    </tr>
                    <tr>
                        <td class="label-td" colspan="2">
                            <label for="dob" class="form-label">Date of Birth </label>
                        </td>
                    </tr>
                    <tr>
                <td class="label-td" colspan="2">
                    <input type="date" name="dob" id="date" class="input-text filter-container-items" style="margin: 0;width: 95%;" required>

                </td>
            </tr>
           
                    <td class="label-td" colspan="2">
                    <label for="appodate" class="form-label">Appointment Date</label>
                </td>
            </tr>
            
                    <tr>
                        <td class="label-td" colspan="2">
                            <input type="date" name="appodate" id="date" class="input-text filter-container-items" style="margin: 0;width: 95%;" required>

                        </td>
                    </tr>
                    <td class="label-td" colspan="2">
                    <label for="appotime" class="form-label">Appointment Time</label>
                </td>
            </tr>
            
                    <tr>
                        <td class="label-td" colspan="2">
                            <input type="time" name="appotime" id="appt" class="input-text filter-container-items" style="margin: 0;width: 95%;"  required>

                        </td>
                    </tr>
                    
                    
                    <td class="label-td" colspan="2">
                    <label for="spec" class="form-label">Choose Specialities :</label>
                </td>
            </tr>
            <tr>
                        <td class="label-td" colspan="2">
                        <select name="spec" id="" class="box filter-container-items" style="width:90% ;height: 37px;margin: 0;"  required>
                            <option value="" disabled selected hidden>Choose Specialities from the list</option><br/>
                                
                            <?php 
                             
                                $list = $database->query("select  * from  specialties order by sname asc;");

                                for ($y=0;$y<$list->num_rows;$y++){
                                    $row00=$list->fetch_assoc();
                                    $sn=$row00["sname"];
                                    
                                    echo "<option >$sn</option><br/>";
                                };


                                ?>

                        </select>
                    </td>
                            </tr>
                    <td class="label-td" colspan="2">
                    <label for="medconcern" class="form-label">Medical Concern</label>
                </td>
            </tr>
                    <tr>
                        <td class="label-td" colspan="2">
                            <input type="text" name="medconcern" id="text"  style="margin: top;width: 95%; height: 100px;" required>

                        </td>
                    </tr>
                    
        

                            <td>
                            <form method="post" action="" >
                    <input type="submit" name="submit" value="NEXT" class="login-btn btn-primary btn">
                    </form>
                </td>

           

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
    
   
    

</body>
</html>