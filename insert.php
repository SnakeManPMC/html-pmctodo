<!DOCTYPE html>
<html>
<head>
<title>PMCTODO - Insert</title>
    <LINK href="css.css" rel=stylesheet type="text/css">
</head>
<body>

<div class="insert">
    <div class="insertheader">Create New TODO</div>
    <form action="database-insert.php" method="post">
	TODO Task Name (header):<br>
	<input type="text" name="name" value="" size="150" required><br>
	Description:<br>
	<textarea name="description" cols="115" rows="10" required></textarea><br>
	Category (arma2,arma2,theater,scene,misc etc):<br>
	<input type="text" name="category" value="" size="20" required><br>
	Priority (0 low, 1 medium, 2 high, 3 critical):<br>
	<input type="number" name="priority" min="0" max="3" value="0" required><br>
	Status (0 none, 1 work in progress, 2 resolved, 3 closed, 4 obsolete):<br>
	<input type="number" name="status" min="0" max="4" value="0" required><br>
	<input type="submit" name="formSubmit" value="Submit" />
</form>

<p><a href="index.php">Back to Index</a> </p>
</div>

</body>
</html>
