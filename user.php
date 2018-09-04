<?php

session_start();

if(!isset($_SESSION['login_id']))
{

header('Location:http://localhost/Fairway/login.php');
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

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>User Entry | Fairway Pharmaceuticals</title>
    
    <link rel="shortcut icon" href="./img/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.indigo-pink.min.css">
    <script defer src="https://code.getmdl.io/1.3.0/material.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/material-design-iconic-font/2.2.0/css/material-design-iconic-font.min.css">
    <link rel="stylesheet" href="css/user.css">
  
    <style type="text/css">
    
    <style type="text/css">
     


    html {
  box-sizing: border-box;
}

*, *:before, *:after {
  box-sizing: inherit;
}

.column1 {
  float: left;
  width: 33.3%;
  margin-bottom: 16px;
  padding: 0 8px;
  padding: 20px;
}

@media screen and (max-width: 650px) {
  .column1{
    width: 100%;
    display: block;
  }
}

.card1 {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  
}

.card1:hover{

 box-shadow: 0px 0px 150px #000000;
transform: scale(1.008);
}

.container1 {
  padding: 0 16px;
}

.container1::after, .row1::after {
  content: "";
  clear: both;
  display: table;
}

.title1 {
  color: grey;
}

.button1 {
  border: none;
  outline: 0;
  display: inline-block;
  padding: 8px;
  color: white;
  background-color: #000;
  text-align: center;
  cursor: pointer;
  width: 100%;
}

.button1:hover {
  background-color: #555;
}


* {
  box-sizing: border-box;
}


    </style>


</head>
<body style="background: linear-gradient(to right, #2bc0e4, #eaecc6);">
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
                <a class="mdl-navigation__link" href="userReport.php"><i class="zmdi zmdi-chart"></i>&nbsp;Report</a>
                <a class="mdl-navigation__link" href="backend/logout.php"><i class="zmdi zmdi-lock-open zmdi-hc-lg"></i>&nbsp;Logout</a>
        </nav>
    </div>
    <main class="mdl-layout__content">
        <div class="page-content"><!-- Your content goes here -->
<center><h3 class="form-heading" style="clear: both;"><i class="zmdi zmdi-card-giftcard"></i>&nbsp;Exclusive Offers</h3></center>
      
        <div id="offer_content" style="clear: both;">
            



        </div>

    </div>
    </main>
</div>

           <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
          crossorigin="anonymous"></script>

            <script src="js/user.js"></script>


 <script type="text/javascript">




    
$(document).ready(function(){


    fetch_offer();


        function fetch_offer(){


          $.ajax({


            url:'backend/offer.php',
            method:'POST',
            success:function(data){

                $('#offer_content').html(data);


                }


               })  


                }

        setInterval(function(){fetch_offer();},1000);        




                });




 </script>

</body>
</html>