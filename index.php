<html>
<head>
<title>PMCTODO</title>
</head>
<body>

<p><a href="insert.php">Create</a> </p>
<p><a href="search.php">Search</a> </p>

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

</body>
</html>
