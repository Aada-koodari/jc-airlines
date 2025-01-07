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
    <script>
        // Function to show flight details and display the passenger input form
        function showFlightDetails() {
            const flightData = <?php echo json_encode($flightDetails); ?>;

            // Fill in the flight details dynamically
            document.getElementById('flightDate').innerText = flightData.date;
            document.getElementById('flightTime').innerText = flightData.time;
            document.getElementById('departureCity').innerText = flightData.whereFrom;
            document.getElementById('destinationCity').innerText = flightData.whereTo;
            document.getElementById('ticketCount').innerText = flightData.passengers;

            // Show the correct number of passenger input fields based on the number of tickets
            const ticketCount = flightData.passengers;
            const passengerForm = document.getElementById('passengerForm');
            passengerForm.innerHTML = '';  // Clear any existing fields

            for (let i = 0; i < ticketCount; i++) {
                const passengerDiv = document.createElement('div');
                passengerDiv.classList.add('passenger');
                passengerDiv.innerHTML = `
                    <h4>Passenger ${i + 1}</h4>
                    <input type="text" class="name" placeholder="Full Name" name="passengers[${i}][name]" required>
                    <input type="text" class="address" placeholder="Address" name="passengers[${i}][address]" required>
                    <input type="email" class="email" placeholder="Email" name="passengers[${i}][email]" required>
                    <input type="tel" class="phone" placeholder="Phone Number" name="passengers[${i}][phone]" required>
                `;
                passengerForm.appendChild(passengerDiv);
            }

            // Show the form with the generated passenger fields
            passengerForm.style.display = 'block';
        }

        // Handle form submission
        function submitBooking() {
            const passengers = document.getElementsByClassName('passenger');
            const passengerDetails = [];

            // Collect passenger details
            for (let i = 0; i < passengers.length; i++) {
                const name = passengers[i].querySelector('.name').value;
                const address = passengers[i].querySelector('.address').value;
                const email = passengers[i].querySelector('.email').value;
                const phone = passengers[i].querySelector('.phone').value;

                passengerDetails.push({ name, address, email, phone });
            }

            // Add passenger details to the form and submit
            const form = document.getElementById('bookingForm');
            const passengerInput = document.createElement('input');
            passengerInput.type = 'hidden';
            passengerInput.name = 'passengers';
            passengerInput.value = JSON.stringify(passengerDetails);
            form.appendChild(passengerInput);

            // Get flight details from the already displayed values and add them to the form
            const pvm = document.getElementById('flightDate').innerText;
            const lennonAjankohta = document.getElementById('flightTime').innerText;
            const kohdeKaupunki = document.getElementById('destinationCity').innerText;
            const lippujenMaara = document.getElementById('ticketCount').innerText;

            const pvmInput = document.createElement('input');
            pvmInput.type = 'hidden';
            pvmInput.name = 'pvm';
            pvmInput.value = pvm;
            form.appendChild(pvmInput);

            const lennonAjankohtaInput = document.createElement('input');
            lennonAjankohtaInput.type = 'hidden';
            lennonAjankohtaInput.name = 'lennonAjankohta';
            lennonAjankohtaInput.value = lennonAjankohta;
            form.appendChild(lennonAjankohtaInput);

            const kohdeKaupunkiInput = document.createElement('input');
            kohdeKaupunkiInput.type = 'hidden';
            kohdeKaupunkiInput.name = 'kohdeKaupunki';
            kohdeKaupunkiInput.value = kohdeKaupunki;
            form.appendChild(kohdeKaupunkiInput);

            const lippujenMaaraInput = document.createElement('input');
            lippujenMaaraInput.type = 'hidden';
            lippujenMaaraInput.name = 'lippujenMaara';
            lippujenMaaraInput.value = lippujenMaara;
            form.appendChild(lippujenMaaraInput);

            // Submit the form
            form.submit();
        }
    </script>
    <title>JC-Airlines</title>
    <link rel="icon" type="image/x-icon" href="../pictures/logo.png">
</head>
<body onload="showFlightDetails()">

<header>
    <img src="../pictures/logo+name.png" alt="logo and name" href="index.html">
    <div class="menu">
        <a class="menuitem" href="../help/help.html">Help</a>
        <a class="menuitem" href="../company/company.html">Company</a>
        <a class="menuitem" href="../shops&dining/shops&dining.html">Shops & Dining</a>
        <a class="menuitem" href="../flights/flights.html">Flights</a>
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
            <p>Flights</p>
            <p>Shops</p>
            <p>Dining</p>
        </div>
        <div class="column" style="text-align: center;">
            <h3>Company</h3>
            <p>History</p>
            <p>Planes</p>
            <p>Awards</p>
        </div>
        <div class="columnr">
            <p>© 2024 – JC-Airlines</p>
        </div>
    </div>
</footer>

</body>
</html>
