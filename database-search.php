<!DOCTYPE html>
<html>
<head>
<title>PMCTODO Search Results</title>
</head>
<body>

<?php

$query = $_POST['search'];

include "database-connect.php";

$result = mysqli_query($link,"SELECT * FROM todo WHERE name LIKE '%".$query."%' OR description LIKE '%".$query."%' OR category LIKE '%".$query."%'");

echo "<p>" . mysqli_num_rows($result) . " Results found!</p>";

echo "<p>";

if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
        echo "id: " . $row["id"] . ", " . $row['category'] . ", <b>" . $row["name"]. "</b>, " . $row["description"]. ". <a href='edit.php?id=" . $row["id"] . "'>Edit</a><br>";
    }
} else {
    echo "0 results";
}
echo "</p>";

mysqli_close($link);
echo "<p><a href='index.php'>Index</a> or <a href='search.php'>New Search</a></p>";
?>

</body>
</html>
