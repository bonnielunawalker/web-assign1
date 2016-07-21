<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"/>
	<meta name="description" content="Lapis Web Design Management"/>
	<meta name="keywords" content="lapis, web, design, management"/>
	<meta name="author" content="Bryn Walker"/>
	<title>Lapis Web Design and Development | Management</title>
	<link rel="stylesheet" type="text/css" href="./styles/style.css"/>
	<link rel="stylesheet" type="text/css" href="./styles/responsive.css"/>
	<link href='https://fonts.googleapis.com/css?family=Bitter' rel='stylesheet' type='text/css'/>
	<script src="https://code.jquery.com/jquery-2.2.3.js"></script>
  <script src="./scripts/cheet.js" type="text/javascript"></script>
	<script src="./scripts/enhancements.js"></script>
</head>
<body>

	<?php
		include_once("menu.html");
	?>

	<form id="management-form" name="management-form" method="post"  action="./php/management_options.php" novalidate="novalidate">
		<fieldset>
			<legend>Select an option</legend>
			<p>
				<label for="sort">Sort By...</label>
				<select name="sort" id="sort">
					<option value="" disabled="disabled" selected="selected">Select an option...</option>
					<option value="EOInumber">Application ID</option>
					<option value="job_reference_number">Job ID</option>
					<option value="first_name">First Name</option>
					<option value="last_name">Last Name</option>
					<option value="status">Application Status</option>
				</select>
			</p>
			<p>
				<input type="radio" id="show-all" name="management-option" value="show-all" checked="checked"/>
				<label for="show-all">Show all EOIs</label>
			</p>
			<p>
				<input type="radio" id="show-by-reference" name="management-option" value="show-by-reference"/>
				<label for="show-by-reference">Show EOIs by job reference number</label>
			</p>
			<p>
				<label for="reference-number">Reference number</label>
				<input name="reference-number" id="reference-number"/>
			</p>
			<p>
				<input type="radio" id="search-by-name" name="management-option" value="search-by-name"/>
				<label for="search-by-name">Search for an applicant by name</label>
			</p>
			<p>
				<label for="name-search">Name</label>
				<input name="name-search" id="name-search"/>
			</p>
			<p>
				<input type="radio" id="delete" name="management-option" value="delete"/>
				<label for="delete">Delete applications by job ID</label>
			</p>
			<p>
				<label for="delete-number">Name</label>
				<input name="delete-number" id="delete-number"/>
			</p>
			<p>
				<input type="radio" id="change-status" name="management-option" value="change-status"/>
				<label for="change-status">Change application status</label>
			</p>
			<p>
				<label for="eoi-to-change">Application Number</label>
				<input name="eoi-to-change" id="eoi-to-change"/>
			</p>
			<p>
				<label for="status">New Status</label>
				<select name="status" id="status">
					<option value="" disabled="disabled" selected="selected">Select a status...</option>
					<option value="New">New</option>
					<option value="Current">Current</option>
					<option value="Final">Final</option>
				</select>
			</p>
		</fieldset>
		<input id="submit-button" class="button" type="submit" value="Go!"/>
	</form>

	<?php
		include_once("footer.html");
	?>

</body>
</html>
