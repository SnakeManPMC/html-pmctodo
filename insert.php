<html>
<head>
<title>PMCTODO - Insert</title>
</head>
<body>

<form action="database-insert.php" method="post">
	TODO Task Name (header):<br>
	<input type="text" name="name" value="" size="140"><br>
	Description:<br>
	<textarea name="description" cols="80" rows="20"></textarea><br>
	Category (arma2,arma2,theater,scene,misc etc):<br>
	<input type="text" name="category" value="" size="20"><br>
	Priority (0 low, 1 medium, 2 high, 3 critical):<br>
	<input type="number" name="priority" min="0" max="3"><br>
	Status (0 none, 1 work in progress, 2 resolved, 3 closed, 4 obsolete):<br>
	<input type="number" name="status" min="0" max="4"><br>
	<input type="submit" name="formSubmit" value="Submit" />
</form>

<p><a href="index.php">Back to Index</a> </p>

</body>
</html>
