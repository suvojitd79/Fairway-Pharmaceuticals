<?php


session_start();


if(!isset($_SESSION['login_id']))
{

header('Location:http://localhost/Fairway/login.php');
exit();    

}

$pdo = new PDO('mysql:host=localhost;dbname=fairway','root',''); 


$sql="SELECT name from employee WHERE id=:id";

$sqlm=$pdo->prepare($sql);

$sqlm->execute(array('id'=>$_SESSION['login_id']));

$row=$sqlm->fetch();

$_SESSION['user_name']=$row['name'];



if(isset($_SESSION['sale_error'])){
        


        if($_SESSION['sale_error']==1)
        {

            echo "<script>alert('Warning!!!  All the fields must be filled');</script>";

        }

        if($_SESSION['sale_error']==0)
        {

            echo "<script>alert('Data has been added!');</script>";

        }


        unset($_SESSION['sale_error']);

    }


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sale Entry | Fairway Pharmaceuticals </title>
    <link rel="shortcut icon" href="./img/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.indigo-pink.min.css">
    <script defer src="https://code.getmdl.io/1.3.0/material.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/material-design-iconic-font/2.2.0/css/material-design-iconic-font.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" href="./css/components.css">
    <link rel="stylesheet" href="./css/user_entry.css">

  <!-- Include jQuery Popup Overlay -->
  <script src="./js/jquery-popup-overlay.js"></script>


</head>
<body style="  background: linear-gradient(to right, #22c1c3, #ffc0cb);">
    <div class="mdl-layout mdl-js-layout mdl-layout--fixed-header">
        <header class="mdl-layout__header">
        <div class="mdl-layout__header-row">
        <!-- Title -->
        <span class="mdl-layout-title">Fairway</span>
        <span style="position: absolute;top:40px;">Hello <?=$_SESSION['user_name']?>!</span>
        <!-- Add spacer, to align navigation to the right -->
        <div class="mdl-layout-spacer"></div>
        <!-- Navigation. We hide it in small screens. -->
        <nav class="mdl-navigation mdl-layout--large-screen-only">
            <a class="mdl-navigation__link" href="user.php"><i class="zmdi zmdi-card-giftcard"></i>&nbsp;Running Offers</a>
            <a class="mdl-navigation__link" href="saleEntry.php"><i class="zmdi zmdi-hospital"></i>&nbsp;Sale Entry</a>
            <a class="mdl-navigation__link" href="travel.php"><i class="zmdi zmdi-car"></i>&nbsp;Travel Detail</a>
            <a class="mdl-navigation__link" href="userReport.php"><i class="zmdi zmdi-chart"></i>&nbsp;Report</a>
            <a class="mdl-navigation__link" href="backend/logout.php"><i class="zmdi zmdi-lock-open zmdi-hc-lg"></i>&nbsp;Logout</a>
        </nav>
        </div>
         </header>
        <div class="mdl-layout__drawer">
        <span class="mdl-layout-title">Fairway</span>
        <nav class="mdl-navigation">
            <a class="mdl-navigation__link" href="user.php"><i class="zmdi zmdi-card-giftcard"></i>&nbsp;Running Offers</a>
            <a class="mdl-navigation__link" href="saleEntry.php"><i class="zmdi zmdi-hospital"></i>&nbsp;Sale Entry</a>
            <a class="mdl-navigation__link" href="travel.php"><i class="zmdi zmdi-car"></i>&nbsp;Travel Detail</a>
            <a class="mdl-navigation__link" href="userReport.php"><i class="zmdi zmdi-chart"></i>&nbsp;Report</a> <hr>
            <a class="mdl-navigation__link" href="backend/logout.php"><i class="zmdi zmdi-lock-open zmdi-hc-lg"></i>&nbsp;Logout</a>
        </nav>
        </div>
