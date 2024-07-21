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

    .success-message {
      background-color: #ccffcc;
      color: #008000;
      padding: 15px;
      border-radius: 8px;
      margin: 20px auto;
      max-width: 400px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
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

$id = $_POST['id'];

$sql1 = "DELETE FROM users WHERE Flight_Id = $id";
$sql2 = "DELETE FROM flights WHERE Id = $id";

if (mysqli_query($conn, $sql1) && mysqli_affected_rows($conn) > 0 && mysqli_query($conn, $sql2) && mysqli_affected_rows($conn) > 0) {
    echo '<div class="success-message">Flight Deleted!!!</div>';
} else {
    echo '<div class="error-message">Flight Not Found or Not Deleted!!!</div>';
}

header("Refresh:2; url=welcome.php");

mysqli_close($conn);

?>
</body>
</html>
