<html>
    <head>
        <title>Ride and Deliver</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="css/delivery.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
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
                        <h2>Services</h2>
                                <div class="col-sm">
                                    <input type="radio" name="choice" id="choose-1" value="111 Victoria St, Toronto, ON M5C 2M6" onclick="btnfunction()"/>
                                        <label for="choose-1">
                                        <a class="shops" href="carTowing.php"><img src="source/car-towing.jpg" width="300px;"></a>
                                    </label>
                                    <h5>Car Towing</h5>
                                </div>
                                <div class="col-sm">
                                    <!-- <input type="radio" name="choice" id="choose-2" value="106 Mutual St Unit 8, Toronto, ON M5B 2R7" onclick="btnfunction()"/> -->
                                        <!-- <label for="choose-2"> -->
                                        <a class="shops" href="carRepair.php"><img src="source/car-repair.jpg" width="300px;"></a>
                                    </label>
                                    <h5>car Repair</h5>
                                </div>
                                <div class="col-sm">
                                <input type="radio" name="choice" id="choose-3" value="50 Gould St, Toronto, ON M5B 2K3" onclick="btnfunction()"/>
                                        <label for="choose-3">
                                        <a class="shops" href="carRefueling.php"><img src="source/car-refueling.jpg" width="300px;"></a>
                                    </label>
                                    <h5>car Refueling</h5>
                                </div>
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
           
            <div id="show-car-table"></div>
            <div id="price"></div>
        </div> 
        <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA5gMo00Z55NS7LLLlM6vTaSP4hS18i_bo&libraries=places&map_ids-6789a6679abe1ef1&callback=initMap"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    </body>
</html>