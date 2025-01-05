<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../all.css">
    <script src="../all.js"></script>
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
    <form  action="/action_page.php" class="flightsearch">
        <div class="row">
            <div class="collumn-fs">
              <p class="theText">Date: </p>
              <input type="date" id="whenD" name="whenD" class="inputs">
              <p class="theText">Time: </p>
              <input type="time" id="whenT" name="whenT" class="inputs">
            </div>
            <div class="collumn-fs">
              <p class="theText">From: </p>
              <select name="from" id="Kaupunki" class="inputs">
                  <option value="" disabled selected>Select your option</option>
                  <option value="helsinki">Helsinki</option>
                  <option value="arlanda">Arlanda</option>
                  <option value="oslo">Oslo</option>
                  <option value="keflavik">Keflavik</option>
              </select>
              <p class="theText">To: </p>
              <select name="to" id="Kohdemaa" class="inputs">
                  <option value="" disabled selected>Select your option</option>
                  <option value="helsinki">Helsinki</option>
                  <option value="arlanda">Arlanda</option>
                  <option value="oslo">Oslo</option>
                  <option value="keflavik">Keflavik</option>
              </select>
            </div>
        </div>
        <div class="row">
          <div class="collumn-fs2">
              <input type="submit" id="submit" class="SUBMIT" value="Find Flights">
          </div>
        </div>
    </form>

    <div id="overlay">
      <form>
        <div id="overlayContent">
          <button class="closeButton" onclick="off()">×</button>
          <h1><span id="Kaupunki">Kaupunki</span> → <span id="Kohdemaa">Kohdemaa</span></h1>
          <p><span id="whenD">Date</span> - <span id="VapaatPaikat">x</span> Available seats left <span id="Aika">Aika</span></p>
          <div class="flightDetails">
            <h2>View your flight details</h2>
            <div class="flightInfo">
              <p><strong>Depart</strong>: <span id="whenD">Date</span></p>
              <p><span id="whenT">time</span> <span id="Kaupunki">Kaupunki</span> → <span id="whenT">time</span> <span id="Kohdemaa">Kohdemaa</span> (Duration: 1h 0m)</p>
              <p><strong><span id="Kone">Kone</span></strong></p>
            </div>
          </div>
          <label for="passenger">Passengers</label>
          <input type="number" id="passenger" name="passenger">
          <div class="extras">
            <p>Upgrades</p>
            <label><input type="checkbox" value="5"> Extra Food</label>
            <label><input type="checkbox" value="10"> Window Seat</label>
            <label><input type="checkbox" value="50"> Alcohol</label>
          </div>
          <p><strong>€<span id="LipunHinta">hinta</span></strong></p>
          <button class="payButton">Go Pay</button>
        </div>
      </form>
    </div>

    <div class="flight-results">
      <div class="flight-listing">
        <div class="flight-info">
          <p>(time) (day) (wherefrom)</p>
          <p>(time) (day) (whereto)</p>
        </div>
        <div class="flight-details">
          <p>Time of departure: (time)</p>
          <p>Available seats left: (amount)</p>
        </div>
        <div class="flight-company">
          <p>JC-Airlines (how long flight takes)</p>
          <p class="details" onclick="on()">Details and upgrades</p>
        </div>
        <div class="flight-price">
          <p>€(price)</p>
          <button class="viewDeal" onclick="on()">View Deal ></button>
        </div>
      </div>
    </div>


  </div>
</div>

<?php
$servername = "localhost";
$username = "admin";
$password = "1d100tt1AR!";
$dbname = "lennot";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT id, firstname, lastname FROM MyGuests";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
  }
} else {
  echo "0 results";
}
$conn->close();
?>

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

