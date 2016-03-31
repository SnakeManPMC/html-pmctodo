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
    echo "Deleted " . mysqli_affected_rows($link) . " rows. TODO record: $id was deleted. Back to <a href='index.php'>Index</a>";
} else {
    echo "Oh boy, something went wrong with delete, dunno what? affected rows: " . mysqli_affected_rows($link) . ", hmm...";
}

mysqli_close($link);

?>