<?php
  require_once('settings.php');

  $conn = mysqli_connect($host, $user, $pwd, $sql_db);

  // Try to connect to the database.
  if (!$conn) {
    echo "<p>Database connection failure!</p>";
  } else {

    // Check if the eoi table exists in the database.
    $table_exists = mysqli_query($conn, 'SELECT 1 FROM eoi LIMIT 1');

    // If the eoi table doesn't exist, create the table.
    if (!$table_exists) {
      $create_table = "CREATE TABLE eoi (
        EOInumber INT(11) AUTO_INCREMENT PRIMARY KEY,
        job_reference_number TEXT NOT NULL,
        first_name TEXT NOT NULL,
        last_name TEXT NOT NULL,
        street_address TEXT(40) NOT NULL,
        suburb TEXT NOT NULL,
        state TEXT NOT NULL,
        postcode TEXT NOT NULL,
        email_address TEXT NOT NULL,
        phone_number TEXT NOT NULL,
        skills TEXT,
        other_skills TEXT,
        status TEXT NOT NULL
      )";

      if (mysqli_query($conn, $create_table)) {
        echo "Table eoi created successfully.";
      } else {
        echo "Table eoi could not be created!";
      }
    }
  }

?>
