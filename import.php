<html>
<head>
<title>PMCTODO - Import</title>
</head>

<body>

<p>Format of import.txt file is as follows:<br>
1 - date 2017-12-31<br>
2 - time 2359hrs<br>
3 - zero<br>
4 - zero<br>
5 - category<br>
6 - name/title<br>
7 - description
</p>

<p>Practical example:<br>
2017-12-31,2359hrs,0,0,arma3bugs,pmc 51km desert needs bigger satellite,describe me please
</p>

<?php

// some variable for string length
$nameLength = 0;
$nameLong = "";

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
    $dateTime = date_create_from_format('Y-m-d?Hi*', $myFish);
    //echo date_format($dateTime, 'Y-m-d Hi') . " NEW MYSQL TIMESTAMP AND INDEX STARTS HERE<br>";
    // unix timestamp for MySQL
    $myTimeStamp = date_timestamp_get($dateTime);
    //echo $myTimeStamp;

    // separate the last part for third [2] array part
    $splitclit = explode(",", $plaintext, 7);

    // check for string length so we dont try to put too long string into DB
    if ( strlen($splitclit[5]) > $nameLength ) {
        $nameLength = strlen($splitclit[5]);
        $nameLong = $splitclit[5];
    }

    //kinda debug
    //echo "Name length: " . strlen($splitclit[5]) . "<br>";
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
    $query = sprintf(
        "INSERT INTO todo VALUES ('','%s', '%s',$myTimeStamp,now(),'$splitclit[4]','$splitclit[2]','$splitclit[3]')",
        mysqli_real_escape_string($link, $splitclit[5]),
        mysqli_real_escape_string($link, $splitclit[6]));
    //$query = "INSERT INTO todo VALUES('','$splitclit[5]','$splitclit[6]',$myTimeStamp,now(),'$splitclit[4]','$splitclit[2]','$splitclit[3]')";
    mysqli_query($link, $query);
}

// close database
mysqli_close($link);

echo "<br>Max allowed task name lenght in MySQL is 150. Your imported max name string length is: " . $nameLength . "<br>And it is: <br>" . $nameLong . "<br><br><a href='index.php'>Back to index</a>";

?>

</body>
</html>