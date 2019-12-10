<!-- Supervisors Only -->
<?php
  include '../nav.php';
  include_once '../db.php';
?>
  <?php
                if (isset($_POST['add'])) {
                    $roster_date = $_POST['roster_date'];
                    $supervisor = $_POST['supervisor'];
                    $doctor = $_POST['doctor'];
                    $caregiver1 = $_POST['caregiver1'];
                    $caregiver2 = $_POST['caregiver2'];
                    $caregiver3 = $_POST['caregiver3'];
                    $caregiver4 = $_POST['caregiver4'];

                    if (($roster_date != '') && ($supervisor != '') && ($doctor != '') && ($caregiver1 != '') && ($caregiver2 != '') && ($caregiver3 != '') && ($caregiver4 != '')) {
                        $insertRoster = "INSERT INTO `daily_roster` (date, supervisor, doctor, caregiver1, caregiver2, caregiver3, caregiver4) VALUES ('$roster_date', '$supervisor', '$doctor', '$caregiver1', '$caregiver2', '$caregiver3', '$caregiver4')";
                        if (mysqli_query($conn, $insertRoster)) {
                            echo "Congratulations, you have made a roster";
                        } else {
                            echo "Error with roster." . mysqli_error($conn);
                        }
                    }
                }

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../style.css" type="text/css">
    <title>Create New Roster</title>
  </head>
  <body>
    <h1>New Roster</h1>
    <form method="POST" name="newroster">
      <label>Date: </label>
        <input type="date" name="roster_date" />
      <br/>
    <label class="bluebox">Supervisor</label>
      <select name="supervisor" style="width: 200px;">
        <?php
        $query = "SELECT * FROM users WHERE role='supervisor' AND is_approved=1;";
        $result = mysqli_query($conn, $query);
        $resultCheck = mysqli_num_rows($result);
        if ($resultCheck > 0){
          while($row = mysqli_fetch_assoc($result)){
            echo "<option value=\"" . $row['ID'] . "\">". $row['ID'] . ": " .  $row['lastName'] . ", " . $row['firstName'] ."</option>";
          }
        }
         ?>

    </select>
    <br/>
    <label class="bluebox">Doctor</label>
      <select name="doctor" style="width: 200px;">
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
    <br/>
    <label class="bluebox">Caregiver 1</label>
      <select name="caregiver1" style="width: 200px;">
        <?php
        $query = "SELECT * FROM users WHERE role='caregiver' AND is_approved=1;";
        $result = mysqli_query($conn, $query);
        $resultCheck = mysqli_num_rows($result);
        if ($resultCheck > 0){
          while($row = mysqli_fetch_assoc($result)){
            echo "<option value=\"" . $row['ID'] . "\">". $row['ID'] . ": " .  $row['lastName'] . ", " . $row['firstName'] ."</option>";
          }
        }
         ?>
    </select>
    <br/>
    <label class="bluebox">Caregiver 2</label>
      <select name="caregiver2" style="width: 200px;">
        <?php
        $query = "SELECT * FROM users WHERE role='caregiver' AND is_approved=1;";
        $result = mysqli_query($conn, $query);
        $resultCheck = mysqli_num_rows($result);
        if ($resultCheck > 0){
          while($row = mysqli_fetch_assoc($result)){
            echo "<option value=\"" . $row['ID'] . "\">". $row['ID'] . ": " .  $row['lastName'] . ", " . $row['firstName'] ."</option>";
          }
        }
         ?>

    </select>
    <br/>
    <label class="bluebox">Caregiver 3</label>
      <select name="caregiver3" style="width: 200px;">
        <?php
        $query = "SELECT * FROM users WHERE role='caregiver' AND is_approved=1;";
        $result = mysqli_query($conn, $query);
        $resultCheck = mysqli_num_rows($result);
        if ($resultCheck > 0){
          while($row = mysqli_fetch_assoc($result)){
            echo "<option value=\"" . $row['ID'] . "\">". $row['ID'] . ": " .  $row['lastName'] . ", " . $row['firstName'] ."</option>";
          }
        }
         ?>
    </select>
    <br/>
    <label class="bluebox">Caregiver 4</label>
      <select name="caregiver4" style="width: 200px;">
        <?php
        $query = "SELECT * FROM users WHERE role='caregiver' AND is_approved=1;";
        $result = mysqli_query($conn, $query);
        $resultCheck = mysqli_num_rows($result);
        if ($resultCheck > 0){
          while($row = mysqli_fetch_assoc($result)){
            echo "<option value=\"" . $row['ID'] . "\">". $row['ID'] . ": " .  $row['lastName'] . ", " . $row['firstName'] ."</option>";
          }
        }
         ?>
    
</select>
      <br/>

    <input class="bluebox" type="submit" name="add" value="Ok">
      <input class="bluebox" type="submit" name="cancel" value="Cancel">
    </form>
  </body>
</html>
