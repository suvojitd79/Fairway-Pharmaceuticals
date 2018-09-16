<?php

session_start();


if(isset($_SESSION['login_id']))
{


$pdo = new PDO('mysql:host=localhost;dbname=fairway','root',''); 

$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$sql = "SELECT sale_entry.stockist_id,sale_entry.date_of_issue,sale_entry.price,sale_entry.receipt,sale_entry.sales,medicine_details.name as med_name,sale_entry.remarks
		FROM sale_entry LEFT JOIN medicine_details ON medicine_details.id = sale_entry.medicine_id WHERE user_id=:user_id ORDER BY sale_entry.date_of_issue DESC";


$output = '';

$sqlm=$pdo->prepare($sql);

$sqlm->execute(array(':user_id'=>$_SESSION['login_id']));

$rows = $sqlm->fetchAll();

$output='

		    <table id="myTable2">
		    <tr class="header">
		    <th>Date of issue</th>
		    <th>stockist Name</th>
		    <th>Medicine Name</th>
		    <th>Selling Price </th>
		    <th>Receipt </th>
		    <th>Sale </th>
		    <th>Remarks</th>
		  </tr>';


		foreach($rows as $key)
			{




			$sql1 = "SELECT name from stockist_details WHERE id=:id";




			$sqlm1=$pdo->prepare($sql1);

			$sqlm1->execute(array(':id'=>$key['stockist_id']));

			$rows1 = $sqlm1->fetch();


				$output.='<tr>
						<td>'.$key['date_of_issue'].'</td>
						<td>'.$rows1['name'].'</td>
						<td>'.$key['med_name'].'</td>
						<td>'.$key['price'].'</td>
						<td>'.$key['receipt'].'</td>
						<td>'.$key['sales'].'</td>
						<td>'.$key['remarks'].'</td>
						</tr>';


			}
	


echo $output."</table>";




}



?>