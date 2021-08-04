<!doctype html>
<html>
<head>
<title>Record Reports</title>
<link href="../style.css" rel="stylesheet" />
</head>
<body>
<?php
include('../header.php');
if($conn == true){
echo '<center><strong>Record Reports</strong></center><br/>';
$sql = "SELECT * FROM `reports`";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
if($row == null){
echo '<table border="1" cellpadding="10" align="center"><tr><td align="center">';
echo 'No record reports to display.<br/>';
echo '</td></tr></table>';
} else {
echo '<table border="1" cellpadding="10" align="center">';
echo '<tr><td align="center"><strong>Address</strong></td><td align="center"><strong>Upload</strong></td></tr>';
foreach($result as $row){
echo '<tr><td class="x"><input type="hidden" name="address" value="' . $row['address'] . '" />' . $row['address'] . '</td><td>' . $row['upload'] . '</td></tr>';}}
echo '</table>';
echo '<br/>';
echo '<center><a href="../">View public records.</a></center>';
} else {
echo '<br/>';
echo 'Error: ' . $sql . '<br/>' . mysqli_error($conn);}
include('../footer.php');
?>
</body>
</html>