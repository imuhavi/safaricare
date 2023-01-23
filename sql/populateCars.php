<?php
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

    $sql = "INSERT INTO rCars (model, color, driver, tierCode, availabilityCode)
        VALUES 
        ('2006 Fiat Ducato', 'blue', 'Delmar Barker', 'xl', 1),
        ('2006 Toyota Avensis', 'purple', 'Justin Selleck', 'econ', 1),
        ('2014 Toyota RAV4', 'white', 'Marian Wilson', 'econ', 1),
        ('2007 Mitsubishi Colt','black','Clifford Richards', 'econ', 1),
        ('2014 Toyota Sienna', 'silver', 'Faustina Raya ', 'xl', 1),
        ('2014 Honda Odyssey', 'silver', 'Alegra Carbajal', 'xl', 1),
        ('2015 Mitsubishi Outlander', 'black', 'Umar Bata', 'xl', 1),
        ('2018 Audi A8L', 'silver', 'Brett Shin', 'premium', 1),
        ('2018 BMW 7 Series', 'black', 'Samuel Freeman', 'premium', 1),
        ('2018 Genesis G90 5.0 Ultimate', 'black', 'Chang Wu', 'premium', 1),
        ('2018 Infiniti Q70L', 'silver', 'Beck Ginyard', 'premium', 1),
        ('2020 Subaru Impreza', 'red', 'Tracy Ware', 'econ', 1),
        ('2017 Volkswagen Jetta', 'white', 'Norma G. Grace', 'econ', 1),
        ('2014 Dodge Caravan', 'white', 'Lian Tang', 'xl', 1),
        ('2018 Lincoln Continental', 'red', 'Kazim Totah', 'premium', 1)";


    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }


?>
