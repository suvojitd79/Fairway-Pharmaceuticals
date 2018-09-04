<?php


session_start();

if(!isset($_SESSION['login_id']))
{
	header('Location:http://localhost/Fairway/login.php');
	exit();

}




if(isset($_POST['travel_submit']))
{

if(trim($_POST['x1'])=='' || trim($_POST['x2'])=='' ||trim($_POST['x3'])==''||trim($_POST['x5'])==''||trim($_POST['x6'])==''||trim($_POST['x7'])=='')	
	   {

	   	$_SESSION['succ_travel']=1;
	   	header('Location:http://localhost/Fairway/travel.php');
	   	exit();

		}
else{


$pdo = new PDO('mysql:host=localhost;dbname=fairway','root',''); 
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


$sql="INSERT INTO travel_info(date_of_travel,from_,to_,travel_status,distance,fare_km,da,remarks,user_id) VALUES(:date_of_travel,:from_,:to_,:travel_status,:distance,:fare_km,:da,:remarks,:user_id)";

$sqlm=$pdo->prepare($sql);

$sqlm->execute(array('date_of_travel'=>filter_var($_POST['x1'],FILTER_SANITIZE_STRING),'from_'=>$_POST['x2'],'to_'=>$_POST['x3'],'travel_status'=>$_POST['x4'] ,'distance'=>$_POST['x5'],'fare_km'=>$_POST['x6'],'da'=>$_POST['x7'],'remarks'=>$_POST['x8'],'user_id'=>$_SESSION['login_id']));

$_SESSION['succ_travel']=0;


header('Location:http://localhost/Fairway/travel.php');
exit();

}




}





?>