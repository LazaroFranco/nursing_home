<?php
  include '../nav.php';
  include_once '../db.php';

if (isset($_POST['cappt'])){
    $patient_id = $_POST['patient_id'];
    $doctor_id = $_POST['doctor_id'];
    $date = $_POST['date'];
    $comment = $_POST['comment'];
    if ($comment == ''){
      $comment = "None";
    }

    $appt = "INSERT INTO Appointments (patient_id, appt_date, doctor_id, comment) VALUES ('$patient_id', '$date', $doctor_id, '$comment');";

    if (mysqli_query($conn, $appt)){
      echo "Appointment Created";
    } 
    else {
      echo "Error creating appointment" . mysqli_error($conn);
    }
  }

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../style.css" type="text/css">
    <title>Appointments</title>
  </head>
  <body>
    <h1>Doctor's Appointment</h1>
    <form method="POST">
      <label class="bluebox">Patient</label>
        <select class="bluebordered" type="text" name="patient_id">
        <?php
        $query = "SELECT * FROM users WHERE role='patient' AND is_approved=1;";
        $result = mysqli_query($conn, $query);
        $resultCheck = mysqli_num_rows($result);
        if ($resultCheck > 0){
          while($row = mysqli_fetch_assoc($result)){
            echo "<option value=\"" . $row['ID'] . "\">". $row['ID'] . ": " .  $row['lastName'] . ", " . $row['firstName'] ."</option>";
          }
        }
         ?>
      </select>
<br>
      <label class="bluebox">Date</label>
        <input class="bluebordered" type="date" name="date">
<br>
      <label class="bluebox">Doctor</label>
        <select class="bluebordered" type="text" name="doctor_id">
        <?php
        $query = "SELECT * FROM users WHERE role='doctor' AND is_approved=1;";
        $result = mysqli_query($conn, $query);
        $resultCheck = mysqli_num_rows($result);
        if ($resultCheck > 0){
          while($row = mysqli_fetch_assoc($result)){
            echo "<option value=\"" . $row['ID'] . "\">". $row['ID'] . ": " .  $row['lastName'] . ", " . $row['firstName'] ."</option>";
          }
        }
         ?>
      </select>
<br>
      <label class="bluebox">Comment</label>
        <textarea class="bluebordered" name="comment" required></textarea>
<br>
      <input type="submit" name="cappt" value="Submit">
      <input type="reset" name="cancel" value="Cancel">
    </form>
  </body>
</html>
