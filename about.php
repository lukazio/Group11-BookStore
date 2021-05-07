<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link href="about.css" rel="stylesheet">

        <?php
        require 'modules/link.php';
        ?>
    </head>

    <?php
    require 'modules/dbconnect.php';
    include 'modules/header.php';
    ?>

    <body >
        <section id="section1">
            <div class="banner-bg-image"> 
                            <a href="#section2" class="scroll-down" address="true"></a>

            </div>
            <div class="banner-text">
                <h1 class="display-1">Who We Are</h1>
                <h3>The Mondstadt Library Family</h3>
            </div>
        </section>
        <section id="section2" class="ok" style="color: wheat">
            <h1>title</h1>
        </section>
    </body>

    <?php
    include 'modules/footer.php';
    ?>

</html>