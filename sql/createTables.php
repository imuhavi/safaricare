<?php
    $servername = "127.0.0.1";
    $username = "admin";
    $password = "Adg00jad@?!";
    $dbname = "project";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    // order table
    $sql = "CREATE TABLE orders(
        orderId INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        userId VARCHAR(30),
        itemId INT(30) NOT NULL,
        store_name VARCHAR(50) NOT NULL,
        store_address VARCHAR(150) NOT NULL,
        dest VARCHAR(150) NOT NULL,
        item VARCHAR(30) NOT NULL,
        price DECIMAL(20,2),
        orderDate DATETIME,
        dateOfTransaction TIMESTAMP
    )";

    if (mysqli_query($conn, $sql)) {
        echo "Trips table created successfully";
    } else {
        echo "Error creating table: " . mysqli_error($conn);
    }
    // sql to create car table
    $sql = "CREATE TABLE `users` (
        `usersId` INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        `usersName` varchar(128) NOT NULL,
        `usersEmail` varchar(128) NOT NULL,
        `usersUid` varchar(128) NOT NULL,
        `usersPwd` varchar(128) NOT NULL
      )ENGINE=InnoDB DEFAULT CHARSET=utf8mb4";

    if (mysqli_query($conn, $sql)) {
        echo "<br>Trips table created successfully";
    } else {
        echo "<br>Error creating table: " . mysqli_error($conn);
    }
    // sql to create car table
    $sql = "CREATE TABLE rCars(
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        model VARCHAR(30) NOT NULL,
        color VARCHAR(30) NOT NULL,
        driver VARCHAR(30) NOT NULL,
        tierCode VARCHAR(50),
        availabilityCode BOOL,
        reg_date TIMESTAMP
    )";

    if (mysqli_query($conn, $sql)) {
        echo "<br>carTable created successfully";
    } else {
        echo "<br>Error creating table: " . mysqli_error($conn);
    }
    // echo("<br>");
    // sql to create trips table
    // rideDate format: YYYY-MM-DD HH:MI:SS
    $sql = "CREATE TABLE rTrips(
        tripId INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        userId VARCHAR(30),
        carId VARCHAR(30) NOT NULL,
        origin VARCHAR(30) NOT NULL,
        dest VARCHAR(30) NOT NULL,
        distance INT(6) NOT NULL,
        tier VARCHAR(30) NOT NULL,
        price INT(6),
        rideDate DATETIME,
        dateOfTransaction TIMESTAMP
    )";
    
    if (mysqli_query($conn, $sql)) {
        echo "<br>Trips table created successfully";
    } else {
        echo "<br>Error creating table: " . mysqli_error($conn);
    }

     // sql to create ITEMS table
     $sql = "CREATE TABLE items(
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        item VARCHAR(30) NOT NULL,
        store_name VARCHAR(30) NOT NULL,
        address VARCHAR(150) NOT NULL,
        price DECIMAL(20,2),
        reg_date TIMESTAMP
    )";

    if (mysqli_query($conn, $sql)) {
        echo "<br>items created successfully";
    } else {
        echo "<br>Error creating table: " . mysqli_error($conn);
    }

    mysqli_close($conn);

?>
