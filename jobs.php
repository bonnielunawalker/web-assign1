<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8"/>
  <meta name="description" content="Lapis Web Design Careers"/>
  <meta name="keywords" content="lapis, web, design, development, jobs, careers"/>
  <meta name="author" content="Bryn Walker"/>
  <title>Lapis Web Design and Development | Careers</title>
  <link rel="stylesheet" type="text/css" href="./styles/style.css"/>
  <link rel="stylesheet" type="text/css" href="./styles/responsive.css"/>
  <link href='https://fonts.googleapis.com/css?family=Bitter' rel='stylesheet' type='text/css'/>
  <script src="https://code.jquery.com/jquery-2.2.3.js"></script>
  <script src="./scripts/cheet.js" type="text/javascript"></script>
	<script src="./scripts/enhancements.js"></script>
  <script src="./scripts/jobs.js"></script>
</head>
<body>

  <?php
    include_once('menu.html');
    require_once("./php/connect.php");

    echo "<h1>We're hiring!</h1>";

    $query = "SELECT * FROM descriptions";
    $result = mysqli_query($conn, $query);
    $job_number = 0;

    while ($job = mysqli_fetch_assoc($result)) {
      $responsibilities = explode("|", $job["responsibilities"]);
      $skills_essential = explode("|", $job["skills1"]);
      $skills_favourable = explode("|", $job["skills2"]);
      $job_number = $job_number + 1;

      echo "<h2>", $job["title"], "</h2>";
      echo "<a id='apply-job", $job_number, "' class='button apply-button' href='./apply.php'>Apply Now</a>";
      echo "<h3>Starting Salary:</h3>";
      echo "<p>", $job["salary"], "</p>";
      echo "<h3>Key Responsibilities</h3><ol>";

      foreach ($responsibilities as $responsibility) {
        echo "<li>", $responsibility, "</li>";
      }

      echo "</ol>";
      echo "<h3>Essential Skills</h3><ul>";

      foreach ($skills_essential as $skill) {
        echo "<li>", $skill, "</li>";
      }

      echo "</ul>";
      echo "<h3>Favourable Skills</h3><ul>";

      foreach ($skills_favourable as $skill) {
        echo "<li>", $skill, "</li>";
      }

      echo "</ul>";
      echo "<p>Job reference number: ", $job["job_id"], "</p>";
    }

    include_once("footer.html");
  ?>

</body>
</html>
