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
        <title>Payment</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="css/payment.css">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:ital,wght@0,200;0,300;0,400;0,600;0,700;0,900;1,200;1,300;1,400;1,600;1,700;1,900&display=swap" rel="stylesheet"> 
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <!-- <script src="js/maps.js"></script> -->
        <script src="js/itemsPayment.js"></script>
    </head>
    <body>
        <nav>
            <?php include 'navigation.php';?>
        </nav>

        <!-- PAYMENT
     -->
        <div class="container py-5">
            <div class="row mb-4">
                <div class="col-lg-8 mx-auto text-center">
                    <h1 id="payment-header" class="display-4">Proceed to Checkout</h1>
                </div>
            </div> <!-- End -->
            <div class="row">
                <div class="col-12 col-md-8" id="payment">
                    <div class="card">
                        <div class="card-header">
                            <div class="bg-white shadow-sm pt-4 pl-2 pr-2 pb-2">
                                <!-- Credit card form tabs -->
                                <ul role="tablist" class="nav bg-light nav-pills rounded nav-fill mb-3">
                                    <li class="nav-item"> <a data-toggle="pill" href="#credit-card" class="nav-link active "> <i class="fas fa-credit-card mr-2"></i> Credit Card </a> </li>
                                    <li class="nav-item"> <a data-toggle="pill" href="#paypal" class="nav-link "> <i class="fab fa-paypal mr-2"></i> M-PESA </a> </li>
                                    <li class="nav-item"> <a data-toggle="pill" href="#net-banking" class="nav-link "> <i class="fas fa-mobile-alt mr-2"></i> Net Banking </a> </li>
                                </ul>
                            </div> <!-- End -->
                            <!-- Credit card form content -->
                            <div class="tab-content">
                                <!-- credit card info-->
                                <div id="credit-card" class="tab-pane fade show active pt-3">
                                    <form role="form">
                                        <div class="form-group"> <label for="username">
                                                <h6>Card Owner</h6>
                                            </label> <input type="text" name="username" placeholder="Card Owner Name" required class="form-control "> </div>
                                        <div class="form-group"> <label for="cardNumber">
                                                <h6>Card number</h6>
                                            </label>
                                            <div class="input-group"> <input type="text" name="cardNumber" placeholder="Valid card number" class="form-control " required>
                                                <div class="input-group-append"> <span class="input-group-text text-muted"> <i class="fab fa-cc-visa mx-1"></i> <i class="fab fa-cc-mastercard mx-1"></i> <i class="fab fa-cc-amex mx-1"></i> </span> </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-8">
                                                <div class="form-group"> <label><span class="hidden-xs">
                                                            <h6>Expiration Date</h6>
                                                        </span></label>
                                                    <div class="input-group"> <input type="number" placeholder="MM" name="" class="form-control" required> <input type="number" placeholder="YY" name="" class="form-control" required> </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group mb-4"> <label data-toggle="tooltip" title="Three digit CV code on the back of your card">
                                                        <h6>CVV <i class="fa fa-question-circle d-inline"></i></h6>
                                                    </label> <input type="text" required class="form-control"> </div>
                                            </div>
                                        </div>
                                        <div class="card-footer"> <button type="button" class="subscribe btn btn-primary btn-block shadow-sm" id="confirm-pay"> Confirm Payment </button>
                                    </form>
                                </div>
                            </div> <!-- End -->
                            <!-- M-Pesa -->
                            <div id="paypal" class="tab-pane fade pt-3">
                                <h6 class="pb-2">Enter number and amount</h6>
                                <form method ="POST" action="transactions.php" id="paymentform">
                                        <div class = "top-box"></div>
                                        <?php
                                        if(isset($_GET['info'])){
                                            echo $_GET['info'];
                                        }
                                        ?>
                                        <div class="form-group"> <label for="username">
                                                <h6>Phone number</h6>
                                            </label> <input type="text" name="phonenumber" placeholder="07xxxxxxxx" required class="form-control "> </div>
                                        <div class="form-group"> <label for="cardNumber">
                                                <h6>Amount</h6>
                                            </label>
                                            <div class="input-group"> <input type="text" name="amount" placeholder="0.00" class="form-control " required>
                                                <div class="input-group-append"> <span class="input-group-text text-muted"> <i class="fab fa-cc-visa mx-1"></i> <i class="fab fa-cc-mastercard mx-1"></i> <i class="fab fa-cc-amex mx-1"></i> </span> </div>
                                            </div>
                                        </div>
                                        <button type="submit" class="subscribe btn btn-primary btn-block shadow-sm" name="pay"> Make Payment </button>
                                 </form>
                            </div> <!-- End -->
                            <!-- bank transfer info -->
                            <div id="net-banking" class="tab-pane fade pt-3">
                                <div class="form-group "> <label for="Select Your Bank">
                                        <h6>Select your Bank</h6>
                                    </label> <select class="form-control" id="ccmonth">
                                        <option value="" selected disabled>--Please select your Bank--</option>
                                        <option>Bank 1</option>
                                        <option>Bank 2</option>
                                        <option>Bank 3</option>
                                        <option>Bank 4</option>
                                        <option>Bank 5</option>
                                        <option>Bank 6</option>
                                        <option>Bank 7</option>
                                        <option>Bank 8</option>
                                        <option>Bank 9</option>
                                        <option>Bank 10</option>
                                    </select> </div>
                                <div class="form-group">
                                    <p> <button type="button" class="btn btn-primary "><i class="fas fa-mobile-alt mr-2"></i> Proceed Pyment</button> </p>
                                </div>
                                <p class="text-muted">Note: After clicking on the button, you will be directed to a secure gateway for payment. After completing the payment process, you will be redirected back to the website to view details of your order. </p>
                            </div> <!-- End -->
                        </div>
                    </div>    
                </div>
                </div>
                <div class="col-6 col-md-4" id="summary">
                    <div class="card" id="summary-card">
                        <div class="card-body">
                            <h5 class="card-title">Purchase Summary</h5>
                            <p class="card-text" >By placing your order, you agree to our privacy notice and conditions of use.</p>
                        </div>
                        <ul class="list-group list-group-flush">
                            <?php
                                if(isset($_SESSION["userid"])){
                                    echo "<li class='list-group-item' id='userId'>User ID: <div class='value'>" . $_SESSION["userid"] ."</div></li>";
                                }
                                else{
                                    //if not logged in
                                    echo "<li class='list-group-item' id='userId'>User ID: <div class='value'>None, Please Login! </div></li>";
                                }
                                
                                // $sql = "SELECT * FROM `rcars` WHERE `tierCode` = $tier";
                                //  echo $id;
                                //  die();
                    $sql = "SELECT * FROM items WHERE  id = '$id' ";
                    // ERROR IS HERE ^^^^^^^^^^^^^^^^^^
                    $result = $conn->query($sql) or die($conn->error);
                
                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            $provider=$row['store_name'];
                            $address=$row['address'];
                            $price=$row['price'];
                        }
                    }
                        else{
                            echo "0 results";
                        }
                    
                            ?>
                        
                            <!-- <li class="list-group-item" >User ID: <div id="userId"></div></li> -->
                            <li class="list-group-item">Service provider: <div><?php echo $provider ?></div></li>
                            <!-- <li class="list-group-item">Destination: <div class="value" id="destination"></div></li> -->
                            <!-- <li class="list-group-item">Service ID: <div class="value" id="r"></div></li> -->
                           <!-- <li class="list-group-item">Service: <div class="value" id="item"></div></li> -->
                            <li class="list-group-item">Service provider Address: <div><?php echo $address ?></div></li>
                            <li class="list-group-item">Price: <div ><?php echo $price ?></div></li>
                        </ul>
                        <!-- <div class="card-body">
                            <a href="#" class="card-link">Card link</a>
                            <a href="#" class="card-link">Another link</a>
                        </div> -->
                    </div>  
                </div>
                <!-- <div id="payment-status"></div> -->
            </div>
        </div>

  
        <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCIumcSOTeP890tfGtNPajH0WmErIjAgcM&libraries=places&map_ids-6789a6679abe1ef1"></script>
        <!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script> -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </body>
</html>
