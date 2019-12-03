<?php
  // error_reporting(0);
  session_start();
  $previous = "javascript:history.go(-1)";
  if(isset($_SERVER['HTTP_REFERER'])) {
      $previous = $_SERVER['HTTP_REFERER'];
  }

  // Block direct access that isn't an admin!
  include_once '../db.php';
  include '../nav.php';
  echo "<head><!DOCTYPE html><html lang=\"en\" dir=\"ltr\">";
  echo "<link rel=\"stylesheet\" href=\"../style.css\" type=\"text/css\">";
  echo "<meta charset=\"utf-8\">";
  if($_SESSION['role'] != "admin"){
    echo "<title>Restricted</title></head>";
    die("<section class=\"centered\"><h1>You do not have the required permissions to access this page.</h1><br/><a href=" .$previous .">Back</a></section>");
  } else {
    echo "<title>Patient Search</title></head>";
  }
?>
  <body>
    <!-- Gotta start using semantics, honestly. -->
          <table>
        <tr>
          <th class=\"silverbg\">ID</th>
          <th class=\"silverbg\">Name</th>
          <th class=\"silverbg\">Age</th>
          <th class=\"silverbg\">Emergency Contact</th>
          <th class=\"silverbg\">Emergency Contact Relation</th>
          <th class=\"silverbg\">Admission Date</th>
        </tr>
        <tr>
          <form method="post" name="searchpatients">
          <td align="center"><input type="number" name="IDsearch"></td>
          <td align="center"><input type="text" name="namesearch"></td>
          <!-- <td align="center"><input type="number" name="agesearch"></td> -->
          <td align="center"><input type="number" name="agesearch"></td>
          <td align="center"><input type="number" name="econtacts"></td>
          <td align="center"><input type="text" name="recontacts"></td>
          <td align="center"><input type="date" name="admissiondate"><input class="bluebox" type="submit" name="searchsubmit" value="Search"></td>
          </tr>
        </form>
        <?php
          if ($_SERVER['REQUEST_METHOD']== 'POST'){
            // We searched! The table isn't done yet!
            $patientID = $_POST['IDsearch'];
            $patientname= $_POST['namesearch'];
            $patientage= $_POST['agesearch'];
            $patientec= $_POST['econtacts'];
            $patientrec= $_POST['recontacts'];
            $patientad= $_POST['admissiondate'];
            $query= "SELECT * FROM users INNER JOIN Patients ON users.ID=Patients.ID WHERE users.role='patient'";
            if ($patientID=="" && $patientname=="" && $patientec=="" && $patientrec=="" && $patientage=="" && $patientad==""){
              // No query constraints added.
              $query = $query . ";";
              echo "<tr><td class=\"silverbg\" align=\"center\" colspan=\"6\">Showing all patients</td>";
              echo "</tr>";
              $result = mysqli_query($conn, $query);
              $resultCheck = mysqli_num_rows($result);
              if ($resultCheck > 0){
                while($row = mysqli_fetch_assoc($result)){
                  $dateFormat = 'Y-m-d';
                  $stringDate = $row['dob'];
                  $date = DateTime::createFromFormat($dateFormat, $stringDate);
                  $birthYear= $date->format('Y');
                  $currentyear= date("Y");
                  $patientyear= $currentyear - $birthYear;
                  echo "<tr><td>" . $row['ID'] . "</td><td>" . $row['firstName'] . " " . $row['lastName'] . "</td><td>" . $patientyear . "</td><td>" . $row['econtactnum'] . "</td><td>" . $row['familyrelation'] . "</td><td> ". $row['admission_date'] ." </td>" ;
                  echo "</tr></td>";

                }
              }
            } else {
              if ($patientID != ""){
                // They filled in PatientID. Add it to the query.
                $query = $query . " AND users.ID= " . $patientID ;
              }

              if ($patientname != ""){
                // They filled in Patient Name. We need to blow this one up by spaces.
                $firstAndLast= explode(" ", $patientname);
                $query = $query . " AND users.firstName LIKE '%" . $firstAndLast[0]. "%'";
                if (isset($firstAndLast[1])){
                    $query = $query . " AND users.lastName LIKE '%" . $firstAndLast[1] . "%'";
                }
              }

              if ($patientage != ""){
                // They filled in Patientage. And I'm not happy about it.
                $pcurrentyear= date("Y");
                $actualD= $pcurrentyear - $patientage;
                $query = $query . " AND users.dob LIKE '$actualD-%'";
              }

              if ($patientec != ""){
                $query = $query . " AND Patients.econtactnum = " . $patientec;
              }

              if ($patientrec != ""){
                $query = $query . " AND Patients.familyrelation = '$patientrec'";
              }
              if ($patientad != ""){
                $query = $query . " AND Patients.admission_date = '$patientad'";
              }
              $query = $query . ";";
              // echo "<tr><td class=\"silverbg\" align=\"center\" colspan=\"6\">". $query . "</td></tr>";
              $result = mysqli_query($conn, $query);
              $resultCheck = mysqli_num_rows($result);

              if ($resultCheck == 0){
                echo "<tr><td class=\"silverbg\" align=\"center\" colspan=\"6\">No results found.</td></tr>";
              }

              if ($resultCheck > 0){
                if ($resultCheck == 1){
                  echo "<tr><td class=\"silverbg\" align=\"center\" colspan=\"6\">Showing 1 result</td></tr>";
                } else {
                  echo "<tr><td class=\"silverbg\" align=\"center\" colspan=\"6\">Showing " . $resultCheck . " results</td></tr>";
                }
                while($row = mysqli_fetch_assoc($result)){
                  $dateFormat = 'Y-m-d';
                  $stringDate = $row['dob'];
                  $date = DateTime::createFromFormat($dateFormat, $stringDate);
                  $birthYear= $date->format('Y');
                  $currentyear= date("Y");
                  $patientyear= $currentyear - $birthYear;
                  echo "<tr><td>" . $row['ID'] . "</td><td>" . $row['firstName'] . " " . $row['lastName'] . "</td><td>". $patientyear . "</td><td>" . $row['econtactnum'] . "</td><td align=\"center\">" . $row['familyrelation'] . "</td><td align=\"center\">". $row['admission_date'] . "</td>" ;
                  echo "</tr></td>";
                }
              }
            }




          }
        ?>
      </table>
  </body>
</html>
