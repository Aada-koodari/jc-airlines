<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../all.css">
    <script>
      function on() {
    document.getElementById("overlay").style.display = "block";
}

function off() {
    document.getElementById("overlay").style.display = "none";
}

function whatTime(x) {
    let Aika;
    if (x >= 6 && x <= 9) {
        Aika = "aamu"; // Morning
    } else if (x >= 10 && x <= 17) {
        Aika = "päivä"; // Day
    } else if (x >= 18 && x <= 22) {
        Aika = "ilta"; // Evening
    } else {
        return "No flights for that time";
    }
    return Aika;
}

function checkSameCity() {
    var from = document.getElementById("Lähtö").value;
    var to = document.getElementById("Kaupunki").value;
    var warning = document.getElementById("warning");

    if (from && to && from === to) {
        warning.style.display = "block";
    } else {
        warning.style.display = "none";
    }
}
    </script>
    <title>JC-Airlines</title>
    <link rel="icon" type="image/x-icon" href="../pictures/logo.png">
</head>
<body>

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
  <form action="" method="POST" class="flightsearch">
        <div class="row">
        <div class="collumn-fs">
    <p class="theText">* From: </p>
    <select name="from" id="Lähtö" class="inputs" onchange="checkSameCity()">
        <option value="" disabled selected>Select your option</option>
        <option value="Tikkakoski">Tikkakoski</option>
    </select>
    <p class="theText">* To: </p>
    <select name="to" id="Kaupunki" class="inputs" onchange="checkSameCity()">
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
    <p id="warning" style="color:red; display:none;">Warning: The selected cities are the same. Please choose different cities.</p>
</div>
            <div class="collumn-fs">
              <p class="theText">* Date: </p>
              <input type="date" id="whenD" name="whenD" class="inputs">
              <p class="theText">* Time: </p>
              <input type="time" id="whenT" name="whenT" class="inputs">
            </div>
            <div class="collumn-fs">
              <p class="theText">* Passengers: </p>
              <input type="number" id="passenger" name="passenger" class="inputs">
            </div>
        </div>
        <div class="row">
          <div class="collumn-fs2">
              <input type="submit" id="submit" class="SUBMIT" value="Find Flights" onclick="checkSameCity()">
          </div>
        </div>
    </form>

    <div id="overlay">
      <form>
        <div id="overlayContent">
          <button class="closeButton" onclick="off()">×</button>
          <h1><span id="Lähtö">Lähtö</span> → <span id="Kaupunki">Kaupunki</span></h1>
          <p><span id="whenD">Date</span> - <span id="VapaatPaikat">x</span> Available seats left <span id="Aika">Aika</span></p>
          <div class="flightDetails">
            <h2>View your flight details</h2>
            <div class="flightInfo">
              <p><strong>Depart</strong>: <span id="whenD">Date</span></p>
              <p><span id="whenT">time</span> <span id="Lähtö">Lähtö</span> → <span id="whenT">time</span> <span id="Kaupunki">Kaupunki</span> (Duration: 1h 0m)</p>
              <p><strong><span id="Kone">Kone</span></strong></p>
            </div>
          </div>
          <h2>Upgrades</h2>
          <div class="extras">
            <label><input type="checkbox" value="5"> Extra Food</label>
            <label><input type="checkbox" value="10"> Window Seat</label>
            <label><input type="checkbox" value="50"> Alcohol</label>
          </div>
          <p><strong><span id="LipunHinta">(hinta)</span></strong></p>
          <button class="payButton">Go Pay</button>
        </div>
      </form>
    </div>

    <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
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

          // Get user inputs
          $to = $_POST['to'];
          $city = $_POST['to'];
          $whenD = $_POST['whenD'];  // Date is not used, but kept for professionalism
          $whenT = $_POST['whenT'];  // Time is provided but not used for filtering

          // SQL query to fetch flights based on the search criteria
          $sql = "SELECT LentoID, Kohdemaa, Kaupunki, Aika, Kone, LipunHinta, VapaatPaikat 
                  FROM lennot 
                  WHERE Kaupunki = ?";
                  
          // Prepare statement
          $stmt = $conn->prepare($sql);
          $stmt->bind_param("s", $city); // Filter based on Kaupunki (destination city) and Kohdemaa (destination country)

          // Execute and fetch the results
          $stmt->execute();
          $result = $stmt->get_result();

          if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $departureTime = date('H:i', strtotime($row["Aika"])); // Format time
                $departureDate = date('l, F j', strtotime($whenD)); // Format date to show weekday and full date
        
                // Output flight information and add JS to open overlay with data
                echo "<div class='flight-results'>
                        <div class='flight-listing'>
                            <div class='flight-info'>
                                <p>$departureTime $departureDate Tikkakoski</p>
                                <p>$departureTime $departureDate $city</p>
                            </div>
                            <div class='flight-details'>
                                <p>Time of departure: $departureTime</p>
                                <p>Available seats left: " . $row["VapaatPaikat"] . "</p>
                            </div>
                            <div class='flight-company'>
                                <p>JC-Airlines (Takes approx 2 hours)</p>
                                <p class='details' onclick=\"on('$departureTime', '$departureDate', '$city', '" . $row["VapaatPaikat"] . "', '€" . $row["LipunHinta"] . "')\">Details and upgrades</p>
                            </div>
                            <div class='flight-price'>
                                <p>€" . $row["LipunHinta"] . "</p>
                                <button class='viewDeal' onclick=\"on('$departureTime', '$departureDate', '$city', '" . $row["VapaatPaikat"] . "', '€" . $row["LipunHinta"] . "')\">View Deal ></button>
                            </div>
                        </div>
                    </div>";
            }
        } else {
            echo "<p>No flights found matching your criteria.</p>";
        }
        

          // Close connection
          $stmt->close();
          $conn->close();
        }
?>


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
</html>

