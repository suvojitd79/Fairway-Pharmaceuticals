<?php

$pdo = new PDO('mysql:host=localhost;dbname=fairway','root',''); 

$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$sql="SELECT name FROM stockist_details";

$sqlm=$pdo->prepare($sql);

$sqlm->execute();

$rows=$sqlm->fetchAll();


$output='';

foreach($rows as $key)
		{

			$output.=$key['name'].",";

		}

echo $output;


?>