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
    <div class="gap" method="get" action="carRepair.php"></div>

    

    <div class="container" width:100%>
        <div class="row">
            <div class="col-sm-6">
                <a class="shops" href="pendingServices.php"><img src="source/wheelbalancing.jpg" width="300px;"></a>
                <h3>Wheel Balancing</h3>
            </div>
            <div class="col-sm-6 other">
                <a class="shops" href="pendingServices.php"><img src="source/airfilterchange.jpg" width="350px;"></a>
                <h3>Air Filter change</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <a class="shops" href="pendingServices.php"><img src="source/oilfilterchange.jpg" width="300px;"></a>
                <h3>Oil Filter change</h3>
            </div>
            <div class="col-sm-6 other">
                <a class="shops" href="pendingServices.php"><img src="source/puncturerepair.jpg" width="350px;"></a>
                <h3>Puncture repair</h3>
            </div>
        </div>
            <div class="row">
            <div class="col-sm-6">
                <a class="shops" href="pendingServices.php"><img src="source/enginerepair.jpg" width="300px;"></a>
                <h3>Engine repair</h3>
            </div>
            <div class="col-sm-6 other">
                <a class="shops" href="pendingServices.php"><img src="source/brakesrepair.jpg" width="350px;"></a>
                <h3>Brakes repair</h3>
            </div>
        </div>
    </div>

    <div class="div-car">
        <a class="ride" href="rideToDest.php">
        <img src="https://res.cloudinary.com/softcom/image/upload/v1559750356/CLP/test-car.jpg" class="car"></a>
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
