<?php
session_start();

if(isset($_SESSION['designation']))
{

if($_SESSION['designation']=='admin')
{

header('Location:http://localhost/Fairway/admin.php');
exit();

}

if($_SESSION['designation']=='Regional Manager')
{
header('Location:http://localhost/Fairway/rm.php');
exit();

}

if($_SESSION['designation']=='Medical Representative')
{
header('Location:http://localhost/Fairway/user.php');
exit();

}

if($_SESSION['designation']=='Offer Visitor')
{
header('Location:http://localhost/Fairway/offervisitor.php');
exit();

}



}



if(!isset($_SESSION['toggle']))
{

$_SESSION['error']='';

}
else{

unset($_SESSION['toggle']);

}



if(isset($_POST['login_submit']))
{

$email=strip_tags($_POST['email']);
$password=filter_var(strip_tags($_POST['password']),FILTER_SANITIZE_EMAIL);

$pdo = new PDO('mysql:host=localhost;dbname=fairway','root',''); 

$sql = "SELECT id,designation,status FROM employee where email=:email and password=:password and status=:status";
$stl=$pdo->prepare($sql);
$stl->execute(array('email'=>$email,'password'=>$password,'status'=>'Active'));
$row=$stl->fetch(PDO::FETCH_ASSOC);

if(!$row)
{
$_SESSION['toggle']=1;  
$_SESSION['error']='Please check your email or password!';
header('Location:http://localhost/Fairway/login.php');
exit();
}
else{

if($row['designation']=='admin')
{

$_SESSION['login_id']=$row['id'];
$_SESSION['designation']='admin';
header('Location:http://localhost/Fairway/admin.php');
exit();

}

if($row['designation']=='Regional Manager')
{
$_SESSION['login_id']=$row['id'];
$_SESSION['designation']='Regional Manager';
header('Location:http://localhost/Fairway/rm.php');
exit();

}

if($row['designation']=='Medical Representative')
{
$_SESSION['login_id']=$row['id'];
$_SESSION['designation']='Medical Representative';
header('Location:http://localhost/Fairway/user.php');
exit();

}

if($row['designation']=='Offer Visitor')
{
$_SESSION['login_id']=$row['id'];
$_SESSION['designation']='Offer Visitor';
header('Location:http://localhost/Fairway/offervisitor.php');
exit();

}




}


}



?> 




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login : Fairway Pharmaceuticals | The Right choice </title>
    
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.indigo-pink.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/material-design-iconic-font/2.2.0/css/material-design-iconic-font.min.css">
    <script defer src="https://code.getmdl.io/1.3.0/material.min.js"></script>
    <link rel="stylesheet" href="css/style.css">

