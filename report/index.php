<!doctype html>
<html>
<head>
<title>Report Record</title>
<link href="../style.css" rel="stylesheet" />
</head>
<body>
<center><strong>You are about to report an illegal record.</strong></center><br/>
<form name="report" action="../submit/" method="post">
<table border="1" cellpadding="10" align="center">
<?php
	session_start();
	if(isset($_SESSION['address'])){
		$address = $_SESSION['address'];
		session_destroy();
		if(!isset($_SESSION['private'])){
?>
<tr><td align="center" class="x">
<input type="hidden" name="address" value="<?php echo $address; ?>" /><?php echo $address; ?><br/>
</td></tr>
<?php
		} else {
			session_start();
			$_SESSION['address'] = $address;
			$_SESSION['private'] = true;
		}
	} elseif(isset($_POST['address'])){
		$address = $_POST['address'];
		session_destroy();
?>		
<tr><td align="center" class="x">
<input type="hidden" name="address" value="<?php echo $address; ?>" /><?php echo $address; ?><br/>
</td></tr>	
<?php
	}
?>
<tr><td align="center">
<br/>
<input type="file" name="upload" /><br/>
<br/>
</td></tr>
<tr><td align="center"><input type="submit" value="Report!" /></td></tr>
</table>
</form>
<br/>
<center><a href="../">Public Records</a><br/></center>
</body>
</html>