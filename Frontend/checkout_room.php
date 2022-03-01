<?php
include('connect.php');

$hid = $_GET['hid'];
$rid = $_GET['rid'];
$total_room = $_GET['total_number'];
$bid = $_GET['bid'];
$total_amount = $_GET['total_amount'];
$hname = $_GET['hname'];

update_roomCheckout($hid,$rid,$total_room,$bid,$conn,$total_amount,$hname);

function update_roomCheckout($hid,$rid,$total_room,$bid,$conn,$total_amount,$hname)
{



    $sql = "SELECT *FROM rooms where id = $rid";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
     $current_number =  $row["current_number"];
     $updatedcurrent_number = $current_number +$total_room;
     $sql = "UPDATE rooms SET current_number= $updatedcurrent_number  WHERE id=$rid";

     if (mysqli_query($conn, $sql)) {
        update_hotelCheckout($hid,$total_room,$bid,$conn);
        income($hid,$conn,$total_amount);
        barGraph($hid,$conn,$total_room,$rid);
        header("Location: ");
     } else {
   echo "Error updating record: " . mysqli_error($conn);
     }
  }
} else {
  echo "0 results";
}




   

mysqli_close($conn);
}

function update_hotelCheckout($hid,$total_room,$bid,$conn)
{
    $sql = "SELECT *FROM hotel where hotel_id = $hid";
    $result = mysqli_query($conn, $sql);
    while($row = mysqli_fetch_assoc($result)) {
        
        $hotelroom = $row['hotel_total_rooms'];
        $updatehotel_room = $hotelroom + $total_room;

        $sql = "UPDATE hotel SET hotel_total_rooms = $updatehotel_room WHERE hotel_id = $hid";

        if (mysqli_query($conn, $sql)) 
        {
            $sql = "UPDATE Bookings SET request_flag='1' WHERE bid=$bid";

            if (mysqli_query($conn, $sql)) {
      
        } else {
                echo "Error updating record: " . mysqli_error($conn);
        }


        } 
        else 
        {
                echo "Error updating record: " . mysqli_error($conn);
        }


   
    }
}



function income($hid,$conn,$total_amount)
{
  $todayDate =  date('m/d/Y ');
 
  $sql = "INSERT INTO income (Amount, datee, hid)
  VALUES ($total_amount,'$todayDate',$hid)";

  if (mysqli_query($conn, $sql)) {
 
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
}


function barGraph($hid,$conn,$total_room,$rid)
{
  
    $sql = "SELECT * FROM rooms where id =$rid ";
    $result = mysqli_query($conn, $sql);

    while($row = mysqli_fetch_assoc($result)) 
    {
      $roomname = $row['roomname'];

      
      $sql1 = "SELECT * FROM graph where hid = $hid";
      $result1 = mysqli_query($conn, $sql1);

      if (mysqli_num_rows($result1) > 0) // UPDATE query chalunu paryo 
      {
          if($roomname == "Single Bed") 
          {
            $sql = "SELECT * FROM graph where hid= $hid ";
            $result = mysqli_query($conn, $sql);
            
            
              // output data of each row
              while($row = mysqli_fetch_assoc($result)) {
               
                  $single_bed_total = $row['Single_Bed'];
                  $updated_singlebed = $single_bed_total + $total_room;
                  $sql = "UPDATE graph  SET Single_Bed=$updated_singlebed WHERE hid=$hid";

                  if (mysqli_query($conn, $sql)) {
               
                  } else {
                  echo "Error updating record: " . mysqli_error($conn);
                  }


              }
            } 
          
          else
          {
            $sql = "SELECT * FROM graph where hid= $hid ";
            $result = mysqli_query($conn, $sql);
            
            
              // output data of each row
              while($row = mysqli_fetch_assoc($result)) {
               
                  $double_bed_total = $row['Double_Bed'];
                  $updated_doublebed = $double_bed_total + $total_room;
                  $sql = "UPDATE graph  SET Double_Bed=$updated_doublebed WHERE hid=$hid";

                  if (mysqli_query($conn, $sql)) {
                  
                  } else {
                  echo "Error updating record: " . mysqli_error($conn);
                  }


              }   
          }
      }
      else            //Insert Query chalaunu paryo 
      {
        if($roomname == "Single Bed") 
        {

          $sql = "INSERT INTO graph (Single_Bed,hid)
          VALUES ($total_room,$hid)";
          
          if ($conn->query($sql) === TRUE) {
          
          } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
          }

        }
        else
        {
          $sql = "INSERT INTO graph (Double_Bed,hid)
          VALUES ($total_room,$hid)";
          
          if ($conn->query($sql) === TRUE) {
           
          } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
          }
        }
      }

    }
} 








?>