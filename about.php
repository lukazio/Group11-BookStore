<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link href="./about.css" rel="stylesheet">
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

    <body >
        <!--about us banner-->
        <div class="banner-bg-image"> 
            <a href="#story" class="scroll-down" address="true"></a>
        </div>
        <div class="banner-text">
            <h1 class="display-1" data-aos="fade-up" data-aos-duration="1000" data-aos-easing="ease-in-quad">Who We Are</h1>
            <h3 data-aos="fade-up" data-aos-duration="2000" data-aos-easing="ease-in-quad">The Mondstadt Library Family</h3>
        </div>

        <!--about us our-story-->
        <div class="story-image" id="story">   
            <div class="container">
                <div class=" row">
                    <div class="col-sm-6">
                        <h1 class="display-3" style="padding-top:10% " data-aos="fade-up">Our Story</h1>
                        <p class="lead" data-aos="fade-up" data-aos-duration="1000" data-aos-easing="ease-in-quad">The Mondstadt Library is an online bookstore with a mission to financially support local, independent bookstores.
                            We believe that bookstores are essential to a healthy culture. 
                            <br>They’re where authors can connect with readers, where we discover new writers, where children get hooked on the thrill of reading that can last a lifetime. They’re also anchors for our downtowns and communities. 
                            <br>As more and more people buy their books online, we wanted to create an easy, convenient way for you to get your books and support bookstores at the same time.</p>
                    </div>
                </div>
            </div>
        </div>

        <!--about us testimonial-->
        <div id="testimonial">           
            <div class="testimonial text-center">
                <div class="container">
                    <div class="heading white-heading">
                        <h3 class="display-4" data-aos="fade-up">Our Happy Customer</h3>
                    </div>
                    <div id="testimonial4" class="carousel slide testimonial4_indicators testimonial4_control_button thumb_scroll_x swipe_x" data-ride="carousel" data-pause="hover" data-interval="5000" data-duration="2000">
                        <div class="carousel-inner" role="listbox">
                           <div class="carousel-item active">
                                <div class="testimonial4_slide">
                                    <img src="img/about-custa.jpg" class="img-circle img-responsive" />
                                    <p> I am so happy to find a site where I can shop for unusual items. I found what I wanted with ease and purchased it without a hitch. The packaging was phenomenal and my book arrived on time in perfect condition</p>
                                    <h4>Jerry</h4>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <div class="testimonial4_slide">
                                    <img src="img/about-custb.jpg" class="img-circle img-responsive" />
                                    <p>Excellent service. The books were wrapped securely and arrived in pristine condition. I sent an email after to books arrived to ask about the author, and I received a prompt reply </p>
                                    <h4>Laura</h4>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <div class="testimonial4_slide">
                                    <img src="img/about-custc.jpg" class="img-circle img-responsive" />
                                    <p>Mondstadt Library had a book that I was unable to locate from any other source. I am thrilled that they had it, was very pleased with their service and would definitely recommend and use their company again</p>
                                    <h4>Kelly</h4>
                                </div>
                            </div>
                        </div>
                        <a class="carousel-control-prev" href="#testimonial4" data-slide="prev">
                            <span class="carousel-control-prev-icon"></span>
                        </a>
                        <a class="carousel-control-next" href="#testimonial4" data-slide="next">
                            <span class="carousel-control-next-icon"></span>
                        </a>
                        
                    </div>
                </div>
            </div>
        </div>
        <script>AOS.init();</script>
    </body>

    <?php
    include 'modules/footer.php';
    ?>

</html>