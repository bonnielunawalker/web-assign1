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
    <h2>Highlighted Menu Items</h2>
    <p>The currently active page is highlighted on the navbar. In assignment 1 this was implemented with pure CSS, but has now been reimplemented using JavaScript.</p>
    <p>The implementation is straightforward, but requires accurate regular expressions in order to associate more than one address to the same navlink. The regular expression <code>/#.*/</code> selects the target section of a link (<code>#job1</code> for example) if one exists. A <code>for</code> loop iterates over all links in the navbar and checks if the browser's current address (with the target section <code>.replace()</code>d with an empty string) is equal to the <code>href</code> of that nav link.</p>
    <p>A similar process is used to associate both enhancement pages with the enhancements navlink. The regular expression <code>/\d(?=\.)/</code> selects any digit that precedes the <code>.html</code> section of a link or address. The same <code>for</code> loop as above is used to iterate over all navlinks to check if the navlink's <code>href</code> is equal to the current web address.</p>
    <p>Note that since the apply.html page does not have a corresponding navlink, no navbar items are highlighted when that page is active.</p>
  </article>

  <article id="enhancement-interactivity">
    <h2>Easter Egg</h2>
    <p>Using both jQuery and the cheet.js library, two "easter eggs" have been implemented on the website. On entering the konami code (up, up, down, down, left, right, left, right, b, a) at any point in the site, an easter egg function is triggered, changing a large number of elements on the website to introduce some internet culture humour. Entering the keyphrase "easteregg" triggers a second, less intrusive function that simply adds a listener that changes the color of text nodes when they are clicked on.</p>
    <p>The easter eggs are disabled and their applied styles reversed upon re-entering their respective keyphrase.</p>
    <p>Specific functionality is explained in code comments in enhancements.js, but broad functionality is outlined below.</p>
    <ul>
      <li><code>cheet( ... )</code> is used to generate listeners for keyphrases.</li>
      <li><code>Math.random</code> is used to select random colours from an array and select text that is then applied to various DOM nodes using <code>.innerHTML</code>.</li>
      <li><code>document.querySelectorAll( ... )</code> is used to generate arrays of a large number of tags in order to iterate over and apply styles to them.</li>
      <li>jQuery's <code>.on( ... )</code> function is used to create event listeners for a large number of text nodes.</li>
      <li><code>.style</code> is used to manipluate a variety of DOM element styles.</li>
      <li>Session storage is used to carry easter egg behaviour across pages, to turn easter eggs on and off, as well as ensure only one easter egg is running at any one point.</li>
    </ul>
    <p>It should be noted that the konami code easter egg does disable some site functionality, including the ability to properly enter details into the application form and submit data. As such, this easter egg is in keeping with internet humour and should not be taken seriously.</p>
  </article>

  <a class="button apply-button" href="./enhancements.php">Enhancements 1</a>

  <?php include_once("footer.html"); ?>

</body>
</html>
