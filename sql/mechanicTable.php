<!-- <head>
    <style>
        table{
            100px;
        }
        </style>
</head> -->
<?php 
    $tier = $_GET['q'];

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "project";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    // $sql = "SELECT * FROM `rcars` WHERE `tierCode` = $tier";
    $sql = 'SELECT * FROM `items` WHERE  `item` = "Car repair" LIMIT 5';
    // ERROR IS HERE ^^^^^^^^^^^^^^^^^^
    $result = $conn->query($sql) or die($conn->error);

    if ($result->num_rows > 0) {
        echo'
        <table class="table table-striped" id="mechanic-table">
        <thead class="thead-dark">
            <tr>
                <th scope="col"></th>
                <th scope="col">Provider ID</th>
                <th scope="col">Address</th>
                <th scope="col">Phone</th>
                <th scope="col">Price</th>
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
                <td>' . $row['store_name'] . '</td>
                <td>' . $row['address'] . '</td>
            </tr>';
            $inc += 1;
        } 
        echo ' </tbody>
                </table>';
    }else {
        echo "0 results";
    }
    mysqli_close($conn);
?>