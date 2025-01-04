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
              <select name="from" id="from" class="inputs">
                  <option value="" disabled selected>Select your option</option>
                  <option value="helsinki">Helsinki</option>
                  <option value="arlanda">Arlanda</option>
                  <option value="oslo">Oslo</option>
                  <option value="keflavik">Keflavik</option>
              </select>
              <p class="theText">To: </p>
              <select name="to" id="to" class="inputs">
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
      <div id="overlayContent">
        <button class="closeButton" onclick="off()">×</button>
        <h1>Helsinki (HEL) → Stockholm (ARN)</h1>
        <p>Sun, 2/2 - x Available seats left (TIME)</p>
        <div class="flightDetails">
          <h2>View your flight details</h2>
          <div class="flightInfo">
            <p><strong>Depart</strong>: Sun, 2/2</p>
            <p>6:00 PM HEL → 6:00 PM ARN (Duration: 1h 0m)</p>
            <p><strong>Norwegian Air Shuttle</strong></p>
          </div>
        </div>
        <label for="passenger">Passengers</label>
        <input type="number" id="passenger" name="passenger">
        <div class="extras">
          <p>Upgrades</p>
          <label><input type="checkbox"> Extra Food</label>
          <label><input type="checkbox"> Window Seat</label>
          <label><input type="checkbox"> Alcohol</label>
        </div>
        <p>€(price)</p>
        <button class="payButton">Go Pay</button>
      </div>
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

