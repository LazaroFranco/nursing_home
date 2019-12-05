<?php
$currentFileInfo = pathinfo(__FILE__);
$requestInfo = pathinfo($_SERVER['REQUEST_URI']);
if($currentFileInfo['basename'] == $requestInfo['basename']){
  die();
}
if (!isset($_SESSION)){
  session_start();
}
?>
<nav>
  <ul>
    <li><a class="bluebox" href="/nursing_home/logout.php">Logout</a></li>

    <?php
        $role= $_SESSION['role'];
        if ($role == 'admin'){
          echo "<li><a href=\"/nursing_home/admin/patients.php\">Patient Search</a></li>";
            echo "<li><a href=\"/nursing_home/admin/employee.php\">Employee Updates</a></li>";
            echo "<li><a href=\"/nursing_home/admin/approve.php\">Registration Approval</a></li>";
            echo "<li><a href=\"/nursing_home/admin/roles.php\">Roles</a></li>";
            echo "<li><a href=\"/nursing_home/admin/payments.php\">Payments</a></li>";
            echo "<li><a href=\"/nursing_home/index.php\">Admin Report</a></li>";
            echo "<li><a href=\"/nursing_home/admin/additional_patient.php\">Add More Patient Information</a></li>";
            echo "<li><a href=\"/nursing_home/admin/appointments.php\">Create Doctors Appointment</a></li>";
        } else if ($role == 'patient'){
          echo "<li><a href=\"/nursing_home/index.php\">Patient Homepage</a></li>";
        } else if ($role == 'doctor'){
          echo "<li><a href=\"/nursing_home/index.php\">Doctor Homepage</a></li>";
          echo "<li><a href=\"/nursing_home/doctor/doctor_patient.php\">Patient and Doctor Portal</a></li>";
        } else if ($role == 'supervisor'){
          echo "<li><a href=\"/nursing_home/index.php\">Roster</a></li>";
          echo "<li><a href=\"/nursing_home/supervisor/new_roster.php\">New Roster</a></li>";
            echo "<li><a href=\"/nursing_home/admin/appointments.php\">Create Doctors Appointment</a></li>";
        } else if ($role == 'caregiver'){
          echo "<li><a href=\"/nursing_home/index.php\">Caregiver Homepage</a></li>";
        } else if ($role == 'family'){
          echo "<li><a href=\"/nursing_home/index.php\">Family Homepage</a></li>";
        }
     ?>
  </ul>
</nav>
