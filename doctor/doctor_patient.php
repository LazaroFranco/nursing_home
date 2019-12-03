<!-- Old medicine cannot be changed. -->
<?php
  include '../nav.php';
  include_once '../db.php';
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../style.css" type="text/css">
    <title>Patient of Doctor</title>
  </head>
  <body>
    <h1>Patient of Doctor</h1>
    <section class="centered">
      <table>
        <tr>
          <th>Date</th>
          <th>Comment</th>
          <th>Morning Med</th>
          <th>Afternoon Med</th>
          <th>Evening Med</th>
        </tr>
        <!-- Later on this will be replaced with PHP and a database. -->
        <tr>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
        </tr>
        <!-- End hard-coded, dummy section -->
      </table>
    </section>
    <form method="POST" name="newprescription">
    <div class="bluebox">New Prescription</div>
    <table>
      <tr>
        <th>Comment</th>
        <th>Morning Med</th>
        <th>Afternoon Med</th>
        <th>Evening Med</th>
      </tr>
      <!-- Inputs will be added here, or textareas I suppose. Will look later. -Danny. -->
      <tr>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
      </tr>
      <!-- End dummy section. -->
      <!-- This Ok button should only allow information to successfully enter the database if the patient has an appointment with the doctor on this day. -->
      <input type="submit" class="bluebox" name="ok" value="Ok">
      <input type="submit" class="bluebox" name="cancel" value="Cancel">
    </form>
    </table>
  </body>
</html>
