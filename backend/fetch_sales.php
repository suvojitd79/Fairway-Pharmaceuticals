<?php


// <canvas id="salesChart" width="600" height="400"></canvas>
$pdo = new PDO('mysql:host=localhost;dbname=fairway','root',''); 

$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$sql="SELECT employee.id,employee.name,employee.email,sale_entry.date_of_issue,sale_entry.medicine_name,sale_entry.quantity,issue_medicine.quantity,sale_entry.quantity as x1 FROM sale_entry INNER JOIN employee ON sale_entry.user_id=employee.id INNER JOIN issue_medicine ON (issue_medicine.medicine_name=sale_entry.medicine_name AND employee.email=issue_medicine.email)";

$sqlm=$pdo->prepare($sql);

$sqlm->execute();

$rows = $sqlm->fetchAll();

$output='<h5 style="text-align:center;">Sales Record</h5>

		<input type="text" id="myInput1" onkeyup="mySearch1()" placeholder="Search for employees by name.." title="Type in a name/email">

		<table id="myTable1">
		  <tr class="header">
		    <th>Name: Email</th>
		    <th>Medicine Name</th>
		    <th>Medicines issued(Piece)</th>
		    <th>Entry date</th>
		    <th>Medicines sold (Piece)</th>
		    <th>Discount(Offer)</th>
		    <th>Remaining</th>
		  </tr>';


	foreach($rows as $key){

		

					$output.='<tr>
							    <td>'.$key['name']."   (".$key['email'].')</td>
							    <td>'.$key['medicine_name'].'</td>
							    <td>'.$key['quantity'].'</td>
							    <td>'.$key['date_of_issue'].'</td>
							    <td>'.$key['x1'].'</td>
							    <td>Not eligible</td>
							    <td>'.(intval($key['quantity'])-intval($key['x1'])).'</td>
						
					  			</tr>';

						



					}


$output.='</table>';

echo $output;



?>