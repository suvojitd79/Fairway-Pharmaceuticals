<?php


session_start();

if (isset($_POST['issue_data'])) {
	
$x1=$_POST['x1'];
$x2=$_POST['x2'];
$x3=$_POST['x3'];
$x4=$_POST['x4'];
$x5=$_POST['x5'];


if(trim($x1)=='' || trim($x2)=='' || trim($x3)=='' || trim($x4)=='')
	{
		$_SESSION['issue_medicine_error']=1;
		header('Location:http://localhost/Fairway/issueMedicine.php');
		exit();

	}

$pdo = new PDO('mysql:host=localhost;dbname=fairway','root',''); 
$pdo->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
$sql="INSERT INTO issue_medicine(issue_date,medicine_name,email,quantity,remarks) VALUES(:issue_date,:medicine_name,:email,:quantity,:remarks)";

$slm=$pdo->prepare($sql);

$slm->execute(array('issue_date'=>$x1,'medicine_name'=>$x2,'email'=>$x3,'quantity'=>$x4,'remarks'=>$x5));


$_SESSION['issue_medicine_error']=0;
header('Location:http://localhost/Fairway/issueMedicine.php');
exit();



}







?>