<style>
table {
  width: 100%;
}

th{
  height: 50px;
  text-align:center;
  font-size: 15px;
  font-family: sans-serif;
  padding: 15px;
  text-align: left;
  background-color: #63b8ff;
  color: white;
}

td {
  text-align:center;
  font-size: 15px;
  font-family: sans-serif;
  padding: 15px;
  text-align: left;

}
/*tr:hover {background-color: #f5f5f5;}
tr:nth-child(even) {background-color: #63b8ff;}*/

/*tr:hover:not(.active) {
    background-color: #ffffe0;
  }

  .active {
    background-color: #63b8ff;
  }*/

</style>
<!DOCTYPE html>
<html>
<head>
  <style>
  ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
    overflow: hidden;
    font-size: 17px;
    /*background-color: #333;*/
  }

  li {
    float: right;
  }

  li a {
    display: block;
    color: black;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
  }


  li a:hover:not(.active) {
    background-color: #87cefa;
  }

  .active {
    background-color: #63b8ff;
  }

  body{
    background: url("images/feedback.jpg");
    background-size: cover;
    background-repeat: no-repeat;
  }
  .wrapper{
    width: 350px; padding: 20px;
    display: block;
    color: black;
    text-align: left;
    padding: 14px 16px;
    text-decoration: none;
    font-size: 25px;
    font-family: sans-serif;
    //background-image: url("images/cssback.png");

  }
  p{
    font-size: 20px;
    font-family: sans-serif;
    font-weight: bold;
  }
</style>


</head>
<body>

  <ul>
    <li><a href="logout.php">Logout</a></li>
    <li><a href="welcome.php">Home</a></li>
    <li><a href="addflight.html">Add Flight</a></li>
    <li><a href="deleteflight.html">Delete Flight</a></li>
    <li><a href="updateflight.html">Update Flight</a></li>
    <!--<li><a href="cancelbooking.html">Cancel Booking</a></li>-->
    <li style="font-weight: bold;"><a class="active" href="feedback.php"> Users Feedback </a></li>

    <li style="float: left; font-weight:bold; color:black;font-family: sans-serif;font-size: 43px;">AIRLINE MANAGEMENT SYSTEM</li>
  </ul>

  <p>Feedbacks:</p><br>


  <<?php

  include 'config.php';

  $sql = "SELECT * FROM feedback";

  $result = mysqli_query($conn,$sql);

  echo"<table border ='1'>";
  echo "<tr><th>Name</th><th>Contact</th><th>Email</th><th>Message</th></tr>";

  while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr><td>{$row['Name']}</td><td>{$row['Contact']}</td><td>{$row['Email']}</td><td>{$row['Message']}</td></tr>";

  }
  echo "</table>";


  mysqli_close($conn);

  ?>
  </body>
</html>