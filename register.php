<?php
include_once './db.php';
//check connection
if (!$conn) {
  die("Connection failed: " . mysqli_error());

}

session_start();

if (isset($_POST['register'])) {
  $role = $_POST['role'];
  $firstname = $_POST['firstname'];
  $lastname = $_POST['lastname'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $phone = $_POST['phone'];
  $dob = $_POST['dob'];
  $familycode = $_POST['familycode'] ?? '';
  $econtactnum = $_POST['econtactnum'] ?? '';
  $familyrelation = $_POST['familyrelation'] ?? '';



    $dataQuery = "INSERT INTO users (role, firstName, lastName, email, password, phone, dob) VALUES ('$role', '$firstname', '$lastname', '$email', '$password', '$phone', '$dob')";


    $empinfo = "INSERT INTO employee (ID) 
                SELECT ID
                FROM users
                WHERE users.ID NOT IN (SELECT ID
                       FROM employee)";

      if (mysqli_query($conn, $dataQuery) && mysqli_query($conn, $empinfo)) {
      // echo "User has been created";
      if ($familycode != ''){
         $pQuery = "SELECT * FROM users WHERE email= '$email' AND role= 'patient';";
         $result = mysqli_query($conn, $pQuery);
         $resultCheck = mysqli_num_rows($result);
         if ($resultCheck > 0){
           while($row = mysqli_fetch_assoc($result)){
             $pID = $row['ID'];
           }

           $patientData = "INSERT INTO Patients (ID, patient_id, familycode, econtactnum, familyrelation) VALUES ($pID, $pID, '$familycode', '$econtactnum', '$familyrelation')";
           try{
             mysqli_query($conn, $patientData);
           }
           catch (Exception $e)
           {
             echo $e;
           }
           $_SESSION['firstName'] = $firstname;
           $_SESSION['lastName'] = $lastname;
           $_SESSION['email'] = $email;
           echo "<h2>Thank you for registering as a patient, " . $firstname . ". Please  wait to be approved by an administrator.</h2>";
           // header( "refresh:5; url=splash.php" );

         }


        // You'll have to add the extra stuff to the patients table actually.
      } else if ($role=="doctor"){
        // Gotta add them to the doctor table now.
        $firstName= $_POST['firstname'];
        $lastName= $_POST['lastname'];
        $query= "SELECT ID from users WHERE firstName= '$firstName' AND lastName='$lastName' AND email='$email'";
        $result = mysqli_query($conn, $query);
        $resultCheck = mysqli_num_rows($result);
        if ($resultCheck > 0){
          while($row = mysqli_fetch_assoc($result)){
            $pID = $row['ID'];
  
          }

          // New query: Put them in the doctor database.
          echo $firstName . "'s ID: " . $pID . "<br/>";
          $dQuery = "INSERT INTO doctors (ID), VALUES ($pID)";

          // if (mysqli_query($conn, $dQuery)){
          //   echo "Thanks, added this employee.";
          //   header( "refresh:5; url=splash.php" );
          // }
          try{
            mysqli_query($conn, $dQuery);
     
          }
          catch (Exception $e){
            echo $e;
          }
        }

      } else {
        echo "<h2>Thank you for registering, " . $firstname . ". Please  wait to be approved by an administrator.</h2>";

      }
    }


}



// Close connection
mysqli_close($conn);
?>

<html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta name="keywords" content="HTML, CSS, XML, XHTML, JavaScript, PHP">
    <title>Registration Page </title>
    <link href="styles.css" rel="stylesheet" type="text/css">
    <script language="javascript">

    function dis_able()
    {
            if(document..D1.value != 'Others')
                    document.register.otherz.disabled=1;
            else
                    document.register.otherz.disabled=0;
    }
    </script>
  </head>

  <body>
    <header>Welcome!</header>
    <button href="login.php">Login</button>
      <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
      <script type="text/javascript">
      function hidingSections(){
        var section= document.getElementById("patientbool");
        var selection= document.getElementById("role");
        var roleChoice = selection.options[selection.selectedIndex].value
        if (roleChoice == "patient"){
          console.log("They said that they're a patient.");
          section.setAttribute("style", "display: block");
        } else {
          console.log("They said they aren't a patient.");
          section.setAttribute("style", "display: none");
        }
      }
          $(function () {
              $("#role").change(function () {
                  if ($(this).val() == "patient") {
                      $("#code").removeAttr("disabled");
                      $("#code").focus();
                  } else {
                      $("#code").attr("disabled", "disabled");
                  }
              });
          });
      </script>
    <form action="register.php" name="register" method="POST">
      <label>Role:</label>
      <select id="role" name="role" onchange="hidingSections()">
          <option  value="supervisor">Supervisor</option>
          <option value="caregiver">Caregiver</option>
          <option value="doctor">Doctor</option>
          <option value="admin">Admin</option>
          <option value="patient">Patient</option>
          <option value="family">Family</option>
      </select>
      <br>
      <label>First Name</label>
        <input type="text" name="firstname" required>
      <br>
        <label>Last Name</label>
          <input type="text" name="lastname" required>
        <br>
        <label>Email ID</label>
          <input type="email" name="email" required>
        <br>
        <label>Password</label>
          <input type="password" name="password" required>
        <br>
        <label>Phone</label>
          <!-- <input type="number" name="phone"> -->
          <input type="tel" name="phone" pattern="[0-9]{3}[0-9]{3}[0-9]{4}" required> <small>Format: 1234567890</small>
        <br>
        <label>Date of Birth</label>
          <input type="date" id="start" name="dob" value="yyyy-mm-dd" min="1901-01-01" max="2019-10-30" required>                <br>
        <section id="patientbool" style="display: none;">
        <label>Family code (For patient or Family Member)</label>
          <input type="text" id="code" name="familycode" disabled="disabled" >
        <br>
        <label>Emergency Contact</label>
        <input type="tel" id="econtact" name="econtactnum" pattern="[0-9]{3}[0-9]{3}[0-9]{4}"> <small>Format: 1234567890</small>
        <br>
        <label>Relation To Emergency Contact</label>
          <input type="text" name="familyrelation">
        </section>
        <br>
        <input type="submit" class="submit" name="register" value="Enroll!">
      </form>
    <footer>Copyright 2019</footer>
  </body>
</html>
