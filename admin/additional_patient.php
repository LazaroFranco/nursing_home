<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../style.css" type="text/css">
    <?php
    // Pre-HTML rendering
    session_start();
    include_once '../db.php';
    include '../nav.php';
    if (!isset($_SESSION)){
      session_start();
    }
    date_default_timezone_set('America/New_York');
    $month = date('m');
    $day = date('d');
    $year = date('Y');

    $today = $year . '-' . $month . '-' . $day;

    if ($_SESSION['role'] != 'admin'){
      die("<h1>Only admins may see this page.</h1>");
    }


    ?>
    <title>Please Provide More Information</title>
  </head>
  <body>
<h1>Additional Patient Information</h1>
<label>Patient ID</label>
<form method="post" name="moreinfo">
<!-- <input type="number" name="patientID" step=1 min=0 required onchange="testfunction()" id="patientid"> -->
<input type="number" name="patientID" step=1 min=0 required id="patientid">
<br/>
<label>Group</label>
<input type="number" name="group" step=1 max=9 min=0 required>
<br/>
<label>Admission Date</label>
<input type="date" name="admissiondate" required>
<br/>
<label>Date</label>
<input type="date" name="date" value="<?php echo $today ?>" required>
<br/>
<label>Doctor</label>
<!-- <input type="text" name="doctor" required><br/> -->
<select name="doctor">
  <?php
    //Do PHP and see how many doctors we have.
    $query= "SELECT * FROM users WHERE role='doctor' AND is_approved=1;";
    $result = mysqli_query($conn, $query);
    $resultCheck = mysqli_num_rows($result);
    if ($resultCheck > 0){
      while($row = mysqli_fetch_assoc($result)){
        echo "<option value=\"" . $row['lastName'] . " " . $row['firstName'] . "\">Dr.". $row['firstName']. " " . $row['lastName'] ."</option>";
      }
    }
   ?>
</select><br/>
<input type="submit" name="ok" value="Ok"> <input type="submit" name="cancel" value="Cancel">
</form>
<?php
    if (isset($_POST['patientID'])){
      // Form's filled out. Let's prepare the database.
       $pID = $_POST['patientID'];
       $pGroup = $_POST['group'];
       $pDate= $_POST['admissiondate'];
       $cDate = $_POST['date'];
       // $pDoc = $_POST['doctor'];
       $pName= $_SESSION['firstName'] . " " . $_SESSION['lastName'];

       // HEY !! UPDATE THE QUERY!!
       $pQuery= "UPDATE patients SET admission_date = '$pDate', groupnum=$pGroup WHERE ID=$pID";

       // Let's try these queries ig.
       try{
         mysqli_query($conn, $pQuery);
         echo "<section><h2>Thank you for your co-operation. Someone will approve your account shortly. You may now close this browser window or be redirected in 5 seconds.</h2></section>";
         header( "refresh:5; url=additional_patient.php" );
       }
       catch (Exception $e){
         echo "<section>Something went wrong: " .$e . "</section>";
       }
    }
?>
  </body>
</html>
