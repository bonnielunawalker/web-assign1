<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8"/>
  <meta name="description" content="Lapis Web Design Homepage"/>
  <meta name="keywords" content="lapis, web, design, development"/>
  <meta name="author" content="Bryn Walker"/>
  <title>Lapis Web Design and Development | Home</title>
  <link rel="stylesheet" type="text/css" href="./styles/style.css"/>
  <link rel="stylesheet" type="text/css" href="./styles/responsive.css"/>
  <link href='https://fonts.googleapis.com/css?family=Bitter' rel='stylesheet' type='text/css'/>
  <script src="https://code.jquery.com/jquery-2.2.3.js"></script>
  <script src="./scripts/cheet.js" type="text/javascript"></script>
  <script src="./scripts/enhancements.js"></script>
</head>
<body>

<!-- Desktop Menu -->
<header>
  <nav id="desktop">
    <a class="button" href="./index.php">Home</a>
    <a class="button" href="./about.php">About</a>
    <a class="button" href="./enhancements.php">Enhancements</a>
    <nav class="dropdown">
      <a class="button" href="./jobs.php">Careers</a>
      <nav class="dropdown-menu">
        <a class="button" href="./jobs.php#job1">Senior Front End Web Developer</a>
        <a class="button" href="./jobs.php#job2">Data Centre Support Specialist</a>
      </nav>
    </nav>
  </nav>

  <!-- Mobile Menu -->
  <nav id="mobile" class="dropdown">
    <button id="menu-button" class="button">Menu</button>
    <nav class="dropdown-menu">
      <a class="button" href="./index.php"><p><img src="./images/home.png" class="icon" alt="Home icon"/>Home</p></a>
      <a class="button" href="./about.php"><p><img src="./images/about.png" class="icon" alt="Information icon"/>About</p></a>
      <a class="button" href="./enhancements.php"><p><img src="./images/enhancements.png" class="icon" alt="Star icon"/>Enhancements</p></a>
      <a class="button" href="./jobs.php"><p><img src="./images/jobs.png" class="icon" alt="Briefcase icon"/>Careers</p></a>
    </nav>
  </nav>
</header>

  <!-- Brief description of company -->
  <img id="logo" src="images/Lapis-logo.png" alt="Lapis logo"/>
  <h1 id="title">LAPIS</h1>
  <h2>About Us</h2>
  <p>Lapis Web Design and Development has been serving Australian and New Zealand businesses for over 10 years. Our experience and expertise is unmatched within the industry.</p>

  <!-- List of services offered -->
  <h2>Our Services</h2>
  <p>Our varied and experienced team allows us to deliver a variety of services to your business.</p>
  <ul>
    <li><span class="service">Web design and development. </span><span class="description">We deliver beautiful, responsive webpages for both large and small businesses. No matter your needs, we have you covered.</span></li>
    <li><span class="service">Mobile development. </span><span class="description">Take advantage of the growing mobile platform with an app for your business.</span></li>
    <li><span class="service">E-commerce. </span><span class="description">Boost sales with a secure, stable online storefront.</span></li>
    <li><span class="service">Web hosting. </span><span class="description">We take care of the busywork so you don't have to.</span></li>
  </ul>

  <?php include_once("footer.html"); ?>

</body>
</html>
