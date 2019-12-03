<?php
session_start();
error_reporting(0);
include_once '../db.php';
include '../nav.php';
//check connection
if (!$conn) {
  die("Connection failed: " . mysqli_error());
}
else {
  mysqli_query($conn,"SELECT users.ID FROM users INNER JOIN employee ON users.ID=employee.ID");
}

?>

<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta name="keywords" content="HTML, CSS, XML, XHTML, JavaScript, PHP">
    <title>Employee </title>
    <link href="../style.css" rel="stylesheet" type="text/css">
  </head>
    <body>
      <h1>Employee</h1>
      <form action="employee.php" method="POST">
      <table>
        <tr>
          <th>ID</th>
          <th>Name</th>
          <th>Role</th>
          <th>Salary</th>
        </tr>
      <?php 
        $query = mysqli_query($conn, "SELECT employee.ID, employee.salary, users.role, users.firstName, users.lastName FROM employee, users WHERE users.ID = employee.ID");
        $i = 1;
        while($row = mysqli_fetch_array($query)){
          echo "
                <tr>
                  <td name='ID'>" . $row['ID'] . "</td>
                  <td name='name'>" . $row['firstName'] . '&nbsp;' . $row['lastName'] . "</td>
                  <td name='role'>" . $row['role'] . "</td>
                  <td name='salary'>" . $row['salary'] . "</td>
                </tr>";

        }

        echo "
          <label>Employee ID: </label>
            <input type='number' name='ID'>
          <br>
          <label>New Salary: </label>
            <input type='number' name='salary'>
          <br>
          <button class='blueblox' type='submit' name='update'>Update</button>
          <button class='blueblox' value='Refresh Page' onClick='window.location.reload();'>Cancel</button>
";




      if (isset($_POST['update'])) {
        $ID = $_POST['ID'];
        $salary = $_POST['salary'];
        

        if (($ID != '') && ($salary != '')) {
          

          $dataQuery = "UPDATE employee SET salary = '$salary' WHERE ID = '$ID'";


          if (mysqli_query($conn, $dataQuery)) {
            echo "Salary has been updated";
          }
          else {
            echo "Error updating salary" . mysqli_error($conn);
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
