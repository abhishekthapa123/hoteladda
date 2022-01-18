<?php
include('connect.php'); 
$email = $_GET['email'];
$password= $_GET['password'];
$sql = "SELECT * FROM user where email ='$email'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  $msg = "Email already exists";
  header('Location: http://localhost/hoteladda/Frontend/loginform.php?msg='.$msg);
  }
 else {
    $sql1 = "INSERT INTO user (email, password)
    VALUES ('$email', '$password')";
    
    if (mysqli_query($conn, $sql1)) {
        header('Location: http://localhost/hoteladda/Frontend/loginform.php');
    } else {
      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
    
}
$conn->close();



?>