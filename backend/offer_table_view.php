
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
	





				$image_details = "backend/".$key['image'];




				$sqll="SELECT name,packing FROM medicine_details WHERE  id=:id";


				$stll=$pdo->prepare($sqll);

				$stll->execute(array(':id'=>$key['product']));

				$roww=$stll->fetch();  




        $answer.='<tr>
        		  <td>'.$roww['name'].'</td>	
        		  <td>'.$roww['packing'].'</td>
        		  <td>'.$key['title'].'</td>
        		  <td>'.$key['quantity'].'</td>
        		  <td>'.$key['free'].'</td>
        		  <td>'.$key['description'].'</td>
        		  <td>'.$key['validity'].'</td>
      			<td><a download="Offer Image" href="'.$image_details.'" title="Offer Image">
				    <img alt="ImageName" src="'.$image_details.' "  style="width:30px;height:30px;">
				</a></td>
        		 </tr>';				  









	}



echo $answer;



?>
