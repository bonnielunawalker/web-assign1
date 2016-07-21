<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"/>
	<meta name="description" content="Lapis Web Design Management"/>
	<meta name="keywords" content="lapis, web, design, management"/>
	<meta name="author" content="Bryn Walker"/>
	<title>Lapis Web Design and Development | Management</title>
	<link rel="stylesheet" type="text/css" href="../styles/style.css"/>
	<link rel="stylesheet" type="text/css" href="../styles/responsive.css"/>
	<link href='https://fonts.googleapis.com/css?family=Bitter' rel='stylesheet' type='text/css'/>
	<script src="https://code.jquery.com/jquery-2.2.3.js"></script>
  <script src="../scripts/cheet.js" type="text/javascript"></script>
	<script src="../scripts/enhancements.js"></script>
</head>
<body>

<?php
  include_once ('./connect.php');

  $action = $_POST["management-option"];

	// Sets default sort type to by application number.
	if (isset($_POST["sort"])) {
		$sort = $_POST["sort"];
	} else {
		$sort = "EOInumber";
	}


	// Note that variables such as $delete_number or $name_search are not declared unless needed. This prevents values from post being accepted to minimise risk of SQL injection.
  if ($action == "show-all") {
    $query = "SELECT * FROM eoi ORDER BY $sort";
  }

	else if ($action == "show-by-reference") {
		$reference_number = trim(htmlspecialchars($_POST["reference-number"]));
    $query = "SELECT * FROM eoi WHERE job_reference_number='$reference_number' ORDER BY $sort";
  }

	else if ($action == "search-by-name" && isset($name_search[1])) {
		$name_search = explode(" ", trim(htmlspecialchars($_POST["name-search"])));
    $query = "SELECT * FROM eoi WHERE first_name LIKE '$name_search[0]' OR last_name LIKE '$name_search[0]' OR last_name LIKE '$name_search[1]' ORDER BY $sort";
  }

	else if ($action == "search-by-name") {
		$name_search = explode(" ", trim(htmlspecialchars($_POST["name-search"])));
    $query = "SELECT * FROM eoi WHERE first_name LIKE '$name_search[0]' OR last_name LIKE '$name_search[0]' ORDER BY $sort";
  }

	else if ($action == "delete") {
		$delete_number = trim(htmlspecialchars($_POST["delete-number"]));
    $query = "DELETE FROM eoi WHERE job_reference_number='$delete_number'";
  }

	else if ($action == "change-status") {
		$status = $_POST["status"];
		$eoi_to_change = trim(htmlspecialchars($_POST["eoi-to-change"]));
    $query = "UPDATE eoi SET status='$status' WHERE EOInumber='$eoi_to_change';";

  }

  $result = mysqli_query($conn, $query);

  if (!$result) {
    echo "<p>Could not retrieve EOIs!</p>";
  } else if ($action == "show-all" || $action == "show-by-reference" || $action == "search-by-name") {
    echo "<table id=\"eoi\">";
    echo "<tr>"
        ."<th scope = \"col\">ID</th>"
        ."<th scope = \"col\">Job #</th>"
        ."<th scope = \"col\">First Name</th>"
        ."<th scope = \"col\">Last Name</th>"
        ."<th scope = \"col\">Address</th>"
        ."<th scope = \"col\">Suburb</th>"
        ."<th scope = \"col\">State</th>"
        ."<th scope = \"col\">Postcode</th>"
        ."<th scope = \"col\">Email Address</th>"
        ."<th scope = \"col\">Phone Number</th>"
        ."<th scope = \"col\">Skills</th>"
        ."<th scope = \"col\">Other Skills</th>"
        ."<th scope = \"col\">EOI Status</th>"
        ."</tr>";

    while ($row = mysqli_fetch_assoc($result)) {
      echo "<tr>";
      echo "<td>", $row["EOInumber"], "</td>";
      echo "<td>", $row["job_reference_number"], "</td>";
      echo "<td>", $row["first_name"], "</td>";
      echo "<td>", $row["last_name"], "</td>";
      echo "<td>", $row["street_address"], "</td>";
      echo "<td>", $row["suburb"], "</td>";
      echo "<td>", $row["state"], "</td>";
      echo "<td>", $row["postcode"], "</td>";
      echo "<td><a href='mailto:", $row["email_address"], "'>", $row["email_address"], "</a></td>";
      echo "<td>", $row["phone_number"], "</td>";
      echo "<td>", $row["skills"], "</td>";
      echo "<td>", $row["other_skills"], "</td>";
      echo "<td>", $row["status"], "</td>";
      echo "</tr>";
    }
    mysqli_free_result($result);
    echo "</table>";
  } else {
    echo "<p>Success!</p></p><a href='../index.php'>Return home</a>";
  }

  mysqli_close($conn);
?>

</body>
</html>
