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
    
    background: #ccc ;
    border-radius: 5px;
    width: 65%;
    position: relative;
    transition: all 5s ease-in-out;
  }
        
        div.hyu {   
            width:80%;
            height:1900px;
            overflow:auto;
           
        }
        *{
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
  background: rgba(0, 112, 216, 0.637);

}

.container form{
  padding:20px;
  width:700px;
  background: #fff;
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
</style>
</head>
<body>
   
                        
                            
                            
 
                           
                        
                        
            
    
        
    <div id="popup1" class="overlay">
    
            <div class="popup">
            <center>
            
                <a class="close" href="hospital.php">&times;</a> 
               <div class="content">
                <div style="display: flex;justify-content: center;">
                
                <div class="container">

    <form action="">

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

        <input type="submit" value="proceed to Paymet" class="submit-btn">

    </form>

</div>    
    </div>
    </div>

    


</body>
</html>