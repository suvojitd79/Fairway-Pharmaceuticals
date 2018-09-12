<?php


$pdo = new PDO('mysql:host=localhost;dbname=fairway','root',''); 

$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$sql="SELECT travel_info.date_of_travel,travel_info.from_,travel_info.to_,travel_info.distance,travel_info.fare_km,travel_info.travel_status,travel_info.da,travel_info.remarks FROM  travel_info  INNER JOIN employee ON employee.id=travel_info.user_id ";

$sqlm=$pdo->prepare($sql);

$sqlm->execute();

$rows=$sqlm->fetchAll();


$output='';


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

echo $output;

?>