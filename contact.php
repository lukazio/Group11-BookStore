<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Contact</title>
        <link type="text/css" href="modules/contact.css" rel="stylesheet">
        <!--library for fade-up effect-->
        <link href="https://cdn.rawgit.com/michalsnik/aos/2.1.1/dist/aos.css" rel="stylesheet">
        <script src="https://cdn.rawgit.com/michalsnik/aos/2.1.1/dist/aos.js"></script>
        <?php
        require 'modules/link.php';
        ?>
    </head>

    <?php
    require 'modules/dbconnect.php';
    include 'modules/header.php';
    ?>

    <body>
        <!--contact banner-->
        <div class="banner-image">
            <!--banner title-->
            <div class="row container">
                <div class="col-sm-6">
                    <h1 class="display-1" data-aos="fade-up" style="padding-left:6%">Contact Us</h1>
                </div>
            </div>
            <!--banner cards-->
            <div class="row container" data-aos="fade-up" data-aos-duration="800"style="padding-left:10%">
                <div class=" banner-card">
                    <img src="img/contact-phone.png" height="180px" width="180px"/>
                    <div class="overlay">
                        <div class="line"><h3 class="title">Talk With Us</h3></div>
                        <div class="content">
                            <p class="lead">You've got some q's and we've got tons of a's. Ask us about your order, our product...just anything we can help with!</p>
                            <a class="btn btn-outline-primary" href="#talk-us" role="button">See More</a>
                        </div>
                    </div>
                </div>
                <div class="banner-card">
                    <img src="img/contact-map.png" height="180px" width="180px"/>
                    <div class="overlay">
                        <div class="line"><h3 class="title">Visit Us</h3></div>
                        <div class="content">
                            <p class="lead">You can drop by our office to pay us a visit. We promise we won't bite! </p>
                            <a class="btn btn-outline-primary" href="#map" role="button">See More</a>
                        </div>
                    </div>
                </div>
            </div>          
        </div>

        <!--contact info-->
        <div id="talk-us" style="background-color: #e3f2fd; padding-bottom: 50px">
            <div class="container">
                <div class=" row">
                    <!--contact method-->
                    <div class="col-sm-6">
                        <h1 class="display-4" style="padding-top:10% " data-aos="fade-up" data-aos-duration="800" data-aos-easing="ease-in-quad">Our Contact</h1>
                        <p class="lead" style="padding-right: 80px; padding-top:20px;padding-bottom:20px" data-aos="fade-up" data-aos-duration="1000" data-aos-easing="ease-in-quad">
                            Reach us out by contact Mondstadt Library phone or email. In order to ensure you receive a quick reply, please fill out our Contact Us form.</p>   
                        <div data-aos="fade-up" data-aos-duration="1000" data-aos-easing="ease-in-quad">
                            <div class="info-div">
                                <p class="info-underline lead"><i class="fa fa-phone fa-fw"></i>Call Free: (123) 456-7890</p>                          
                            </div>
                            <div class="info-div">
                                <p class="info-underline lead"><i class="fa fa-envelope fa-fw"></i> contact@mondstadt.com</p>                           
                            </div>
                            <div class="info-div">
                                <p class="info-underline lead"><i class="fa fa-map-marker fa-fw"></i>HQ: Kirova Street, Chornobyl, Ukraine </p>                                   
                            </div>
                            <div class="info-div">
                                <p class="info-underline lead"><i class="fa fa-clock-o fa-fw"></i>Mon - Sat 8.00 - 18.00</p>               
                            </div>
                        </div>
                    </div>
                    <!--contact form-->
                    <div class="col-sm-6">
                        <h1 class="display-4" style="padding-top:10% " data-aos="fade-up" data-aos-duration="800" data-aos-easing="ease-in-quad">How can we help?</h1>
                        <!-- contact form-->
                        <form data-aos="fade-up" data-aos-duration="1000" data-aos-easing="ease-in-quad">
                            <div class="form-row">
                                <div class="form-group col-sm-6">
                                    <label for="input-first" class="lead">First Name</label>
                                    <input type="text" class="form-control" id="input-first" placeholder="First name">
                                </div>
                                <div class="form-group col-sm-6">
                                    <label for="input-last" class="lead">Last Name</label>
                                    <input type="text" class="form-control" id="input-last" placeholder="Last name">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="input-email" class="lead">Email</label>
                                <input type="email" class="form-control" id="input-email" placeholder="Email">
                            </div>
                            <div class="form-group">
                                <label for="input-message" class="lead">Message</label>
                                <textarea class="form-control" id="input-message" rows="5" placeholder="Write your message here"></textarea>
                            </div>
                            <a class="btn btn-outline-primary" href="" role="button">
                                Send Message</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!--contact map-->
        <div id="map" class="map-responsive" data-aos="fade-up" data-aos-duration="800" data-aos-easing="ease-in-quad">
            <iframe 
                src="https://www.google.com/maps/d/embed?mid=1bNbiB9n3P_EmUJCoF5OiAo5GA0uXVPV_" 
                width="100%"
                height="100%"
                style="border:0"
                loading="lazy"               
                allowfullscreen>                     
            </iframe>       
        </div>
        <script>AOS.init();</script>
    </body>

    <?php
    include 'modules/footer.php';
    ?>

</html>

