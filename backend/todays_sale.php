<?php
date_default_timezone_set("Asia/kolkata");

$sql = "SELECT id,designation FROM employee where email=:email and password=:password";

$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$sql = "SELECT * FROM sale_entry WHERE DATE(entry_date) = CURDATE()";


$sqlm=$pdo->prepare($sql);

$sqlm->execute();

$rows = $sqlm->fetchAll();


$output='<h5 style="text-align:center;">Stock Record</h5>

	   <input type="text" id="myInput2" onkeyup="mySearch2()" placeholder="Search for employees by name.." title="Type in a name/email">

		    <table id="myTable2">
		    <tr class="header">
		    <th>Name</th>
		    <th>Email</th>
		    <th>Medicine Name</th>
		    <th>Medicines sold (Piece)</th>
		  </tr>';





foreach ($rows as $key) {
		

			$sql1="SELECT * FROM employee WHERE id=:id";

			$sqlm1=$pdo->prepare($sql1);

			$sqlm1->execute(array('id'=>$key['user_id']));

			$rows1= $sqlm1->fetch();


			$output.='<tr><td>'.$rows1['name'].'</td>
						<td>'.$rows1['email'].'</td>
						<td>'.$key['medicine_name'].'</td>
						<td>'.$key['quantity'].'</td>
						</tr>';






}



echo $output;












?>