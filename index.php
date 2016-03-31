<html>
<head>
<title>PMCTODO</title>
</head>
<body>

<p><a href="insert.php">Create</a> </p>
<!-- <p><a href="search.php">Search</a> </p> -->

<form action="database-search.php" method="post">
    Search:<br>
    <input type="text" name="search" value=""><br>
    <input type="submit" name="formSubmit" value="Submit" />
</form>

<!--
<?php
// connect to database
include("database-connect.php");

$result = mysqli_query($link,"SELECT * FROM todo");

foreach ($result as $row) {
    echo $row['name'] . ", " . $row['description'] . " <a href='edit.php?id=" . $row["id"] . "'>Edit</a><br>";
}

// close database
mysqli_close($link);
?>
-->
</body>
</html>
