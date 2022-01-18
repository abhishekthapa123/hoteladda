<?php
session_start();
include('connect.php');
$email = $_GET['email'];
$password = $_GET['password'];

$sql = "SELECT * FROM admin where email ='$email'and password = '$password'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $_SESSION['adminemail' ]= $email;
    header("Location:http://localhost/hoteladda/Frontend/myhotels.php");
  }
 else {
$errormsg= "Incorrect email or password";
header('Location: http://localhost/hoteladda/Frontend/propertyloginform.php?errormsg='.$errormsg);
}
$conn->close();







?>