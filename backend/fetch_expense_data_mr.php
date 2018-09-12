<?php


if(isset($_POST['searchMr']) && isset($_POST['searchtime']))
{

$time = explode('-', $_POST['searchtime']);

$year = $time[0];

$month = $time[1];


$pdo = new PDO('mysql:host=localhost;dbname=fairway','root',''); 

$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


$sql="SELECT travel_info.date_of_travel,travel_info.from_,travel_info.to_,travel_info.distance,travel_info.fare_km,travel_info.travel_status,travel_info.da,travel_info.remarks FROM  travel_info  INNER JOIN employee ON employee.id=travel_info.user_id 
		AND employee.name=:name  AND YEAR(DATE_FORMAT(travel_info.entry_time, '%Y-%m-%d'))=:year 
		AND MONTH(DATE_FORMAT(travel_info.entry_time, '%Y-%m-%d'))=:month ";

$sqlm=$pdo->prepare($sql);

$sqlm->execute(array(':name'=>$_POST['searchMr'],':year'=>$year,'month'=>$month));

$rows=$sqlm->fetchAll();


$output='';

$totalD=0;
$totalF=0;
$totalTA=0;
$totalDA=0;
$totalT=0;

if($sqlm->rowCount()>0)
{
foreach($rows as $key)
		{

		$ta = $key['distance']*$key['fare_km'];
		$total = $key['da']+($key['distance']*$key['fare_km']);
		$totalD+=$key['distance'];
		$totalF+=$key['fare_km'];
		$totalTA+=$ta;
		$totalDA+=$key['da'];
		$totalT+=$total;


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


				$output.='<tr>
				<td><b>'."TOTAL :".'</b></td>
				<td><b>'." ".'</b></td>
				<td><b>'." ".'</b></td>
				<td><b>'.$totalD.'</b></td>
				<td><b>'.$totalF.'</b></td>
				<td><b>'.$totalTA.'</b></td>
				<td><b>'." ".'</b></td>
				<td><b>'.$totalDA.'</b></td>
				<td><b>'.$totalT.'</b></td>
				<td><b>'." ".'</b></td>
				</tr>';


}		

echo $output;
}


?>