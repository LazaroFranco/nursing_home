<?php
  include '../nav.php';
  include_once '../db.php';
?>
<!-- Admins and Supervisors Only -->
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../style.css" type="text/css">
    <title>Appointments</title>
  </head>
  <body>
    <h1>Doctor's Appointment</h1>
    <form method="POST" name="doctorappt">
      <div class="bluebox">Patient ID</div><input class="bluebordered" type="text" name="patientid">
      <div class="bluebox">Date</div><input class="bluebordered" type="text" name="date">
      <div class="bluebox">Doctor</div><input class="bluebordered" type="text" name="doctor">
      <div class="bluebox">Patient Name</div><input class="bluebordered" type="text" name="patientname" readonly>
      <input type="submit" name="ok" value="Ok"><input type="submit" name="cancel" value="Cancel">
    </form>
  </body>
</html>
