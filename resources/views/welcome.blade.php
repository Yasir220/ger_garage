<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ger Garage</title>
    <!-- Favicon -->
    <link rel="icon" sizes="16x16" href="assets/img/favicon-icon.png">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <!-- Font-awesome CSS -->
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <!-- Flaticon CSS -->
    <link rel="stylesheet" href="assets/css/flaticon.css">
    <!-- Ionicons CSS -->
    <link rel="stylesheet" href="assets/css/ionicons.min.css">
    <!-- Owl Carousel CSS -->
    <link rel="stylesheet" href="assets/css/owl.carousel.css">
    <!-- Magnific Popup CSS -->
    <link rel="stylesheet" href="assets/css/magnific-popup.css">
    <!-- Swiper CSS -->
    <link rel="stylesheet" href="assets/css/swiper.min.css">
    <!-- Datepicker CSS -->
    <link rel="stylesheet" href="assets/css/datepicker.css">
    <!-- Animate CSS -->
    <link rel="stylesheet" href="assets/css/animate.css">
    <!-- Style CSS -->
    <link rel="stylesheet" href="assets/style.css">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="assets/css/responsive.css">

    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">

    <!-- jQuery min js -->
    <script src="assets/js/jquery-1.12.4.min.js"></script>


</head>

<body>

    <!-- Preloader -->
    <div class="site-preloader-wrap">
        <div class="cssload-loader"></div>
    </div>

    <!-- Start Top Header Area -->
    <div class="top-header-area" id="home">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-8">
                    <ul>
                        <li><a href="#"><i class="fa fa-clock-o"></i> Monday - Friday: 08.30am - 5.30pm</a></li>
                        <li><a href="#"><i class="fa fa-envelope"></i> mehmoodyaseer@yahoo.com</a></li>
                        <li><a href="#"><i class="fa fa-phone"></i> +353 83 848 7267</a></li>
                    </ul>
                </div>
                <div class="col-sm-12 col-md-4">
                    <div class="share-icons">
                        <ul>
                            <li><a href="javascript:void(0)"><i class="fab fa-twitter"></i></a></li>
                            <li><a href="javascript:void(0)"><i class="fab fa-facebook"></i></a></li>
                            <li><a href="javascript:void(0)"><i class="fab fa-pinterest"></i></a></li>
                            <li><a href="javascript:void(0)"><i class="fab fa-instagram"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Start Top Header Area -->

    <!-- Start Main Menu Area -->
    <div class="main-menu-area" data-spy="affix" data-offset-top="55">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <div class="logo">
                        <a href="index.html"><img src="assets/img/logo.png" alt="Logo"></a>
                        
                    </div>
                </div>

                <div class="col-md-9">
                    <nav class="navbar navbar-default">
                        <!-- Brand and toggle get grouped for better mobile display -->
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                                data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar top-bar"></span>
                                <span class="icon-bar middle-bar"></span>
                                <span class="icon-bar bottom-bar"></span>
                            </button>
                        </div>

                        <!-- Collect the nav links, forms, and other content for toggling -->
                        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                            <div class="main-menu">
                                <ul class="nav navbar-nav navbar-right">
                                
                                    <li><a href="#home">Home</a></li>
                                    <li><a href="#services">Services</a></li>
                                    <li><a href="#about">About Us</a></li>
                                    <li><a href="#client_reviews">Client Reviews</a></li>
                                    <li><a href="#contact">Contact</a></li>

                                    <li><a href="{{ route('login') }}">{{ __('Login') }}</a></li>
                                    <li><a href="{{ route('register') }}">{{ __('Register') }}</a></li>
                                    


                                </ul>
                            </div>
                        </div><!-- /.navbar-collapse -->
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- End Main Menu Area -->


    <!-- Start Homepage Slider -->
    <div class="homepage-slides-wrapper" >
        <!-- Slider main container -->
        <div class="swiper-container swiper1">
            <!-- Additional required wrapper -->
            <div class="swiper-wrapper">
                <!-- Slides -->
                <div class="swiper-slide slide-bg-1">
                    <div class="d-table">
                        <div class="d-table-cell">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-6 col-md-offset-6">
                                        <h1>We have workers with over 25 years of experience in auto services work</h1>
                                        <p>Value is a service of trust. The trust your customers have in you. The trust
                                            you have in your people, strategies and systems. And always delivering on
                                            expectation.</p>
                                        <a class="btn theme-btn" href="#">make an appointment</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="swiper-slide slide-bg-2">
                    <div class="d-table">
                        <div class="d-table-cell">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-6 col-md-offset-6">
                                        <h1>Fix the issues and inform the customer as the work done.</h1>
                                        <p>Every customer know the status of their work by sitting home.Can know their charges with items description which spare part should be attached and their reason.</p>
                                        <a class="btn theme-btn" href="#">make an appointment</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="swiper-slide slide-bg-3">
                    <div class="d-table">
                        <div class="d-table-cell">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-6 col-md-offset-6">
                                        <h1>Booking your vehicle and start your journey with us.</h1>
                                        <p>You are one step away from us just go to your dashboard and book a vehicle for any services we offer.</p>
                                        <a class="btn theme-btn" href="#">make an appointment</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- If we need pagination -->
            <div class="swiper-pagination swiper-pagination1"></div>

            <!-- If we need navigation buttons -->
            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>

        </div>
    </div>
    <!-- End Homepage Slider -->


    <!-- Start Services Area -->
    <div class="content-block-area gray-bg" id="services">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="section-title text-center">
                        <h2><span>Our featured</span> services</h2>
                        <div class="car-icon"><img src="assets/img/cars.png" alt="car"></div>
                        <p>It is a long established fact that to introduce the customer a new way to book the vehicle for repair or service. we are offering the following service for our customer to save their times and give the quality .</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3 col-sm-6">
                    <div class="featured-boxed text-center">
                        <div class="octagonWrap">
                            <div class="octagon"><i class=" icoon fas fa-tools"></i></div>
                        </div>
                        <h3>Annual Service</h3>
                        <div class="upper-line"></div>
                        <div class="bottom-line"></div>
                        <p>Customer can book vehicle for annual check up of vehicle is that good to work according to national law of annual vehicle check.</p>
                    </div>
                </div>

                <div class="col-md-3 col-sm-6">
                    <div class="featured-boxed text-center">
                        <div class="octagonWrap">
                            <div class="octagon"><i class=" icoon fas fa-tools"></i></div>
                        </div>
                        <h3>Major Service</h3>
                        <div class="upper-line"></div>
                        <div class="bottom-line"></div>
                        <p>Customer facing major problem in their vehicle, Can book vehicle with thier majar issue get their time save.</p>
                    </div>
                </div>

                <div class="col-md-3 col-sm-6">
                    <div class="featured-boxed text-center">
                        <div class="octagonWrap">
                            <div class="octagon"><i class=" icoon fas fa-tools"></i></div>
                        </div>
                        <h3>Repair Service</h3>
                        <div class="upper-line"></div>
                        <div class="bottom-line"></div>
                        <p>While facing problems in vechile customer can book to check their vehicle for repair service.
                        when customer did not know whats the fault in car.</p>
                    </div>
                </div>

                <div class="col-md-3 col-sm-6">
                    <div class="featured-boxed text-center">
                        <div class="octagonWrap">
                            <div class="octagon"><i class="icoon fas fa-tools"></i></div>
                        </div>
                        <h3>Major Repair</h3>
                        <div class="upper-line"></div>
                        <div class="bottom-line"></div>
                        <p>When customer know that his car is doing same fault again then book the vehicle by selecting the major rapair.</p>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- End Services Area -->

    <!-- Start Why Choose Us Area -->
    <div class="content-block-area" id="about">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <div class="section-title text-center">
                        <h2><span>Why choose</span> us</h2>
                        <div class="car-icon"><img src="assets/img/cars.png" alt="car"></div>
                        <p>It is a long established fact that every person is busy in daily life and prefer the thing that can save their time and money.
                        we offer the online booking of vehicles for services and faults clear vehicle.customer can save thier time by booking vehicle online and track when did its finish.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6 col-md-3">
                    <div class="boxed-item">
                        <span class="sirial-number">01</span>
                        <span class="single-boxed"><i class="flaticon-crane"></i></span>
                        <h3>Vehicle booking for repair or service</h3>
                        <p>Customer can request for book the vehicle to repair or service and see when request accept and remove or can be able to see when vehicle is done with bill.</p>
                    </div>
                </div>

                <div class="col-sm-6 col-md-3">
                    <div class="boxed-item">
                        <span class="sirial-number">02</span>
                        <span class="single-boxed"><i class="flaticon-wheel-1"></i></span>
                        <h3>Managing the system</h3>
                        <p>Manager can accept or reject the user requests and then assign these request to the worker which worker can do what thing.after assigning these task can evaluate the user that your call is done.</p>
                    </div>
                </div>

                <div class="col-sm-6 col-md-3">
                    <div class="boxed-item">
                        <span class="sirial-number">03</span>
                        <span class="single-boxed"><i class="flaticon-speedometer"></i></span>
                        <h3>Schedule Service</h3>
                        <p>If their is alot of requests from customer sides manager can be able to schedule the requests how many workers do how many works. Also manager can reassign the task to different worker. </p>
                    </div>
                </div>

                <div class="col-sm-6 col-md-3">
                    <div class="boxed-item">
                        <span class="sirial-number">04</span>
                        <span class="single-boxed"><i class="flaticon-car-radio"></i></span>
                        <h3>Vehicle Repair</h3>
                        <p>During vehicle repairing the worker can add the things which is needed to repair the vehicles that can help to make invoice. Also worker can change the status of vehicle after done the work.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Why Choose Us Area -->

    <!-- Start Count-Down Area -->
    <div class="count-down-area count-bg jarallax">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-md-3">
                    <div class="count-down-boxed text-center">
                        <span class="count-icon"><i class="ion-ios-people-outline"></i> <span
                                class="count-number counter">186</span></span>
                        <h3 class="count-info">Happy Clients</h3>
                    </div>
                </div>
                <div class="col-sm-6 col-md-3">
                    <div class="count-down-boxed text-center">
                        <span class="count-icon"><i class="ion-ios-partlysunny-outline"></i> <span
                                class="count-number counter">172</span></span>
                        <h3 class="count-info">Completed Repairing</h3>
                    </div>
                </div>
                <div class="col-sm-6 col-md-3">
                    <div class="count-down-boxed text-center">
                        <span class="count-icon"><i class="ion-ios-paperplane-outline"></i> <span
                                class="count-number counter">78</span></span>
                        <h3 class="count-info">Major service or repairing</h3>
                    </div>
                </div>
                <div class="col-sm-6 col-md-3">
                    <div class="count-down-boxed text-center">
                        <span class="count-icon"><i class="ion-ios-thunderstorm-outline"></i> <span
                                class="count-number counter">3800</span></span>
                        <h3 class="count-info">Hours Worked</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Count-Down Area -->

    <!-- Start Auto Body Services Area -->
    <div class="content-block-area">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    <div class="body-service-boxed-item auto-body-bg"></div>
                </div>
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-12 col-lg-8">
                            <div class="section-title text-center">
                                <h2><span>Vehicle booking </span> services</h2>
                                <div class="car-icon"><img src="assets/img/cars.png" alt="car"></div>
                                <p>Booking the vehicle for the service, major service , repair and major repairs. Also you can check the status of your work down with the biling which can save the customer time and money.</p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 col-md-6 col-lg-4">
                            <div class="services-list">
                                <ul>
                                    <li>Vehical Booking</li>
                                    <li>View Status</li>
                                    <li>Edit Request</li> 
                                    <li>Request Accepted</li>
                                    <li>Request Rejected</li>
                                    <li>Request Delete</li>
                                    <li>Complete the Reauest</li>
                                    <li>Manage Work</li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6 col-lg-4">
                            <div class="services-list">
                                <ul>   
                                    <li>Assign Vehicle to Worker</li>
                                    <li>Edit Assign</li>
                                    <li>Reassign vechile</li> 
                                    <li>Add spare parts</li>
                                    <li>Billing</li>
                                    <li>Testing the vehicle</li>
                                    <li>Vehicle status complete</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8 text-center">
                        <a href="#" class="btn theme-btn">Request Appointment</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Auto Body Services Area -->

    <!-- Start Our testimonials Area -->
    <div class="content-block-area gray-bg mt-2" id="client_reviews">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-4">
                    <div class="section-title text-right">
                        <h3>our clients</h3>
                        <h2><span>CLIENTS THAT TRUST</span> OUR SERVICES</h2>
                    </div>
                    <div class="testimonials-car-boxed wow fadeInLeft">
                        <img src="assets/img/testimonial-car.png" alt="Image">
                    </div>
                </div>

                <div class="col-sm-6 col-md-4">
                    <div class="testimonial-item">
                        <div class="testimonial-single-item">
                            <p>Its best beacuse they can save our time and give best solution for our vehicle problems</p>
                            <ul>
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li> 
                                                            </ul>
                        </div>

                        <div class="quotation-profile">
                            <img src="assets/img/testimonials-1.jpg" alt="Image">
                        </div>
                    </div>
                </div>

                <div class="col-sm-6 col-md-4">
                    <div class="testimonial-item">
                        <div class="testimonial-single-item">
                            <p>Good workers, They really do great job by adding all the things to my billing i can check the vehicle working condition by sitting to my work.</p>
                            <ul>
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                            </ul>
                        </div>
                        <div class="quotation-profile">
                            <img src="assets/img/31m.jpg" alt="Image">
                        </div>
                    </div>
                </div>

                <div class="col-sm-12 col-md-8 col-md-offset-4 text-center">
                    <a href="#" class="btn theme-btn">see testimonials</a>
                </div>
            </div>
        </div>
    </div>
    <!-- End Our testimonials Area -->

    <!-- Start Appointment Area -->
    <div class="content-block-area" id="contact">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="apointment-preview-boxed man-image-bg wow fadeInUp"></div>
                </div>
                <div class="col-md-6">
                    <div class="section-title text-center">
                        <h2><span>request an</span> appointment</h2>
                        <div class="car-icon"><img src="assets/img/cars.png" alt="car"></div>
                        <p>To become our permanent customer get premium descounts and cash back with monthly wise payments.</p>
                    </div>
                    <form class="appointment-form" action="index.html">
                       
                       
                        <div class="row">
                            <div class="col-md-12">
                                <p>Contact Details</p>
                            </div>
                            <div class="col-md-6">
                                <input type="text" name="yourName" placeholder="Your Name" required>
                            </div>
                            <div class="col-md-6">
                                <input type="email" name="yourEmail" placeholder="Your Email" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <input type="text" name="yourPhone" placeholder="Your Phone" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <textarea name="yourMessage" id="yourMessage" placeholder="Your Message"
                                    required></textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <button class="btn theme-btn" type="submit">Submit Now</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- End Appointment Area -->


    <!-- Footer Area -->
    <footer class="site-footer" >
        <!-- Footer Top Area -->
        <div class="footer-top-area">
            <div class="container">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="footer-top-info">
                            <span class="footer-icons"><i class="fas fa-map-marked-alt"></i></span>
                            <p>Address Here <br> City</p>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="footer-top-info">
                            <span class="footer-icons"><i class="fas fa-map-marked-alt"></i></span>
                            <p>Working Days Monday to Friday</p>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="footer-top-info">
                            <span class="footer-icons"><i class="fas fa-phone"></i></span>
                            <p>Give us a free call (+353) 83 848 7267</p>
                        </div>
                    </div>
                </div>
                <div class="hr-line"></div>
               
                <div class="row">
                    <div class="col-md-12 text-center">
                        <div class="social-icos">
                            <ul class="list-inline">
                                <li><a href="#"><i class="fab fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fab fa-linkedin"></i></a></li>
                                <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                                <li><a href="#"><i class="fab fa-google-plus"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- End Footer Top -->

        <!-- Footer Bottom Area -->
        <div class="footer-copyright-area">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12 text-center">
                        &copy; Copyright
                        <script type="text/javascript">
                            var d = new Date();
                            document.write(d.getFullYear());
                        </script> All Rights Reserved.
                    </div>
                </div>
            </div>
        </div> <!-- End Footer Bottom Area -->
    </footer> <!-- End Footer Area -->

    <!-- Back Top top -->
    <a href="#content" class="back-to-top">Top</a>
    <!-- End Back Top top -->

    <!-- Bootstrap JS file -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- Owl-Carousel JS file -->
    <script src="assets/js/owl.carousel.min.js"></script>
    <!-- Magnific Popup JS file -->
    <script src="assets/js/jquery.magnific-popup.min.js"></script>
    <!-- Mixitup JS file -->
    <script src="assets/js/mixitup.min.js"></script>
    <!-- Swiper JS file -->
    <script src="assets/js/swiper.jquery.min.js"></script>
    <!-- Datepicker JS file -->
    <script src="assets/js/datepicker.js"></script>
    <!-- WOW JS file -->
    <script src="assets/js/wow.min.js"></script>
    <!-- Isotop JS JS file -->
    <script src="assets/js/isotope.pkgd.min.js"></script>
    <!-- Waypoints JS file -->
    <script src="assets/js/waypoints.min.js"></script>
    <!-- Counter JS file -->
    <script src="assets/js/jquery.counterup.min.js"></script>
    <!-- RipplesJS -->
    <script src="assets/js/jquery.ripples-min.js"></script>
    <!-- YTPlayer JS -->
    <script src="assets/js/jquery.mb.YTPlayer.min.js"></script>
    <!-- Jarallax JS -->
    <script src="assets/js/jarallax.min.js"></script>
    <!-- Parsley JS -->
    <script src="assets/js/parsley.min.js"></script>
    <!-- jQuery Google Map JS file -->
    <script src="assets/js/jquery.googlemap.js"></script>
    <!-- Google Map api -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC0jIY1DdGJ7yWZrPDmhCiupu_K2En_4HY"></script>
    <!-- Custom JS file -->
    <script src="assets/js/active.js"></script>

    <script>
        (function () {
            $("*[include-html]").each(function () {
                var t = $(this).attr("include-html"),
                    u = this.id;
                jQuery.ajax({
                    url: t,
                    success: function (t) {
                        $("#" + u).html(t)
                    },
                    error: function (n, c, i) {
                        var s = n.status + ": " + n.statusText;
                        $("#" + u).html(t + "-" + s)
                    }
                })
            })
        });
    </script>



</body>

</html>