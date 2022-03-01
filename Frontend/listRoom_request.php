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
             
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /row -->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="white-box">
                            <h3 class="box-title"> <?php echo $_GET['hname']; ?> &nbspRequest Rooms</h3>
                        
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>

                                

                                        <tr>
                                      
                                            <th>Customer Name</th>
                                            <th>Phone</th>
                                            <th>Total Number</th>
                                            <th>Total Amount</th>
                                            <th>Check In</th>
                                            <th> Action</th>
                                  
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                       
                                        include('connect.php');
                                        $hid  = $_GET['hid'];
                                      $sql =  "SELECT *FROM bookings b INNER JOIN rooms r on b.rid = r.id where b.hid ='$hid' and request_flag='0'";
                                      $result = mysqli_query($conn, $sql);
                                       
                                while($row = mysqli_fetch_assoc($result)) {
                                     
                                       


                                       
                                        ?>
                                       
                                        <tr>
                               
                                        <td><?php echo $row['name']; ?></td>

                                        <td><?php echo $row['phone']; ?></td>
                                        <td><?php echo $row['total_number']; ?></td>
                                        <td><?php echo $row['total_amount']; ?></td>
                                        <td><?php echo $row['check_in']; ?></td>
                                        <td> 
                                        <a href="checkout_room.php?bid=<?php echo $row['bid'];?>&hid=<?php echo $row['hid'];?>&rid=<?php echo $row['rid'];?>&total_number=<?php echo $row['total_number']; ?>&total_amount=<?php echo $row['total_amount'] ?>&hname=<?php echo  $_GET['hname'];  ?>">
                                       
                                        <i class="fa fa-sign-out" aria-hidden="true"></i><span>CHECKOUT</span>
                                        </a>
                                         </td>

                                        </tr>
                                        <?php } ?>
                               
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
