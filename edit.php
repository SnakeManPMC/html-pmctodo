<?php

// must be on the beginning of the page, before any html code...
if (isset($_GET['id']) && ctype_digit($_GET['id'])) {
    $id = $_GET['id'];
} else {
    // ... because this wont work otherwise
    header('Location: index.php');
}

include "database-connect.php";

$result = mysqli_query($link,"SELECT * FROM todo WHERE id=$id");

if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
        $name = htmlspecialchars($row['todo_name'], ENT_QUOTES);
        $description = htmlspecialchars($row['todo_description'], ENT_QUOTES);
        $created_at = $row['todo_created_at'];
        $changed_at = $row['todo_changed_at'];
        $category = htmlspecialchars($row['todo_category'], ENT_QUOTES);
        $priority = htmlspecialchars($row['todo_priority'], ENT_QUOTES);
        $status = htmlspecialchars($row['todo_status'], ENT_QUOTES);
    }
} else {
    echo "0 results<br>";
}

mysqli_close($link);

$myStringDate = gmdate('Y-m-d\TH:i:s\Z', $created_at);

echo "<html>";
echo "<head>";
echo "<title>PMCTODO - Edit</title>";
echo "<LINK href='css.css' rel=stylesheet type='text/css'>";
echo "</head>";
echo "<body>";
echo "<div class=\"search\">";
echo "<p>You are now <b>EDITING</b> this entry. Delete this entry (careful, no undo!): <a href='delete.php?id=$id'>Delete $id</a></p>";

echo "<p>Created at: $myStringDate, Changed at: $changed_at</p>";

echo "<form action='database-update.php' method='post'>";
echo "TODO Task Name (header):<br>";
echo "<input type='text' name='name' value='$name' size='150'><br>";
echo "Description:<br>";
echo "<textarea name='description' cols='115' rows='15'>$description</textarea><br>";
echo "Category (arma2,arma2,theater,scene,misc etc):<br>";
echo "<input type='text' name='category' value='$category' size='20'><br>";
echo "Priority (0 low, 1 medium, 2 high, 3 critical):<br>";
echo "<input type='number' name='priority' min='0' max='3' value='$priority'><br>";
echo "Status (0 none, 1 work in progress, 2 resolved, 3 closed, 4 obsolete):<br>";
echo "<input type='number' name='status' min='0' max='4' value='$status'><br>";
echo "<input type='hidden' name='id' value='$id' />";
echo "<input type='submit' name='formSubmit' value='Save' />";
echo "</form>";

echo "<p><a href='index.php'>Nevermind, back to Index</a> </p>";
echo "</div>";
echo "</body>";
echo "</html>";

?>
