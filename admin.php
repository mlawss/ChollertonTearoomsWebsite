<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin - Chollerton Tearooms</title>
    <link href="admin_styles.css" rel="stylesheet" type="text/css">
    <link href="index_styles.css" rel="stylesheet" type="text/css">
</head>
<body>
<?php
    include 'dbConnect.php'; //connect to the database

    $adminSQL = "SELECT forename, surname, postalAddress, landLineTelNo, mobileTelNo, email, sendMethod, catDesc
    FROM CT_expressedInterest
    INNER JOIN CT_category
    ON CT_category.catID = CT_expressedInterest.catID
    ORDER BY surname"; //sql code to retrieve the records from the database table

    $adminResult = $dbConn->query($adminSQL); //perform the query

    if($adminResult == false) { //if query fails, throw error message
        echo "<p>Query failed: ".$dbConn->error."</p>\n</body>\n</html>";
    }
    else { //if it is successful, generate page with table of records on it.
        echo "<header class=\"mainHeader\"> 
                <img src=\"images/tearoomLogo.png\" alt=\"Chollerton Tearooms logo\">
                <h1>Chollerton Tearooms</h1>
            </header>
        
            <nav>
                <ul>
                    <li><a href=\"index.html\">HOME</a></li>
                    <li><a href=\"findOutMore.html\">FIND OUT MORE</a></li>
                    <li><a href=\"credits.html\">CREDITS</a></li>
                    <li><a href=\"admin.php\">ADMIN</a></li>
                    <li><a href=\"wireframe.pdf\">WIREFRAME</a></li>
                </ul>
            </nav>
            
            <h2 class='subHeader1'>ADMIN</h2>
            
            <p>This table contains all of the records of the requests that have been made for more information via the Find Out More page.</p>
            
            <table class='center' border='1' cellpadding='5px' width='98%'>
                    <tr>
                        <th>Forename</th>
                        <th>Surname</th>
                        <th>Postal Address</th>
                        <th>Landline Number</th>
                        <th>Mobile Number</th>
                        <th>Email</th>
                        <th>Contact Method</th>
                        <th>Category</th>
                    </tr>";

        while($rowObj = $adminResult->fetch_object()) { //fetch the records retrieved using the SQL query
            echo "<tr>
                        <th>{$rowObj->forename}</th>
                        <th>{$rowObj->surname}</th>
                        <th>{$rowObj->postalAddress}</th>
                        <th>{$rowObj->landLineTelNo}</th>
                        <th>{$rowObj->mobileTelNo}</th>
                        <th>{$rowObj->email}</th>
                        <th>{$rowObj->sendMethod}</th>
                        <th>{$rowObj->catDesc}</th>
                    </tr>";
        }
    }

    $adminResult->close(); //close connections
    $dbConn->close();
    ?>
</body>
</html>
