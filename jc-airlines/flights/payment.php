<?php
// Enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Database connection
$servername = "localhost";
$username = "admin";
$password = "1d100tt1AR!";
$dbname = "lennotwpdp";

// Create a connection to the database
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Query to fetch the latest row from the 'haku' table by the highest 'hakuID'
$sql = "SELECT * FROM haku ORDER BY hakuID DESC LIMIT 1";
$result = $conn->query($sql);

// Check if there is a result
if ($result->num_rows > 0) {
    // Fetch the data for the latest flight
    $row = $result->fetch_assoc();

    // Flight details
    $flightDetails = [
        'date' => $row['date'],
        'time' => $row['time'],
        'whereFrom' => $row['Wherefrom'],
        'whereTo' => $row['Whereto'],
        'passengers' => $row['passengers']
    ];
} else {
    // Default values if no flight data is found
    $flightDetails = [
        'date' => 'No flight data available',
        'time' => 'No flight data available',
        'whereFrom' => 'No flight data available',
        'whereTo' => 'No flight data available',
        'passengers' => '0'
    ];
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $pvm = $_POST['pvm'];
    $lennonAjankohta = $_POST['lennonAjankohta'];
    $kohdeKaupunki = $_POST['kohdeKaupunki'];
    $lippujenMaara = $_POST['lippujenMaara'];

    // Validate that the required fields are not empty
    if ($pvm && $lennonAjankohta && $kohdeKaupunki && $lippujenMaara) {
        // Insert the flight booking into the 'tilaus' table
        $sql_booking = "INSERT INTO tilaus (pvm, lennonAjankohta, kohdeKaupunki, lippujenMaara) 
                        VALUES (?, ?, ?, ?)";
        if ($stmt = $conn->prepare($sql_booking)) {
            $stmt->bind_param("sssi", $pvm, $lennonAjankohta, $kohdeKaupunki, $lippujenMaara);
            if ($stmt->execute()) {
                $tilausID = $stmt->insert_id; // Get the last inserted booking ID

                // Insert passenger data into 'tilaus_passengers'
                if (isset($_POST['passengers'])) {
                    $passengers = json_decode($_POST['passengers'], true); // Decode JSON string into PHP array
                    foreach ($passengers as $passenger) {
                        $sql_passenger = "INSERT INTO tilaus_passengers (tilausID, tilaajanNimi, tilaajanOsoite, tilaajanEmail, tilaajanPuhelin) 
                                          VALUES (?, ?, ?, ?, ?)";
                        if ($stmt_passenger = $conn->prepare($sql_passenger)) {
                            $stmt_passenger->bind_param("issss", $tilausID, $passenger['name'], $passenger['address'], $passenger['email'], $passenger['phone']);
                            $stmt_passenger->execute();

                            /*// Send confirmation email to passenger
                            $to = $passenger['email']; // Send email to passenger's email address
                            $subject = "Flight Booking Confirmation";
                            $txt = "Hello " . $passenger['name'] . "!\n\n" .
                                   "Your flight details are as follows:\n" .
                                   "PVM: " . $pvm . "\n" .
                                   "Lennon ajankohta: " . $lennonAjankohta . "\n" .
                                   "Kohde kaupunki: " . $kohdeKaupunki . "\n" .
                                   "Lippujen maara: " . $lippujenMaara . "\n";
                            $headers = "From: JC-airlines@example.com" . "\r\n" .
                                       "CC: somebodyelse@example.com";

                            if (mail($to, $subject, $txt, $headers)) {
                                echo "Booking successfully made and confirmation email sent to " . $passenger['email'] . "!";
                            } else {
                                echo "Booking was successful, but there was an issue sending the confirmation email to " . $passenger['email'] . ".";
                            }*/
                        }
                    }
                }
            } else {
                echo "Error executing booking query: " . $stmt->error;
            }
            $stmt->close();
        }
    } else {
        echo "Please fill in all required fields!";
    }
}

$conn->close();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../all.css">
    <title>JC-Airlines</title>
    <link rel="icon" type="image/x-icon" href="../pictures/logo.png">
</head>
<body onload="showFlightDetails()">

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
        <h2>Flight Booking Details</h2>
        <p>Flight Date: <span id="flightDate"></span></p>
        <p>Flight Time: <span id="flightTime"></span></p>
        <p>Departure City: <span id="departureCity"></span></p>
        <p>Destination City: <span id="destinationCity"></span></p>
        <p>Number of Tickets: <span id="ticketCount"></span></p>

        <!-- Passenger Form -->
        <form id="bookingForm" method="POST">
            <div id="passengerForm"></div>
            <button type="button" onclick="submitBooking()">Confirm Booking</button>
        </form>
    </div>
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
