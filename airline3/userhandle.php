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
// initializing variables
$name = "";
$errors = array();

include 'config.php';

$name = $_POST['us_name'];
$password_1 = $_POST['pass_no1'];
$password_2 = $_POST['pass_no2'];

// form validation: ensure that the form is correctly filled ...
// by adding (array_push()) corresponding error unto $errors array
if ($password_1 != $password_2) {
    array_push($errors, "The two passwords do not match");
}

// first check the database to make sure
// a user does not already exist with the same username and/or email
$user_check_query = "SELECT * FROM userlogin WHERE Username='$name' LIMIT 1";
$result = mysqli_query($conn, $user_check_query);
$user = mysqli_fetch_assoc($result);

if ($user) { // if user exists
    if ($user['Username'] === $name) {
        array_push($errors, "Username already exists");
    }
}

// Finally, register user if there are no errors in the form
if (count($errors) == 0) {
    $password = $password_1; // encrypt the password before saving in the database

    $query = "INSERT INTO userlogin (Username, Password) VALUES('$name','$password')";
    mysqli_query($conn, $query);

    echo '<div class="success-message">Account Created. Please login again.</div>';
    header("Refresh:2; url=userlogin.html");
} else {
    $arrlength = count($errors);

    for ($x = 0; $x < $arrlength; $x++) {
        echo '<div class="error-message">' . $errors[$x] . '</div>';
        header("Refresh:2; url=usersignup.html");
    }
}
mysqli_close($conn);
?>
</body>
</html>
