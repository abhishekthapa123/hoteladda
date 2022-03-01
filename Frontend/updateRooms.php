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
                            <h3 class="box-title"> Update Rooms Details</h3>
                        
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>

                                

                                        <tr>
                                     
                                            <th>Hotel Name</th>
                                            <th>Location</th>
                                            <th> Action</th>
                                  
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                       
                                        include('connect.php');
                                        $admin_email = $_SESSION['adminemail'];
                                        $sql = "SELECT * FROM hotel h INNER JOIN 
                                          admin a on h.admin_id = a.id
                                      
                                          where a.email='$admin_email'and flag='1'";
                                        $result = mysqli_query($conn, $sql);
                                      
                                       
                            while($row = mysqli_fetch_assoc($result)) {
                                     
                                      
                                  

                                        ?>
                                        <tr>
                                        
                                        <td><?php echo $row['hotelname']; ?></td>

                                        <td><?php echo $row['location']; ?></td>

                                        <td> 
                                        <a href="editRoom.php?hid=<?php echo $row['hotel_id'];?>&hname=<?php echo $row['hotelname']; ?>">
                                        <i class="fa tm-fa-40x fa-edit tm-color-primary tm-margin-b-40"></i>  
                                
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
