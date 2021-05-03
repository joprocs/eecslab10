<?php

$username = ($_POST['username']);
$query = "SELECT user_id FROM Users WHERE user_id=$username"; 
$updateUser= "UPDATE Users SET user_id='$username' WHERE user_id='$username'";
$mysqli = new mysqli("mysql.eecs.ku.edu", "jordanproctor", "Pain9hie", "jordanproctor");
/* check connection */
if ($mysqli->connect_errno) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit(); }

//check for valid login
if ($username == "") // nothing entered
    {
        echo "Please enter a valid username";
    }
    else if ($result = $mysqli->query($query)) //already existed
    {
        echo "This username is being used";
        /* free result set */
          $result->free();             
    }
    else   // creates new entry
    {
        if ($mysqli->query($updateUser) === TRUE) {
            echo "Record updated successfully";
          } 
          else 
          {
            echo "Error updating record: " . $mysqli->error;
          }

        echo "Welcome" . $_POST["username"] . "!<br> You are successfully logged in!<br>";
    }
    
$mysqli->close();


?>