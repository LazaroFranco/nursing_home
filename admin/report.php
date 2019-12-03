<!-- Admins only, obviously. -->
    <!-- This is the admin homepage. So this is embedded and doesn't need to have ../. Don't touch nav/db/style please! -Danny. -->
<?php
include './nav.php';
include_once './db.php';
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Admin Report</title>
    <link href="./style.css" rel="stylesheet" type="text/css">
  </head>
  <body>
    <h1>Admin's Report</h1>
    <div class="bluebox">Date</div><div class="bluebordered"><?php echo date("m/d/Y", time()) ?></div>
    <h2>Missed Patient Activity</h2>
    <table>
  <tr>
    <th>Patient's Name</th>
    <th>Doctor's Name</th>
    <th>Doctor's Appt</th>
    <th>Caregiver Name</th>
    <th>Morning Med</th>
    <th>Afternoon Med</th>
    <th>Evening Med</th>
    <th>Breakfast</th>
    <th>Lunch</th>
    <th>Dinner</th>
  </tr>
  <!-- Replace later with PHP -->
  <tr>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
  </tr>
  <!-- Pray that no elderly folk have this happen to them. :( That's just sad. -->
</table>
  </body>
</html>
