<?php

include 'config.php';

$id = $_POST['id'];
$test = "SELECT * FROM users WHERE UserId = $id";
$result = mysqli_query($conn, $test);
$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
//$active = $row['active'];

$count = mysqli_num_rows($result);

if ($count == 0) {
    // Display an error message with styling for Flight ID NOT FOUND
    echo '<div class="error-message">Flight ID NOT FOUND!!!</div>';
    header("Refresh:2; url=cancelbooking.html");
} else {
    $sql = "DELETE FROM users WHERE UserId = $id";

    if (!mysqli_query($conn, $sql)) {
        echo "Not Canceled!!!";
    } else {
        $temp = $row['Flight_Id'];
        $sql1 = "SELECT * FROM flights WHERE Id = $temp";
        $result = mysqli_query($conn, $sql1);
        $row2 = mysqli_fetch_array($result, MYSQLI_ASSOC);
        $updated_seats = $row2['Available_seats'] + $row['Seats_booked'];

        $sql2 = "UPDATE flights SET Available_seats='$updated_seats' WHERE Id = $temp";
        mysqli_query($conn, $sql2);

        // Display a success message with styling
        echo '<div class="success-message">Flight Canceled Successfully!!!</div>';
    }

    header("Refresh:2; url=welcome.php");

    mysqli_close($conn);
}

?>
<style>
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
