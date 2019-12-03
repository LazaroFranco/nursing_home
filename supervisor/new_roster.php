<!-- Supervisors Only -->
<?php
  include '../nav.php';
  include_once '../db.php';
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
    <div class="bluebox">Date</div><input class="bluebordered" type="text" name="date" value="<?php echo date("m/d/y", time()) ?>" readonly><br/>
    <div class="bluebox">Supervisor</div><select name="supervisor" style="width: 200px;"></select><br/>
    <div class="bluebox">Doctor</div><select name="doctor" style="width: 200px;"></select><br/>
    <div class="bluebox">Caregiver 1</div><select name="caregiver1" style="width: 200px;"></select><br/>
    <div class="bluebox">Caregiver 2</div><select name="caregiver2" style="width: 200px;"></select><br/>
    <div class="bluebox">Caregiver 3</div><select name="caregiver3" style="width: 200px;"></select><br/>
    <div class="bluebox">Caregiver 4</div><select name="caregiver4" style="width: 200px;"></select><br/>
    <input class="bluebox" type="submit" name="ok" value="Ok">  <input class="bluebox" type="submit" name="cancel" value="Cancel">
    </form>
  </body>
</html>
