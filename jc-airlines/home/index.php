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
    <img src="../pictures/logo+name.png" alt="logo and name" href="index.php">
    <div class="menu">
        <a class="menuitem" href="../help/help.php">Help</a>
        <a class="menuitem" href="../company/company.php">Company</a>
        <a class="menuitem" href="../shops&dining/s&d.php">Shops & Dining</a>
        <a class="menuitem" href="../flights/flights.php">Flights</a>
    </div>
</header>

<div class="bghome">
  <form  action="/action_page.php" class="fastTravel">
      <div class="fast1">
        <span for="destination1" style="padding-right: 20px;">From: </span>
        <select name="destination1" id="destination1" class="inputs">
            <option value="" disabled selected>Select your option</option>
            <option value="helsinki">Helsinki</option>
            <option value="arlanda">Arlanda</option>
            <option value="oslo">Oslo</option>
            <option value="keflavik">Keflavik</option>
        </select>
        <span for="destination2" style="padding-right: 20px;">To: </span>
        <select name="destination2" id="destination2" class="inputs">
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
        <input type="submit" id="submit" class="SUBMIT" value="Find Flights">
      </div>
  </form>
</div>

<div style="overflow:auto">
  <div class="container">
    <div class="row">
      <div class="column-33">
          <img width="335" height="471" alt="airport inside" src="https://img2.10bestmedia.com/Images/Photos/416324/Charlotte-Douglas-International-Airport-CLT_55_660x440.jpg">
      </div>
      <div class="column-66">
        <h1 class="xlarge-font"><b>The App</b></h1>
        <p> You should buy this app because lorem ipsum consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
      </div>
    </div>
  </div>
  

  <div class="container" style="background-color:#f1f1f1">
    <div class="row">
      <div class="column-66">
        <h1 class="xlarge-font" style="text-align: right;"><b>Clarity</b></h1>
        <p  style="text-align: right;"> Sharp and clear photos with the world's best photo engine, incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquipex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
      </div>
      <div class="column-33">
        <img alt="plane on sunset" width="335" height="471" src="https://imageio.forbes.com/specials-images/imageserve/66ba827c8ff2be58a5e1ea62/Aircraft-landing-at-sunrise/960x0.jpg?format=jpg&width=1440">
      </div>
    </div>
  </div>
  
    
    <div class="container">
        <div class="row">
          <div class="column-33">
              <img alt="plane flying" width="335" height="471" src="https://www.gannett-cdn.com/-mm-/017c9183b882e98fecec991bc42640f27a08968e/c=0-785-2822-2376/local/-/media/USATODAY/test/2013/12/05//1386284558000-plane-turning.jpg?width=2560">
          </div>
          <div class="column-66">
            <h1 class="xlarge-font"><b>The App</b></h1>
            <p> You should buy this app because lorem ipsum consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
          </div>
        </div>
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

