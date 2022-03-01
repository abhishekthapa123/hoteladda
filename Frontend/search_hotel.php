<?php 

include('header.php')

?>

<body>
        <?php 

            include('navbar.php')
        ?>
        <div class="tm-section tm-bg-img" id="tm-section-1">
            <div class="tm-bg-white ie-container-width-fix-2">
                <div class="container ie-h-align-center-fix">
                    <div class="row">
                        <div class="col-xs-12 ml-auto mr-auto ie-container-width-fix">
                            <form action="search_hotel.php#result" method="post" class="tm-search-form tm-section-pad-2">
                                <div class="form-row tm-search-form-row">
                                    <div class="form-group tm-form-element tm-form-element-100">
                                        <i class="fa fa-map-marker fa-2x tm-form-element-icon"></i>
                                        <input name="city" type="text" class="form-control" id="inputCity" placeholder="Type your destination..." required>
                                    </div>
          
                                </div>
                                <div class="form-row tm-search-form-row">
                                   
                                 
                                    <div class="form-group tm-form-element tm-form-element-2">
                                        <select name="room" class="form-control tm-select" id="room" style="margin-top:-65px; margin-left:450px;" required>
                                            <option value="">Room</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                           
                                        </select>
                                        <i class="fa fa-2x fa-bed tm-form-element-icon" style="margin-top:-65px; margin-left:445px;"></i>
                                    </div>
                                    <div class="form-group tm-form-element tm-form-element-2">
                                        <button type="submit" class="btn btn-primary tm-btn-search">Check Availability</button>
                                    </div>
                                  </div>
                                  <div class="form-row clearfix pl-2 pr-2 tm-fx-col-xs">
                                      <p class="tm-margin-b-0"></p>
                                      <a href="#" class="ie-10-ml-auto ml-auto mt-1 tm-font-semibold tm-color-primary">Need Help?</a>
                                  </div>
                            </form>
                        </div>                        
                    </div>      
                </div>
            </div>                  
        </div>
        
        <div class="tm-section-2">
            <div class="container">
                <div class="row">
                    <div class="col text-center">
                        <h2 class="tm-section-title">Nepal's Fatest Growing Hotel Chain</h2>
                       <p><br><br></p>
                        <a href="#ouressentials" class="tm-color-white tm-btn-white-bordered">Our Essentials</a>
                    </div>                
                </div>
            </div>        
        </div>
        
        <div class="tm-section tm-position-relative">
          
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" preserveAspectRatio="none" class="tm-section-down-arrow">
                <polygon fill="#ee5057" points="0,0  100,0  50,60"></polygon>                   
            </svg> 
            <div class="container tm-pt-5 tm-pb-4" id="ouressentials"> 
                <div class="row text-center">
                    <article class="col-sm-12 col-md-4 col-lg-4 col-xl-4 tm-article">                            
                        <i class="fa tm-fa-6x fa-bed tm-color-primary tm-margin-b-20"></i>
                        <h3 class="tm-color-primary tm-article-title-1">Spotless Linene</h3>
                       
                    </article>
                    <article class="col-sm-12 col-md-4 col-lg-4 col-xl-4 tm-article">                            
                        <i class="fa tm-fa-6x fa-wifi tm-color-primary tm-margin-b-20"></i>
                        <h3 class="tm-color-primary tm-article-title-1">Free Wifi Services</h3>
                        
                    </article>
                    <article class="col-sm-12 col-md-4 col-lg-4 col-xl-4 tm-article">                           
                        <i class="fa tm-fa-6x fa-tv tm-color-primary tm-margin-b-20"></i>
                        <h3 class="tm-color-primary tm-article-title-1">TeleVision</h3>
                       
                    </article>
                </div>        
            </div>
        </div>
        
                    <div>

                            </div>
        <div class="tm-section tm-section-pad tm-bg-gray" id="tm-section-4">
            
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-8 col-xl-8">
                        
                    <div class="tm-bg-white">
                            <div class="tm-bg-primary tm-sidebar-pad">
                                <h3 class="tm-color-white tm-sidebar-title">Searched Hotels</h3>
                               
                            </div>
                        </div>     
                        <div class="tm-article-carousel" id="result">
                                            
                                    <?php
                                    include('connect.php');

                                    $city = $_POST['city'];
                                    $room = $_POST['room'];
                                    $sql = "SELECT *FROM hotel where location like '%$city%' and  hotel_total_rooms >='$room'";
                                     $result = mysqli_query($conn, $sql);
                                  
                                       // output data of each row
        
                            // output data of each row
                             while($row = mysqli_fetch_assoc($result)) 
                             {
                               
                                   
                             ?> 
                            <article class="tm-bg-white mr-2 tm-carousel-item">
                                <img src=<?php echo $row['image'];  ?> alt="Image" class="img-fluid" height="500px">
                                <div class="tm-article-pad">
                                    <header><h3 class="text-uppercase tm-article-title-2"><?php  echo $row['hotelname']; ?></h3></header>
                                    <p><?php echo $row['services'];   ?> <span style="color:seagreen; margin-left:55px;"><?php echo round($row['rating1'],1);   ?>&nbsp<i class="fa tm-fa fa-star" style="color:darkorange"></i></span>
                   
                                    </p>
                                   
                                    <a href="bookroom.php?id=<?php echo $row['hotel_id']; ?>" class="text-uppercase btn btn-success">Book Now</a>
                                    &nbsp&nbsp;<a href="map.php?id=<?php echo $row['hotel_id']; ?>" class="text-uppercase btn btn-warning">View on Map</a>
                                </div>                                
                            </article>                    
                           
                            <?php } ?>         
                        
                         
                        </div>    
                    </div>
                    
                    <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4 tm-recommended-container">
                    <div class="tm-bg-white">
                                <div class="tm-bg-primary tm-sidebar-pad">
                                    <h3 class="tm-color-white tm-sidebar-title">Filters</h3>
                                    
                                </div>
                              
                              
                            </div>
                        </div>                            
                    </div>
                </div>
            </div>
        </div>

        <div class="tm-bg-video">
            <div class="overlay">
                <i class="fa fa-5x fa-play-circle tm-btn-play"></i>
                <i class="fa fa-5x fa-pause-circle tm-btn-pause"></i>
            </div>
            <video controls loop class="tmVideo" >
                <source src="videos/video1.mp4" type="video/mp4">
                <source src="videos/video1.ogg" type="video/ogg">
                Your browser does not support the video tag.
            </video>
         
        </div>           

        <div class="tm-section tm-section-pad tm-bg-img tm-position-relative" id="tm-section-6">
            <div class="container ie-h-align-center-fix">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-7">
                        <div id="google-map"></div>        
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-5 mt-3 mt-md-0">
                        <div class="tm-bg-white tm-p-4">
                            <form action="index.html" method="post" class="contact-form">
                                <div class="form-group">
                                    <input type="text" id="contact_name" name="contact_name" class="form-control" placeholder="Name"  required/>
                                </div>
                                <div class="form-group">
                                    <input type="email" id="contact_email" name="contact_email" class="form-control" placeholder="Email"  required/>
                                </div>
                                <div class="form-group">
                                    <input type="text" id="contact_subject" name="contact_subject" class="form-control" placeholder="Subject"  required/>
                                </div>
                                <div class="form-group">
                                    <textarea id="contact_message" name="contact_message" class="form-control" rows="9" placeholder="Message" required></textarea>
                                </div>
                                <button type="submit" class="btn btn-primary tm-btn-primary">Send Message Now</button>
                            </form>
                        </div>                            
                    </div>
                </div>        
            </div>
        </div>
        <?php

            include('footer.php')

            ?>