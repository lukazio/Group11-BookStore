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
            <h1 class="display-1">Who We Are</h1>
            <h3>The Mondstadt Library Family</h3>
        </div>

        <!--about us our story-->
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
                    <script>AOS.init();</script>
                </div>
            </div>
        </div>


    </body>

    <?php
    include 'modules/footer.php';
    ?>

</html>