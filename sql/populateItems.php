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

    $sql = "INSERT INTO items (item, store_name, address, price)
        VALUES 
        ('Caramel Iced Coffee', 'Tim Hortons','50 Gould St, Toronto, ON M5B 2K3', 2.00),
        ('Double Double', 'Tim Hortons', '50 Gould St, Toronto, ON M5B 2K3', 1.50),
        ('Assorted Tulips', 'Toronto Flower Gallery', '111 Victoria St, Toronto, ON M5C 2M6', 15.00),
        ('Red Roses', 'Toronto Flower Gallery', '111 Victoria St, Toronto, ON M5C 2M6', 30.00),
        ('Iced Matcha Latte', 'Page One Cafe','106 Mutual St Unit 8, Toronto, ON M5B 2R7', 5.30),
        ('London Fog', 'Page One Cafe','106 Mutual St Unit 8, Toronto, ON M5B 2R7', 4.50)";


    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }


?>