</head>
<body style="background: linear-gradient(to right, #00d2ff, #928dab);">
  <!-- Header Starts here -->
  <div class="mdl-layout mdl-js-layout mdl-layout--fixed-header">
    <header class="mdl-layout__header">
      <div class="mdl-layout__header-row">
        <!-- Title -->
        <span class="mdl-layout-title">Fairway</span>
        <!-- Add spacer, to align navigation to the right -->
        <div class="mdl-layout-spacer"></div>
        <!-- Navigation. We hide it in small screens. -->
        <nav class="mdl-navigation mdl-layout--large-screen-only">
          <a class="mdl-navigation__link" href="index.html"><i class="zmdi zmdi-home zmdi-hc-lg"></i> Home</a>
          <a class="mdl-navigation__link" href="about.html"><i class="zmdi zmdi-globe zmdi-hc-lg"></i> About Us</a>
          <a class="mdl-navigation__link" href="products.html"><i class="zmdi zmdi-flower-alt zmdi-hc-lg"></i> Products</a>
          <a class="mdl-navigation__link" href="Contacts.html"><i class="zmdi zmdi-phone zmdi-hc-lg"></i> Contacts</a>
          <a class="mdl-navigation__link" href="login.php"><i class="zmdi zmdi-account zmdi-hc-lg"></i> Login</a>
        </nav>
      </div>
    </header>
    <div class="mdl-layout__drawer">
      <span class="mdl-layout-title">Fairway</span>
      <nav class="mdl-navigation">
        <a class="mdl-navigation__link" href="index.html"><i class="zmdi zmdi-home zmdi-hc-lg"></i> Home</a>
        <a class="mdl-navigation__link" href="about.html"><i class="zmdi zmdi-globe zmdi-hc-lg"></i> About Us</a>
        <a class="mdl-navigation__link" href="products.html"><i class="zmdi zmdi-flower-alt zmdi-hc-lg"></i> Products</a>
        <a class="mdl-navigation__link" href="contact.html"><i class="zmdi zmdi-phone zmdi-hc-lg"></i> Contacts</a> <hr/>
        <a class="mdl-navigation__link" href="login.php"><i class="zmdi zmdi-account zmdi-hc-lg"></i> My Account</a>       
      </nav>
    </div>
    <main class="mdl-layout__content">
      <div class="page-content"><!-- Your content goes here -->
     
        <div class="container">
        <div class="mdl-tabs mdl-js-tabs mdl-js-ripple-effect">
                <div class="mdl-tabs__tab-bar">
                    <a href="#login-panel" class="mdl-tabs__tab is-active"><i class="zmdi zmdi-account zmdi-hc-lg"></i>&nbsp;Login</a>
                    <a href="#newAccount-panel" class="mdl-tabs__tab"><i class="zmdi zmdi-account-add zmdi-hc-lg"></i>&nbsp; Create New Account</a>
                </div>
              
                <div class="mdl-tabs__panel is-active" id="login-panel">
                    <form action="<?=$_SERVER['PHP_SELF']?>" class="form-class" method="POST">
                        <p style="text-align: left;margin:20px 0px 10px 10px;"><?=$_SESSION['error']?></p>
                        <ul class="demo-list-icon mdl-list">
                                <li class="mdl-list__item">
                                  <span class="mdl-list__item-primary-content">
                                  <i class="material-icons mdl-list__item-icon">person</i>

                                    <input class="mdl-textfield__input" type="text" name="email" id="userName" placeholder="Email id" required autofocus>
                                    
                              </span>
                                </li>
                                <li class="mdl-list__item">
                                  <span class="mdl-list__item-primary-content">
                                  <i class="mdl-list__item-icon zmdi zmdi-edit zmdi-hc-lg"></i>

                                    <input class="mdl-textfield__input" type="password"  name="password" id="userPass" placeholder="Password" require>
                                   
                                </span>
                                </li>
                                <li class="mdl-list__item">   
                                  <!-- I am using this a tag, just to go to admin page fastly. Delete it once Login System will be activate and Use input below -->
                                  <input type="submit" name="login_submit" class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored mdl-js-ripple-effect" value="Login">
                                  <span class="mdl-list__item-primary-content">
                                  <!-- <input type="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored mdl-js-ripple-effect" value="Login">  -->
                                </span>
                                </li>
                                <li class="mdl-list__item">
                                        <span class="mdl-list__item-primary-content">
                                          <button class="mdl-button mdl-js-button" style="display: none;"> Forgot Password ? </button>
                                      </span>
                                      </li>
                              </ul>
                    
                         </form>
                </div>



    <div class="mdl-tabs__panel" id="newAccount-panel">
        <form action="" class="form-class">
                    
            <ul class="demo-list-icon mdl-list">
                <li class="mdl-list__item">
                    <span class="mdl-list__item-primary-content">
                        <i class="material-icons mdl-list__item-icon">person</i>
        
                        <input class="mdl-textfield__input" type="text" id="fullName" placeholder="Full Name"/>
                                            
                    </span>
                </li>
                <li class="mdl-list__item">
                    <span class="mdl-list__item-primary-content">
                        <i class="mdl-list__item-icon zmdi zmdi-phone zmdi-hc-lg"></i>
        
                        <input class="mdl-textfield__input" type="number" id="mobileNo" minlength="10" maxlength="10" placeholder="Mobile No. (10 Digit)">
                                           
                    </span>
                </li>
                <li class="mdl-list__item">
                        <span class="mdl-list__item-primary-content">
                            <i class="mdl-list__item-icon zmdi zmdi-email zmdi-hc-lg"></i>
            
                            <input class="mdl-textfield__input" type="email" id="email" placeholder="Email ID">
                                               
                        </span>
                </li>
                <li class="mdl-list__item">
                        <span class="mdl-list__item-primary-content">
                            <i class="mdl-list__item-icon zmdi zmdi-slideshare zmdi-hc-lg"></i>
            
                            <select class="mdl-textfield__input">
                                    <option disabled selected label="Looking For"></option>
                                    <option value="Medical Representative">Medical Representative (MR)</option>
                                    <option value="Data Operator">Data Operator</option>
                                    <option value="Retailership">Retailership</option>
                                    <option value="Distributorship">Distributorship</option>
                                    <option value="other">Other</option>

                             </select>
                                               
                        </span>
                </li>

                <li class="mdl-list__item">
                    <span class="mdl-list__item-primary-content">
                        <input type="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored mdl-js-ripple-effect" value="Create Account"> 
                     </span>
                 </li>
               
            </ul>
                            
        </form>
    </div>
            
              </div>
            </div>





            <br><br><br><br><br><br>

    
      
      
    
        <script type="text/javascript">
        
        
        
        
        </script>
        

      </div>
    </main>
  </div>
</body>
</html>