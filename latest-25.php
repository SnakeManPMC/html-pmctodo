<!DOCTYPE html>
<html>
<head>
<title>PMCTODO - Latest 25</title>
    <LINK href="css.css" rel=stylesheet type="text/css">
</head>
<body>

<div class="search">
    Latest 25 PMCTODOs <a href="index.php">Back to Index</a>
<?php
// connect to database
include("database-connect.php");

$result = mysqli_query($link,"SELECT * FROM todo ORDER BY todo_created_at DESC LIMIT 25");

//echo "<div class='resultsfound'>" . mysqli_num_rows($result) . " Results found!</div>";

foreach ($result as $row) {
	echo "<div class=\"todo\">";
	echo "<div class=\"category\">" . htmlspecialchars($row['id']) . ", " . htmlspecialchars($row['todo_category']) . "</div>"
		. "<div class=\"title\"><b></b>" . htmlspecialchars($row['todo_name']) . "</b></div>"
	        . "<div class=\"description\">" . htmlspecialchars($row['todo_description']) . " <a href=\"edit.php?id=" . htmlspecialchars($row["id"]) . "\">Edit</a></div>";
	echo "</div>";
	}

// close database
mysqli_close($link);
?>

<p><a href="index.php">Back to Index</a></p>
</div>
</body>
</html>
