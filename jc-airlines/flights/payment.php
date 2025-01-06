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
<p>nimi/nimet, osoite, email, puhelinnumero</p>
<div class="bg">
  <div class="containerwhite">
    <div class="row">
    <div class="col-75">
        <div class="container">
        <form action="/action_page.php">
        
            <div class="row">
            <div class="col-50">
                <h3>Billing Address</h3>
                <label for="fname"><i class="fa fa-user"></i> Full Name</label>
                <input type="text" id="fname" name="firstname" placeholder="John M. Doe">
                <label for="email"><i class="fa fa-envelope"></i> Email</label>
                <input type="text" id="email" name="email" placeholder="john@example.com">
                <label for="adr"><i class="fa fa-address-card-o"></i> Address</label>
                <input type="text" id="adr" name="address" placeholder="542 W. 15th Street">
                <label for="city"><i class="fa fa-institution"></i> City</label>
                <input type="text" id="city" name="city" placeholder="New York">

                <div class="row">
                <div class="col-50">
                    <label for="state">State</label>
                    <input type="text" id="state" name="state" placeholder="NY">
                </div>
                <div class="col-50">
                    <label for="zip">Zip</label>
                    <input type="text" id="zip" name="zip" placeholder="10001">
                </div>
                </div>
            </div>


      <form>
        <div>
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
      <?php
if (isset($_GET['hakuID'])) {
    $hakuID = $_GET['hakuID'];

    // Display payment form
    echo "<h1>Payment for Booking #{$hakuID}</h1>";
    echo "<form action='process_payment.php' method='POST'>
            <input type='hidden' name='hakuID' value='{$hakuID}'>
            <label for='cardNumber'>Card Number:</label>
            <input type='text' name='cardNumber' required>
            <button type='submit'>Pay</button>
          </form>";
} else {
    echo "<p>No booking found.</p>";
}
?>



            <div class="col-50">
                <h3>Payment</h3>
                <label for="fname">Accepted Cards</label>
                <div class="icon-container">
                <i class="fa fa-cc-visa" style="color:navy;"></i>
                <i class="fa fa-cc-amex" style="color:blue;"></i>
                <i class="fa fa-cc-mastercard" style="color:red;"></i>
                <i class="fa fa-cc-discover" style="color:orange;"></i>
                </div>
                <label for="cname">Name on Card</label>
                <input type="text" id="cname" name="cardname" placeholder="John More Doe">
                <label for="ccnum">Credit card number</label>
                <input type="text" id="ccnum" name="cardnumber" placeholder="1111-2222-3333-4444">
                <label for="expmonth">Exp Month</label>
                <input type="text" id="expmonth" name="expmonth" placeholder="September">
                <div class="row">
                <div class="col-50">
                    <label for="expyear">Exp Year</label>
                    <input type="text" id="expyear" name="expyear" placeholder="2018">
                </div>
                <div class="col-50">
                    <label for="cvv">CVV</label>
                    <input type="text" id="cvv" name="cvv" placeholder="352">
                </div>
                </div>
            </div>
            
            </div>
            <label>
            <input type="checkbox" checked="checked" name="sameadr"> Shipping address same as billing
            </label>
            <input type="submit" value="Continue to checkout" class="btn">
        </form>
        </div>
    </div>
    <div class="col-25">
        <div class="container">
        <h4>Cart <span class="price" style="color:black"><i class="fa fa-shopping-cart"></i> <b>4</b></span></h4>
        <p><a href="#">Product 1</a> <span class="price">$15</span></p>
        <p><a href="#">Product 2</a> <span class="price">$5</span></p>
        <p><a href="#">Product 3</a> <span class="price">$8</span></p>
        <p><a href="#">Product 4</a> <span class="price">$2</span></p>
        <hr>
        <p>Total <span class="price" style="color:black"><b>$30</b></span></p>
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

