<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../all.css">
    <title>JC-Airlines</title>
    <link rel="icon" type="image/x-icon" href="../pictures/logo.png">
</head>
<body>

<header>
    <img src="../pictures/logo+name.png" alt="logo and name" href="index.html">
    <div class="menu">
        <div class="menuitem" href="../help/help.html">Help</div>
        <div class="menuitem" href="../company/company.html">Company</div>
        <div class="menuitem" href="../shops&dining/shops&dining.html">Shops & Dining</div>
        <div class="menuitem" href="../flights/flights.html">Flights</div>
    </div>
</header>

<div class="bg">
    <div class="containerwhite">
    <form  action="/action_page.php" class="flightsearch">
        <div class="fast1">
            <span for="from" style="padding-right: 20px;">From: </span>
            <select name="from" id="from" class="inputs">
                <option value="" disabled selected>Select your option</option>
                <option value="helsinki">Helsinki</option>
                <option value="arlanda">Arlanda</option>
                <option value="oslo">Oslo</option>
                <option value="keflavik">Keflavik</option>
            </select>
            <span for="to" style="padding-right: 20px;">To: </span>
            <select name="to" id="to" class="inputs">
                <option value="" disabled selected>Select your option</option>
                <option value="helsinki">Helsinki</option>
                <option value="arlanda">Arlanda</option>
                <option value="oslo">Oslo</option>
                <option value="keflavik">Keflavik</option>
            </select>
            <span for="when">Date: </span>
            <input type="date" id="when" name="when" class="inputs">
        </div>
        <br>
        <div class="fast2">
            <input type="submit" id="submit" class="SUBMIT">
        </div>
    </form>
    </div>
</div>

<div style="overflow:auto">
<p>Hello</p>
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

