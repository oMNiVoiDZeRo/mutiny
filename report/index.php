<!doctype html>
<html data-bs-theme="dark">
<head>
<title>Report Record</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="../style.css" rel="stylesheet" />
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>
<body>
<header class="px-5 d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom">
	<a href="../" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-body-emphasis text-decoration-none">
		<span class="fs-4">Mutiny</span>
	</a>
	<ul class="nav nav-pills">
		<li class="nav-item"><a href="../" class="nav-link" aria-current="page">Public Records</a></li>
		<li class="nav-item"><a href="../private" class="nav-link">Private Records</a></li>
		<li class="nav-item"><a href="../add" class="nav-link">Add Record</a></li>
	</ul>
</header>
<center><strong>You are about to report an illegal record.</strong></center><br/>
<form name="report" action="../submit/" method="post" enctype="multipart/form-data">
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
<input class="btn btn-primary" type="file" name="fileToUpload" id="fileToUpload" /><br/>
<br/>
</td></tr>
<tr><td align="center"><input class="btn btn-primary" type="submit" value="Report!" /></td></tr>
</table>
</form>
<br/>
<center><a href="../">Public Records</a><br/></center>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>
</html>