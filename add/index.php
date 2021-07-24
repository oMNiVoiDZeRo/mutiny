<!doctype html>
<html>
<head>
<title>Add Record</title>
<link href="../style.css" rel="stylesheet" />
</head>
<body>
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
<tr><td align="center"><input type="submit" value="Record!" /></td></tr>
</form>
</table>
<br/>
<center><a href="../">Public Records</a><br/></center>
</body>
</html>