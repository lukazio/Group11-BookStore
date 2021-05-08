<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Contact</title>
        <link href="./contact.css" rel="stylesheet">
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
        <div class="banner-image">
            <div class="row container">
                <div class="col-sm-6">
                    <h1 class="display-1" data-aos="fade-up" style="padding-left:6%">Contact Us</h1>
                </div>
            </div>
            <div class="row container" data-aos="fade-up" style="padding-left:10%">
                <div class=" banner-card">
                    <img src="img/contact-phone.png" height: 200px" width="200px"/>
                    <div class="overlay">
                        <div class="line"><h2 class="title">Talk With Us</h2></div>
                        <div class="content">
                            <p class="lead">You've got some q's and we've got tons of a's. Ask us about your order, our product...just anything we can help with!</p>
                            <button type="button" class="btn btn-outline-primary">See More</button>
                        </div>
                    </div>
                </div>
                <div class="banner-card">
                    <img src="img/contact-map.png" height: 200px" width="200px"/>
                    <div class="overlay">
                        <div class="line"><h2 class="title">Visit Us</h2></div>
                        <div class="content">
                            <p class="lead">You can drop by our office to pay us a visit. We promise we won't bite! </p>
                            <button type="button" class="btn btn-outline-primary">See More</button>                </div>
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
