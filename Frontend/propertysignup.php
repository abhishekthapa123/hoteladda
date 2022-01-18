<?php
include('connect.php');
$username = $_GET['username'];
$address = $_GET['address'];
$phone = $_GET['phone'];
$email = $_GET['email'];
$password  = $_GET['password'];
$sql = "INSERT INTO admin (username, address, phone,email,password)
VALUES ('$username','$address','$phone','$email','$password')";

if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();







?>