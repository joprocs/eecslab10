<?php

$username = ($_POST['username']);
$query = "SELECT username FROM Users WHERE username=$username";
$mysqli = new mysqli("mysql.eecs.ku.edu", "jordanproctor", "Pain9hie", "jordanproctor");
/* check connection */
if ($mysqli->connect_errno) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit(); }

//check for valid login
if ($username == "")
    {
        echo "Please enter a valid username";
    }
    else if ($result = $mysqli->query($query)) 
    {
        while ($row = $result->fetch_assoc()) {
            printf ("%s (%s)\n", $row["user_id"]);}

            echo "This username is being used";
                   /* free result set */
                   $result->free();
                
    }
    else
    {
        echo "Welcome" . $_POST["username"] . "!<br> You are successfully logged in!<br>";
    }
    
$mysqli->close();


?>