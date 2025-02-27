<?php 
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Ensure that the required data is set
    if (isset($_POST['flightID'], $_POST['pvm'], $_POST['lennonAjankohta'], $_POST['kohdeKaupunki'], $_POST['lippujenMaara'])) {

        $servername = "localhost";
        $username = "admin";
        $password = "1d100tt1AR!";
        $dbname = "lennotwpdp";

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Get data from the POST request
        $flightID = $_POST['flightID'];
        $pvm = $_POST['pvm']; // Date
        $lennonAjankohta = $_POST['lennonAjankohta']; // Time
        $kohdeKaupunki = $_POST['kohdeKaupunki']; // Destination city
        $lippujenMaara = $_POST['lippujenMaara']; // Number of tickets

        // Set 'Wherefrom' to be Tikkakoski since it's the departure city
        $wherefrom = 'Tikkakoski'; // Change this to whatever is the correct departure city for the user

        // SQL query to insert the booking data into 'haku' table
        $sql = "INSERT INTO haku (LentoID, Wherefrom, Whereto, passengers, date, time)
                VALUES (?, ?, ?, ?, ?, ?)";

        // Prepare statement
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ississ", $flightID, $wherefrom, $kohdeKaupunki, $lippujenMaara, $pvm, $lennonAjankohta);

        // Execute the query
        if ($stmt->execute()) {
            // If the insert is successful, return the new hakuID in JSON format
            $hakuID = $conn->insert_id;
            echo json_encode(['success' => true, 'hakuID' => $hakuID]);
        } else {
            // If there was an error, return an error message
            echo json_encode(['success' => false]);
        }

        // Close connection
        $stmt->close();
        $conn->close();
    } else {
        // Missing data, return an error
        echo json_encode(['success' => false]);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../all.css">
    <title>JC-Airlines</title>
    <link rel="icon" type="image/x-icon" href="../pictures/logo.png">
</head>
<body onload="loadUserInputs()">

<header>
    <img src="../pictures/logo+name.png" alt="logo and name" href="index.php">
    <div class="menu">
        <a class="menuitem" href="../help/help.php">Help</a>
        <a class="menuitem" href="../company/company.php">Company</a>
        <a class="menuitem" href="../shops&dining/s&d.php">Shops & Dining</a>
        <a class="menuitem" href="../flights/flights.php">Flights</a>
    </div>
</header>

<div class="bg">
    <div class="containerwhite">
        <form id="bookingForm" action="" method="POST" class="flightsearch" onsubmit="storeUserInputs()">
            <div class="row">
                <div class="collumn-fs">
                    <p class="theText">* From: </p>
                    <select name="from" id="Lähtö" class="inputs" required>
                        <option value="" disabled selected>Select your option</option>
                        <option value="Tikkakoski">Tikkakoski</option>
                    </select>
                    <p class="theText">* To: </p>
                    <select name="to" id="Kaupunki" class="inputs" required>
                        <option value="" disabled selected>Select your option</option>
                        <option value="Oulu">Oulu</option>
                        <option value="Helsinki">Helsinki</option>
                        <option value="Rovaniemi">Rovaniemi</option>
                        <option value="Oslo">Oslo</option>
                        <option value="Bergen">Bergen</option>
                        <option value="Arlanda">Arlanda</option>
                        <option value="Göteborg">Göteborg</option>
                        <option value="Keflaki">Keflaki</option>
                        <option value="Malmö">Malmö</option>
                        <option value="Trondheim">Trondheim</option>
                        <option value="Billund">Billund</option>
                        <option value="Kööpenhamina">Kööpenhamina</option>
                    </select>
                </div>
                <div class="collumn-fs">
                    <p class="theText">* Date: </p>
                    <input type="date" id="whenD" name="whenD" class="inputs" required>
                    <p class="theText">* Time: </p>
                    <input type="time" id="whenT" name="whenT" class="inputs" required>
                </div>
                <div class="collumn-fs">
                    <p class="theText">* Passengers: </p>
                    <input type="number" id="passenger" name="passenger" class="inputs" min="1" required>
                </div>
            </div>
            <div class="row">
                <div class="collumn-fs2">
                    <input type="submit" id="submit" class="SUBMIT" value="Find Flights">
                </div>
            </div>
        </form>

        <div id="flightResults" style="display: block;">
            <?php
                $servername = "localhost";
                $username = "admin";
                $password = "1d100tt1AR!";
                $dbname = "lennotwpdp";

                // Create connection
                $conn = new mysqli($servername, $username, $password, $dbname);

                // Check connection
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                // Get user inputs for flight search
                if (isset($_POST['to'], $_POST['whenD'], $_POST['whenT'], $_POST['passenger'])) {
                    $to = $_POST['to'];
                    $whenD = $_POST['whenD'];
                    $whenT = $_POST['whenT'];
                    $passengers = $_POST['passenger'];

                    // SQL query to fetch flights based on the search criteria
                    $sql = "SELECT LentoID, Kohdemaa, Kaupunki, Aika, Kone, LipunHinta, VapaatPaikat 
                            FROM lennot 
                            WHERE Kaupunki = ?";

                    // Prepare statement
                    $stmt = $conn->prepare($sql);
                    $stmt->bind_param("s", $to); // Filter based on destination city

                    // Execute and fetch the results
                    $stmt->execute();
                    $result = $stmt->get_result();

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            $departureTime = date('H:i', strtotime($row["Aika"])); // Format time
                            $departureDate = date('l, F j', strtotime($whenD)); // Format date
                            $flightID = $row["LentoID"];
                            $price = $row["LipunHinta"];
                            $seats = $row["VapaatPaikat"];

                            // Output flight information
                            echo "<div class='flight-results'>
                                    <div class='flight-listing'>
                                        <div class='flight-info'>
                                            <p>$departureTime $departureDate Tikkakoski</p>
                                            <p>$departureTime $departureDate $to</p>
                                        </div>
                                        <div class='flight-details'>
                                            <p>Time of departure: $departureTime</p>
                                            <p>Available seats left: $seats</p>
                                        </div>
                                        <div class='flight-company'>
                                            <p>JC-Airlines (Takes approx 2 hours)</p>
                                            <p class='details'>Details and upgrades</p>
                                        </div>
                                        <div class='flight-price'>
                                            <p>€$price</p>
                                            <button class='viewDeal' data-flight-id='$flightID' onclick='openOverlay(event)'>Choose Deal ></button>
                                        </div>
                                    </div>
                                </div>";
                        }
                    } else {
                        echo "<p>No flights found matching your criteria.</p>";
                    }

                    // Close connection
                    $stmt->close();
                }

                // Close connection
                $conn->close();
            ?>
        </div>

    </div>
