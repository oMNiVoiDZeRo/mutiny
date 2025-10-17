<!doctype html>
<html>
<head>
<title>Private Records</title>
<link href="style.css" rel="stylesheet" />
</head>
<body>
<?php
include('../header.php');
if($conn == true){
echo '<center><strong>Private Records</strong></center><br/>';
$sql = "SELECT * FROM `records` WHERE `public`=0";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
if($row == null){
echo '<table border="1" cellpadding="10" align="center"><tr><td align="center">';
echo 'No private records to display.<br/>';
echo '</td></tr></table>';
} else {
echo '<table border="1" cellpadding="10" align="center">';
echo '<tr><td align="center"><strong>Address</strong></td><td align="center"><strong>City</strong></td><td align="center"><strong>State</strong></td><td align="center"><strong>Zip Code</strong></td><td></td></tr>';
foreach($result as $row){
$public = $row['public'];
if($public == 1){
$public = 'Public';}
echo '<tr><td class="x"><form action="report/" method="post"><input type="hidden" name="address" value="' . $row['address'] . '" />' . $row['address'] . '</td><td>' . $row['city'] . '</td><td>' . $row['state'] . '</td><td>' . $row['zip'] . '</td><td><input type="submit" name="report" value="Report"/></form></tr>';}
echo '</table>';}
echo '<br/>';
echo '<center><a href="add/">Add record to database.</a></center>';
} else {
echo '<br/>';
echo 'Error: ' . $sql . '<br/>' . mysqli_error($conn);}
include('../footer.php');
?>
</body>
</html>