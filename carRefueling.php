<?php 
    //$tier = $_GET['q'];

    $servername = "localhost";
   $username = "admin";
    $password = "adg00jad";
    $dbname = "project";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    
?>
<html>
    <head>
        <title>Fuel Stations</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="css/delivery.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="js/maps1.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
        <style>
/* Center the loader */
#loader {
  position: absolute;
  left: 50%;
  top: 25%;
  z-index: 1;
  width: 150px;
  height: 150px;
  margin: -75px 0 0 -75px;
  border: 16px solid #f3f3f3;
  border-radius: 50%;
  border-top: 16px solid #00ff00;
  -webkit-animation: spin 2s linear infinite;
  animation: spin 2s linear infinite;
}

@-webkit-keyframes spin {
  0% { -webkit-transform: rotate(0deg); }
  100% { -webkit-transform: rotate(360deg); }
}

@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}


</style>
    </head>
    <body>
        <nav>
            <?php include 'navigation.php';?>
        </nav>
        <div class="container-fluid">
            <div class="row">
                <div class="container">
                    <form id="store-selector" onchange="test(this.value)">
                        <div class="row p-3" id="pictures">
                        <h2>Fuel Stations Near You </h2>
                        <p class="text-center"> 


</p> 
                        </div>
                    </form>
                </div>
            </div>
            <div class="row">
                <div class="col-4" id="top-left">
                    <div id="form">
                        <div id="pickup-location"> <h4>Where are you:</h4>
                            <input class="form-control" type="text" name="origin" id="origin" placeholder="your location">
                            <button id="find-me" class="btn btn-dark m-1" >Find me</button>
    
                            <button type="button" class="btn btn-dark  m-1" id="show-map">Search</button>
                            <div class="words">
                                <div id="status"></div>
                                <div id="radius"></div>
                                <button class="btn btn-dark  m-1" id="showit">Show Fuel Stations Near You</button>
                            </div> 
                        </div>
                    </div>
                </div>
                <div class="col-8">
                    <div id="map"></div>
                </div>
            </div>
         
            <br>
            <br>
           
            <div class="col-sm-8" id="myform" style="display:none">
                <?php
                // $sql = "SELECT * FROM `rcars` WHERE `tierCode` = $tier";
    $sql = 'SELECT * FROM `items` WHERE  `item` = "Car fueling" LIMIT 5';
    // ERROR IS HERE ^^^^^^^^^^^^^^^^^^
    $result = $conn->query($sql) or die($conn->error);

    if ($result->num_rows > 0) {
        echo'
        <form method="POST" action="pendingServices.php">
        <table class="table table-striped" id="fueling-table">
        <thead class="thead-dark">
            <tr>
                <th scope="col"></th>
                <th scope="col">Provider ID</th>
                th scope="col">Name</th>
                <th scope="col">Address</th>
                <th scope="col">Price</th>
            </tr>
        </thead>
        <tbody>';

        // output data of each row
        $inc = 1; 
        echo "<form name='waz' action='pendingServices.php' method='post'>";
        while($row = $result->fetch_assoc()) {
            echo'<tr>
            <td><input type="checkbox" name="name['.$row['id'].']" value="<?php echo '.$row['id'].' ?>"/></td>
            
                <td>' . $row['id'] . '</td>
                <td>' . $row['store_name'] . '</td>
                <td>' . $row['address'] . '</td>
                <td>' . $row['price'] . '</td>
                
            </tr>'.$row['id'];
            $inc += 1;
            
        } 
        
        echo ' </tbody>
                </table>';
    }else {
        echo "0 results";
    }
    echo "<input type='submit' name='submit' value='Request Fuel'/>";
    echo "</form>";
    mysqli_close($conn);
                ?>
            </div>
            <div id="price"></div>
            


<

</form></p>

        </div> 
        <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA5gMo00Z55NS7LLLlM6vTaSP4hS18i_bo&libraries=places&map_ids-6789a6679abe1ef1&callback=initMap"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <script>
   $(function(){
   $('button#showit').on('click',function(){  
      $('#myform').show();
   });
});
    </script>


    </body>
</html>
