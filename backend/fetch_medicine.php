<?php  


session_start();


$pdo = new PDO('mysql:host=localhost;dbname=fairway','root',''); 

$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


$sql = "SELECT id,name,packing,selling_price FROM medicine_details";

$sqlm = $pdo->prepare($sql);

$sqlm->execute();

$rows = $sqlm->fetchAll();

// $output='<option disabled selected value=" " id="cli">Medicine name </option>';

$output = '';

foreach ($rows as $key) {
	
	$output.='<option value='.$key['id'].'  '.'id="cli">'.$key['name'].'  -  '.$key['packing']."&emsp;(Selling Price :  ".$key['selling_price'].')</option>';
}


echo $output;






?>                         