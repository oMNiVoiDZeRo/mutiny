<!doctype html>
<html data-bs-theme="dark">
<head>
<title>Add Record</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="../style.css" rel="stylesheet" />
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>
<body>
<header class="px-5 d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom">
	<a href="../" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-body-emphasis text-decoration-none">
		<span class="fs-4">Mutiny</span>
	</a>
	<span class="fs-4">Mutiny</span> </a>
	<ul class="nav nav-pills">
		<li class="nav-item"><a href="../" class="nav-link" aria-current="page">Public Records</a></li>
		<li class="nav-item"><a href="private" class="nav-link">Private Records</a></li>
		<li class="nav-item"><a href="add" class="nav-link active">Add Record</a></li>
	</ul>
</header>
<center><strong>You are about to add a record.</strong></center><br/>
<table border="1" cellpadding="10" align="center">
<form name="vote" action="../record/" method="post">
<tr><td align="center"><label>Public? <input type="checkbox" name="public" /></label></td></tr>
<tr><td align="center">
<input type="text" name="address" placeholder="Home address?" /><br/>
<input type="text" name="city" placeholder="City?" /><br/>
<input type="text" name="state" placeholder="State?" /><br/>
<input type="text" name="zip" placeholder="Zip code?" /><br/>
</td></tr>
<tr><td>
<label><input type="radio" name="selection" value="current" />Current.</label><br/>
<label><input type="radio" name="selection" value="new" />New.</label><br/>
</td></tr>
<tr><td align="center"><input class="btn btn-primary" type="submit" value="Record!" /></td></tr>
</form>
</table>
<br/>
<center><a href="../">Public Records</a><br/></center>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>
</html>