<?php 
session_start();
include('connect.php');
$hid = $_GET['id'];
$sql = "DELETE FROM hotel WHERE hotel_id =$hid";

if (mysqli_query($conn, $sql)) {
    $_SESSION['addadelete_hotels'] = "Successfully Removed Hotel";
    header("Location: http://localhost/hoteladda/Frontend/adda_hotels.php");

} else {
  echo "Error deleting record: " . mysqli_error($conn);
}

mysqli_close($conn);



?>