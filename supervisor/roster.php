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
    <h1>Today's Roster</h1>
    <section style="margin: 20px;">
      <div class="bluebox">Date</div>
    <div class="bluebordered">
      <?php 
        echo date("m/d/Y", time()); 
      ?>
    </div>
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
<?php
    // SUPERVISOR QUERY
$date = date("Y/m/d", time());
          $query = mysqli_query($conn,"SELECT * FROM daily_roster, users WHERE users.ID = daily_roster.supervisor AND date = '$date'");
              while($row = mysqli_fetch_array($query)){
                echo "
                          <td name='name'>" . $row['supervisor'] . " " . $row['firstName'] ." " . $row['lastName'] . "</td>

                       ";
                }

        ?> 
<?php
    // DOCTOR  QUERY
$date = date("Y/m/d", time());

          $query = mysqli_query($conn,"SELECT * FROM daily_roster, users WHERE users.ID = daily_roster.doctor AND date = '$date'");
              while($row = mysqli_fetch_array($query)){
                echo "
                          <td name='name'>" . $row['doctor'] . " " . $row['firstName'] ." " . $row['lastName'] . "</td>

                        ";
                }

        ?>

<?php
  // CAREGIVER 1 QUERY
  $date = date("Y/m/d", time());

          $query = mysqli_query($conn,"SELECT * FROM daily_roster, users WHERE users.ID = daily_roster.caregiver1 AND date = '$date'");
              while($row = mysqli_fetch_array($query)){
                  echo "
                          <td name='name'>" . $row['caregiver1'] . " " . $row['firstName'] ." " . $row['lastName'] . "</td>

                        ";
                }

        ?>


<?php
    // CAREGIVER 2 QUERY
  $date = date("Y/m/d", time());

          $query = mysqli_query($conn,"SELECT * FROM daily_roster, users WHERE users.ID = daily_roster.caregiver2 AND date = '$date'");
              while($row = mysqli_fetch_array($query)){
                  echo "
                          <td name='name'>" . $row['caregiver2'] . " " . $row['firstName'] ." " . $row['lastName'] . "</td>

                        ";
                }

        ?>

<?php
    // CAREGIVER 3 QUERY
  $date = date("Y/m/d", time());

          $query = mysqli_query($conn,"SELECT * FROM daily_roster, users WHERE users.ID = daily_roster.caregiver3 AND date = '$date'");
              while($row = mysqli_fetch_array($query)){
                  echo "
                          <td name='name'>" . $row['caregiver3'] . " " . $row['firstName'] ." " . $row['lastName'] . "</td>

                        ";
                }

        ?>


<?php
    // CAREGIVER 4 QUERY
  $date = date("Y/m/d", time());

          $query = mysqli_query($conn,"SELECT * FROM daily_roster, users WHERE users.ID = daily_roster.caregiver4 AND date = '$date'");
              while($row = mysqli_fetch_array($query)){
                  echo "
                          <td name='name'>" . $row['caregiver4'] . " " . $row['firstName'] ." " . $row['lastName'] . "</td>

                        ";
                }

        ?>
      </tr>
    </table>
  </body>
</html>
