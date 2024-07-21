<?php
// initializing variables
$username = "";
$errors = array();

include 'config.php';

$username = $_POST['username'];
$password_1 = $_POST['password1'];
$password_2 = $_POST['password2'];

// form validation: ensure that the form is correctly filled ...
// by adding (array_push()) corresponding error unto $errors array
if ($password_1 != $password_2) {
    array_push($errors, "The two passwords do not match");
}

// first check the database to make sure
// a user does not already exist with the same username and/or email
$user_check_query = "SELECT * FROM admins WHERE Username='$username' LIMIT 1";
$result = mysqli_query($conn, $user_check_query);
$user = mysqli_fetch_assoc($result);

if ($user) { // if user exists
  if ($user['Username'] === $username) {
    array_push($errors, "Username already exists");
    }
}

// Finally, register user if there are no errors in the form
if (count($errors) == 0) {
    $password = $password_1; //encrypt the password before saving in the database

    $query = "INSERT INTO admins (Username, Password)
              VALUES('$username','$password')";
    mysqli_query($conn, $query);

    // HTML and CSS styling for the success message
    echo '<div style="background-color: #4CAF50; color: white; text-align: center; padding: 10px;">
            <h3>Account Created. Please login.</h3>
          </div>';

    // Redirect to the login page after 2 seconds
    header("Refresh:2; url=admin.html");
} else {
    // HTML and CSS styling for displaying errors
    echo '<div style="background-color: #ff9999; color: #cc0000; text-align: center; padding: 10px;">';

    $arrlength = count($errors);
    for ($x = 0; $x < $arrlength; $x++) {
        echo $errors[$x] . "<br>";
    }

    echo '</div>';

    // Redirect to the signup page after 2 seconds
    header("Refresh:2; url=signup.html");
}
?>