<main class="mdl-layout__content">
<div class="page-content"><!-- Your content goes here -->

    <center><h3 class="form-heading"><i class="zmdi zmdi-hospital"></i>&nbsp;Sale Entry</h3></center>
    


    <form method="POST" action="backend/sale_entry.php" onsubmit="return executeOnSubmit();">
    <div class="sale-form">
    
            <div class="form-container">
            <span class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                <input class="mdl-textfield__input" type="text"  id="issueDate" name="fields1" required>
                <label class="mdl-textfield__label" for="issueDate">Date of Issue</label>
            </span> <br>
           
            <span class="mdl-textfield mdl-js-textfield">
                     <label for="">Stockist Name :</label>
                    <select class="mdl-textfield__input" id="supp_name" name="fields2" value=" " required>

                    </select>
            </span> <br>
        </div> 






        <div class="mdl-grid" id="danamic">    

           <div class="mdl-cell mdl-cell--6-col mdl-cell--3-col-phone">
                    <label for="">Medicine Name :</label>
                    <select class="mdl-textfield__input" name="fields3[]" id="med_name" required>
                    </select>
                </div>
                <div class="mdl-cell mdl-cell--2-col mdl-cell--1-col-phone">
                <span class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
            <input class="mdl-textfield__input" type="number" step=0.01 id="price" name="fields4[]" placeholder="Price (&#8377;)" required>             
                </span>   
                </div>
                <div class="mdl-cell mdl-cell--2-col mdl-cell--2-col-phone" style="padding-bottom:10px;">
                    <span class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                        <input class="mdl-textfield__input" type="number" id="receipt" placeholder="Receipt/Pur (Qty)"  name="fields5[]" onkeypress="return isNumber(event)" required>
                    </span> 
                </div>
                <div class="mdl-cell mdl-cell--2-col mdl-cell--2-col-phone">
                    <span class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                        <input class="mdl-textfield__input" type="number" id="sale" placeholder="Issue / Sales (Qty)" name="fields6[]" required>
                    </span> 
                </div>
                   






            </div>   
         
        </div>  
       
       

        

            <center>
            <button id="addButton" class="mdl-button mdl-js-button mdl-button--icon mdl-button--colored">
                    <i class="material-icons">add</i></button> 
            <button id="delete" class="mdl-button mdl-js-button mdl-button--icon" style="color: orangered">
                    <i class="material-icons">clear</i></button> <br>
                     <br>
        </center>
       
        <div class="form-container">
                <span class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                    <input class="mdl-textfield__input" type="text" id="remarks" name="rem">
                    <label class="mdl-textfield__label" for="remarks" name=" ">Remarks</label>
                </span>
        <div>
    
   <!--      <center>  <button  class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent" > Submit </button></center> -->

         <input  type="submit" name="sale_entry" id="sale_entry" style="display: block;" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent">
    
        </form>  



</div>
</main>
</div>

         
            
            
  
  

        
</div>

</div>
</main>
</div>




    <script src="js/user_entry.js"></script>
      <script type="text/javascript">

        function executeOnSubmit()
            {

            var res = confirm("Do you want to submit the form contents?");

            if(res)
            return true;
            else
            return false;
            }



        function isNumber(evt) {
            evt = (evt) ? evt : window.event;
            var charCode = (evt.which) ? evt.which : evt.keyCode;
            if (charCode > 31 && (charCode < 48 || charCode > 57)) {
                return false;
            }
            return true;
        }

        $(document).ready(function(){


            

            

            
            
            



            function fetch_med(){

            $.ajax({

                url:'backend/fetch_medicine.php',
                method:'POST',
                success:function(data)
                    {

                        $('#med_name').html(data);

                    }


            });

                }

                fetch_med();



            function fetch_supplier(){


            $.ajax({

                url:'backend/fetch_supplier.php',
                method:'POST',
                success:function(data)
                    {

                        $('#supp_name').html(data);

                    }


            });

        }

            fetch_supplier();

            

                // $('#med_name').change(function(){ 
                    
                //     var value = $(this).val();

                //     alert(value);
                // });

                

           







            });

var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/5b7cf754f31d0f771d840655/default';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();

  </script>
</body>
</html>