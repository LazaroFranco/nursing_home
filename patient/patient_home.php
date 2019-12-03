<!-- Do not access this directly! Find a way to keep that from happening! -->
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <!-- This is embedded in index.php, so everything is called as if this is index.php. Therefore, I don't need to use ../ here. In other words, don't edit ./db.php and don't edit ./nav or ./style. -Danny -->
    <link rel="stylesheet" href="./style.css" type="text/css">
    <title>Doctor Home</title>
  </head>
  <body>
    <?php
    include_once './db.php';
    include './nav.php';
    $currentFileInfo = pathinfo(__FILE__);
    $requestInfo = pathinfo($_SERVER['REQUEST_URI']);
    if($currentFileInfo['basename'] == $requestInfo['basename']){
      die();
    }
    echo "<h1>Patient's Home</h1>";
    ?>

  <section class="flexbox" style="width: 60vw;"><div class="bluebox flexchild">Patient ID</div><div class="bluebordered flexchild" style="width: 200px;"><?php echo $_SESSION['code'] ?? 0 ?></div><br/><div class="bluebox flexchild" style="margin-left:10px;">Date</div><div class="bluebordered flexchild" style="width: 200px;"><?php echo date("m-d-Y",time()) ?></div><div class="bluebox flexchild">Patient Name</div><div class="bluebordered flexchild" style="width: 200px;"><?php echo $_SESSION['firstName'] . " " . $_SESSION['lastName'] ?></div></section>
  <table>
    <tr>
      <th class="silverbg">Doctor's Name</th>
      <th class="silverbg">Doctor's Appointment</th>
      <th class="silverbg">Caregiver's Name</th>
      <th class="silverbg">Morning Medicine</th>
      <th class="silverbg">Afternoon Medicine</th>
      <th class="silverbg">Night Medicine</th>
      <th class="silverbg">Breakfast</th>
      <th class="silverbg">Lunch</th>
      <th class="silverbg">Dinner</th>
    </tr>
    <!-- This will be PHP later on. -->
    <tr>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td align="center"><input type="checkbox" name="breakfastbox"></td>
      <td align="center"><input type="checkbox" name="lunchbox"></td>
      <td align="center"><input type="checkbox" name="dinnerbox"></td>
    </tr>
  </table>

  </body>
</html>
