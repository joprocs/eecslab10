<?php

$username = ($_POST['username']);
$post= ($_POST['post']);
$query = "SELECT user_id FROM Users WHERE user_id=$username"; 
$insertPost= "INSERT INTO Posts (content, author_id) VALUES ('$post','$username)";
$mysqli = new mysqli("mysql.eecs.ku.edu", "jordanproctor", "Pain9hie", "jordanproctor");
/* check connection */
if ($mysqli->connect_errno) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit(); }

//check for valid login
if ($result = $mysqli->query($query)) //user exists
    {
        if ($post == "") // nothing entered
        {
            echo "Please enter a valid post";
        }
        else
        {
            if ($mysqli->query($insertPost) === TRUE) {
                echo "Record updated successfully";
              } 
              else 
              {
                echo "Error updating record: " . $mysqli->error;
              }
            
        }
        $result->free(); 
    }
    else   
    {
        echo "please sign in";
    }
    
$mysqli->close();


?>