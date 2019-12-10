<?php
session_start();
error_reporting(0);
include_once '../db.php';
include '../nav.php';
//check connection
if (!$conn) {
  die("Connection failed: " . mysqli_error());
}


?>

<html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta name="keywords" content="HTML, CSS, XML, XHTML, JavaScript, PHP">
    <title>Registration Page </title>
    <link href="../style.css" rel="stylesheet" type="text/css">
  </head>
    <body>
      <h1>Registration Approval</h1>
      <h4>0 = Approved, 1 = Not Approved</h4>
      <form action='approve.php' method='POST'>
      <table>
        <tr>
          <th>ID</th>
          <th>First Name</th>
          <th>Last Name</th>
          <th>Role</th>
          <th>Approval Status</th>
          <th>Update</th>
        </tr>
      <?php 
        $query = mysqli_query($conn, "SELECT * FROM users");
        $i = 1;
        while($row = mysqli_fetch_array($query)){
          echo "
                <tr>
                  <td name='id'>" . $row['ID'] . "</td>
                  <td name='firstName'>" . $row['firstName'] . "</td>
                  <td name='lastName'>" . $row['lastName'] . "</td>
                  <td name='row'>" . $row['role'] . "</td>
                  <td name='is_approved'>" . $row['is_approved'] . "</td>
                  <td>
                    <button class='bluebox' type='submit' name='approve[$i]' value='".$row['ID']."'>Approve</button> 
                    <button class='bluebox' type='submit' name='disapprove[$i]' value='".$row['ID']."'>Disapprove</button>
                    <button class='bluebox' type='submit' name='delete[$i]' value='".$row['ID']."'>Delete</button>
                  </td>
                </tr>";
        }

          if (isset($_POST['approve'])) {
            foreach ($_POST['approve'] as $value) {
            echo "ID: " . $value . " has been updated";
           $sql = "UPDATE users SET is_approved = TRUE WHERE ID = '$value'"; 
           mysqli_query($conn, $sql);
            }
          }
        
          if (isset($_POST['disapprove'])) {
            foreach ($_POST['disapprove'] as $value) {
            echo "ID: " . $value . " has been updated";
           $sql = "UPDATE users SET is_approved = 0 WHERE ID = $value"; 
           mysqli_query($conn, $sql);
            }
          }


          if (isset($_POST['delete'])) {
            foreach ($_POST['delete'] as $value) {
            echo "ID: " . $value . " has been updated";
           $sql = "DELETE FROM users WHERE users.ID = '$value'";
           mysqli_query($conn, $sql);
            }
          }

        mysqli_close($conn); //Make sure to close out the database connection
?>
        </table>
      </form>
      <button class="bluebox" value="Refresh Page" onClick="window.location.reload();"> Refresh Page</button>
     <footer>Copyright 2019</footer>
  </body>
</html>
