<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8"/>
  <meta name="description" content="Lapis Web Design About"/>
  <meta name="keywords" content="lapis, web, design, development, about"/>
  <meta name="author" content="Bryn Walker"/>
  <title>Lapis Web Design and Development | About</title>
  <link rel="stylesheet" type="text/css" href="./styles/style.css"/>
  <link rel="stylesheet" type="text/css" href="./styles/responsive.css"/>
  <link href='https://fonts.googleapis.com/css?family=Bitter' rel='stylesheet' type='text/css'/>
  <script src="https://code.jquery.com/jquery-2.2.3.js"></script>
  <script src="./scripts/cheet.js" type="text/javascript"></script>
  <script src="./scripts/enhancements.js"></script>
</head>
<body>

  <?php include_once("menu.html"); ?>

  <!-- About -->
  <section id="about-left">
    <h1 id="name">Bryn Walker</h1>
    <section id="student-number">
      <h2 class="about">Student Number: </h2>
      <p class="about">101016859</p>
    </section>
    <section id="course" >
      <h2 class="about">Course: </h2>
      <p class="about">Bachelor of Computer Science</p>
    </section>
  </section>

  <section id="about-right">
    <img src="./images/me.jpg" alt="Photo of me."/>
    <div id="tutor">
      <h2 class="about">Tutor: </h2>
      <p class="about">Alan Colman</p>
    </div>
    <div id="tutorial">
      <h2 class="about">Tutorial: </h2>
      <p class="about">Tuesday | 2:30pm</p>
    </div>
  </section>

  <!-- Desktop timetable -->
  <table id="timetable">
    <thead>
      <tr>
        <th>Time</th>
        <th>Monday</th>
        <th>Tuesday</th>
        <th>Wednesday</th>
        <th>Thursday</th>
        <th>Friday</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td class="no-hover">8:30</td>
        <td rowspan="4" class="no-hover"></td>
        <td rowspan="8" class="no-hover"></td>
        <td rowspan="6" class="subject-NAS">Networks and Switching Lab</td>
        <td rowspan="14" class="no-hover"></td>
        <td rowspan="4" class="subject-ITP">Introduction to Programming Workshop</td>
      </tr>
      <tr>
        <td class="no-hover">9:00</td>
      </tr>
      <tr>
        <td class="no-hover">9:30</td>
      </tr>
      <tr>
        <td class="no-hover">10:00</td>
      </tr>
      <tr>
        <td class="no-hover">10:30</td>
        <td rowspan="4" class="subject-ITP">Introduction to Programming Lecture</td>
        <td rowspan="18" class="no-hover"></td>
      </tr>
      <tr>
      <td class="no-hover">11:00</td>
      </tr>
      <tr>
        <td class="no-hover">11:30</td>
        <td rowspan="2" class="no-hover"></td>
      </tr>
      <tr>
        <td class="no-hover">12:00</td>
      </tr>
      <tr>
        <td class="no-hover">12:30</td>
          <td rowspan="14" class="no-hover"></td>
          <td rowspan="4" class="subject-CWA">Creating Web Applications Lecture</td>
          <td rowspan="4" class="subject-CLE">Computer and Logic Essentials Lecture</td>
      </tr>
      <tr>
        <td class="no-hover">1:00</td>
      </tr>
      <tr>
        <td class="no-hover">1:30</td>
      </tr>
      <tr>
        <td class="no-hover">2:00</td>
      </tr>
      <tr>
        <td class="no-hover">2:30</td>
        <td rowspan="4" class="subject-CWA">Creating Web Applications Lab</td>
        <td rowspan="2" class="no-hover"></td>
      </tr>
      <tr>
        <td class="no-hover">3:00</td>
      </tr>
      <tr>
        <td class="no-hover">3:30</td>
        <td rowspan="4" class="subject-ITP">Introduction to Programming Lab</td>
        <td rowspan="4" class="subject-CLE">Computer and Logic Essentials Tutorial</td>
      </tr>
      <tr>
        <td class="no-hover">4:00</td>
      </tr>
      <tr>
        <td class="no-hover">4:30</td>
        <td rowspan="6" class="no-hover"></td>
      </tr>
      <tr>
        <td class="no-hover">5:00</td>
      </tr>
      <tr>
        <td class="no-hover">5:30</td>
        <td rowspan="4" class="no-hover"></td>
        <td rowspan="4" class="subject-NAS">Networks and Switching Lecture</td>
      </tr>
      <tr>
        <td class="no-hover">6:00</td>
      </tr>
      <tr>
        <td class="no-hover">6:30</td>
      </tr>
      <tr>
        <td class="no-hover">7:00</td>
      </tr>
    </tbody>
  </table>

  <!-- Responsive timetable -->
  <table id="responsive-timetable">
    <tr>
      <th colspan="2">Monday</th>
    </tr>
    <tr>
      <td>Programming Lecture</td>
      <td>10:30am - 12:30am</td>
    </tr>
    <tr>
      <th colspan="2">Tuesday</th>
    </tr>
    <tr>
      <td>Web Apps Lecture</td>
      <td>12:30pm - 2:30pm</td>
    </tr>
    <tr>
      <td>Web Apps Lab</td>
      <td>2:30pm - 4:30pm</td>
    </tr>
    <tr>
      <th colspan="2">Wednesday</th>
    </tr>
    <tr>
      <td>Networks Lab</td>
      <td>8:30am - 11:30am</td>
    </tr>
    <tr>
      <td>Logic Lecture</td>
      <td>12:30pm - 2:30pm</td>
    </tr>
    <tr>
      <td>Programming Lab</td>
      <td>3:30pm - 5:30pm</td>
    </tr>
    <tr>
      <th colspan="2">Thursday</th>
    </tr>
    <tr>
      <td>Logic Tutorial</td>
      <td>3:30pm - 5:30pm</td>
    </tr>
    <tr>
      <td>Networks Lecture</td>
      <td>5:30pm - 7:30pm</td>
    </tr>
    <tr>
      <th colspan="2">Friday</th>
    </tr>
    <tr>
      <td>Programming Workshop</td>
      <td>8:30am - 10:30am</td>
    </tr>
  </table>

  <!-- Mailto link to email address. Wrapped in an <aside> and floated right -->
  <aside id="email">
    <p>Email:
      <a href="mailto:brynwalker1@gmail.com">brynwalker1@gmail.com</a>
    </p>
  </aside>

  <?php include_once("footer.html"); ?>

</body>
</html>
