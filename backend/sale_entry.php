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




				//update the closing quantity

				function update_closing_quantity($date,$Stockist_id,$Stockist_name,$pdo)
					{



				$time = explode('-', $date);

				$year = $time[0];

				$month = $time[1];

				if($month==1)
				{

				$month=13;
				$year=$year-1;
				}




				
				$stock_id = $Stockist_id;





				$sql="SELECT  m.name,m.packing,sale.id,sale.price,sale.receipt,sale.sales,sale.closing_quan,sale.medicine_id
						FROM  sale_entry sale LEFT OUTER JOIN stockist_details stock ON stock.id = sale.stockist_id 
						LEFT OUTER JOIN medicine_details m ON m.id = sale.medicine_id
				 		WHERE stock.name=:name  AND YEAR(DATE_FORMAT(sale.date_of_issue, '%Y-%m-%d'))=:year 
						AND MONTH(DATE_FORMAT(sale.date_of_issue, '%Y-%m-%d'))=:month ORDER BY m.name ASC";



				$sqlm=$pdo->prepare($sql);

				$sqlm->execute(array(':name'=>$Stockist_name,':year'=>$year,'month'=>$month));

				$rows=$sqlm->fetchAll();

				$data = array();

				$output = '';

				if($sqlm->rowCount()>0)
				{
					$k=0;
					$test = '';

				foreach($rows as $key)
						{

						$med_id = $key['medicine_id'];
								

			if(isset($data[$key['name']]))	
			{	

			//$test.="1st";
			//update 

			$closing_quantity = $data[$key['name']][1];
			$data[$key['name']][1]=$closing_quantity;
			$opening_balance = $closing_quantity * $key['price'];
			$data[$key['name']][2]=$opening_balance;
			$receipt_quantity = $data[$key['name']][3] + $key['receipt'];
			$data[$key['name']][3]=$receipt_quantity;
			$receipt_balance = $data[$key['name']][4] + $key['receipt']*$key['price'];
			$data[$key['name']][4]=$receipt_balance;
			$total_quantity = $closing_quantity + $receipt_quantity;
			$data[$key['name']][5]=$total_quantity;
			$data[$key['name']][6]=$data[$key['name']][6]+$key['sales'];
			$issue_value = $key['sales'] * $key['price'];
			$data[$key['name']][7]=$data[$key['name']][7] + $issue_value;
			$data[$key['name']][8]= $data[$key['name']][8] + $key['receipt']-$key['sales'];
			$data[$key['name']][9]=$data[$key['name']][8]*$key['price'];


			//update the closing quantity			

			$sql1="UPDATE sale_entry SET closing_quan=:closing_quann WHERE id=:idd";

			$sqlm1=$pdo->prepare($sql1);

			$sqlm1->execute(array(':closing_quann'=>$data[$key['name']][8],':idd'=>$key['id']));
				

		}
		else{

		
			$closing_q = 0;
		
			

			//check for the previous month data



			$sqlll="SELECT MAX(closing_quan) as max_clo FROM sale_entry 
			WHERE (YEAR(DATE_FORMAT(date_of_issue, '%Y-%m-%d'))=:year 
  			AND MONTH(DATE_FORMAT(date_of_issue, '%Y-%m-%d'))=:month 
  			AND medicine_id=:medicine_id AND stockist_id=:s_id ) ";

			
			$sqlmmm=$pdo->prepare($sqlll);

			$sqlmmm->execute(array(':year'=>$year,'month'=>$month-1,':medicine_id'=>$med_id,':s_id'=>$stock_id));

			$rowsss=$sqlmmm->fetch();

			//$count_rows = count($rowsss);

			$okl='';

			if(isset($rowsss['max_clo']))
			{
				
				$closing_q = $rowsss['max_clo'];
				//$_SESSION['closing_q'] = 25;

			}

			//$_SESSION['closing_q'] = $rowsss['max_clo'];



			$data[$key['name']][0]=$key['packing'];
			//$closing_quantity = $closing_q +$key['receipt']-$key['sales'];
			$closing_quantity=$closing_q;	
			$data[$key['name']][1]=$closing_quantity;
			$opening_balance = $closing_quantity * $key['price'];
			$data[$key['name']][2]=$opening_balance;
			$receipt_quantity = $key['receipt'];
			$data[$key['name']][3]=$receipt_quantity;
			$receipt_balance = $key['receipt']*$key['price'];
			$data[$key['name']][4]=$receipt_balance;
			$total_quantity = $closing_quantity + $receipt_quantity;
			$data[$key['name']][5]=$total_quantity;
			$data[$key['name']][6]=$key['sales'];
			$issue_value = $key['sales'] * $key['price'];
			$data[$key['name']][7]=$issue_value;
			$data[$key['name']][8]= $closing_q +$key['receipt']-$key['sales'];
			$data[$key['name']][9]=$data[$key['name']][8]*$key['price'];



	 		//update the closing quantity			

			$sql1="UPDATE sale_entry SET closing_quan=:closing_quann WHERE id=:idd";

			$sqlm1=$pdo->prepare($sql1);

			$sqlm1->execute(array(':closing_quann'=>$data[$key['name']][8],':idd'=>$key['id']));
				


			}



		}	











					}		



			}


			//get the stockist name 


				$sql2="SELECT name FROM stockist_details WHERE id=:Id ";

				$sqlm2=$pdo->prepare($sql2);

				$sqlm2->execute(array(':Id'=>$field2));

				$rows2=$sqlm2->fetch();




$sql = "INSERT INTO sale_entry(user_id,date_of_issue,stockist_id,medicine_id,price,receipt,sales,remarks,closing_quan) 
	VALUES(:user_id,:date_of_issue,:stockist_id,:medicine_id,:price,:receipt,:sales,:remarks,:closing_quan)";

$sqlm=$pdo->prepare($sql);

$sqlm->execute(array('user_id'=>$_SESSION['login_id'],'date_of_issue'=>$fields11,'stockist_id'=>$field2,'medicine_id'=>$field3[$i],'price'=>$actual_price ,'receipt'=>$field5[$i],'sales'=>$field6[$i],'remarks'=>$fields7,'closing_quan'=>$closing_q));


update_closing_quantity($fields11,$field2,$rows2['name'],$pdo);



	}



$_SESSION['sale_error']=0;
header('Location:http://localhost/Fairway/saleEntry.php');
exit();





// echo $test;

}



?>