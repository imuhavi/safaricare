<html>
    <head>
        <title>Ride To Destination - Service A</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="css/rideToDest.css">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <!-- <script src="js/maps.js"></script> -->
        <script src="js/rideToDest.js"></script>
    </head>
    <body>
    <nav>
        <?php include 'navigation.php';?>
    </nav>

    <div class="container-fluid">
        <div class="row"> 
            <div class="col-sm-4">
                <div id="top-left-side">
                    <div>
                        <h2 id="main-r2d-header">Ride to Destination:</h2>
                    </div>
                    <div id="form">
                        <div id="pickup-location">
                            <div id="origin-container"> 
                                <input type="text" name="origin" id="origin" placeholder="Enter Pickup Location">
                                <button type="button" id="find-me" class="btn btn-secondary btn-sm">Find me</button>
                            </div>
                            <input type="text" name="destination" id="destination" placeholder="Enter Destination">
                        </div>
                        <h5 id="date-header">
                            Schedule a date:</h5>
                        <div id="pickup-time">
                            <label for="date"></label>
                                <input type="date" name="date" id="date">
                            <label for="time"></label>
                                <input type="time" name="time" id="time" >
                        </div>
                        <button type="button" id="show-map" class="btn btn-secondary" >Show map</button>
                    </div>
                </div>
                <div id="post-map-text"> 
                    <!-- <div id="status"></div> -->
                </div>
            </div>
            <div class="col-sm-8" id="map"></div>
        </div>
        <!-- TABLE -->
        <hr class="dashed">

        <div class="row">
            <div class="col-sm-4">
                <h5 id="status"></h5>
                <div id="bottom-left-table">
                    <form id="tier-select">
                        <!-- <p>Please select a tier:</p> -->
                        <select class="form-select" aria-label="Default select example" name="users" onchange="showTable(this.value), setPrice()" id="tier">
                            <option value="">Select a Tier:</option>
                            <option value="econ">Economy (4 seater)</option>
                            <option value="xl">XL (6+ seater)</option>
                            <option value="premium">Premium (4 seater luxury) <option>
                        </select>
                    </form>
                    <div id="price-duration-container">
                        <div id="price">
                            Price: <div id="price-value"></div>
                        </div>
                        <div id="distance">
                            Distance: <div id="distance-value"></div>
                        </div>
                        
                        <div id="duration">
                            Trip duration: <div id="duration-value"></div>
                        </div>
                    </div>
                    <button class="btn btn-secondary" id="checkout">To Payment</button>

                </div>
            </div>
            <div class="col-sm-8" id="show-car-table"></div>
        </div>
    </div>
    
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA5gMo00Z55NS7LLLlM6vTaSP4hS18i_bo&libraries=places&map_ids-6789a6679abe1ef1&callback=initMap"></script>
    <!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </body>
</html>