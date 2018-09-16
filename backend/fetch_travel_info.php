<?php

session_start();

if(isset($_SESSION['login_id']))
{

$pdo = new PDO('mysql:host=localhost;dbname=fairway','root',''); 

$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$sql="SELECT * FROM travel_info WHERE user_id=:id ORDER BY entry_time DESC";

$sqlm=$pdo->prepare($sql);

$sqlm->execute(array(':id'=>$_SESSION['login_id']));

$rows=$sqlm->fetchAll();


$output='';


$output='

		    <table id="myTable3">
		    <tr class="header">
		    <th>Date of Travel</th>
		    <th>From</th>
		    <th>Destination</th>
		    <th>Distance</th>
		    <th>Fare/Km</th>
		    <th>TA</th>
		    <th>Travel Status</th>
		    <th>DA</th>
		    <th>Total</th>
		    <th>Remarks</th>
		  </tr>';


foreach($rows as $key)
		{
		
		$ta = $key['distance']*$key['fare_km'];
		$total = $key['da']+($key['distance']*$key['fare_km']);

	$output.='<tr>
				<td>'.$key['date_of_travel'].'</td>
				<td>'.$key['from_'].'</td>
				<td>'.$key['to_'].'</td>
				<td>'.$key['distance'].'</td>
				<td>'.$key['fare_km'].'</td>
				<td>'.$ta.'</td>
				<td>'.$key['travel_status'].'</td>
				<td>'.$key['da'].'</td>
				<td>'.$total.'</td>
				<td>'.$key['remarks'].'</td>
				</tr>';



		}

echo $output."</table>";

}

?>