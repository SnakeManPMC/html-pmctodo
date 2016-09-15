<!DOCTYPE html>
<html>
<head>
<title>PMCTODO - Browse All</title>
</head>
<body>

<?php
// connect to database
include("database-connect.php");

$result = mysqli_query($link,"SELECT * FROM todo");

echo mysqli_num_rows($result) . " Results found!<br>";

foreach ($result as $row) {
    echo htmlspecialchars($row['id']) . ", " . htmlspecialchars($row['category']) . ", <b>" . htmlspecialchars($row['name'])
        . "</b>, " . htmlspecialchars($row['description']) . " <a href='edit.php?id=" . htmlspecialchars($row["id"])
        . "'>Edit</a><br>";
}

// close database
mysqli_close($link);
?>

<p><a href="index.php">Back to Index</a> </p>

</body>
</html>
