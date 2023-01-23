<?php 
    $address = $_GET['q'];

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
    // $sql = "SELECT * FROM `rcars` WHERE `storeCode` = $store";
    $sql = 'SELECT * FROM `items` WHERE `address` = "' . $address . '"';
    // ERROR IS HERE ^^^^^^^^^^^^^^^^^^
    $result = $conn->query($sql) or die($conn->error);

    if ($result->num_rows > 0) {
        echo'
        
        <table class="center"; cellpadding="4"; cellspacing:"100"; text-align:"center" id="car-table";>
            <tr>
                <th></th>
                <th>Item ID</th>
                <th>Item</th>
                <th>Store</th>
                <th>Price</th>
            </tr>';

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
                </table>
                <button class="checkout" onclick="infoForPayment()"><a href="paymentItems.php">Proceed to Checkout</a></button>';
    }else {
        echo "0 results";
    }
    mysqli_close($conn);
    // <button class="show-price" onclick="infoForPayment()">log price</button>
?>
