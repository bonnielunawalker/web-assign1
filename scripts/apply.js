/* Filename: apply.js
   Purpose: Validate input and alert the user to errors in their application form
   Target html: apply.html
   Author: Bryn Walker
   Date written: 18/4/2016
   Revisions:  N/A
*/

"use strict";

var debug = true;

function checkDateOfBirth() {
  var dobString = document.getElementById("dob").value;

  // Declares initial check variables. Assumes no errors.
  var ageRangeValid = true;
  var dateValid = true;

  // Converts the date into an array of three values, day, month and year.
  var dobArray = dobString.split("/");

  // Converts date to JS parseable format yyyy/mm/dd.
  // Also subtracts one day to permit people applying on their 15th birthday and disallow people applying on their 80th birthday.
  var dateOfBirth = new Date(dobArray[2], dobArray[1] - 1, dobArray[0]);

  // Checks if the entered date is valid.
  dateValid = validateDate(dobString, dobArray);
  if (!dateValid) {
    return false;
  }

  // Checks the user's age to ensure they are between 15 and 80.
  ageRangeValid = getAge(dateOfBirth);
  if (!ageRangeValid) {
    return false;
  }

  return true;
}

// Checks for day or month rollover to ensure the month is not above 12 or the day is not above its highest possible value.
// Inspiration from this Stack Overflow question - http://stackoverflow.com/questions/10263103/is-this-a-good-way-to-check-for-a-valid-date-in-javascript
function validateDate(dobString, dobArray) {
  var pattern = /^\d{2}\/\d{2}\/\d{4}$/
  var dateAlert = document.getElementById("date-alert");
  var dateOfBirth = new Date(dobArray[2], dobArray[1] - 1, dobArray[0]);

  // Gets seperate day, month and year to check against for date rollover.
  var day = dobArray[0];
  var month = dobArray[1] - 1;
  var year = dobArray[2];

  // Check if data is in correct format
  if (!dobString.match(pattern)) {
    dateAlert.innerHTML = "Enter a date in the following format - dd/mm/yyyy";
    return false;
  }

  // Checks for date rollover.
  if (dateOfBirth.getMonth() != month || dateOfBirth.getDate() != day) {
    alert(dateOfBirth);
    alert("day " + day + " " + dateOfBirth.getDate() + " month " + month + " " + dateOfBirth.getMonth() + " year " + year);
    dateAlert.innerHTML = day + "/" + month + "/" + year + " is not a valid date.";
    return false;
  } else {
    return true;
  }
}

// Gathers dates related to user's entered birthdate.
function getAge(dateOfBirth) {
  var currentDate = new Date();
  var dateLowest = new Date(dateOfBirth);
  var dateHighest = new Date(dateOfBirth);
  dateLowest.setYear(dateLowest.getFullYear() + 15)
  dateHighest.setYear(dateHighest.getFullYear() + 80);

  return checkAge(currentDate, dateLowest, dateHighest);
}

// Checks the age of the applicant to ensure they are between 15 and 80 years old.
function checkAge(currentDate, dateLowest, dateHighest) {
  var dateAlert = document.getElementById("date-alert");
  if (dateHighest < currentDate) {
    dateAlert.innerHTML = "We cannot accept applicants over the age of 80.";
    return false;
  } else if (dateLowest > currentDate) {
    dateAlert.innerHTML = "We cannot accept applicants under the age of 15.";
    return false;
  } else {
    return true;
  }
}

// If other skills checkbox is ticked, the other skills text field must not be empty.
function checkOtherSkills() {
  var otherSkillsTextField = document.getElementById("other-input");
  var otherSkillsCheckbox = document.getElementById("other").checked;

  if (otherSkillsCheckbox && otherSkillsTextField.value == "") {
    otherSkillsTextField.placeholder = "Please enter your other skills.";
    otherSkillsTextField.style.backgroundColor = "#ffe6e6";
    return false;
  } else {
    return true;
  }
}

function checkPostCode() {
  var postCodeDigit = document.getElementById("postcode").value.charAt(0);
  var state = document.getElementById("state").value;
  var postCodeAlert = document.getElementById("postcode-alert");

  if (state == "vic" && (postCodeDigit == "3" || postCodeDigit == "8")) {
    return true;
  } else if (state == "nsw" && (postCodeDigit == "1" || postCodeDigit == "2")) {
    return true;
  } else if (state == "qld" && (postCodeDigit == "4" || postCodeDigit == "9")) {
    return true;
  } else if (state == "nt" && postCodeDigit == "0") {
    return true;
  } else if (state == "wa" && postCodeDigit == "6") {
    return true;
  } else if (state == "sa" && postCodeDigit == "5") {
    return true;
  } else if (state == "tas" && postCodeDigit == "7") {
    return true;
  } else if (state == "act" && postCodeDigit == "0") {
    return true;
  } else if (state == "" || postCodeDigit == "") {
      return false;
  } else {
    postCodeAlert.innerHTML = "That is not a valid postcode for " + state + ".";
    return false;
  }
}

function prefillForm() {
  // querySelectorAll used to select multiple tag names
  var nodes = document.querySelectorAll("input, textarea, select");
  nodes[0].value = localStorage.jobReference;
  nodes[0].readOnly = true;

  for (let i = 1; i < nodes.length - 1; ++i) {
    // if the node is a checkbox or radio button, and its stored value is "checked", check the box.
    if ((nodes[i].type == "checkbox" || nodes[i].type == "radio") && sessionStorage.getItem(nodes[i].id) == "checked") {
      nodes[i].checked = true;
      continue;

  // checked = false must be explicitly set to avoid unwanted behaviour such as checkbox value being "unchecked"
  } else if ((nodes[i].type == "checkbox" || nodes[i].type == "radio") && sessionStorage.getItem(nodes[i].id) == "unchecked") {
    nodes[i].checked = false;
    continue;

  // otherwise, get the stored value corresponding to the node and assign that to that node's .value
  } else if (nodes[i].type == "text" || nodes[i].type == "select-one" || nodes[i].id == "other-input") {
      nodes[i].value = sessionStorage.getItem(nodes[i].id);
    }
  }
}

function saveFormData() {
  var nodes = document.querySelectorAll("input, textarea, select");

  // Iterates over array of nodes and stores the value of that node into session storage. The session storage key is the id of the node.
  for (let i = 1; i < nodes.length - 1; ++i) {
    if ((nodes[i].type == "checkbox" || nodes[i].type == "radio") && nodes[i].checked == true) {
      sessionStorage.setItem(nodes[i].id, "checked");
      continue;
    } else if ((nodes[i].type == "checkbox" || nodes[i].type == "radio") && nodes[i].checked == false) {
      sessionStorage.setItem(nodes[i].id, "unchecked");
      continue;

    // Explicit checking for types in last else if avoids unwanted values being passed by checkboxes.
  } else if (nodes[i].type == "text" || nodes[i].type == "select-one" || nodes[i].id == "other-input") {
      sessionStorage.setItem(nodes[i].id, nodes[i].value);
    }
  }
}

// Coordinates form validation.
function validateForm() {
  if (!debug) {
    var dateValid = checkDateOfBirth();
    var otherSkillsValid = checkOtherSkills();
    var postCodeValid = checkPostCode();

    if (dateValid && otherSkillsValid && postCodeValid) {
      saveFormData();
      return true;
    } else {
      return false;
    }
  } else {
    return true;
  }
}

function init() {
  var applicationForm = document.getElementById("application-form");
  prefillForm();

  applicationForm.onsubmit = validateForm;
}

window.addEventListener("load", init);
