<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Find Out More - Chollerton Tearooms</title>
    <link href="findOutMore_styles.css" rel="stylesheet" type="text/css">
    <link href="index_styles.css" rel="stylesheet" type="text/css">
</head>
<body>
<?php
    include 'dbConnect.php'; //connect to the database

    $forename = isset($_REQUEST['forename']) ? $_REQUEST['forename'] : null; //fetch all of the variables entered by the user in the form and store them in php variables.
    $surname = isset($_REQUEST['surname']) ? $_REQUEST['surname'] : null;
    $email = isset($_REQUEST['email']) ? $_REQUEST['email'] : null;
    $landPhone = isset($_REQUEST['landPhone']) ? $_REQUEST['landPhone'] : null;
    $mobPhone = isset($_REQUEST['mobPhone']) ? $_REQUEST['mobPhone'] : null;
    $postAddress = isset($_REQUEST['postAddress']) ? $_REQUEST['postAddress'] : null;
    $sendMethod = isset($_REQUEST['contactMethod']) ? $_REQUEST['contactMethod'] : null;
    $cat = isset($_REQUEST['category']) ? $_REQUEST['category'] : null;

    $addRecordSQL = "INSERT INTO CT_expressedInterest(forename, surname, postalAddress, landLineTelNo, mobileTelNo, email, sendMethod, catID)
    VALUES('$forename','$surname','$postAddress','$landPhone','$mobPhone','$email','$sendMethod','$cat')"; //sql code to add user's request to the database table.

    $addRecordResult = $dbConn->query($addRecordSQL); //perform query to add the record.

    if($addRecordResult == false) { //test if the query fails. if it does, throw an error message.
        echo "<p>Query failed: ".$dbConn->error."</p>\n</body>\n</html>";
        exit;
    }

    else { //if it is successful, generate a page to inform the user that it was.
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
        
            <p class='subHeader1'>Thank you. Your request has been sent with the following details:</p> 
            <p>Forename: $forename</p>
            <p>Surname: $surname</p>
            <p>Postal address: $postAddress</p>
            <p>Landline phone number: $landPhone</p>
            <p>Mobile phone number: $mobPhone</p>
            <p>Email address: $email</p>
            <p>Method to send information: $sendMethod</p>
            <p>Category: $cat</p>";
            
            if($cat == 'c1') { //echo images of each corresponding category that the user chooses
                echo "<img class='facilityImages' src='images/tearoomImage.png' alt='Image of the tearoom'>";
            }
            elseif($cat == 'c2') {
                echo "<img class='facilityImages' src='images/craftShopImage.png' alt='Image of the craft shop'>";
            }
            elseif($cat == 'c3') {
                echo "<img class='facilityImages' src='images/generalStoreImage.png' alt='Image of the village store'>";
            }
            elseif($cat == 'c4') {
                echo "<img class='facilityImages' src='images/postOfficeImage.png' alt='Image of the post office'>";
            }
            elseif($cat == 'c5') {
                echo "<img class='facilityImages' src='images/bedBreakfastImage.png' alt='Image of the bed & breakfast'>";
            }
            else {
                echo "<p></p>";
            }

            echo "<footer class=\"footer\">
                <p>&copy; Chollerton Tearooms.</p>
                <p>Designed and developed by Matthew Laws.</p>
            </footer>";
    }
    $dbConn->close(); //close connection
    ?>
</body>
</html>
