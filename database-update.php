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

	$myvalue = mysqli_query($link, "UPDATE todo SET name = '$name', description = '$description', changed_at = now(),
      category = '$category', priority = '$priority', status = '$status' WHERE id='$id'");

	mysqli_close($link);

	if ($myvalue) {
		echo "Edit was successful.<br><br>Go back to <a href='edit.php?id=$id'>Edit $id</a><br><br>";
	} else {
		echo "uh oh something went wrong with the edit, SORRY! :(<br><br>";
	}

	echo "<br><a href='index.php'>Index</a>";
}
?>