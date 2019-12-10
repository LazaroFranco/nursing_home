<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <!-- So this is ok because this is being called from index.php which is in the same directory as style.css. In other words don't modify this line. -Danny. -->
    <link rel="stylesheet" href="./style.css" type="text/css">
    <title>Doctor Home</title>
  </head>
  <body>
    <?php
    include_once 'db.php';
    include 'nav.php';
    $currentFileInfo = pathinfo(__FILE__);
    $requestInfo = pathinfo($_SERVER['REQUEST_URI']);
    if($currentFileInfo['basename'] == $requestInfo['basename']){
      die();
    }
    echo "<h1>Doctor's Home- Hello, " . $_SESSION['firstName']. "</h1>";
    ?>
    <table>
  <tr>
    <th class="silverbg">Name</th>
    <th class="silverbg">Date</th>
    <th class="silverbg">Comment</th>
    <th class="silverbg">Morning Med</th>
    <th class="silverbg">Afternoon Med</th>
    <th class="silverbg">Evening Med</th>
  </tr>
  <!-- Later on, replace this with PHP code. -->
  <tr>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
  </tr>
</table>

<section class="flexbox"><div class="bluebox">Appointments</div><div class="bluebordered">Till Date</div></section>

<table>
  <tr>
    <th class="silverbg">Patient</th>
    <th class="silverbg">Date</th>
    <th class="silverbg">Comment</th>
  </tr>
    <?php
  $query = mysqli_query($conn,"SELECT * FROM daily_roster, users WHERE users.ID = daily_roster.supervisor");

      while($row = mysqli_fetch_array($query)){
          echo "
                <tr>
                  <td name='name'>" . $row['firstName'] . " " . $row['lastName'] . "</td>
                  <td name='date'>" . $row['date'] . "</td>
                  <td name='comment'>" . $row['comment'] . "</td>
                </tr>";
        }
     ?>
  <tr>
  </tr>
</table>

  </body>
</html>
