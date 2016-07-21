<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"/>
	<meta name="description" content="Lapis Web Design Submit"/>
	<meta name="keywords" content="lapis, web, design, submit"/>
	<meta name="author" content="Bryn Walker"/>
	<title>Lapis Web Design and Development | Submit</title>
	<link rel="stylesheet" type="text/css" href="../styles/style.css"/>
	<link rel="stylesheet" type="text/css" href="../styles/responsive.css"/>
	<link href='https://fonts.googleapis.com/css?family=Bitter' rel='stylesheet' type='text/css'/>
	<script src="https://code.jquery.com/jquery-2.2.3.js"></script>
  <script src="../scripts/cheet.js" type="text/javascript"></script>
	<script src="../scripts/enhancements.js"></script>
</head>
<body>

<?php
  include_once ('connect.php');

  // Get form values.
  $job_reference_number = trim(htmlspecialchars($_POST["job-reference"]));
  $first_name = trim(htmlspecialchars($_POST["first-name"]));
  $last_name = trim(htmlspecialchars($_POST["last-name"]));
  $date_of_birth = trim(htmlspecialchars($_POST["dob"]));
  $gender = trim(htmlspecialchars($_POST["dob"]));
  $street_address = trim(htmlspecialchars($_POST["address"]));
  $suburb = trim(htmlspecialchars($_POST["suburb"]));
  $postcode = trim(htmlspecialchars($_POST["postcode"]));

  // Ensures $state has a string value.
  if (isset($_POST["state"])) {
    $state = $_POST["state"];
  } else {
    $state = "no-state";
  }

  $email_address = trim(htmlspecialchars($_POST["email"]));
  $phone_number = trim(htmlspecialchars($_POST["phone"]));
  $skills = implode(",", $_POST["skills"]);
  $other_skills = trim(htmlspecialchars($_POST["other-input"]));

	// Checks if postcode matches state
	function checkPostcode($state) {
	  $postcode = $GLOBALS["postcode"];

    if (($GLOBALS["state"] == 'vic' && !($postcode[0] == '3' || $postcode[0] == '8'))) {
      return false;
    } else if (($GLOBALS["state"] == 'nsw' && !($postcode[0] == '1' || $postcode[0] == '2'))) {
      return false;
    } else if (($GLOBALS["state"] == 'qld' && !($postcode[0] == '4' || $postcode[0] == '9'))) {
      return false;
    } else if (($GLOBALS["state"] == 'nt' && !($postcode[0] == '0'))) {
      return false;
    } else if (($GLOBALS["state"] == 'wa' && !($postcode[0] == '6'))) {
      return false;
    } else if (($GLOBALS["state"] == 'sa' && !($postcode[0] == '5'))) {
      return false;
    } else if (($GLOBALS["state"] == 'tas' && !($postcode[0] == '7'))) {
      return false;
    } else if (($GLOBALS["state"] == 'act' && !($postcode[0] == '0'))) {
      return false;
    } else {
			return true;
		}
	}

	// Checks if state is valid
	function validateState() {
		$error_message = "";

    if (!$GLOBALS["state"] == 'vic' && !$GLOBALS["state"] == 'nsw' && !$GLOBALS["state"] == 'qld' && !$GLOBALS["state"] == 'nt' && !$GLOBALS["state"] == 'wa' && !$GLOBALS["state"] == 'sa' || !$GLOBALS["state"] == 'tas' && !$GLOBALS["state"] == 'act' && !$GLOBALS["state"] == "no-state") {
      $error_message = $error_message."<p>".$state." is not a valid state!</p>";
    } else if ($GLOBALS["state"] == "no-state") {
      $error_message = $error_message."<p>State has not been entered.</p>";
    } else if (!checkPostcode($GLOBALS["state"])) {
			$error_message = $error_message."<p>".$GLOBALS["postcode"]." is not a valid postcode for ".$GLOBALS["state"].".</p>";
		}

		return $error_message;
  }

	// Checks the age of the user.
	function validateAge() {
		$error_message = "";

    $dob_latest = mktime(0, 0, 0, date("m")  , date("d"), date("Y") - 18);
    $dob_earliest = mktime(0, 0, 0, date("m")  , date("d"), date("Y") - 80);
    if (!($dob = strtotime($GLOBALS['date_of_birth']))) {
      $error_message = $error_message."<p>Invalid date, format must be dd/mm/yyyy.</p>";
    } else if (!($dob >= $dob_earliest) || !($dob <= $dob_latest)) {
      $error_message = $error_message."<p>Age is not between 18 and 80.</p>";
    }

		return $error_message;
	}

	// Checks the length of strings and adds onto the error message if they are not correct.
	function checkStringLengths() {
		$error_message = "";

		if (strlen($GLOBALS['street_address']) == 0) {
      $error_message = $error_message . "<p>Street address has not been entered.</p>";
    }
    if (strlen($GLOBALS['suburb']) == 0) {
      $error_message = $error_message . "<p>Suburb has not been entered.</p>";
    }
    if (!strlen($GLOBALS['job_reference_number']) == 6) {
      $error_message = $error_message . "<p>Job reference number is not 6 characters long.</p>";
    }
    if (strlen($GLOBALS['first_name']) > 25) {
      $error_message = $error_message . "<p>First name is longer than 25 characters.</p>";
    }
    if (strlen($GLOBALS['last_name']) > 25) {
      $error_message = $error_message . "<p>Last name is longer than 25 characters.</P.";
    }
    if (strlen($GLOBALS['street_address']) > 40) {
      $error_message = $error_message . "<p>Street address is longer than 40 characters.</p>";
    }
    if (strlen($GLOBALS['suburb']) > 40) {
      $error_message = $error_message . "<p>Suburb or town name is longer than 40 characters.</p>";
    }
		if (!(strlen($GLOBALS['postcode']) == 4)) {
      $error_message = $error_message . "<p>Postcode is not 4 digits long.</p>";
		}
    if (strlen($GLOBALS['phone_number']) > 12 || strlen($GLOBALS['phone_number']) < 8) {
      $error_message = $error_message . "<p>Phone number is not between 8 or 12 characters.</p>";
    } else if (!is_numeric($GLOBALS['phone_number'])) {
      $error_message = $error_message . "<p>Phone number may only consist of numeric characters.</p>";
    }

		return $error_message;
	}

  function validateInput() {
    $error_message = "";

    if (strlen($GLOBALS['first_name']) == 0) {
      $error_message = $error_message . "<p>First name has not been entered.</p>";
    } else if (!ctype_alnum($GLOBALS['first_name'])) {
      $error_message = $error_message . "<p>First name may only use alphanumeric characters.</p>";
    }
    if (strlen($GLOBALS['last_name']) == 0) {
      $error_message = $error_message . "<p>Last name has not been entered.</p>";
    } else if (!ctype_alnum($GLOBALS['last_name'])) {
      $error_message = $error_message . "<p>Last name may only use alphanumeric characters.</p>";
    }
    if (!isset($GLOBALS['gender'])) {
      $error_message = $error_message . "<p>No gender selected.</p>";
    }

		$error_message .= checkStringLengths();
		$error_message .= validateState();
		$error_message .= validateAge();

    // http://www.w3schools.com/php/filter_validate_email.asp
    if (!filter_var($GLOBALS['email_address'], FILTER_VALIDATE_EMAIL)) {
      $error_message = $error_message . "<p>Invalid email address.</p>";
    }

    // Checks if other skills checkbox is ticked an if the other skills text field contains text.
    if (in_array('other', $_POST['skills']) && strlen($GLOBALS['other_skills']) == 0) {
      $error_message = $error_message . "<p>Other skills checkbox has been checked but there is no text in the other skills textbox.</p>";
    }

    return $error_message;
  }

  $error_message = validateInput();

  if ($error_message == "") {
    // Insert values into SQL table.
    $query =
    "INSERT INTO eoi (
      job_reference_number, first_name, last_name, street_address, suburb, state, postcode, email_address, phone_number, skills, other_skills, status
    )
    VALUES (
      '$job_reference_number', '$first_name', '$last_name', '$street_address', '$suburb', '$state', '$postcode', '$email_address', '$phone_number', '$skills', '$other_skills', 'New'
    )";
    mysqli_query($conn, $query);

    // Selects the last eoi number in the table to echo to the user.
    $query = "SELECT EOInumber FROM eoi ORDER BY EOInumber DESC LIMIT 1";
    $eoi_number = mysqli_fetch_assoc(mysqli_query($conn, $query));
    echo "<p>Successfully added new EOI! Your reference number is ". $eoi_number['EOInumber']. ".</p><p><a href='../index.php'>Return home</a></p>";
  } else {
    echo "<p>Error! A new EOI could not be added!</p><p>". $error_message. "<p><a href = '../index.php'>Return home</a></p>";
  }

  mysqli_close($conn);
?>
</body>
