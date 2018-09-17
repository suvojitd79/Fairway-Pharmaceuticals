<?php

session_start();

if(!isset($_SESSION['login_id']))
{

header('Location:http://localhost/Fairway1.1/FairwayVerified/login.php');
exit();

}



if($_SESSION['designation']!='Medical Representative')
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


if(isset($_SESSION['succ_travel']))
   {


    if($_SESSION['succ_travel']==1)
    {

        echo "<script>alert('All the fields must be filled!');</script>";

    }
    if($_SESSION['succ_travel']==0)
    {

        echo "<script>alert('Data Has been stored!');</script>";


    }

    unset($_SESSION['succ_travel']);


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
    <title>Fairway Pharmaceuticals | The Right choice </title>
    <link rel="shortcut icon" href="./img/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="./css/Material+Icons.css">
    <link rel="stylesheet" href="./css/material.indigo-pink.min.css">
    <script defer src="./js/material.min.js"></script>
    <link rel="stylesheet" href="./css/material-design-iconic-font.min.css"/>
    <script src="./js/jquery.js"></script>
    <link rel="stylesheet" href="./css/user.css">

</head>
<body style="background: linear-gradient(to right, #ffc0cb, #eaecc6);">
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
            <center><h3 class="form-heading"><i class="zmdi zmdi-car"></i>&nbsp; Travel information</h3></center>
            <div class="form-container">
                <form action="backend/travel_data.php" method="POST">
                    <span class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                        <input class="mdl-textfield__input" type="text"  id="issueDate" name="x1">
                        <label class="mdl-textfield__label" for="issueDate">Date of Travel</label>
                    </span> <br>
                    <span class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                        <input class="mdl-textfield__input" type="text"  id="from" name="x2">
                        <label class="mdl-textfield__label" for="from">From</label>
                    </span> <br>
                    <span class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                        <input class="mdl-textfield__input" type="text"  id="to" name="x3">
                        <label class="mdl-textfield__label" for="to">To</label>
                    </span> <br>
                    <span class="mdl-textfield mdl-js-textfield" id="radio_butt">
                         <input type="radio" name="x4" value="Headquarter" checked> HQ
                         <input type="radio" name="x4" value="Ex-Headquarter"> Ex-HQ
                         <input type="radio" name="x4" value="Out Station"> Out Station  
                  </span> <br>
                    <span class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                        <input class="mdl-textfield__input" type="number" step=0.01  id="distance" name="x5">
                        <label class="mdl-textfield__label" for="distance">Distance in K.M.</label>
                    </span> <br>
                    <span class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                        <input class="mdl-textfield__input" type="number" step=0.01 id="fare" name="x6">
                        <label class="mdl-textfield__label" for="fare">Fare per KM (&#8377)</label>
                    </span> <br>
                    <span class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                        <input class="mdl-textfield__input" type="number"  id="DA" name="x7">
                        <label class="mdl-textfield__label" for="DA">DA of the trip</label>
                    </span> <br>
                    <span class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                        <input class="mdl-textfield__input" type="text"  id="remarks" name="x8">
                        <label class="mdl-textfield__label" for="remarks">Remarks (if any)</label>
                    </span> <br> <br>
                    <span class="mdl-textfield mdl-js-textfield"> 
                       <button onclick="travelDataSubmit()" type="button" class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored">Submit Data</button>
                    </span> 
                    
                    <input type="Submit" name="travel_submit" style="display: none;" id="travel_submit">
                </form>
            </div>
                
                
                <dialog class="mdl-dialog">
                  <h4 class="my-dialog-title">Verify Travel data </h4>
                  <div class="mdl-dialog__content">
                    Date of Travel :<p class="displayData" id="showTravelDate"></p>
                    Journey Starts From :<p class="displayData" id="showFrom"></p>
                    Travel To :<p class="displayData" id="showTo"></p>
                    Origin Office : <p class="displayData" id="showOffice"></p>
                    Total Distance (K.M.) :<p class="displayData" id="showDistance"></p>
                    Total Expense (TA + DA) : <p class="displayData" id="showTotal"></p></p>
                    Remarks : <p class="displayData" id="showRemarks"></p></p>
                  </div>
                  <div class="mdl-dialog__actions">
                        <button type="button" class="mdl-button mdl-js-button mdl-button--fab mdl-button--mini-fab close"><i class="material-icons">clear </i></button>                    
                        <button type="button" class="mdl-button mdl-js-button mdl-button--fab mdl-button--mini-fab mdl-button--colored" id="tra_sub"><i class="material-icons" id="travel_submit_">done_outline</i></button>
                  </div>
                </dialog>


    </div>
    </main>
</div>


            <script src="js/user.js"></script>


<script type="text/javascript">
    

    $('#tra_sub').click(function(){

       
         $("#travel_submit").click();

     });

</script>



<script>


function travelDataSubmit() {
  var dialog = document.querySelector("dialog");
  dialog.showModal();
  if (!dialog.showModal) {
    dialogPolyfill.registerDialog(dialog);
  }
  dialog.querySelector(".close").addEventListener("click", function() {
    dialog.close();
                    });

  var distance = document.getElementById("distance").value;
  var fare = document.getElementById("fare").value;
  var TA = fare * distance;
  var DA = document.getElementById("DA").value;
  var total = parseInt(TA) + parseInt(DA);

  document.getElementById("showTravelDate").innerHTML = document.getElementById(
    "issueDate"
  ).value;
  document.getElementById("showFrom").innerHTML = document.getElementById(
    "from"
  ).value;
  document.getElementById("showTo").innerHTML = document.getElementById(
    "to"
  ).value;
  document.getElementById("showOffice").innerHTML = document.querySelector('input[name="x4"]:checked').value;



  document.getElementById("showDistance").innerHTML = document.getElementById(
    "distance"
  ).value;
  document.getElementById("showTotal").innerHTML = "<p>" + total + "</p>";
  document.getElementById("showRemarks").innerHTML = document.getElementById(
    "remarks"
  ).value;
  
}


</script>

  

</body>
</html>
