<html>
    <head>
        <title>Ride And Deliver - Service A</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <!-- <link rel="stylesheet" href="style.css"> -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="maps.js"></script>
    </head>
    <body>
    <nav>
        <?php include 'navigation.php';?>
    </nav>


<table class="table table-striped" id="car-table">
        <caption>Pick one of the available rides:</caption>
    <thead class="thead-dark">
        <tr>
        <th scope="col">Car ID</th>
        <th scope="col">Model</th>
        <th scope="col">Tier</th>
        <th scope="col">Price</th>
        </tr>
    </thead>
    <tbody>
        <tr>
        <th scope="row">
            <div class="radio">
                <label><input type="radio" id='regular' name="optradio">' . $row['id'] . '</label>
            </div>
        </th>
        <td>toyota</td>
        <td>econ</td>
        <td></td>
        </tr>
    </tbody>
</table>

<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCIumcSOTeP890tfGtNPajH0WmErIjAgcM&map_ids-6789a6679abe1ef1&callback=initMap"></script>
    <!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </body>
</html>