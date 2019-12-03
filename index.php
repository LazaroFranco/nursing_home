<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="style.css" type="text/css">
    <title>Home Page</title>
  </head>
  <body>
    <nav>
    </nav>
    <?php
    session_start();
    include_once 'db.php';
      if (isset($_SESSION['ID'])){
        // Start looking for roles.
        $role= $_SESSION['role'];
        // echo "Hello, " . $_SESSION['firstName'] . "! You are a " . $role . ".";
        if ($role == "doctor"){
          // Create the Doctor Home.
            include("./doctor/doctor_home.php");
          } else if ($role == "caregiver"){
            // Create the Caregiver Home.
              include("./caregiver/caregiver_home.php");
            } else if ($role == "family"){
              // Create the Family Home.
                include("./family/family_home.php");
              } else if ($role == "patient"){
                // Create the Patient Home.
                  include("./patient/patient_home.php");
                } else if ($role == "admin"){
                  // They're an admin.
                  include("./admin/report.php");
                } else {
                  // They're a superviser.
                  include("./supervisor/roster.php");
                }

      } else {
        // They ain't even logged in.
        header("Location: splash.php");
      }

     ?>
  </body>
</html>
