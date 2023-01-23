<html>
    <head>
        <title>Ride To Destination - Service A</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="js/dbMaintain.js"></script>
    </head>
    <body>
    <nav>
        <?php include 'navigation.php';?>
    </nav>

        <form id="mode-select">
            <!-- <p>Please select a tier:</p> -->
            <select class="form-select" aria-label="Default select example" name="users" onchange="" id="">
                <option value="">Select a DB mode:</option>
                <option value="delete">Delete</option>
                <option value="insert">Insert</option>
            </select>
        </form>

        <input type="text" id="opOnId" placeholder="ID of record to delete">
        <br>

        <form id="table-select">
            <!-- <p>Please select a tier:</p> -->
            <select class="form-select" aria-label="Default select example" name="users" onchange="dbView(this.value)" id="mode">
                <option value="">Select a DB Table:</option>
                <option value="items">Item Records</option>
                <option value="rcars">Car Records</option>
            </select>
        </form>

        <div id="show-table"></div>
        <div id="operation-status"></div>


    <!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </body>
</html>