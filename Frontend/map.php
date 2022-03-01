<!DOCTYPE html>
<html>
<body>

<h1>Hotel Map</h1>

<div id="googleMap" style="width:100%;height:400px;"></div>
<?php 
include('connect.php');
$id = $_GET['id'];

$sql = "SELECT * FROM hotel where hotel_id = '$id'";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) 

 
{
    while($row = mysqli_fetch_assoc($result)) {


         $lat = $row['lat'];
         $lng = $row['lng'];
      
    }
}
  



mysqli_close($conn);

?>

<script>
    var lat = '<?php echo $lat ?>';
    var lng = '<?php echo $lng ?>';
    var finalLat = parseFloat(lat);
    var finalLng = parseFloat(lng);
    
   function myMap()
   {
       var coordinates = {lat:finalLat,lng:finalLng};
       var map = new google.maps.Map(document.getElementById('googleMap'),{
        zoom:10,
        center:coordinates
       });
       var marker = new google.maps.Marker({
           position:coordinates,
           map:map
       });
   }

</script>


<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCKPjTonrlVzrTNbJ8mHMXWLYjdJ3fMgrA&callback=myMap"></script>

</body>
</html>