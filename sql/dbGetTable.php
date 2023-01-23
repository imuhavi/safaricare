<?php 
    $table = $_GET['q'];

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
    // $sql = "SELECT * FROM `rcars` WHERE `tierCode` = $tier";
    // if ($mode == 'delete'){
    //     $sql = 'SELECT * FROM `rcars` WHERE 1 AND `tierCode` = "' . $tier . '" LIMIT 5';
    // }

    $sql = 'SELECT * FROM `'. $table .'`';

    // ERROR IS HERE ^^^^^^^^^^^^^^^^^^
    $result = $conn->query($sql) or die($conn->error);

// CARS
    if ($table == 'rcars'){
        if ($result->num_rows > 0) {
            echo'
            <table class="table table-striped" id="car-table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col"></th>
                    <th scope="col">Car ID</th>
                    <th scope="col">Model</th>
                    <th scope="col">Color</th>
                    <th scope="col">Service Tier</th>
                    <th scope="col">Driver</th>
                </tr>
            </thead>
            <tbody>';

            // output data of each row
            $inc = 1; 
            while($row = $result->fetch_assoc()) {
                echo'<tr>
                <th scope="row">
                <div class="radio">
                    <label><input type="radio" id="r' . strval($inc) . '" name="rowSelect" value="' . strval($inc) . '"></label>
                </div></th>
                    <td>' . $row['id'] . '</td>
                    <td>' . $row['model'] . '</td>
                    <td>' . $row['color'] . '</td>
                    <td>' . $row['tierCode'] . '</td>
                    <td>' . $row['driver'] . '</td>
                </tr>';
                $inc += 1;
            } 
            echo ' </tbody>
                    </table>';
        }else {
            echo "0 results";
        }
    }

    // ITEMS
    elseif ($table == 'items'){
        if ($result->num_rows > 0) {
            echo'
            <table class="table table-striped" id="car-table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col"></th>
                    <th scope="col">Item ID</th>
                    <th scope="col">Item</th>
                    <th scope="col">Store</th>
                    <th scope="col">Price</th>
                </tr>
            </thead>
            <tbody>';

            // output data of each row
            $inc = 1; 
            while($row = $result->fetch_assoc()) {
                echo'<tr>
                <td scope="row">
                <div class="radio">
                    <label><input type="radio" id="r' . strval($inc) . '" name="rowSelect" value="' . strval($inc) . '"></label>
                </div></td>
                    <td>' . $row['id'] . '</td>
                    <td>' . $row['item'] . '</td>
                    <td>' . $row['store_name'] . '</td>
                    <td>' . $row['price'] . '</td>
                </tr>'; 
                $inc += 1;
            } 
            echo ' </tbody>
                    </table>';
        }else {
            echo "0 results";
        }
    }
    mysqli_close($conn);
?>
