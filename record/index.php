<!doctype html>
<html data-bs-theme="dark">
<head>
<title>Record Record</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="../style.css" rel="stylesheet" />
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>
<body>
<?php
if(isset($_POST['address']) && isset($_POST['city']) && isset($_POST['state']) && isset($_POST['zip']) && isset($_POST['selection'])){
include('../header.php');
if(isset($_POST['public'])){$public = 1;} else {$public = 0;}
$address = mysqli_real_escape_string($conn, $_POST['address']);
$city = mysqli_real_escape_string($conn, $_POST['city']);
$state = mysqli_real_escape_string($conn, $_POST['state']);
$zip = mysqli_real_escape_string($conn, $_POST['zip']);
$selection = $_POST['selection'];
include('../debrev.php');
$sql = "SELECT * FROM `records`";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$duplicate = false;
$recorded = false;
$public_record = false;
if(mysqli_query($conn, $sql)){
foreach($result as $row){
if($row['address'] == $address){$duplicate = true;}
if($row['address'] == $address && $row['public'] == 1){$public_record = true;}}
if($duplicate == true && $public_record == true){
	session_start();
	$_SESSION['address'] = $address;
echo '<form name="record" action="../report" method="post">';
echo '<table border="1" cellpadding="10" align="center">';
echo '<tr><td align="center"><strong>This record:</strong></td></tr>';
echo '<tr><td align="center"><input class="x" type="text" name="address" value="' . $address . '" disabled /></td></tr>';
echo '<tr><td align="center">is a public record and has already been recorded.</td></tr>';
echo '<tr><td align="center"><input type="submit" value="Report this record?" /></td></tr>';
echo '</table>';
echo '</form>';
} elseif ($duplicate == true && $public_record == false) {
	session_start();
	$_SESSION['address'] = $address;
	$_SESSION['private'] = true;
echo '<form name="record" action="../report" method="post">';
echo '<table align="center" border="1" cellpadding="10">';
echo '<tr><td align="center">Existing record has been found.</td></tr>';
echo '<tr><td align="center"><input type="submit" value="Report this record?" /></td></tr>';
echo '</table>';
echo '</form>';}}
while($duplicate == false && $recorded == false):
$sql = "INSERT INTO `records` (public, address, city, state, zip, selection) VALUES ('$public', '$address', '$city', '$state', '$zip', '$selection')";
if(mysqli_query($conn, $sql)){
if($public == 1){
if($selection == 'current'){
echo '<table border="1" cellpadding="10" align="center">';
echo '<tr><td colspan="4" align="center">You publicly voted for the ' . $selection . ' selection.</td></tr>';
echo '</table><br/>';
} else {
	echo '<table border="1" cellpadding="10" align="center">';
echo '<tr><td colspan="4" align="center">You publicly voted for a ' . $selection . ' selection.</td></tr>';
echo '</table><br/>';}
echo '<table border="1" cellpadding="10" align="center">';
echo '<tr><td align="center"><strong>Address</strong></td><td align="center"><strong>City</strong></td><td align="center"><strong>State</strong></td><td align="center"><strong>Zip Code</strong></td></tr>';
echo '<tr><td>' . $address . '</td><td>' . $city . '</td><td>' . $state . '</td><td>' . $zip . '</td></tr>';
echo '</table>';
} else {
if($selection == 'current'){
echo '<table border="1" cellpadding="10" align="center">';
echo '<tr><td colspan="4" align="center">You privately chose the ' . $selection . ' selection.</td></tr>';
echo '</table><br/>';
} else {
echo '<table border="1" cellpadding="10" align="center">';
echo '<tr><td colspan="4" align="center">You privately chose a ' . $selection . ' selection.</td></tr>';
echo '</table><br/>';}
echo '<table border="1" cellpadding="10" align="center">';
echo '<tr><td align="center"><strong>Address</strong></td><td align="center"><strong>City</strong></td><td align="center"><strong>State</strong></td><td align="center"><strong>Zip Code</strong></td></tr>';
echo '<tr><td>' . $address . '</td><td>' . $city . '</td><td>' . $state . '</td><td>' . $zip . '</td></tr>';
echo '</table>';}
} else {echo 'Error: ' . $sql . '<br/>' . mysqli_error($conn);}
$recorded = true;		
endwhile;
$sql = "SELECT * FROM `records` WHERE `selection`='current'";
$result = mysqli_query($conn, $sql);
$total_current = mysqli_num_rows($result);
$sql = "SELECT * FROM `records` WHERE `selection`='new'";
$result = mysqli_query($conn, $sql);
$total_new = mysqli_num_rows($result);
echo '<br/>';
echo '<table border="1" cellpadding="10" align="center">';
echo '<tr><td colspan="2" align="center"><strong>Total Records</strong></td></tr>';
echo '<tr><td width="50%" align="center"><strong>Current</strong></td><td width="50%" align="center"><strong>New</strong></td></tr>';
echo '<tr><td align="center">' . $total_current . '</td><td align="center">' . $total_new . '</td></tr>';
echo '</table>';
echo '<br/>';
echo '<center><a href="../">Public Records</a></center>';
include('../footer.php');
} else {
echo '<center>You submitted an incomplete record.</center><br/>';
echo '<center><a href="../add/">Fill out the record.</a></center>';}
?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>
</html>