
<?php

session_start();
ob_start();
date_default_timezone_set("Asia/kolkata");


$pdo = new PDO('mysql:host=localhost;dbname=fairway','root','');

$sql="SELECT * FROM offer WHERE  YEAR(DATE_FORMAT(validity, '%Y-%m-%d'))>=YEAR(DATE_FORMAT(NOW(), '%Y-%m-%d'))  AND MONTH(DATE_FORMAT(validity, '%Y-%m-%d'))>=MONTH(DATE_FORMAT(NOW(), '%Y-%m-%d')) AND 
	DAY(DATE_FORMAT(validity, '%Y-%m-%d'))>=DAY(DATE_FORMAT(NOW(), '%Y-%m-%d')) ORDER BY id ASC ";


$stl=$pdo->prepare($sql);

$stl->execute();

$row=$stl->fetchAll();


$answer='';	



	foreach ($row as $key) {



			$sql1="SELECT name FROM medicine_details WHERE id=:id";


			$stl1=$pdo->prepare($sql1);

			$stl1->execute(array(':id'=>$key['product']));

			$row1=$stl1->fetch();




		



		$answer.='<div class="column1">
				    <div class="card1">
				      <img src="backend/'.$key['image'].'"  style="width:100%;">
				      <div class="container1">
				        <h6 >Offer: '.$key['title'].'</h6>
				        <h4 class="title1">Product :'.$row1['name'].'</h4>
				        <p>Quantity: '.$key['quantity'].'</p>
				        <p>Free: '.$key['free'].'</p>
				        <p>'.$key['description'].'</p>
				        <p style="background:#EB3D00;color:#F2F2F0;border-radius:3px;width:40px;padding:3px;">New!</p>
				        <p><button class="button1">valid till :'.$key['validity'].'</button></p>
				      </div>
				    </div>
				  </div>';			



	}



echo $answer;



?>
