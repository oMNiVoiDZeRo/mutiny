<!doctype html>
<html data-bs-theme="dark">
<head>
<title>Submit Report</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="../style.css" rel="stylesheet" />
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>
<body>
<?php
session_start();
if(isset($_FILES['fileToUpload']) && (isset($_POST['address']) || isset($_SESSION['address']))){
if(isset($_POST['address'])){$address = $_POST['address'];}
if(isset($_SESSION['address'])){
$address = $_SESSION['address'];
if(isset($_SESSION['private'])){$private = $_SESSION['private'];}
session_destroy();}
if($_FILES['fileToUpload'] == null){$upload = 'No file attached.';}
else {
	
$target_dir = dirname(__DIR__, 1) . '/reports/uploads/';
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$target_asset = '../reports/uploads/' . basename($_FILES["fileToUpload"]["name"]);
$target_link = '<a href="' . $target_asset . '">' . $target_asset . '</a>';
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

echo '<table border="1" cellpadding="10" align="center">';
echo '<tr><td align="center">';

// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
  $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
  if($check !== false) {
    echo "File is an image - " . $check["mime"] . ".";
    $uploadOk = 1;
  } else {
    echo "File is not an image.";
    $uploadOk = 0;
  }
}
	
// Check if file already exists
if (file_exists($target_file)) {
  echo 'Sorry, <a href="' . $target_asset . '">file</a> already exists.';
  $uploadOk = 0;
}
	
// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
  echo "Sorry, your file is too large.";
  $uploadOk = 0;
}
	
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" && $imageFileType != "pdf") {
  echo "Sorry, only JPG, JPEG, PNG, GIF & PDF files are allowed.";
  $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
  echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
    echo 'The file <a href="../reports/uploads/' . basename($_FILES["fileToUpload"]["name"]) . '">' . htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). '</a> has been uploaded.';
  } else {
    echo "Sorry, there was an error uploading your file.";
  }
}
	
echo '</td></tr></table><br/><br/>';

}

include('../header.php');
$sql = "INSERT INTO `reports` (address, upload) VALUES ('$address', '$target_link')";
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
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>
</html>