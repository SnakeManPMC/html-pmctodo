<!DOCTYPE html>
<html>
<head>
<title>PMCTODO Search Results</title>
    <LINK href="css.css" rel=stylesheet type="text/css">
</head>
<body>

<div class="search">
<?php

$query = $_POST['search'];

include "database-connect.php";

$result = mysqli_query($link,"SELECT * FROM todo WHERE todo_name LIKE '%".$query."%' OR todo_description LIKE '%".$query."%' OR todo_category LIKE '%".$query."%'");

echo "<p><a href='index.php'>Index</a> or <a href='search.php'>New Search</a></p>";

echo "<p>" . mysqli_num_rows($result) . " Results found!</p>";

if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
        // original line
        //echo "id: " . $row["id"] . ", " . $row['category'] . ", <b>" . $row["name"]. "</b>, " . $row["description"]. ". <a href='edit.php?id=" . $row["id"] . "'>Edit</a><br>";
        echo "<div class=\"todo\">";
        echo "<div class=\"category\">" . htmlspecialchars($row['id']) . ", " . htmlspecialchars($row['todo_category']) . "</div>"
            . "<div class=\"title\"><b></b>" . htmlspecialchars($row['todo_name']) . "</b></div>"
            . "<div class=\"description\">" . htmlspecialchars($row['todo_description']) . " <a href=\"edit.php?id=" . htmlspecialchars($row["id"]) . "\">Edit</a></div>";
        echo "</div>";
    }
} else {
    echo "0 results";
}

mysqli_close($link);
echo "<p><a href='index.php'>Index</a> or <a href='search.php'>New Search</a></p>";
?>
</div>
</body>
</html>
