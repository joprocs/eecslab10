<?php
                $mysqli = new mysqli("mysql.eecs.ku.edu", "jordanproctor", "Pain9hie", "jordanproctor");
                if ($mysqli->connect_errno) {
                printf("Connect failed: %s\n", $mysqli->connect_error);
                exit(); }
                else {
			    $query = "SELECT post_id, author_id, content FROM Posts ORDER BY post_id";
			    if ($result = $mysqli->query($query)) {
				while ($row = $result->fetch_assoc()) {
					echo "<tr><label><input type='checkbox' name='" . $row["user_id"] . "'>". $row["post_id"] . "</label></tr>";
                    echo "<tr><label><input type='checkbox' name='" . $row["author_id"] . "'> ". $row["author_id"] ."</label></tr>";
                    echo "<tr><label><input type='checkbox' name='" . $row["content"] . "'> ". $row["content"] ."</label></tr>";
                        
					}
					$result->free();
				    }
		        }
			$mysqli->close();
             ?>