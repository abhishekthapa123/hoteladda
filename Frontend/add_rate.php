<?php



include('connect.php');
$hid = $_POST['hid'];
$newRating = $_POST['rating'];
$booking_id = $_POST['bid'];
$sql = "SELECT *FROM hotel where hotel_id ='$hid'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
 
  while($row = mysqli_fetch_assoc($result)) {

    $overallRating = $row['rating1'];
    $totalRating = $row['Total_rating'];
    $updatedRating = (($overallRating * $totalRating)+$newRating)/($totalRating +1);
    $totalRating = $totalRating + 1;

    $sql1 = "UPDATE hotel SET rating1= $updatedRating , Total_rating=$totalRating WHERE hotel_id=$hid";

    if (mysqli_query($conn, $sql1)) {

      $sql2 = "UPDATE bookings SET rate_flag='1' WHERE bid=$booking_id";

      if (mysqli_query($conn, $sql2)) {
      
        
          header("Location: http://localhost/hoteladda/Frontend/");
      } else {
      echo "Error updating record: " . mysqli_error($conn);
      }

      
       
    } else {
    echo "Error updating record: " . mysqli_error($conn);
    }
    

  }
} else {
  echo "0 results";
}




?>




