<?php
$mysqli = new mysqli("mysql.eecs.ku.edu", "jordanproctor", "Pain9hie", "jordanproctor");
if ($mysqli->connect_errno) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit(); }
    else {
			$query = "SELECT user_id FROM Users ORDER BY user_id ASC";
			if ($result = $mysqli->query($query)) {
				while ($row = $result->fetch_assoc()) {
					echo "<br>" . $row["user_id"] . "<br>";
					}
					$result->free();
				}
		}
			$mysqli->close();
    ?>