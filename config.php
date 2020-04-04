<?php
$host_name='localhost';
$name='root';
$pass='';
$db_name='tiffin_box';

$con=mysqli_connect($host_name,$name,$pass) or di('database error');
mysqli_select_db($con,$db_name);

?>