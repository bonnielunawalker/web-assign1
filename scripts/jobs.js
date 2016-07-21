/* Filename: jobs.js
   Purpose: Validate input and alert the user to errors in their application form
   Target html: jobs.html
   Author: Bryn Walker
   Date written: 28/4/2016
   Revisions:  N/A
*/

"use strict";

function init() {
  var applyJob1 = document.getElementById("apply-job1");
  var applyJob2 = document.getElementById("apply-job2");

  // anonymous functions and addEventListener used to prevent setItem triggering on page load
  // an alternative method could be to create individual named functions for each job and manually assign values to jobReference. However this results in even more code duplication than the method below.
  applyJob1.addEventListener("click",
    function() {
      localStorage.setItem("jobReference", "100118");
    }
  );

  applyJob2.addEventListener("click",
    function() {
      localStorage.setItem("jobReference", "100119");
    }
  );
}

window.addEventListener("load", init);
