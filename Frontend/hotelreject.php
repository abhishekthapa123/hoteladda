<?php
include('connect.php');
$id = $_GET['id'];

$sql = "UPDATE hotel SET flag='2' WHERE hotel_id='$id'";

if (mysqli_query($conn, $sql)) {
    header("Location:http://localhost/hoteladda/Frontend/adda_admin.php");
}
 else {
  echo "Error updating record: " . mysqli_error($conn);
}



?>