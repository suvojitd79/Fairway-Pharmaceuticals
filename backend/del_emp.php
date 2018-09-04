<?php

session_start();

if(isset($_POST['pass_submit'])){

$email=filter_var(strip_tags($_POST['email']),FILTER_SANITIZE_EMAIL);

$pdo = new PDO('mysql:host=localhost;dbname=fairway','root',''); 

$sql="SELECT id from employee WHERE email=:email"; 

$sqlm=$pdo->prepare($sql);

$sqlm->execute(array('email'=>$email));

$data=$sqlm->fetch();


if (empty($data))
{
	$_SESSION['del_emp'] = 0;
	header('Location:http://localhost/Fairway/admin.php');
	exit();
	
}



$sql1="UPDATE employee SET status=:status WHERE id=:id"; 

$sqlm1=$pdo->prepare($sql1);

$sqlm1->execute(array('status'=>'Deleted','id'=>$data['id']));

$_SESSION['del_emp'] = 1;

header('Location:http://localhost/Fairway/admin.php');
exit();

}

?>



<!DOCTYPE html>
<html>
<head>
	<title>Edit Data</title>
</head>
<style type="text/css">

input::-webkit-input-placeholder, button {
  font-family: 'roboto', sans-serif;
  transition: all 0.3s ease-in-out;
}

form {
  box-sizing: border-box;
  width: 260px;
  margin: 100px auto 0;
  box-shadow: 2px 2px 5px 1px rgba(0,0,0,0.2);
  padding-bottom: 40px;
  border-radius: 3px;
  h1 {
    box-sizing: border-box;
    padding: 20px;
  }
}

input {
  margin: 40px 25px;
  width: 200px;
  display: block;
  border: none;
  padding: 10px 0;
  border-bottom: solid 1px $color;
  transition: all 0.3s cubic-bezier(.64,.09,.08,1);
  background: linear-gradient(to bottom, rgba(255,255,255,0) 96%, $color 4%);
  background-position: -200px 0;
  background-size: 200px 100%;
  background-repeat: no-repeat;
  color: darken($color, 20%);
  &:focus, &:valid {
    box-shadow: none;
    outline: none;
    background-position: 0 0;
    &::-webkit-input-placeholder {
      color: $color;
      font-size: 11px;
      transform: translateY(-20px);
      visibility: visible !important;
    }
  }
}


 #sub:hover { 
    transform: translateY(-3px);
    box-shadow: 0 6px 6px 0 rgba(0,0,0,0.2);
    background-color:#17B67D;
  }


</style>
<body>



<form action="<?=$_SERVER['PHP_SELF']?>" method="POST">
  <h3 style="text-align: center;padding-top: 20px;">Verify the email</h3>		
  <input placeholder=" Type the confirm email..." type="email" name="email" required autofocus style="padding-left: 3px;">
  <input type="submit" name="pass_submit" style="border: none;
  background: $color;
  cursor: pointer;
  border-radius: 3px;
  padding: 6px;
  width: 200px;
  color: white;
  margin-left: 25px;
  box-shadow: 0 3px 6px 0 rgba(0,0,0,0.2);
 " id="sub">
</form>






</body>
</html>