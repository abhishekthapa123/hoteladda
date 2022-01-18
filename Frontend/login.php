<?php
session_start();
include('connect.php');
$email =$_GET['email'];
$password =$_GET['password'];

$sql = "SELECT * FROM user where email= '$email' And password = '$password'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    $_SESSION["email"] = $email;
    header("Location: http://localhost/hoteladda/Frontend/");

  }
} else {
  $errormsg ="Incorrect email or password";
  header('Location: http://localhost/hoteladda/Frontend/loginform.php?errormsg='.$errormsg);
}
$conn->close();

?>