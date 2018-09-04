<?php


$pdo = new PDO('mysql:host=localhost;dbname=fairway','root',''); 

$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$sql="SELECT employee.id,employee.email,employee.name,issue_medicine.medicine_name,issue_medicine.quantity FROM issue_medicine,employee WHERE employee.email=issue_medicine.email";

$sqlm=$pdo->prepare($sql);

$sqlm->execute();

$rows=$sqlm->fetchAll();


$output='<h5 style="text-align:center;">Stock Record</h5>

	   <input type="text" id="myInput2" onkeyup="mySearch2()" placeholder="Search for employees by name.." title="Type in a name/email">

		    <table id="myTable2">
		    <tr class="header">
		    <th>Name: Email</th>
		    <th>Medicine Name</th>
		    <th>Medicines issued(Piece)</th>
		    <th>Medicines sold (Piece)</th>
		    <th>Stock remaining</th>
		  </tr>';


foreach($rows as $key)
		{
		
			$sql1="SELECT SUM(sale_entry.quantity) as sum FROM sale_entry WHERE user_id=:user_id AND medicine_name=:medicine_name";

			$sqlm1=$pdo->prepare($sql1);

			$sqlm1->execute(array('user_id'=>$key['id'],'medicine_name'=>$key['medicine_name']));

			$result = $sqlm1->fetch();


			$output.='<tr><td>'.$key['name']." (".$key['email'].')</td>
						<td>'.$key['medicine_name'].'</td>
						<td>'.$key['quantity'].'</td>
						<td>'.$result['sum'].'</td>
						<td>'.(strval($key['quantity'])-strval($result['sum'])).'</td></tr>';



		}

echo $output;


?>