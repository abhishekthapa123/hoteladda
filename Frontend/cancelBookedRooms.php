<?php
    include('connect.php');
    $id = $_GET['id'];
    $sql = "DELETE FROM bookings WHERE bid=$id";

if ($conn->query($sql) === TRUE) {
 
    header('Location:http://localhost/hoteladda/Frontend/roomRequest.php ');
} else {
  echo "Error deleting record: " . $conn->error;
}







?>