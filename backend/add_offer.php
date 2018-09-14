<?php

session_start();


if(isset($_POST['pro_offer']))
{


if(trim($_POST['x1'])=='' || trim($_POST['x2'])=='' ||trim($_FILES["x3"]["tmp_name"])=='' ||trim($_POST['x4'])=='' ||trim($_POST['x7'])=='')
{

$_SESSION['unable_offer']=1;
header('Location:http://localhost/Fairway/addOffer.php');
exit();

}


$title=$_POST['x1'];
$name=$_POST['x2'];
$image=$_FILES["x3"]["tmp_name"];
$quantity=$_POST['x4'];
$free = $_POST['x5'];
$description=$_POST['x6'];
$validity=$_POST['x7'];
$extension = strtolower(pathinfo($_FILES["x3"]["name"], PATHINFO_EXTENSION));

$target_dir = "upload_image/";

$target=$target_dir.uniqid().'.'.$extension;

copy($_FILES["x3"]["tmp_name"], $target);

$image=$target;

$pdo = new PDO('mysql:host=localhost;dbname=fairway','root',''); 
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// $sql1 = "SELECT name FROM medicine_details WHERE id=:id";
// $stml1 = $pdo->prepare($sql1);
// $stml1->execute(array('id'=>$name));
// $data1 = $stml1->fetch();
// $name = $data1['name'];



$sql = "INSERT INTO offer(title,product,image,quantity,free,description,validity) VALUES(:title,:product,:image,:quantity,:free,:description,:validity)";


$stm=$pdo->prepare($sql);

$stm->execute(array('title'=>$title,'product'=>$name,'image'=>$image,'quantity'=>$quantity,'free'=>$free,'description'=>$description,'validity'=>$validity));

$_SESSION['unable_offer']=0;

header('Location:http://localhost/Fairway/addOffer.php');
exit();

}




?>