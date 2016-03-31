<?php

$query = $_POST['search'];

include "database-connect.php";

$result = mysqli_query($link,"SELECT * FROM todo WHERE name LIKE '%".$query."%' OR description LIKE '%".$query."%'");

echo mysqli_num_rows($result) . " Results found!<br>";

if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
        echo "id: " . $row["id"]. ", <b>" . $row["name"]. "</b>, " . $row["description"]. ". <a href='edit.php?id=" . $row["id"] . "'>Edit</a><br>";
    }
} else {
    echo "0 results";
}

mysqli_close($link);
echo "<br><a href='index.php'>Index</a> or <a href='search.php'>New Search</a>";
?>
