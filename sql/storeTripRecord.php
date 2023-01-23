<?php
  if(!isset($_SESSION)) 
  { 
      session_start(); 
  } 

    $json = $_POST['json'];

    $data = json_decode($json, true);
    // $userId = $data["userId"];
    $carId = $data["carInfo"]["carId"];
    $origin = $data["pickup"];
    $dest = $data["destination"];
    $distance = $data["distance"];
    $carModel = $data["carInfo"]["carModel"];
    // $driver = $data["carInfo"]["driver"];
    $price = $data["price"];
    // $tripTime = $data["tripTime"];
    $date = $data["date"]["date"];
    $time = $data["date"]["time"];
    $rideDate = $date . " " . $time . ":00";
    $tier = $data["tier"];

    if(isset($_SESSION["userid"])){
        $userId = $_SESSION["userid"];
    }
    else{
        //if not logged in
        $userId = "";
    }

    //echo $userId, $carId, $origin, $dest, $distance, $tier, $price, $rideDate;


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

    $sql = "INSERT INTO rTrips (userId, carId, origin, dest, distance, tier, price, rideDate)
    VALUES ('$userId', '$carId', '$origin', '$dest', '$distance', '$tier', '$price', '$rideDate')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
?>
