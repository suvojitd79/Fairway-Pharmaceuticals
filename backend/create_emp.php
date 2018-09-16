<?php

session_start();

if(isset($_POST['store_data'])){



if(trim($_POST["x1"])=='' || trim($_POST["x4"])=='' || trim($_POST["x5"])=='')
{

$_SESSION['unable']=1;
header('Location:http://localhost/Fairway/createEmployee.php');
exit();
}


$name = ucwords($_POST["x1"]);
$designation= $_POST["x2"];
$mb_number = $_POST["x3"];
$email = filter_var($_POST["x4"],FILTER_SANITIZE_EMAIL);
$password = $_POST["x5"];
$address = $_POST["x6"];
$district = $_POST["x7"];
$aadhar = $_POST["x8"];

if(!file_exists($_FILES['x9']['tmp_name']) || !is_uploaded_file($_FILES['x9']['tmp_name']))
{
$idImage = $_FILES["x9"]['tmp_name'];
}
else{
$idImage='';

}



$remarks = $_POST["x10"];


if(file_exists($_FILES['x9']['tmp_name']) && is_uploaded_file($_FILES['x9']['tmp_name']))
{

$extension=strtolower(pathinfo($_FILES["x9"]["name"],PATHINFO_EXTENSION));

$target="upload_image/".uniqid().'.'.$extension;

copy($_FILES["x9"]["tmp_name"], $target);


$idImage=$target;

}


$pdo = new PDO('mysql:host=localhost;dbname=fairway','root',''); 

$sql = "SELECT email FROM employee where email=:email";
$stl=$pdo->prepare($sql);
$stl->execute(array('email'=>$email));
$row=$stl->fetch(PDO::FETCH_ASSOC);

if($row)
{
$_SESSION['duplicate']=1;
header('Location:http://localhost/Fairway/createEmployee.php');
exit();
}




$sql='INSERT INTO employee(name,designation,mb_number,email,password,address,district,aadhar,id_file,remarks) VALUES(:name,:designation,:mb_number,:email,:password,:address,:district,:aadhar,:id_file,:remarks)';

$stml = $pdo->prepare($sql);

$stml->execute(array('name'=>$name,'designation'=>$designation,'mb_number'=>$mb_number,'email'=>$email,'password'=>$password,'address'=>$address,'district'=>$address,'district'=>$district,'aadhar'=>$aadhar,'id_file'=>$idImage,'remarks'=>$remarks));

$_SESSION['unable']=0;
header('Location:http://localhost/Fairway/createEmployee.php');

exit();

}

?>