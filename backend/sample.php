<?php


$sam = array();

$sam['pro1'] = array();

$sam['pro1'][0]="samuel";

$sam['pro1'][1]="Vic";

print_r($sam);

?>


<?php


if(isset($_POST['searchMr1']) && isset($_POST['searchtime1']))
{

$time = explode('-', $_POST['searchtime1']);

$year = $time[0];

$month = $time[1];


$pdo = new PDO('mysql:host=localhost;dbname=fairway','root',''); 

$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);



$sql="SELECT  m.name,m.packing,sale.id,sale.price,sale.receipt,sale.sales,sale.closing_quan
		FROM  sale_entry sale LEFT OUTER JOIN employee e ON e.id = sale.user_id 
		LEFT OUTER JOIN medicine_details m ON m.id = sale.medicine_id
 		WHERE e.name=:name  AND YEAR(DATE_FORMAT(sale.date_of_issue, '%Y-%m-%d'))=:year 
		AND MONTH(DATE_FORMAT(sale.date_of_issue, '%Y-%m-%d'))=:month ORDER BY m.name ASC";



$sqlm=$pdo->prepare($sql);

$sqlm->execute(array(':name'=>$_POST['searchMr1'],':year'=>$year,'month'=>$month));

$rows=$sqlm->fetchAll();



if($sqlm->rowCount()>0)
{
foreach($rows as $key)
		{
			
		$sale_id=$key['id'];	
		$closing_quantity = $key['closing_quan']+$key['receipt']-$key['sales'];	
		$opening_balance = $closing_quantity * $key['price'];
		$receipt_quantity = $key['receipt']; 
		$receipt_balance = $key['receipt']*$key['price'];
		$total_quantity = $opening_balance + $receipt_quantity;
		$issue_value = $total_quantity * $key['price'];

	$output.='<tr>
				<td>'.$key['name'].'</td>
				<td>'.$key['packing'].'</td>
				<td>'.$closing_quantity.'</td>
				<td>'.$opening_balance.'</td>
				<td>'.$key['receipt'].'</td>
				<td>'.$receipt_balance.'</td>
				<td>'.$receipt_quantity.'</td>
				<td>'.$key['sales'].'</td>
				<td>'.$issue_value.'</td>
				<td>'.$closing_quantity.'</td>
				<td>'.$opening_balance.'</td>
				</tr>';



	 //update the closing quantity			

			$sql1="UPDATE sale_entry SET closing_quan=:closing_quann WHERE id=:idd";



			$sqlm1=$pdo->prepare($sql1);

			$sqlm1->execute(array(':closing_quann'=>$closing_quantity,':idd'=>$sale_id));
				



			}




				// $output.='<tr>
				// <td><b>'."TOTAL :".'</b></td>
				// <td><b>'." ".'</b></td>
				// <td><b>'." ".'</b></td>
				// <td><b>'.$totalD.'</b></td>
				// <td><b>'.$totalF.'</b></td>
				// <td><b>'.$totalTA.'</b></td>
				// <td><b>'." ".'</b></td>
				// <td><b>'.$totalDA.'</b></td>
				// <td><b>'.$totalT.'</b></td>
				// <td><b>'." ".'</b></td>
				// </tr>';


}		

echo $output;
}


?>