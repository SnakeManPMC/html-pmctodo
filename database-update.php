<!DOCTYPE html>
<html>
<head>
    <title>PMCTODO - Database Updated</title>
    <LINK href="css.css" rel=stylesheet type="text/css">
</head>
<body>

<div class="search">
<?php
if(isset($_POST['name']))
{
	$name = $_POST['name'];
	$description = $_POST['description'];
	$category = $_POST['category'];
	$priority = $_POST['priority'];
	$status = $_POST['status'];
	$id = $_POST['id'];

	include "database-connect.php";

	$myvalue = mysqli_query($link, "UPDATE todo SET todo_name = '$name', todo_description = '$description', todo_changed_at = now(),
      todo_category = '$category', todo_priority = '$priority', todo_status = '$status' WHERE id='$id'");

	mysqli_close($link);

	if ($myvalue) {
		echo "Edit was successful.<br><br>Go back to <a href='edit.php?id=$id'>Edit $id</a><br><br>";
	} else {
		echo "uh oh something went wrong with the edit, SORRY! :(<br><br>";
	}

	echo "<br><a href='index.php'>Index</a>";
}
?>
</div>
</body>
</html>
