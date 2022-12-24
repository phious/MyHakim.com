
    <?php
    
    

    //import database
    include("../connection.php");



    if($_POST){
        //print_r($_POST);
        $result= $database->query("select * from webuser");
        $name=$_POST['name'];
        $oldemail=$_POST["oldemail"];
       
      
        $email=$_POST['email'];
       
        $password=$_POST['password'];
        $cpassword=$_POST['cpassword'];
        $id=$_POST['id00'];
        
        if ($password==$cpassword){
            $error='3';
            $result= $database->query("select developer.devid from developers inner join webuser on developers.devemail=webuser.email where webuser.email='$email';");
            //$resultqq= $database->query("select * from developers where devid='$id';");
            if($result->num_rows==1){
                $id2=$result->fetch_assoc()["devid"];
            }else{
                $id2=$id;
            }
            
            echo $id2."jdfjdfdh";
            if($id2!=$id){
                $error='1';
                //$resultqq1= $database->query("select * from developers where devemail='$email';");
                //$did= $resultqq1->fetch_assoc()["devid"];
                //if($resultqq1->num_rows==1){
                    
            }else{

                //$sql1="insert into developers(devemail,devname,password,docnic,doctel,specialties) values('$email','$name','$password','$nic','$tele',$spec);";
                $sql1="update developers set devemail='$email',devname='$name',password='$password' where devid=$id ;";
                $database->query($sql1);

                $sql1="update webuser set email='$email' where email='$oldemail' ;";
                $database->query($sql1);

                echo $sql1;
                //echo $sql2;
                $error= '4';
                
            }
            
        }else{
            $error='2';
        }
    
    
        
        
    }else{
        //header('location: signup.php');
        $error='3';
    }
    

    header("location: settings.php?action=edit&error=".$error."&id=".$id);
    ?>
    
   

</body>
</html>