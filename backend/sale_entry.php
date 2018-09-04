<?php

session_start();

if(!isset($_SESSION['login_id']))
{

header('Location:http://localhost/Fairway/login.php');
exit();    

}


if(isset($_POST['sale_entry']))
{
	
	if(trim($_POST['fields1'])=='')
		{
			$_SESSION['sale_error']=1;
			header('Location:http://localhost/Fairway/saleEntry.php');
			exit();
		}	

	$field1=$_POST['fields1'];

	if(trim($_POST['fields2'])=='')
		{
			$_SESSION['sale_error']=1;
			header('Location:http://localhost/Fairway/saleEntry.php');
			exit();


		}		


	$field2=$_POST['fields2'];


	$field3=$_POST['fields3'];
	$field4=$_POST['fields4'];
	$field5=$_POST['fields5'];
	$field6=$_POST['fields6'];

	
	$fields7=$_POST['rem'];

	$x = count($field3);
	
	


	for($i=0;$i<$x;$i++) {
		
		if(trim($field3[$i])=='' || trim($field4[$i])=='' || trim($field5[$i])=='' || trim($field6[$i])=='')
		{
			$_SESSION['sale_error']=1;
			header('Location:http://localhost/Fairway/saleEntry.php');
			exit();

		}

	}


$pdo = new PDO('mysql:host=localhost;dbname=fairway','root',''); 

$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

for($i=0;$i<$x;$i++)
	{

$sql = "INSERT INTO sale_entry(user_id,date_of_issue,stockist_id,medicine_id,price,receipt,sales,remarks) 
	VALUES(:user_id,:date_of_issue,:stockist_id,:medicine_id,:price,:receipt,:sales,:remarks)";

$sqlm=$pdo->prepare($sql);

$sqlm->execute(array('user_id'=>$_SESSION['login_id'],'date_of_issue'=>$field1,'stockist_id'=>$field2,'medicine_id'=>$field3[$i],'price'=>$field4[$i],'receipt'=>$field5[$i],'sales'=>$field6[$i],'remarks'=>$fields7));

	}



$_SESSION['sale_error']=0;
header('Location:http://localhost/Fairway/saleEntry.php');
exit();



}



?>