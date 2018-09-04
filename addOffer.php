<?php

session_start();


if(!isset($_SESSION['login_id']))
{

header('Location:http://localhost/Fairway/login.php');
exit();

}


if($_SESSION['designation']=='Offer Visitor' || $_SESSION['designation']=='Medical Representative')
{

header('Location:http://localhost/Fairway/login.php');
exit();

}




if(isset($_SESSION['unable_offer']))
{
    
    if($_SESSION['unable_offer']==1)
            {
                
                echo "<script type='text/javascript'>alert('Plese fill out all the fields!');</script>";
                

            }

    if($_SESSION['unable_offer']==0)
            {
                
                
                echo "<script type='text/javascript'>alert('Offer offer has been created successfully!');</script>";

            }        


            unset($_SESSION['unable_offer']);

}


$pdo = new PDO('mysql:host=localhost;dbname=fairway','root',''); 

$sql="SELECT name from employee WHERE id=:id";

$sqlm=$pdo->prepare($sql);

$sqlm->execute(array('id'=>$_SESSION['login_id']));

$row=$sqlm->fetch();

$_SESSION['user_name']=$row['name'];



?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add Offer - Fairway Pharmaceuticals | The Right choice </title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.indigo-pink.min.css">
    <script defer src="https://code.getmdl.io/1.3.0/material.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/material-design-iconic-font/2.2.0/css/material-design-iconic-font.min.css">
    <link rel="stylesheet" href="css/components.css">
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

</head>
<body style="background: linear-gradient(to right, #77a1d3, #79cbca, #e684ae);">
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
                <a class="mdl-navigation__link" href="admin.php"><i class="zmdi zmdi-home zmdi-hc-lg"></i> Dashboard</a>
                <a class="mdl-navigation__link" href="addOffer.php"><i class="zmdi zmdi-cake zmdi-hc-lg"></i> Add Offer </a>
                <a class="mdl-navigation__link" href="createEmployee.php"><i class="zmdi zmdi-account-add zmdi-hc-lg"></i> Creat Employee</a>
                <a class="mdl-navigation__link" href="reports.php"><i class="zmdi zmdi-chart zmdi-hc-lg"></i> Reports</a>
                <a class="mdl-navigation__link" href="backend/logout.php"><i class="zmdi zmdi-lock-open zmdi-hc-lg"></i> Logout</a>
              </nav>
            </div>
          </header>
          <div class="mdl-layout__drawer">
            <span class="mdl-layout-title">Fairway</span>
            <nav class="mdl-navigation">
              <a class="mdl-navigation__link" href="admin.php"><i class="zmdi zmdi-home zmdi-hc-lg"></i>&nbsp;Dashboard</a>
              <a class="mdl-navigation__link" href="addOffer.php"><i class="zmdi zmdi-cake zmdi-hc-lg"></i>&nbsp;Add Offer </a>
              <a class="mdl-navigation__link" href="createEmployee.php"><i class="zmdi zmdi-account-add zmdi-hc-lg"></i>&nbsp;Creat Employee</a>
              <a class="mdl-navigation__link" href="reports.php"><i class="zmdi zmdi-chart zmdi-hc-lg"></i>&nbsp;Reports</a> <hr/>
              <a class="mdl-navigation__link" href="backend/logout.php"><i class="zmdi zmdi-lock-open zmdi-hc-lg"></i>&nbsp;Logout</a>
            </nav>
          </div>
          <main class="mdl-layout__content">
            <div class="page-content">
              <center> <h4 class="form-heading">Add Offer</h4> </center>
              <div class="form-container">

                  <form action="backend/add_offer.php" method="POST" enctype="multipart/form-data">

                  <span class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                    <input class="mdl-textfield__input" type="text"  id="offerTitle" name="x1">
                    <label class="mdl-textfield__label" for="offerTitle">Title of the Offer</label>
                    </span> <br>
                    <span class="mdl-textfield mdl-js-textfield">
                      <select class="mdl-textfield__input" id="medicineName-1" name="x2">
            
                      </select>
                </span> <br>
              
                  <label class="" for="offerImage">Offer Image</label>                              
                    <span class="mdl-textfield mdl-js-textfield">
                    <input class="mdl-textfield__input" type="file"  accept="image/*" id="offerImage" name="x3">
                  </span> <br>
                  <span class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                      <input class="mdl-textfield__input" type="number"  id="quantity" name="x4">
                      <label class="mdl-textfield__label" for="quantity">On Sale of (Quantity) </label>
                  </span> <br>
                  <span class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                    <input class="mdl-textfield__input" type="number"  id="freeMedicine" name="x5">
                    <label class="mdl-textfield__label" for="freeMedicine">Number of Medicine Free </label>
                </span> <br>

                  <span class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                      <textarea name="x6" class="mdl-textfield__input" type="text" rows= "3" id="description" ></textarea>
                      <label class="mdl-textfield__label" for="description">Offer's Description</label>
                      </span> <br>

                  <label for="validity">Validity : </label> 
                  <span class="mdl-textfield mdl-js-textfield">
                    <input class="mdl-textfield__input" type="date"  id="validity" name="x7">
                    </span><br> <br>

                  <span class="mdl-textfield mdl-js-textfield"> 
                    <button onclick="productOffer()" type="button" class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored">Create New Offer</button>      
                  </span> 
                <input type="submit" name="pro_offer" style="display: none;" id="pro_offer">

                  </form>
                  
            


                </div> 



                  <dialog class="mdl-dialog" id="product-offer-dialog">
                      <h4 class="my-dialog-title">Product Free Offer </h4>
                      <div class="mdl-dialog__content">
                          Title of the Offer :<p class="displayData" id="offerTitle-P"></p>
                          Offer Valid on :<p class="displayData" id="productName-P"></p>
                          Offer Image :<span style="width: 100px; height: 100px;" id="offerImage-P"> </span> <br>
                          On Sale of (Quantity) :<p class="displayData" id="quantity-P"></p>
                          Number of Medicine Free :<p class="displayData" id="freeMedicine-P"></p>
                          Offer Discribtion :<p class="displayData" id="offerDiscription-P"></p>
                          Validity upto :<p class="displayData" id="validity-P"></p> 
                      </div>
                      <div class="mdl-dialog__actions">
                          <button type="button" class="mdl-button mdl-js-button mdl-button--fab mdl-button--mini-fab close"><i class="material-icons">clear </i></button>                    
                          <button type="button" class="mdl-button mdl-js-button mdl-button--fab mdl-button--mini-fab mdl-button--colored" id="pro_click"><i class="material-icons">done_outline</i></button>
                       </div>
                  </dialog>
              

            </div>
        </main>
       </div>

            <script src="js/components.js"></script>

