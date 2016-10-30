<!DOCTYPE html>
<html>
<head>
<title>PMCTODO</title>
    <LINK href="css.css" rel=stylesheet type="text/css">
</head>
<body>

<div class="index">
    <div class="header">
        PMCTODO
    </div>
<p><a href="insert.php">Create / Insert</a> </p>
<p><a href="browse-all.php">Browse All</a> </p>

<form action="database-search.php" method="post">
    Search:<br>
    <input type="text" name="search" size="50" required><br>
    <input type="submit" name="formSubmit" value="Submit" />
</form>
</div>

</body>
</html>
