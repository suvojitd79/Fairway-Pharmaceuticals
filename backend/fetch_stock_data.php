<?php

// $_POST['searchMr1'] ==stockist name

session_start();


if(isset($_POST['searchMr1']) && isset($_POST['searchtime1']))
{

$time = explode('-', $_POST['searchtime1']);

$year = $time[0];

$month = $time[1];

if($month==1)
{

$month=13;
$year=$year-1;
}




$pdo = new PDO('mysql:host=localhost;dbname=fairway','root',''); 

$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);





$sq = "SELECT id FROM stockist_details WHERE name=:name";
$sl = $pdo->prepare($sq);
$sl->execute(array(':name'=>$_POST['searchMr1']));
$r = $sl->fetch();
$stock_id = $r['id'];





$sql="SELECT  m.name,m.packing,sale.id,sale.price,sale.receipt,sale.sales,sale.closing_quan,sale.medicine_id
		FROM  sale_entry sale LEFT OUTER JOIN stockist_details stock ON stock.id = sale.stockist_id 
		LEFT OUTER JOIN medicine_details m ON m.id = sale.medicine_id
 		WHERE stock.name=:name  AND YEAR(DATE_FORMAT(sale.date_of_issue, '%Y-%m-%d'))=:year 
		AND MONTH(DATE_FORMAT(sale.date_of_issue, '%Y-%m-%d'))=:month ORDER BY m.name ASC";



$sqlm=$pdo->prepare($sql);

$sqlm->execute(array(':name'=>$_POST['searchMr1'],':year'=>$year,'month'=>$month));

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

		// $sale_id=$key['id'];	
		// $closing_quantity = $key['closing_quan']+$key['receipt']-$key['sales'];	
		// $opening_balance = $closing_quantity * $key['price'];
		// $receipt_quantity = $key['receipt']; 
		// $receipt_balance = $key['receipt']*$key['price'];
		// $total_quantity = $opening_balance + $receipt_quantity;
		// $issue_value = $total_quantity * $key['price'];



$key = array_keys($data);

$count_keys = count($key);

$x1=0;
$x2=0;
$x3=0;
$x4=0;
$x5=0;
$x6=0;
$x7=0;
$x8=0;
$x9=0;

for($i=0;$i<$count_keys;$i++)
{
	$data[$key[$i]][2] = round($data[$key[$i]][2],2);
	$data[$key[$i]][4] = round($data[$key[$i]][4],2);
	$data[$key[$i]][7] = round($data[$key[$i]][7],2);
	$data[$key[$i]][9] = round($data[$key[$i]][9],2);

		$x1+=$data[$key[$i]][1];
		$x2+=$data[$key[$i]][2];
		$x3+=$data[$key[$i]][3];
		$x4+=$data[$key[$i]][4];
		$x5+=$data[$key[$i]][5];
		$x6+=$data[$key[$i]][6];
		$x7+=$data[$key[$i]][7];
		$x8+=$data[$key[$i]][8];
		$x9+=$data[$key[$i]][9];





	  $output.='<tr>
				<td>'.$key[$i].'</td>
				<td>'.$data[$key[$i]][0].'</td>
				<td>'.$data[$key[$i]][1].'</td>
				<td>'.$data[$key[$i]][2].'</td>
				<td>'.$data[$key[$i]][3].'</td>
				<td>'.$data[$key[$i]][4].'</td>
				<td>'.$data[$key[$i]][5].'</td>
				<td>'.$data[$key[$i]][6].'</td>
				<td>'.$data[$key[$i]][7].'</td>
				<td>'.$data[$key[$i]][8].'</td>
				<td>'.$data[$key[$i]][9].'</td>
				</tr>';


}


		$output.='<tr>
			
				<td><b>TOTAL</b></td>
				<td>     </td>
				<td><b>'.$x1.'</b></td>
				<td><b>'.$x2.'</b></td>
				<td><b>'.$x3.'</b></td>
				<td><b>'.$x4.'</b></td>
				<td><b>'.$x5.'</b></td>
				<td><b>'.$x6.'</b></td>
				<td><b>'.$x7.'</b></td>
				<td><b>'.$x8.'</b></td>
				<td><b>'.$x9.'</b></td>
				
				</tr>';

			

}		

echo $output;

}


?>