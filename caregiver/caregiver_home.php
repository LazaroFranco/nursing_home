<!-- Do not access this directly! Find a way to keep that from happening! -->
<?php
  include '../nav.php';
  include_once '../db.php';
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <!-- We don't need to do ../styles.css here because this is all being called from index.php, which is in the same directory as the css. In other words, don't touch it. -Danny. -->
    <link rel="stylesheet" href="./style.css" type="text/css">
    <title>Doctor Home</title>
  </head>
  <body>
    <?php
    include_once 'db.php';
    include 'nav.php';
    $currentFileInfo = pathinfo(__FILE__);
    $requestInfo = pathinfo($_SERVER['REQUEST_URI']);
    if($currentFileInfo['basename'] == $requestInfo['basename']){
      die();
    }
    echo "<h1>Caregiver's Home- Hello, " . $_SESSION['firstName']. "</h1>";
    ?>
  <section class="flexbox"><div class="bluebox">List of Patient's Duties Today</div></section>
    <table>
  <tr>
    <th class="silverbg">Name</th>
    <th class="silverbg">Date</th>
    <th class="silverbg">Comment</th>
    <th class="silverbg">Morning Med</th>
    <th class="silverbg">Afternoon Med</th>
    <th class="silverbg">Evening Med</th>
  </tr>
  <!-- Later on, replace this with PHP code. -->
  <tr>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
  </tr>
</table>

  </body>
</html>
