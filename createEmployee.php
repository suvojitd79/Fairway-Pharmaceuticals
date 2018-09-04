<?php

session_start();

if(!isset($_SESSION['login_id']) || !isset($_SESSION['designation']) || $_SESSION['designation']!='admin')
{

header('Location:http://localhost/Fairway/login.php');
exit();

}



if(isset($_SESSION['duplicate']))
{

echo "<script type='text/javascript'>alert('User with that email already exists!');</script>";
unset($_SESSION['duplicate']);

}

if(isset($_SESSION['unable']))
{
    
    if($_SESSION['unable']==1)
            {
                
                echo "<script type='text/javascript'>alert('Name, email or password cant be empty!');</script>";
                

            }

    if($_SESSION['unable']==0)
            {
                
                
                echo "<script type='text/javascript'>alert('Employee has been created successfully!');</script>";

            }        


            unset($_SESSION['unable']);

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
    <title>Add User | Fairway Pharmaceuticals | The Right choice </title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.indigo-pink.min.css">
    <script defer src="https://code.getmdl.io/1.3.0/material.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/material-design-iconic-font/2.2.0/css/material-design-iconic-font.min.css">
    <link rel="stylesheet" href="css/components.css">

</head>
<body style="background: linear-gradient(to right, #93EDC7,#dae2f8)">
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
                    <a class="mdl-navigation__link" href="createEmployee.php"><i class="zmdi zmdi-account-add zmdi-hc-lg"></i>&nbsp;Create Employee</a>
                    <a class="mdl-navigation__link" href="reports.php"><i class="zmdi zmdi-chart zmdi-hc-lg"></i>&nbsp;Reports</a> <hr/>
                    <a class="mdl-navigation__link" href="backend/logout.php"><i class="zmdi zmdi-lock-open zmdi-hc-lg"></i>&nbsp;Logout</a>
                  </nav>
                </div>
                <main class="mdl-layout__content">
                  <div class="page-content">
                    <center> <h4 class="form-heading">Create New Employee (User)</h4> </center>
                    <div class="form-container">
                            <form action="backend/create_emp.php" method="POST" enctype="multipart/form-data">
                                        <span class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                            <input class="mdl-textfield__input" type="text" id="eName"  name="x1">
                                            <label class="mdl-textfield__label" for="eName">Employee Name</label>
                                        </span> <br>
                                        <span class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                            <select class="mdl-textfield__input" id="designation" value=" " name="x2">
                                                <option disabled selected>Designation</option>
                                                <option value="Regional Manager">Regional Manager</option>
                                                <option value="Medical Representative">Medical Representative</option>
                                                <option value="Offer Visitor">Offer Visitor</option>
                                            </select>
                                        </span> <br>
                                        <span class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                                <input class="mdl-textfield__input" type="number"  id="mobileNo" value=" " name="x3">
                                                <label class="mdl-textfield__label" for="mobileNo">Mobile Number (10 Digits)</label>
                                        </span> <br>
                                        <span class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                                <input class="mdl-textfield__input" type="email"  id="email"   name="x4">
                                                <label class="mdl-textfield__label" for="email">Email Id</label>
                                        </span> <br>
                                        <span class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                                <input class="mdl-textfield__input" type="password" id="password"  name="x5">
                                                <label class="mdl-textfield__label" for="password">Create Password</label>
                                        </span> <br>
                                        <span class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                                <input class="mdl-textfield__input" type="text"  id="address" value=" " name="x6">
                                                <label class="mdl-textfield__label" for="address">Address</label>
                                        </span> <br>
                                        <span class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                                <input class="mdl-textfield__input" type="text"  id="district"  value=" " name="x7">
                                                <label class="mdl-textfield__label" for="district">District</label>
                                        </span> <br>
                                        <span class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                                <input class="mdl-textfield__input" type="number"  id="aadhar" value=" " name="x8">
                                                <label class="mdl-textfield__label" for="aadhar">Aadhar Card Number</label>
                                        </span> <br>
                                        <label class="" for="offerImage">Upload Any ID :</label>                              
                                        <span class="mdl-textfield mdl-js-textfield">
                                        <input class="mdl-textfield__input" type="file"  accept="image/*" id="idImage" value="empty" name="x9">
                                        </span> <br>
                                        <span class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                                <input class="mdl-textfield__input" type="text"  id="remarks" value=" " name="x10">
                                                <label class="mdl-textfield__label" for="remarks">Remarks (if any)</label>
                                        </span> <br> <br>
                                        <span class="mdl-textfield mdl-js-textfield"> 
                                               <button onclick="newUser()" type="button" class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored">Create New User</button>
                                        </span> 

                                       <input type="submit" name="store_data" style="display: none;" id="store_data"> 

                            
                            </form>





                    </div>


                    <dialog class="mdl-dialog">
                        <h4 class="my-dialog-title">Verify New User data </h4>
                        <div class="mdl-dialog__content">
                                Employee Name :<p class="displayData" id="showEmployeeName"></p>
                                Designation :<p class="displayData" id="showDesignation"></p>
                                Mobile Number :<p class="displayData" id="showMobileNo"></p>
                                Email Id :<p class="displayData" id="showEmail"></p>
                                Password :<p class="displayData" id="showPassword"></p> 
                                Address :<p class="displayData" id="showAddress"></p> 
                                District :<p class="displayData" id="showDistrict"></p> 
                                Aadhar Card No. :<p class="displayData" id="showAadhar"></p> 
                                Uploaded Id :<span class="displayData" id="showID"></span> <br>
                                Remarks :<p class="displayData" id="showRemarks"></p> 
                        </div>
                                <div class="mdl-dialog__actions">
                                <button type="button" class="mdl-button mdl-js-button mdl-button--fab mdl-button--mini-fab close"><i class="material-icons">clear </i></button>                    
                                <button type="button" class="mdl-button mdl-js-button mdl-button--fab mdl-button--mini-fab mdl-button--colored emp_click" id="emp_click"><i class="material-icons">done_outline</i></button>
                                </div>
                        </dialog>
                    


                </div>
                </main>
            </div>

            <script src="js/components.js"></script>





<script type="text/javascript">
    
document.getElementById("emp_click").onclick = function () {


        document.getElementById("store_data").click();

        
        
    };


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