</div>

<!-- The overlay popup -->
<div id="overlay" style="display: none;">
    <div id="text">Continue</div>
    <button onclick="off()">No</button>
    <form id="bookingForm" method="POST" action="">
        <input type="hidden" id="flightID" name="flightID">
        <input type="hidden" id="pvm" name="pvm">
        <input type="hidden" id="lennonAjankohta" name="lennonAjankohta">
        <input type="hidden" id="kohdeKaupunki" name="kohdeKaupunki">
        <input type="hidden" id="lippujenMaara" name="lippujenMaara">
        <button type="submit" onclick="submitBooking()">Yes</button>
    </form>
</div>

</body>
<footer>
    <div class="row">
      <div class="column">
        <img src="../pictures/logo+name.png" alt="logo and name" style="height: auto;width: 90%;">
        <h3>Contact</h3>
        <img src="../pictures/call_us.png" style="float: left">
        <p name="phoneNumb" id="phoneNumb">+354 08433443</p>
        <br>
        <img src="../pictures/where.png" style="float: left">
        <p name="where" id="where">Tikkakoski, Finland</p>
      </div>
      <div class="column" style="text-align: center;">
        <h3>Discover</h3>
        <p href="../flights/flights.php">Flights</p>
        <p href="../shops&dining/s&d.php">Shops</p>
        <p href="../shops&dining/s&d.php">Dining</p>
      </div>
      <div class="column" style="text-align: center;">
        <h3>Company</h3>
        <p href="../company/company.php">History</p>
        <p href="../company/company.php">Planes</p>
        <p href="../company/company.php">Awards</p>
      </div>
      <div class="columnr">
        <p>© 2024 – JC-Airlines</p>
      </div>
    </div>
</footer>
</html>
