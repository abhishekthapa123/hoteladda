<?php


include('adminsidebar.php');

?>
        <!-- ============================================================== -->
        <!-- End Left Sidebar -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page Content -->
        <!-- ============================================================== -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        <a href="addhotelform.php" target="_blank" class="btn btn-danger pull-right m-l-20 hidden-xs hidden-sm waves-effect waves-light">Add Hotel

                        </a>
                        
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /row -->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="white-box">
                            <h3 class="box-title">My Hotels</h3>

                            <?php
                            
                                if(isset($_SESSION['addhotel_message']))
                                { ?>
                                  <div style= "padding:10px;background-color:	#ffbf00; width:500px;height:50px;">
                                  <h4 >  <?php echo $_SESSION['addhotel_message']; ?> </h4>
                                  </div>
                           <?php } unset($_SESSION['addhotel_message']);  ?>      


                            
               
                            
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>

                                

                                        <tr>
                                     
                                            <th>Hotel Name</th>
                                            <th>Location</th>
                                            <th>Ratings</th>
                                            <th> Action</th>
                                  
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                              
                                         $admin_id;
                                         $email= $_SESSION['adminemail'];
                                        include('connect.php');
                                        $sql = "SELECT * FROM admin where email='$email'";
                                        $result = mysqli_query($conn, $sql);



                                   while($row = mysqli_fetch_assoc($result)) {
                                  $admin_id = $row['id'];
                                 }

                                 $sql1 = "SELECT * FROM hotel where flag='1'and admin_id = '$admin_id'";
                                 $result = mysqli_query($conn, $sql1);



                                    while($row = mysqli_fetch_assoc($result)) {
                                
                         



                                        ?>
                                        <tr>
                                            <td><?php echo $row['hotelname'] ?></td>
                                            <td><?php echo $row['location'] ?></td>
                                            <td><?php echo $row['rating1'] ?></td>
                                            <?php
                                           
                                                $hid = $row['hotel_id'];
                                                $singlebed = 'Single Bed';
                                                $doublebed  = 'Double Bed';
                                                   $sql2 = "SELECT *FROM rooms where roomname='$singlebed'and  hid ='$hid' ";
                                                   $result2 = mysqli_query($conn, $sql2);
                                                   if (mysqli_num_rows($result2) > 0) {
                                                    $sql3 = "SELECT *FROM rooms where roomname='$doublebed'and  hid ='$hid' ";
                                                    $result3 = mysqli_query($conn, $sql3);
                                                    if (mysqli_num_rows($result3) > 0) {
                                                        // echo "both seater available";
                                                    }
                                                    else{ ?>
                                                        <td><a href="addroomsform.php?id=<?php echo $row['hotel_id'];?>" ><button type="button" class="btn btn-primary">ADD ROOMS</button></td> </a>
                                                   <?php }
                                                   }
                                                   else{  ?>
                                                    <td><a href="addroomsform.php?id=<?php echo $row['hotel_id'];?>" ><button type="button" class="btn btn-primary">ADD ROOMS</button></td> </a>
                                                  <?php  }

                                            ?>

                                            
                                        </tr>
                                      <?php    } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
           
        </div>
        <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->
    <!-- jQuery -->
    <script src="plugins/bower_components/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- Menu Plugin JavaScript -->
    <script src="plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.js"></script>
    <!--slimscroll JavaScript -->
    <script src="js/jquery.slimscroll.js"></script>
    <!--Wave Effects -->
    <script src="js/waves.js"></script>
    <!-- Custom Theme JavaScript -->
    <script src="js/custom.min.js"></script>
</body>

</html>
