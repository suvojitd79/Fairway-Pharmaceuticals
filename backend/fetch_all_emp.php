<?php

session_start();

$pdo = new PDO('mysql:host=localhost;dbname=fairway','root',''); 

$sql = "SELECT * FROM employee WHERE email!=:email";

$sqli=$pdo->prepare($sql);

$sqli->execute(array('email'=>'admin@gmail.com'));

$rows = $sqli->fetchAll();


$output='<h5 style="text-align:center;">My Employees</h5>

		<input type="text" id="myInput" onkeyup="mySearch()" placeholder="Search for employees by name.." title="Type in a name">

		<table id="myTable">
		  <tr class="header">
		    <th>Name</th>
		    <th>Designation</th>
		    <th>Email</th>
		    <th>Status</th>
		    <th>Edit</th>
		  </tr>';

foreach($rows as $key){

$k=$key['status'];
$edit='';

if($k=='Active')
{

$k='<span class="dot" style="height: 10px;width: 10px;background-color: #588F27;border-radius: 50%;display: inline-block;"></span>&emsp;'.$key['status'];
$edit='<a style="background-color:#f44336;border: none;color: white;padding: 15px 32px;text-align: center;text-decoration: none;display: inline-block;font-size: 16px;cursor: pointer;text-decoration:none;" id="del_emp1" href="backend/del_emp.php">Delete</a>';

}
else{

$k='<span class="dot" style="height: 10px;width: 10px;background-color: #D70B31;border-radius: 50%;display: inline-block;"></span>&emsp;'.$key['status'];
$edit='<a style="background-color: #4CAF50;border: none;color: white;padding: 15px 32px;text-align: center;text-decoration: none;text-decoration:none;display: inline-block;font-size: 16px;cursor: pointer;" id="cre_emp1" href="backend/active_emp.php">Active<a>';

}


$output.='<tr>
		    <td>'.$key['name'].'</td>
		    <td>'.$key['designation'].'</td>
		    <td>'.$key['email'].'</td>
		    <td>'.$k.'</td>
		    <td>'.$edit.'</td>
  			</tr>';





}


$output.='</table>';




echo $output;


?>