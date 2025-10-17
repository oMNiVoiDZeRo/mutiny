<?php
$server = 'localhost';
$user = 'root';
$pass = '';
$database = 'mutiny';
$conn = mysqli_connect($server, $user, $pass, $database);
if($conn == true){echo '<!-- Database Successfully Connected. -->';}
echo '<br/>';
?>