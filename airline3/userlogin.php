<!DOCTYPE html>
<html>
<head>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f2f2f2;
      text-align: center;
      padding-top: 50px;
    }

    .error-message {
      background-color: #ffcccc;
      color: #cc0000;
      padding: 15px;
      border-radius: 8px;
      margin: 20px auto;
      max-width: 400px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
  </style>
</head>
<body>

<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // username and password sent from form

    $name = $_POST['us_name'];
    $password = $_POST['pass_no'];

    $sql = "SELECT Username FROM userlogin WHERE Password = '$password'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    //$active = $row['active'];

    $count = mysqli_num_rows($result);

    // If result matched $myusername and $mypassword, table row must be 1 row

    if ($count == 1) {
        $_SESSION["myusername"] = $username;
        $_SESSION['login_user'] = $username;

        header("location: website.php");
    } else {
        echo '<div class="error-message">Your Login Name or Password is invalid</div>';
        header("Refresh:2; url=userlogin.html");
    }
}
mysqli_close($conn);
?>
</body>
</html>
