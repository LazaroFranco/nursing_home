<!-- Supervisors Only -->
<?php
  include './nav.php';
  include_once './db.php';
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="./style.css" type="text/css">
    <title>Roster</title>
  </head>
  <body>
    <h1>Roster</h1>
    <section style="margin: 20px;">
      <div class="bluebox">Date</div><div class="bluebordered"><?php echo date("m/d/Y", time()); ?></div>
    </section>
    <table>
  <tr>
    <th>Supervisor</th>
    <th>Doctor</th>
    <th>Caregiver1</th>
    <th>Caregiver2</th>
    <th>Caregiver3</th>
    <th>Caregiver4</th>
  </tr>
  <tr>
    <td>Name</td>
    <td>Name</td>
    <td>Name</td>
    <td>Name</td>
    <td>Name</td>
    <td><br>Name</td>
  </tr>
  <tr>
    <td>Patient Group</td>
    <td>Patient Group</td>
    <td>Patient Group</td>
    <td>Patient Group</td>
    <td>Patient Group</td>
    <td>Patient Group</td>
  </tr>
</table>
  </body>
</html>
