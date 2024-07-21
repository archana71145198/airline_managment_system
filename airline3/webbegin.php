<<?php
include 'config.php';
 ?>


<!DOCTYPE html>
<html>
<head>
<style>
ul {
    list-style-type: none;
    margin: 0;
    padding: 20px;
    overflow: hidden;
  /*  background-color: #5c5c5c;*/
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
    /*font-weight: bold;*/
    font-size: 18px;
}


li a:hover:not(.active) {
    background-color: #63b8ff;
}

.active {
    background-color:#1874cd;
}

body{
  background: url("images/wall_website.jfif");
  background-size: cover;
  background-repeat: no-repeat;
}
.wrapper{
      margin: 0px auto;
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
input[type=text],[type=number],[type=email],[type=date],select{
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}

input[type=submit] {
    width: 100%;
    background-color: #424242;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    font-weight: bold;
      font-size: 15px;
}

input[type=submit]:hover {
    background-color: cornflowerblue;
    /*background-color: #ff3e96;*/
}
</style>


</head>
<body>

<ul>
  <li style="font-weight: bold;"><a class="active" href="webbegin.php">Home</a></li>
  <li><a href="admin.html">Admin</a></li>
  <li><a href="userlogin.html">User Login</a></li>
 <!--<li><a href="contact.html">Contact</a></li>-->
  <li><a href="about.html">About</a></li>
  <li style="float: left; font-weight:bold; color:black;font-family: sans-serif;font-size: 43px;">AIRLINE MANAGEMENT SYSTEM</li>
</ul>
<h1 style="font-weight: bold; text-align: center; color:black;font-family: monospace; font-size:40px">Ready To Fly!</h1>
<p style=" text-align: left; color:black;font-family: monospace; font-size:20px; padding: 20px 33px;">Fly to your dreams and soar above the clouds with our easy-to-use booking app!!

Experience the thrill of travel with just a few taps on your screen.

Wherever you want to go, our app will take you there in style and comfort.

Book your next adventure with us and make memories that will last a lifetime.</p>
</body>
</html>