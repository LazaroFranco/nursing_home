<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="./style.css" type="text/css">
    <title>Splash Page</title>
  </head>
  <body>
    <header>Franco's Nursing Home</header>
    <form method="post" name="loginform">
      <div class="logindiv"><span>Email: <input type="text" name="email"></span>
      <span>Password: <input type="password" name="password"></span>
      <input type="submit" value="Login" name="login">
      </div>
    </form>
<?php
include_once 'db.php';

session_start();
if ($_SERVER['REQUEST_METHOD']=='POST'){
  $email = $_POST['email'];
  $pass= $_POST['password'];
  $query = "SELECT * FROM users WHERE email= '$email' AND password ='$pass'";
  $result = mysqli_query($conn, $query);
  if (mysqli_num_rows($result) > 0){
    while ($row = mysqli_fetch_assoc($result)){
      // echo $row['ID'] . " " . $row['firstName'];
      // Get Information.
      $_SESSION['ID']= $row['ID'];
      $_SESSION['firstName']= $row['firstName'];
      $_SESSION['lastName']= $row['lastName'];
      $_SESSION['email']= $row['email'];
      $_SESSION['role']= $row['role'];
      $_SESSION['phone']= $row['phone'];
      $_SESSION['dob']= $row['dob'];
      $_SESSION['econtact']= $row['econtact'];
      $_SESSION['recontact']= $row['recontact'];
      $_SESSION['code']= $row['code'];
      if ($row['is_approved']==1){
        header("Location: index.php");
      } else {
        echo "<section class=\"centered\"><p>Sorry, but an admin must approve your account. Please wait for an admin to approve your account, and then log in.</p></section>";
      }

    }
  } else if ($_POST['email']== '' || $pass= $_POST['password'] == '') {
    echo "<section class=\"centered\"><p>Sorry, but you did not enter a username or password.</p></section>";
  } else {
    echo "<section class=\"centered\"><p>Sorry, but your username or password was incorrect.</p></section>";
  }
}

// Check for password and email in the database.
// Also hash and salt that password.

?>
    <footer>
      <h2>Franco's Nursing Home</h2>
      <address>
        <p>750 E King St</p>
        <p>Lancaster, PA 17602</p>
        <p><a href="tel:1-717-299-7701" class="phone">717.299.7701</a></p>
      </address>
    </footer>

  </body>
</html>
