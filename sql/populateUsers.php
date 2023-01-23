<?php
    $servername = "localhost";
   $username = "admin";
    $password = "Adg00jad@?!";
    $dbname = "project";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = 'INSERT INTO users (usersName, usersEmail, usersUid, usersPwd)
        VALUES 
        ("admin","admin@gmail.com","admin","$2y$10$8nORSwukXnys/UL6iglZrOxR8ZULEUzamhoV4BQMJFt/A33S/sOWi")';
        

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }


?>

<!-- usersId	usersName	usersEmail	usersUid	usersPwd	
0	Nick	delaguardianick@gmail.com	delaguardianick	$2y$10$Vukxwcgu4Z6K7LORWnqOR.ceto7c6jZKAjtQCnp7tEt...	
0	admin	admin@gmail.com	admin	$2y$10$62/c61HP0L132d0TtJQx2OXq7yOc7Vl7dhXnDlbF52d...	 -->
