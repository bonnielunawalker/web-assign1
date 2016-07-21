/* Filename: enhancements.js
   Purpose: Validate input and alert the user to errors in their application form
   Target html: apply.html
   Author: Bryn Walker
   Date written: 29/4/2016
   Revisions:  N/A
*/

"use strict";

function init() {
  currentPageHighlight();

  // creates two event listeners that are triggered when 'easteregg' or the konami code are typed when the browser window is active.
  cheet("↑ ↑ ↓ ↓ ← → ← → b a", konamiEasterEggWrapper);
  cheet("e a s t e r e g g", colorEasterEggWrapper);

  if (sessionStorage.konamiEasterEgg == "true") {
    konamiEasterEgg();
  } else if (sessionStorage.colorEasterEgg == "true") {
    colorEasterEgg();
  }
}

// Highlights the current page on the nav bar.
function currentPageHighlight(links) {
  var navLinks = document.getElementById("desktop").getElementsByClassName("button");

  for (let link of navLinks) {
    // if the page address is the same as the link address without any targets or digits...
    if (link.href == window.location.href.replace(/#.*/, "") || link.href == window.location.href.replace(/\d(?=\.html)/, "")) {
      // ... add the class current-page to the link
      link.className += " current-page";
    }
  }
}

// Coordinates color easter egg, including turning it on and off and checking if the color easter egg is active
function konamiEasterEggWrapper() {
  if (sessionStorage.konamiEasterEgg == "true") {
    sessionStorage.konamiEasterEgg = "false";
  } else if (sessionStorage.colorEasterEgg == "true") {
    return;
  } else {
    sessionStorage.konamiEasterEgg = "true";
  }

  // wipes any styles added to DOM elements by the easter egg
  window.location.reload();
}

// Coordinates color easter egg, including turning it on and off and checking if the konami easter egg is active
function colorEasterEggWrapper() {
  if (sessionStorage.colorEasterEgg == "true") {
    sessionStorage.colorEasterEgg = "false";
  } else if (sessionStorage.konamiEasterEgg == "true") {
    return;
  } else {
    sessionStorage.colorEasterEgg = "true";
  }

  // wipes any styles added to DOM elements by the easter egg
  window.location.reload();
}

// Text elements are assigned a random color on click
function colorEasterEgg() {
  var textNodes = document.querySelectorAll("p, h1, h2, h3, span, a, li, ul, ol, th, tr, td, input");

  for (let i = 0; i < textNodes.length; ++i) {
    $(textNodes[i]).on("click", function() {
      textNodes[i].style.color = getRandomColor();
    });
  }
}

// Adds a bit of internet humour to the webpage by replacing text and image elements, as well as randomising colors.
function konamiEasterEgg() {
  var navBar = document.getElementsByClassName("button");
  var nodes = document.getElementsByTagName("*");
  var textNodes = document.querySelectorAll("p, h1, h2, h3, span, a, li, ul, ol, th, tr, td, input");
  var images = document.getElementsByTagName("img");
  var body = document.getElementsByTagName("body");

  body[0].style.backgroundColor = getRandomColor();

  // replaces all image elements
  for (let i = 0; i < images.length; ++i) {
    images[i].src = "./images/mrdiqr.png";
    images[i].style.width = "40%";
    images[i].style.margin = "5%";
    images[i].style.transition = "transform 0.1s ease-out";
  }

  // sets random colors for nav button backgrounds
  for (let i = 0; i <= 4; ++i) {
    var randomColor = getRandomColor();
    navBar[i].style.backgroundColor = randomColor;
  }

  // Iterates over all nodes and generates new styles for each node
  for (let i = 0; i < textNodes.length; ++i) {

    // generating random numbers in a range from this Stack Overflow question http://stackoverflow.com/questions/4959975/generate-random-value-between-two-numbers-in-javascript
    var randomText = Math.floor((Math.random() * 3) + 1);
    randomColor = getRandomColor();

    // enlarges and randomises text color
    textNodes[i].style.fontSize = "1.5em";
    textNodes[i].style.color = randomColor;

    // sets the website title to a specific string and sets title specific style
    if (textNodes[i].id == "title") {
      textNodes[i].style.marginTop = "10%";
      textNodes[i].style.fontSize = "4em";
      textNodes[i].innerHTML = "WELCOME TO MEMES INCOPORATED";

    // sets random text to all other text elements
    } else if (randomText == 1) {
      textNodes[i].innerHTML = "Memes";
    } else if (randomText == 2) {
      textNodes[i].innerHTML = "Dank memes";
    } else {
      textNodes[i].innerHTML = "Rare pepes";
    }

  }

  // Sets onclick listeners for all text elements
  for (let i = 0; i < nodes.length; ++i) {
    $(nodes[i]).on("click", function() {
      nodes[i].style.color = getRandomColor();
      nodes[i].style.backgroundColor = getRandomColor();
    });
  }
}

// Returns a random color from the css named color pallate
function getRandomColor() {
  // color array from https://gist.github.com/bobspace/2712980
  var colorPallate = ["AliceBlue","AntiqueWhite","Aqua","Aquamarine","Azure","Beige","Bisque","Black","BlanchedAlmond","Blue","BlueViolet","Brown","BurlyWood","CadetBlue","Chartreuse","Chocolate","Coral","CornflowerBlue","Cornsilk","Crimson","Cyan","DarkBlue","DarkCyan","DarkGoldenRod","DarkGray","DarkGrey","DarkGreen","DarkKhaki","DarkMagenta","DarkOliveGreen","Darkorange","DarkOrchid","DarkRed","DarkSalmon","DarkSeaGreen","DarkSlateBlue","DarkSlateGray","DarkSlateGrey","DarkTurquoise","DarkViolet","DeepPink","DeepSkyBlue","DimGray","DimGrey","DodgerBlue","FireBrick","FloralWhite","ForestGreen","Fuchsia","Gainsboro","GhostWhite","Gold","GoldenRod","Gray","Grey","Green","GreenYellow","HoneyDew","HotPink","IndianRed","Indigo","Ivory","Khaki","Lavender","LavenderBlush","LawnGreen","LemonChiffon","LightBlue","LightCoral","LightCyan","LightGoldenRodYellow","LightGray","LightGrey","LightGreen","LightPink","LightSalmon","LightSeaGreen","LightSkyBlue","LightSlateGray","LightSlateGrey","LightSteelBlue","LightYellow","Lime","LimeGreen","Linen","Magenta","Maroon","MediumAquaMarine","MediumBlue","MediumOrchid","MediumPurple","MediumSeaGreen","MediumSlateBlue","MediumSpringGreen","MediumTurquoise","MediumVioletRed","MidnightBlue","MintCream","MistyRose","Moccasin","NavajoWhite","Navy","OldLace","Olive","OliveDrab","Orange","OrangeRed","Orchid","PaleGoldenRod","PaleGreen","PaleTurquoise","PaleVioletRed","PapayaWhip","PeachPuff","Peru","Pink","Plum","PowderBlue","Purple","Red","RosyBrown","RoyalBlue","SaddleBrown","Salmon","SandyBrown","SeaGreen","SeaShell","Sienna","Silver","SkyBlue","SlateBlue","SlateGray","SlateGrey","Snow","SpringGreen","SteelBlue","Tan","Teal","Thistle","Tomato","Turquoise","Violet","Wheat","White","WhiteSmoke","Yellow","YellowGreen"];

  var randomNumber = Math.floor((Math.random() * colorPallate.length));
  return colorPallate[randomNumber];
}

window.addEventListener("load", init);
