<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8"/>
  <meta name="description" content="Lapis Web Design Enhancements"/>
  <meta name="keywords" content="lapis, web, design, development, enhancements"/>
  <meta name="author" content="Bryn Walker"/>
  <title>Lapis Web Design and Development | Enhancements</title>
  <link rel="stylesheet" type="text/css" href="./styles/style.css"/>
  <link rel="stylesheet" type="text/css" href="./styles/responsive.css"/>
  <link href='https://fonts.googleapis.com/css?family=Bitter' rel='stylesheet' type='text/css'/>
  <script src="https://code.jquery.com/jquery-2.2.3.js"></script>
  <script src="./scripts/cheet.js" type="text/javascript"></script>
  <script src="./scripts/enhancements.js"></script>
</head>
<body>

  <?php include_once("menu.html"); ?>

  <h1>Enhancements</h1>
  <article id="enhancement-responsive-design">
    <h2>Responsive Design</h2>
    <p>I have implemented a mobile layout alongside the default layout for this webpage using a <strong>media query.</strong> Whenever the viewport shrinks below the width of the menu bar, the website switches to a mobile layout.</p>
    <p>The website's layout is changed significantly when in mobile mode.</p>
    <ul>
      <li>Text is <strong>centered</strong> to improve readability.</li>
      <li>Buttons are widened to allow them to be selected more easily.</li>
      <li><strong>Checkboxes</strong> in the <a href="./apply.php#skills">skills section of the form</a> are displayed in a grid-like layout.</li>
      <li>The header menu has been redesigned to better suit a mobile layout. This involved creating two seperate menus and setting one to <strong>display: none;</strong> when not in use. The same technique was used to show/hide two different versions of the timetable (links to <a href="./about.php#responsive-timetable">responsive</a>,<a href="./about.php#timetable"> desktop</a>).</li>
      <li>An additional <strong>media query</strong> is used to display adjacent text blocks on the 'enhancements' and <a href="./about.php">'about'</a> pages properly on smaller screens.</li>
    </ul>
    <aside>
      <p>Note that functional (ie. touch to open menu) mobile buttons for the mobile dropdown menu are not possible, as there is no :onclick pseudoclass, and onclick actions are only achievable with JavaScript. As such, the mobile menu functions as a normal dropdown, and displays on <strong>:hover.</strong></p>
    </aside>
  </article>

  <article id="enhancement-interactivity">
    <h2>Interactivity</h2>
    <p>I have used a large number of selectors and rules not covered in labs or lectures in order to make the website more engaging. This is primarily accomplished through the use of animations and interactivity.</p>
    <p>Examples of these features include:</p>
    <ul>
      <li><strong>Pseudoclasses</strong> such as <strong>:hover, :not(), :nth-of-type()</strong> and <strong>:focus.</strong></li>
      <li><strong>:hover</strong> was used extensively to trigger animations and transitions on anchors, table cells, images and other elements. The most visible example of this can be seen by hovering over the buttons on the menu bar, or by hovering over <a href="./index.php">the logo</a> on index.html.</li>
      <li><strong>:hover</strong> was also used to trigger elements being displayed. The drop down menu in the mobile version of the site and the careers tab of the desktop site are both <strong>display: none;</strong> by default, but are displayed once hovered over.</li>
      <li><strong>:focus</strong> was used to strip default style from anchor tags that had been clicked on.</li>
      <li><strong>:nth-of-type</strong> and <strong>:last-child</strong> were used to quickly and effectively style large numbers of elements without manually setting classes or ids.</li>
      <li><strong>:not()</strong> was used to apply an animation to <a href="./about.php#timetable">timetable cells</a> that were not of the <strong>.no-hover</strong> class. This was used in conjunction with <strong>:hover.</strong></li>
      <li> The animations triggered by <strong>:hover</strong> require the use of the <strong>transition</strong> property as well as setting before and after states for each property to be changed by the <strong>:hover</strong> pseudoclass.</li>
    </ul>
  </article>

  <a class="button apply-button" href="./enhancements2.php">Enhancements 2</a>

  <?php include_once("footer.html"); ?>

</body>
</html>
