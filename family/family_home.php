<!-- Do not access this directly! Find a way to keep that from happening! -->
<?php
if (!isset($_SESSION)){
  session_start();
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <!-- We can use ./styles.css and not ../styles.css because this is all being called from index.php. Weird, I know. Don't worry about it. -Danny -->
    <link rel="stylesheet" href="./style.css" type="text/css">
    <title>Doctor Home</title>
  </head>
  <body>
    <?php
    include_once '../db.php';
    include './nav.php';
    $currentFileInfo = pathinfo(__FILE__);
    $requestInfo = pathinfo($_SERVER['REQUEST_URI']);
    if($currentFileInfo['basename'] == $requestInfo['basename']){
      die();
    }
    echo "<h1>Family Member's Home- Hello, " . $_SESSION['firstName']. "</h1>";
    ?>
  <section class="flexbox" style="width: 80vw;">
    <section class="flexbox"><div class="bluebox">Date</div><div class="bluebordered"><?php echo date("m/d/Y", time()) ?></div></section>
    <div class="bluebox" style="width: 145px;">Family code (For Patient's Family Member)</div><div class="bluebordered" style="width: 165px;">Will fill this in</div><br/>
    <div class="bluebox" style="width: 145px;">Patient ID (For Patient's Family Member)</div><div class="bluebordered" style="width: 165px;">Will fill this in</div><br/>
  </section>
  <table>
<tr>
  <th>Doctor's Name</th>
  <th>Doctor's Appointment</th>
  <th>Caregiver's Name</th>
  <th>Morning Medicine</th>
  <th>Afternoon Medicine</th>
  <th>Evening Medicine</th>
  <th>Breakfast</th>
  <th>Lunch</th>
  <th>Dinner</th>
</tr>
<tr>
  <td><?php echo "A name eventually" ?></td>
  <td></td>
  <td><?php echo "A name eventually" ?></td>
  <td align="center"><input name="mornmed" type="checkbox" readonly></td>
  <td align="center"><input name="aftmed" type="checkbox" readonly></td>
  <td align="center"><input name="evemed" type="checkbox" readonly></td>
  <td align="center"><input name="breakfast" type="checkbox" readonly></td>
  <td align="center"><input name="lunch" type="checkbox" readonly></td>
  <td align="center"><input name="dinner" type="checkbox" readonly></td>
</tr>
</table>

  </body>
</html>
