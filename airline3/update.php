<?php
include 'confige.php';

$flight_id = $_POST['flight_id'];
$total_cost = $_POST['price'];
$total_passengers = $_POST['total_passengers'];
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$mob_no = $_POST['mob_no'];
$email = $_POST['email'];

try {
    // Check if there are enough available seats
    $sql_check_seats = "SELECT Available_seats FROM flights WHERE Id = $flight_id";
    $result_check_seats = mysqli_query($conn, $sql_check_seats);

    if (!$result_check_seats) {
        throw new Exception("Error checking available seats: " . mysqli_error($conn));
    }

    $row = mysqli_fetch_assoc($result_check_seats);
    $available_seats = $row['Available_seats'];

    if ($available_seats < $total_passengers) {
        throw new Exception("Not enough available seats for booking. Available Seats: $available_seats, Requested Seats: $total_passengers");
    }

    // Start a transaction
    mysqli_begin_transaction($conn);

    // Insert booking information into the users table
    $sql_insert_booking = "INSERT INTO users (FirstName, LastName, MobileNo, Email, Flight_Id, Seats_booked, Total_Cost) VALUES ('$firstname','$lastname','$mob_no','$email','$flight_id','$total_passengers','$total_cost')";
    $result_insert_booking = mysqli_query($conn, $sql_insert_booking);

    if (!$result_insert_booking) {
        throw new Exception("Error inserting booking information: " . mysqli_error($conn));
    }

    // Update the available seats in the flights table
    $updated_seats = $available_seats - $total_passengers;
    $sql_update_seats = "UPDATE flights SET Available_seats = $updated_seats WHERE Id = $flight_id";
    $result_update_seats = mysqli_query($conn, $sql_update_seats);

    if (!$result_update_seats) {
        throw new Exception("Error updating available seats: " . mysqli_error($conn));
    }

    // Commit the transaction if everything is successful
    mysqli_commit($conn);

    echo "<h1>Time to fly!</h1> <br><br>";
    echo "Booked Successfully<br><br>";
} catch (Exception $e) {
    // Rollback the transaction and handle the exception
    mysqli_rollback($conn);

    echo "Error: " . $e->getMessage();
} finally {
    mysqli_close($conn);
}
?>


<!DOCTYPE html>
<html>
<head>
<style>
.button {
    background-color: #4CAF50;
    border: none;
    color: white;
    padding: 15px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    cursor: pointer;
}

body{
  background-image: url("images/ticket.jpg");
  background-repeat: no-repeat;
  background-size: cover;
  text-align: center;
  padding-top: 50px;
}
</style>
</head>
<body>

<a href="website.php" class="button">Done</a>


</body>
</html>
