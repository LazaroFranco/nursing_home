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
    <title>Roles </title>
    <link href="../style.css" rel="stylesheet" type="text/css">
  </head>
    <body>
      <h1>Roles</h1>
      <form action="roles.php" method="POST">
      <table>
        <tr>
          <th>Role</th>
          <th>Access Level</th>
          <th>Edit</th>
        </tr>
      <?php 
        $query = mysqli_query($conn, "SELECT * FROM role");
        $i = 1;
        while($row = mysqli_fetch_array($query)){
          echo "
                <tr>
                  <td name='role'>" . $row['role_id'] . "</td>
                  <td name='firstName'>" . $row['access_level'] . "</td>
                  <td>
                    <button class='bluebox' type='submit' name='delete[$i]' value='".$row['role_id']."'>Delete</button>
                  </td>
                </tr>";

        }

        echo "
          <label>New Role: </label>
            <input type='text' name='role_id'>
          <br>
          <label>Access Level: </label>
            <input type='text' name='access_level'>
          <br>
          <button class='blueblox' type='submit' name='add'>Add Role</button>
          <button class='blueblox' value='Refresh Page' onClick='window.location.reload();'>Cancel</button>
";

          if (isset($_POST['delete'])) {
            foreach ($_POST['delete'] as $value) {
            echo "ID: " . $value . " has been updated";
           $sql = "DELETE FROM role  WHERE role_id = '$value'";
           mysqli_query($conn, $sql);
            }
          }


      if (isset($_POST['add'])) {
        $role = $_POST['role_id'];
        $access_level = $_POST['access_level'];
        

        if (($role != '') && ($access_level != '')) {
          
          $dataQuery = "INSERT INTO role (role_id, access_level) VALUES
             ('$role', '$access_level')";

          if (mysqli_query($conn, $dataQuery)) {
            echo "Role has been created";
          }
          else {
            echo "Error creating role" . mysqli_error($conn);
          }
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
