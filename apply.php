<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"/>
	<meta name="description" content="Lapis Web Design Application"/>
	<meta name="keywords" content="lapis, web, design, development, jobs, careers, apply"/>
	<meta name="author" content="Bryn Walker"/>
	<title>Lapis Web Design and Development | Apply</title>
	<link rel="stylesheet" type="text/css" href="./styles/style.css"/>
	<link rel="stylesheet" type="text/css" href="./styles/responsive.css"/>
	<link href='https://fonts.googleapis.com/css?family=Bitter' rel='stylesheet' type='text/css'/>
	<script src="https://code.jquery.com/jquery-2.2.3.js"></script>
  <script src="./scripts/cheet.js" type="text/javascript"></script>
	<script src="./scripts/enhancements.js"></script>
	<script src="./scripts/apply.js"></script>
</head>
<body>

	<?php include_once("menu.html"); ?>

	<h1>Application Form</h1>
	<!-- Application form -->
	<form id="application-form" name="application-form" method="post"  action="./php/create_eoi.php" novalidate="novalidate">
		<p>
			<label for="job-reference">Job Reference Number</label>
			<input type="text" name="job-reference" id="job-reference" required="required" pattern="[0-9]{6}" maxlength="6" placeholder="123456"/>
		</p>
		<p>
			<label for="first-name">First Name</label>
			<input type="text" name="first-name" id="first-name" required="required" pattern="[a-zA-Z]{1,25}" maxlength="25" placeholder="Joe"/>
		</p>
		<p>
			<label for="last-name">Last Name</label>
			<input type="text" name="last-name" id="last-name" required="required" pattern="[a-zA-Z]{1,25}" maxlength="25" placeholder="Bloggs"/>
		</p>
		<p>
			<label for="dob">Date of Birth</label>
			<input type="date" name="dob" id="dob" required="required" placeholder="dd/mm/yyyy"/>
			<span id="date-alert"></span>
		</p>

		<fieldset>
			<legend>Gender</legend>
			<p>
				<input type="radio" id="male" name="gender" value="male" checked="checked"/>
				<label for="male">Male</label>
			</p>
			<p>
				<input type="radio" id="female" name="gender" value="female"/>
				<label for="female">Female</label>
			</p>
		</fieldset>

		<p>
			<label for="address">Street Address</label>
			<input name="address" id="address" required="required" maxlength="40"/>
		</p>
		<p>
			<label for="suburb">Suburb/Town</label>
			<input type="text" name="suburb" id="suburb" required="required" maxlength="40"/>
		</p>
		<p>
			<label for="postcode">Postcode</label>
			<input type="text" name="postcode" id="postcode" required="required" pattern="[0-9]{4}" size="4" maxlength="4" placeholder="1234"/>
			<span id="postcode-alert"></span>
		</p>
		<p>
			<label for="state">State/Territory</label>
			<select name="state" id="state" required="required">
				<option value="" disabled="disabled" selected="selected">Select a state...</option>
				<option value="act">Australian Captital Territory</option>
				<option value="nsw">New South Wales</option>
				<option value="qld">Queensland</option>
				<option value="vic">Victoria</option>
				<option value="tas">Tasmania</option>
				<option value="sa">South Australia</option>
				<option value="nt">Northern Territory</option>
				<option value="wa">Western Australia</option>
			</select>
		</p>
		<p>
			<label for="email">Email Address</label>
				<!-- Email regex created with assistance from this SO question - http://stackoverflow.com/questions/201323/using-a-regular-expression-to-validate-an-email-address -->
			<input type="text" name="email" id="email" required="required" pattern="[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+" placeholder="joebloggs@email.com"/>
		</p>
		<p>
			<label for="phone">Phone Number</label>
			<input type="text" name="phone" id="phone" required="required" pattern="[0-9\s]{8,12}" maxlength="12" placeholder="03 123456789"/>
		</p>

		<!-- Skills Checkboxes -->
		<fieldset id="skills">
			<legend>Skills</legend>
			<p>
				<label for="html">HTML</label>
				<input type="checkbox" id="html" name="skills[]" value="html" checked="checked"/>
			</p>
			<p>
				<label for="css">CSS</label>
				<input type="checkbox" id="css" name="skills[]" value="css" checked="checked"/>
			</p>
			<p>
				<label for="javascript">JavaScript</label>
				<input type="checkbox" id="javascript" name="skills[]" value="javascript" checked="checked"/>
			</p>
			<p>
				<label for="bootstrap">Bootstrap</label>
				<input type="checkbox" id="bootstrap" name="skills[]" value="bootstrap"/>
			</p>
			<p>
				<label for="sass">Sass</label>
				<input type="checkbox" id="sass" name="skills[]" value="sass"/>
			</p>
			<p>
				<label for="less">Less</label>
				<input type="checkbox" id="less" name="skills[]" value="less"/>
			</p>
			<p>
				<label for="jquery">JQuery</label>
				<input type="checkbox" id="jquery" name="skills[]" value="jquery"/>
			</p>
			<p>
				<label for="angular">AngularJS</label>
				<input type="checkbox" id="angular" name="skills[]" value="angular"/>
			</p>
			<p>
				<label for="sql">SQL</label>
				<input type="checkbox" id="sql" name="skills[]" value="subject-query-language"/>
			</p>
			<p>
				<label for="other">Other skills...</label>
				<input type="checkbox" id="other" name="skills[]" value="other">
			</p>
			<p id="other-wrapper">
				<label for="other-input">Other</label>
				<textarea name="other-input" id="other-input" placeholder=""></textarea>
			</p>
		</fieldset>
		<input id="submit-button" class="button" type="submit" value="Apply"/>
	</form>

  <?php include_once("footer.html"); ?>

</body>
</html>
