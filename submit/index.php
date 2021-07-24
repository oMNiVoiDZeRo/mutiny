<!doctype html>
<html>
<head>
<title>Submit Report</title>
<link href="../style.css" rel="stylesheet" />
</head>
<body>
<?php
session_start();
if(isset($_POST['upload']) && (isset($_POST['address']) || isset($_SESSION['address']))){
if(isset($_POST['address'])){$address = $_POST['address'];}
if(isset($_SESSION['address'])){
$address = $_SESSION['address'];
if(isset($_SESSION['private'])){$private = $_SESSION['private'];}
session_destroy();}
if($_POST['upload'] == null){$upload = '../test/data/file.ext';}
else {$upload = $_POST['upload'];}
include('../header.php');
$sql = "INSERT INTO `reports` (address, upload) VALUES ('$address', '$upload')";
if(mysqli_query($conn, $sql)){
if(!isset($private)){
echo '<table border="1" cellpadding="10" align="center">';
echo '<tr><td align="center"><strong>This record:</strong></td></tr>';
echo '<tr><td align="center">' . $address . '</td></tr>';
echo '<tr><td align="center">has been successfully reported.</td></tr>';
echo '</table>';}
else {
echo '<table border="1" cellpadding="10" align="center">';
echo '<tr><td align="center">Record has been successfully reported.</td></tr>';
echo '</table>';}}
include('../footer.php');}
else {
echo '<table border="1" cellpadding="10" align="center">';
echo '<tr><td align="center">Failed to upload report.</td></tr>';
echo '</table>';}
?>
<br/>
<center><a href="../">Public Records</a></center>
</body>
</html>