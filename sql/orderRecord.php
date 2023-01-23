<?php
  if(!isset($_SESSION)) 
  { 
      session_start(); 
  } 
    $json = $_POST['json'];

    $data = json_decode($json, true);
    // $userId = $data["userId"];
    $itemId = $data["itemInfo"]["itemId"];
    $origin = $data["itemInfo"]["pickup"];
    $dest = $data["destination"];
    $item = $data["itemInfo"]["item"];
    // $driver = $data["carInfo"]["driver"];
    $storename = $data["storename"];
    echo "here is store name";
    echo $storename;
    $price = $data["itemInfo"]["price"];

    if(isset($_SESSION["userid"])){
        $userId = $_SESSION["userid"];
    }
    else{
        //if not logged in
        $userId = "";
    }

    //echo "USER ID IS " . $userId, $itemId, $storename, $origin, $dest, $distance, $item, $price;
    //$itemId, $storename, $origin, $dest, $distance, $item, $price;


    $servername = "localhost";
    $username = "admin";
    $password = "Adg00jad@?!";";
    $dbname = "project";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "INSERT INTO orders (userId, itemId, store_name, store_address, dest, item, price)
    VALUES ('$userId', '$itemId', '$origin', '$storename', '$dest', '$item', '$price')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
?>
