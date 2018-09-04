<?php

session_start();

if(!isset($_SESSION['login_id']))
{

header('Location:http://localhost/Fairway/login.php');
exit();

}




?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reports : Fairway Pharmaceuticals | The Right choice </title>
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.indigo-pink.min.css">
    <script defer src="https://code.getmdl.io/1.3.0/material.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/material-design-iconic-font/2.2.0/css/material-design-iconic-font.min.css">
     <link rel="stylesheet" href="css/components.css">
    
 


    
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

#myInput {
  background-image: url('search_emp.png');
  background-position: 10px 10px;
  background-repeat: no-repeat;
  width: 100%;
  font-size: 16px;
  padding: 20px 20px 12px 63px;
  border: 1px solid #ddd;
  margin-bottom: 12px;
  background-size: 45px 45px;
}

#myTable {
  border-collapse: collapse;
  width: 100%;
  border: 1px solid #ddd;
  font-size: 18px;
}

#myTable th, #myTable td {
  text-align: left;
  padding: 12px;
  border:1px solid #eee;
}

#myTable tr {
  border-bottom: 1px solid #ddd;
}

#myTable tr.header{

background-color: #A1BEB4;

}


#myTable tr:hover {
  background-color: #f1f1f1;
  cursor: pointer;
}

#myTable tr.header:hover{

background-color: #A1BEB4;

}





#myInput2 {
  background-image: url('search_emp.png');
  background-position: 10px 10px;
  background-repeat: no-repeat;
  width: 100%;
  font-size: 16px;
  padding: 20px 20px 12px 63px;
  border: 1px solid #ddd;
  margin-bottom: 12px;
  background-size: 45px 45px;
}

#myTable2 {
  border-collapse: collapse;
  width: 100%;
  border: 1px solid #ddd;
  font-size: 18px;
}

#myTable2 th, #myTable2 td {
  text-align: left;
  padding: 12px;
  border:1px solid #eee;
}

#myTable2 tr {
  border-bottom: 1px solid #ddd;
}

#myTable2 tr.header{

background-color: #A1BEB4;

}


#myTable2 tr:hover {
  background-color: #f1f1f1;
  cursor: pointer;
}

#myTable2 tr.header:hover{

background-color: #A1BEB4;

}





    </style>

    
</head>
<body style="background: linear-gradient(to right, #2bc0e4, #eaecc6);">
        <div class="mdl-layout mdl-js-layout mdl-layout--fixed-header">
                <header class="mdl-layout__header">
                  <div class="mdl-layout__header-row">
                    <!-- Title -->
                    <span class="mdl-layout-title">Fairway</span>
                    <!-- Add spacer, to align navigation to the right -->
                    <div class="mdl-layout-spacer"></div>
                    <!-- Navigation. We hide it in small screens. -->
                    <nav class="mdl-navigation mdl-layout--large-screen-only">
                      <a class="mdl-navigation__link" href="rm.php"><i class="zmdi zmdi-home zmdi-hc-lg"></i> Dashboard</a>
                      <a class="mdl-navigation__link" href="addOffer-rm.php"><i class="zmdi zmdi-cake zmdi-hc-lg"></i> Add Offer </a>
                      <a class="mdl-navigation__link" href="reports-rm.php"><i class="zmdi zmdi-chart zmdi-hc-lg"></i> Reports</a>
                      <a class="mdl-navigation__link" href="backend/logout.php"><i class="zmdi zmdi-lock-open zmdi-hc-lg"></i> Logout</a>
                    </nav>
                  </div>
                </header>
                <div class="mdl-layout__drawer">
                  <span class="mdl-layout-title">Fairway</span>
                  <nav class="mdl-navigation">
                    <a class="mdl-navigation__link" href="rm.php"><i class="zmdi zmdi-home zmdi-hc-lg"></i>&nbsp;Dashboard</a>
                    <a class="mdl-navigation__link" href="addOffer-rm.php"><i class="zmdi zmdi-cake zmdi-hc-lg"></i>&nbsp;Add Offer </a>
                    <a class="mdl-navigation__link" href="reports-rm.php"><i class="zmdi zmdi-chart zmdi-hc-lg"></i>&nbsp;Reports</a> <hr/>
                    <a class="mdl-navigation__link" href="backend/logout.php"><i class="zmdi zmdi-lock-open zmdi-hc-lg"></i>&nbsp;Logout</a>
                  </nav>
                </div>
                <main class="mdl-layout__content">
                  <div class="page-content"><!-- Your content goes here -->







                </div>
                </main>
            </div>

            <script src="js/components.js"></script>
        


</body>
</html>