<!DOCTYPE html>
<html>
<head>
    <title>PMCTODO - Deleted TODO</title>
    <LINK href="css.css" rel=stylesheet type="text/css">
</head>
<body>

<div class="search">
<?php

// must be on the beginning of the page, before any html code...
if (isset($_GET['id']) && ctype_digit($_GET['id'])) {
    $id = $_GET['id'];
} else {
    // ... because this wont work otherwise
    header('Location: index.php');
}

include "database-connect.php";

mysqli_query($link,"DELETE FROM todo WHERE id=$id");

if (mysqli_affected_rows($link) > 0) {
    echo "<p>Deleted " . mysqli_affected_rows($link) . " rows. TODO record: $id was deleted.</p>";
} else {
    echo "<p>Oh boy, something went wrong with delete, dunno what? affected rows: " . mysqli_affected_rows($link) . ", hmm...</p>";
}

mysqli_close($link);

?>

<p><a href="index.php">Back to Index</a> </p>
</div>
</body>
</html>

