<?php
if(isset($_POST['name']))
{
	$name = $_POST['name'];
	$description = $_POST['description'];
	$category = $_POST['category'];
	$priority = $_POST['priority'];
	$status = $_POST['status'];
    $tstamp = time();

	include "database-connect.php";

	mysqli_query($link, "INSERT INTO todo VALUES('','$name','$description','$tstamp',now(),'$category','$priority','$status')");
	$last_id = mysqli_insert_id($link);
	echo "New record created successfully. Last inserted ID is: " . $last_id;
	echo "<br>";

	$sql = "SELECT id, name, description, created_at, changed_at, category, priority, status FROM todo";
	$result = mysqli_query($link, $sql);

	if (mysqli_num_rows($result) > 0) {
		// output data of each row
		while($row = mysqli_fetch_assoc($result)) {
			echo "id: " . $row["id"]. ", Name: " . $row["name"]. ", Description: " . $row["description"]. ", Category: " .
                $row['category']. ", Priority: " . $row['priority']. ", Status: " . $row['status']. ", " .
                $row["created_at"]. ", " . $row["changed_at"]. "<br>";
		}
	} else {
		echo "0 results";
	}

	mysqli_close($link);
	echo "<br><a href='index.php'>Index</a>";
}
?>