<?php

session_start();

unset($_SESSION['login_id']);
unset($_SESSION['designation']);

header('Location:http://localhost/Fairway/login.php');
exit();

?>