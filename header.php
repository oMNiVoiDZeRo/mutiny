<?php
$server = 'localhost';
$user = 'root';
$pass = '';
$database = 'records';
$conn = mysqli_connect($server, $user, $pass, $database);
if($conn == true){echo '<center><em>Database Successfully Connected.</em></center>';}
echo '<br/>';
?>