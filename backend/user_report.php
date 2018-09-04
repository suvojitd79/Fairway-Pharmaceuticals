<?php

session_start();

$pdo = new PDO('mysql:host=localhost;dbname=fairway','root',''); 

$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$sql = "SELECT date_of_issue,medicine_name,quantity FROM sale_entry WHERE user_id=:user_id";

$sqlm=$pdo->prepare($sql);

$sqlm->execute(array('user_id'=>$_SESSION['login_id']));

$rows = $sqlm->fetchAll();

$output='

	   <input type="text" id="myInput2" onkeyup="mySearch2()" placeholder="Search for entry by date.." title="Type a date...">

		    <table id="myTable2">
		    <tr class="header">
		    <th>Date of issue</th>
		    <th>Medicine Name</th>
		    <th>Quantity(Sold)</th>
		  </tr>';


		foreach($rows as $key)
			{

				$output.='<tr><td>'.$key['date_of_issue'].'</td>
						<td>'.$key['medicine_name'].'</td>
						<td>'.$key['quantity'].'</td>
						</tr>';

			}
	

echo $output."</table>";


?>