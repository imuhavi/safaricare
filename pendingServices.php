<?php 
    //$tier = $_GET['q'];

    $servername = "localhost";
   $username = "admin";
    $password = "adg00jad";
    $dbname = "project";
  $id = $_GET['id'];
 
 
  
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    
?>
<html>
    <head>
        <title>Safaricare </title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="css/ridetoDest.css">
    </head>
    <body>
    <nav>
        <?php include 'navigation.php';?>
    </nav>
    <div class="gap"></div>
    <div>
 
        
        <br>
        
        <div class="col-sm-8" id="myform" >
        <?php
                // $sql = "SELECT * FROM `rcars` WHERE `tierCode` = $tier";
                //  echo $id;
                //  die();
                 if(isset($_POST['submit'])){

    if(isset($_POST['name'])){
   foreach($_POST['name'] as $key=>$value)
{
  echo $key;
}
      
    
}

}

    $sql = "SELECT * FROM items WHERE  id = '$key' ";
    // ERROR IS HERE ^^^^^^^^^^^^^^^^^^
    $result = $conn->query($sql) or die($conn->error);

    if ($result->num_rows > 0) {
        echo'
        <form method="POST">
        <table class="table table-striped" id="mechanic-table">
        <thead class="thead-dark">
            <tr> <th scope="col"></th>
                <th scope="col">Provider ID</th>
                <th scope="col">Provider Name</th>
                <th scope="col">Provider Email</th>
                <th scope="col">Provider Phone Number</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>';

        // output data of each row
        $inc = 1; 
        while($row = $result->fetch_assoc()) {
            
            echo ' '.$row['store_name']. '<p>will arrive shortly to your location</p>';
            ?>
            <h4>Contact information</h4>
            <?php
            echo'<tr>
            <td><input type="checkbox" name="id[]" value="<?php echo '.$row['id'].' ?>"/></td>
           	<td>' . $row['id'] . '</td>
                <td>' . $row['store_name'] . '</td>
                <td>' . $row['email'] . '</td>
                 <td>' . $row['phone'] . '</td>
                 echo"</td><td><a href="paymentItems.php?id='.$row[id].'">Checkout</a>
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
                
        <p></P>
    </div>
    <button class="btn btn-dark  m-1" id="showit">Confirm arrival</button>
    <br>
    
    
    <div class="div-car">
        <a class="ride" href="rideToDest.php">
        <img src="https://res.cloudinary.com/softcom/image/upload/v1559750356/CLP/test-car.png" class="car"></a>
        <div class="wheel1">
            <span>.</span>
            </div>
            <div class="wheel2">
            <span>.</span>
        </div>
    </div>
    <!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script> -->
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script> -->
       <script>
   $(function(){
   $('button#showit').on('click',function(){  
      $('#myform').show();
   });
});

    </script>
    </body>
</html>

