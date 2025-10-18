<!doctype html>
<html data-bs-theme="dark">
<head>
<title>Public Records</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="style.css" rel="stylesheet" />
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>
<body>
<header class="px-5 d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom">
	<a href="../mutiny" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-body-emphasis text-decoration-none">
		<span class="fs-4">Mutiny</span>
	</a>
	<ul class="nav nav-pills">
		<li class="nav-item"><a href="../" class="nav-link active" aria-current="page">Public Records</a></li>
		<li class="nav-item"><a href="private" class="nav-link">Private Records</a></li>
		<li class="nav-item"><a href="add" class="nav-link">Add Record</a></li>
	</ul>
</header>
<?php
include('header.php');
if($conn == true){
echo '<center><strong>Public Records</strong></center><br/>';
$sql = "SELECT * FROM `records` WHERE `public`=1";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
if($row == null){
echo '<table border="1" cellpadding="10" align="center"><tr><td align="center">';
echo 'No public records to display.<br/>';
echo '</td></tr></table>';
} else {
echo '<table border="1" cellpadding="10" align="center">';
echo '<tr><td align="center"><strong>Address</strong></td><td align="center"><strong>City</strong></td><td align="center"><strong>State</strong></td><td align="center"><strong>Zip Code</strong></td><td></td></tr>';
foreach($result as $row){
$public = $row['public'];
if($public == 1){
$public = 'Public';}
echo '<tr><td class="x"><form action="report/" method="post"><input type="hidden" name="address" value="' . $row['address'] . '" />' . $row['address'] . '</td><td align="center">' . $row['city'] . '</td><td align="center">' . $row['state'] . '</td><td align="center">' . $row['zip'] . '</td><td align="center"><input class="btn btn-primary" type="submit" name="report" value="Report"/></form></tr>';}
echo '</table>';}
echo '<br/>';
echo '<center><a href="add/">Add record to database.</a></center>';
echo '<br/>';
echo '<center><a href="private/">View private records.</a></center>';
} else {
echo '<br/>';
echo 'Error: ' . $sql . '<br/>' . mysqli_error($conn);}
include('footer.php');
?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>
</html>