<?php
include('connect.php');
$email = $_POST['email'];
$password = $_POST['password'];

$sql = "SELECT * FROM superadmin where email='$email'and password='$password'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    header("Location: http://localhost/hoteladda/Frontend/adda_admin.php");
} else {
    $errormsg ="Incorrect email or password";
    header('Location: http://localhost/hoteladda/Frontend/adda_admin_login.php?errormsg='.$errormsg);
}

?>