<script type="text/javascript">
    
   document.getElementById("pro_click").onclick = function () {

        document.getElementById("pro_offer").click();

        
        
    };



        document.getElementById("pro_click_med").onclick = function () {

        document.getElementById("med_offer").click();

        
        
    };



// code for - Offer section dialog box
function productOffer(){
    var dialog = document.getElementById('product-offer-dialog');
    dialog.showModal();
    if (! dialog.showModal) {
        dialogPolyfill.registerDialog(dialog);
      };
    dialog.querySelector('.close').addEventListener('click', function() {
        dialog.close()});
    
    document.getElementById('offerTitle-P').innerHTML = document.getElementById("offerTitle").value;
    document.getElementById('productName-P').innerHTML = document.getElementById("medicineName-1").value;  
    document.getElementById('offerImage-P').innerHTML = document.getElementById("offerImage").value;  
    document.getElementById('quantity-P').innerHTML = document.getElementById("quantity").value;     
    document.getElementById('freeMedicine-P').innerHTML = document.getElementById("freeMedicine").value;    
    document.getElementById('offerDiscription-P').innerHTML = document.getElementById("description").value;     
    document.getElementById('validity-P').innerHTML = document.getElementById("validity").value; 
};


        



</script>


 <script type="text/javascript">
              
              $(document).ready(function(){



              function fetch_med(){

            $.ajax({

                url:'backend/fetch_medicine.php',
                method:'POST',
                success:function(data)
                    {

                        $('#medicineName-1').html("<option disabled selected>Offer Valid on</option>"+data);

                    }


            });

                }

                fetch_med();












              });


           </script>   


           <!--Start of Tawk.to Script-->
<script type="text/javascript">
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
<!--End of Tawk.to Script-->

</body>
</html>