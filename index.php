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

    <?php
        if(isset($_SESSION["userid"])){
                echo "<h1>Welcome " . $_SESSION["userid"] . " to Plan for Smart Services!</h1>";
            }
        else{
            //if not logged in
            echo "<h1><center>Welcome to Plan for Smart Services!<center></h1>";
        }
    ?>

    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <a class="shops" href="rideAndDeliv.php"><img src="source/request-service.png" width="300px;"></a>
                <h3>Request service</h3>
            </div>
            <div class="col-sm-6 other">
                <a class="shops" href="rideToDest.php"><img src="source/browse-components.png" width="350px;"></a>
                <h3>Browse Components</h3>
            </div>
        </div>
    </div>

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
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </body>
</html>