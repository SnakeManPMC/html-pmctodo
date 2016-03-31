<html>
<head>
<title>PMCTODO - Import</title>
</head>

<body>

<?php

// some variable for string length
$nameLength = 0;

// connect to database
include("database-connect.php");

// skip empty lines and \n new line things
$myfile = file('import.txt', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

foreach ($myfile as $myline => $plaintext) {

    /*
     * format:
     * date, time, priority, status, category, name, description
     */

    // separate string with two first , characters which are "date,time"
    $splitclit = explode(",", $plaintext);
    $myFish = $splitclit[0] . "," . $splitclit[1];

    // convert to unix timestamp
    $dateTime = date_create_from_format('m-d-y?Hi*', $myFish);
    //echo date_format($dateTime, 'Y-m-d Hi') . " NEW MYSQL TIMESTAMP AND INDEX STARTS HERE<br>";
    // unix timestamp for MySQL
    $myTimeStamp = date_timestamp_get($dateTime);
    //echo $myTimeStamp;

    // separate the last part for third [2] array part
    $splitclit = explode(",", $plaintext, 7);

    // check for string length so we dont try to put too long string into DB
    if (strlen($splitclit[5] > $nameLength)) {
        $nameLength = strlen($splitclit[5]);
    }
/*
    echo "1st: " . $splitclit[0] . ", ";
    echo "2nd: " . $splitclit[1] . ", ";
    echo "3rd: " . $splitclit[2] . ", ";
    echo "4th: " . $splitclit[3] . ", ";
    echo "5th: " . $splitclit[4] . ", ";
    echo "6th: " . $splitclit[5] . ", ";
    echo "7th: " . $splitclit[6] . "<br>";
*/
    //echo $myTimeStamp . "<br>";
    // insert into database
    $query = "INSERT INTO todo VALUES('','$splitclit[5]','$splitclit[6]',$myTimeStamp,now(),'$splitclit[4]','$splitclit[2]','$splitclit[3]')";
    mysqli_query($link, $query);
}

// close database
mysqli_close($link);

echo "<br>Max name string length is: " . $nameLength . "<br><br><a href='index.php'>Back to index</a>";

?>

</body>
</html>