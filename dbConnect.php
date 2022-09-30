<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Database connection script</title>
</head>
<body>
<?php
    $dbConn = new mysqli('localhost', 'unn_w18010859', 'Luna@2018', 'unn_w18010859'); //connect via mySQLi with these details

    if ($dbConn->connect_error) { //if there is an error connecting to the database,
        echo "<p>Connection failed: " . $dbConn->connect_error . "</p>\n"; //throw an error message
        exit;
    }
    ?>
</body>
</html>
