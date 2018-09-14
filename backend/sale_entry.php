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


	$arr = explode('-', $field1);

	$fields11 = $arr[2].'-'.$arr[1].'-'.$arr[0];




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

			//if sales<=receipt

		for($i=0;$i<$x;$i++) {
		
		if($field5[$i] < $field6[$i])
		{
			$_SESSION['sale_flow_error']=1;
			header('Location:http://localhost/Fairway/saleEntry.php');
			exit();

		}

	}



$pdo = new PDO('mysql:host=localhost;dbname=fairway','root',''); 

$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);




$test = '';


for($i=0;$i<$x;$i++)
	{


		//check offer exist or not 


		$actual_price = $field4[$i];


		$sqlz = "SELECT offer.quantity,offer.free FROM sale_entry,offer WHERE sale_entry.medicine_id=:id AND offer.product=:id AND YEAR(DATE_FORMAT(offer.validity, '%Y-%m-%d'))>=YEAR(DATE_FORMAT(NOW(), '%Y-%m-%d'))  
			AND MONTH(DATE_FORMAT(offer.validity, '%Y-%m-%d'))>=MONTH(DATE_FORMAT(NOW(), '%Y-%m-%d')) 
			AND DAY(DATE_FORMAT(offer.validity, '%Y-%m-%d'))>=DAY(DATE_FORMAT(NOW(), '%Y-%m-%d'))";

		$sqlmz = $pdo->prepare($sqlz);

		$sqlmz->execute(array(':id'=>$field3[$i]));


			$test.=$field3[$i]." ";

			if($sqlmz->rowCount()>0)
				{
					$rowsz = $sqlmz->fetch();

					$actual_price = round(($field4[$i]*$rowsz['quantity'])/($rowsz['quantity']+$rowsz['free']),2);


				}	



		






$sql = "INSERT INTO sale_entry(user_id,date_of_issue,stockist_id,medicine_id,price,receipt,sales,remarks) 
	VALUES(:user_id,:date_of_issue,:stockist_id,:medicine_id,:price,:receipt,:sales,:remarks)";

$sqlm=$pdo->prepare($sql);

$sqlm->execute(array('user_id'=>$_SESSION['login_id'],'date_of_issue'=>$fields11,'stockist_id'=>$field2,'medicine_id'=>$field3[$i],'price'=>$actual_price ,'receipt'=>$field5[$i],'sales'=>$field6[$i],'remarks'=>$fields7));

	}



$_SESSION['sale_error']=0;
header('Location:http://localhost/Fairway/saleEntry.php');
exit();





// echo $test;

}



?>