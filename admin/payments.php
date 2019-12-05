<?php
  include '../nav.php';
  include_once '../db.php';
  if (!isset ($_SESSION)){
    session_start();
  }
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link href="../style.css" rel="stylesheet" type="text/css">
    <title>Payments</title>
  </head>
  <body>
    <h1>Payments</h1>
    <form method="POST" name="paymentform">
    <div class="bluebox">Patient ID</div><input type="number" class="bluebordered" name="patientid" step="1"><br/>
    <div class="bluebox">Total Due</div><input type="number" class="bluebordered" name="totaldue" step="1"><br/>
    <div class="bluebox">New Payment</div><input type="number" class="bluebordered" name="newpay" step="1"><br/>
    <input class="bluebox" type="submit" name="ok" value="Ok"><input class="bluebox" type="submit" name="cancel" value="Cancel">
    </form>

    <!-- Inline styling because I'm not going to use this anywhere else. -->
    <section id="billinginformation" class="bluebordered">
      <p>$10 for every day</p>
      <p>$50 for every appointment</p>
      <p>$5 for every medicine/month</p>
    </section>
  </body>
</html>
