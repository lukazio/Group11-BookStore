<?php
if (!isset($_SESSION))
    session_start();
?>

<div class="top-banner py-3 px-3 px-lg-5">
    <span class="h3">Imported books from around the world</span><br>
    <span class="h3 font-weight-light">By readers, for readers.</span>
</div>

<nav id="navbar_top" class="navbar navbar-expand-md navbar-light px-3 px-lg-5" style="background-color: #e3f2fd;">
    <a class="navbar-brand logo-header" href="home.php">
        <img src="img/logo.png" width="50" height="50" class="d-inline-block align-top mr-1" alt="">
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarContent" aria-controls="navbarContent" aria-expanded="false" aria-label="Expand navbar">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active color-fade">
                <a class="nav-link font-weight-bold" href="home.php">Store</a>
            </li>
            <li class="nav-item active color-fade">
                <a class="nav-link" href="about.php">About</a>
            </li>
            <li class="nav-item active color-fade">
                <a class="nav-link" href="contact.php">Contact</a>
            </li>
            <?php if(isset($_SESSION['username'])) {
                if($_SESSION['username'] == 'admin') { ?>
                    <li class="nav-item active color-fade">
                        <a class="nav-link" target="_blank" href="https://remotemysql.com/phpmyadmin/index.php?db=h8DqZV7y33">Database</a>
                    </li>
            <?php
                }
            } ?>
        </ul>

        <ul class="navbar-nav flex-row ml-auto">
            <li class="nav-item active dropdown" id="profileDropdownContainer">
                <a class="nav-link dropdown-toggle" href="" id="profileDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img src="img/profile_icon.png" width="50" height="50" class="d-none d-md-inline-block align-middle mr-2" alt="">
                    <?php
                    if (isset($_SESSION['username']))
                        echo $_SESSION['username'];
                    else
                        echo 'Login';
                    ?>
                </a>
                <?php if (isset($_SESSION['username'])) { ?>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="profileDropdown" id="profileDropdownMenu">
                        <a class="dropdown-item" href="profile.php">Profile</a>
                        <a id="btnLogout" class="dropdown-item text-danger">Logout</a>
                    </div>
                <?php } else { ?>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="profileDropdown" id="profileDropdownMenu">
                        <a class="dropdown-item" href="login.php">Login</a>
                        <a class="dropdown-item" href="register.php" style="color: #f29d16;">Register</a>
                    </div>
                <?php } ?>
            </li>
            <li class="nav-item active dropdown" id="cartDropdownContainer">
                <?php if (isset($_SESSION['cart'])) { ?>
                    <a class="nav-link h4" href="" id="cartDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-shopping-cart d-inline-block align-middle mr-1"></i>
                        <?php echo "<span class='badge badge-warning' id='lblCartCount'>" . count($_SESSION['cart']) . "</span>" ?>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-right cart-dropdown-menu" id="cartDropdownMenu">
                        <?php
                        if (count($_SESSION['cart']) == 0) {
                            echo "<li class=\"text-center\">" .
                            "<p class=\"cart-empty\">Your shopping cart is empty!</p>" .
                            "</li>";
                        } else {
                            $subtotal=0;
                            foreach ($_SESSION['cart'] as $id => $props) {
                                $subtotal+=$props['price'];
                                echo'  
                                <ul class="list-group list-group-flush">
                                
                                <li class="list-group-item cart-list-item">
                                
                                
                                <div class="row">
                                <div class="col p-0">
                                <img src="' . $props['pic'] . '" class="cart-img" alt="item1" />
                                </div>
                                <div class="col">
                                <span class="cart-title">' . $props['title'] . '</span><br>
                                <span class="cart-qty">×' . $props['amt'] . '</span><br>
                                <span class="cart-price">RM ' . $props['price'] . '</span>
                                </div>
                                
                                </li>
                                </ul>';
                            }
                            echo
                             "<div class=\"cart-subtotal\">Sub-Total: RM " . $subtotal . "</div>".
                            "<div class=\"row m-0\">".
                                "<div class=\"col-6 pl-0 pr-2\">".
                                    "<a href=\"cart.php\" class=\"btn btn-warning cart-btn btn-block\">View Cart</a>".
                                "</div>".
                                "<div class=\"col-6 pl-0 pr-2\">".
                                    "<a href=\"checkout.php\" class=\"btn btn-info btn-block\">Checkout</a>".
                                "</div>".
                            "</div>";
                        }
                        ?>
                    </ul>
                <?php } else { ?>
                    <a class="nav-link h4" href="" id="cartDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-shopping-cart"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-right cart-dropdown-menu" id="cartDropdownMenu">
                        <li class="text-center">
                            <p class="cart-empty">Your shopping cart is empty!</p>
                        </li>
                    </ul>
                <?php } ?>
            </li>
        </ul>
    </div>
</nav>

<script type="text/javascript">
// Account dropdown hover to open
    var hoverTimeout;
    $('#profileDropdownContainer').hover(function () {
        clearTimeout(hoverTimeout);
        $('#profileDropdownContainer').addClass('show');
        $('#profileDropdownMenu').addClass('show');
    }, function () {
        hoverTimeout = setTimeout(function () {
            $('#profileDropdownContainer').removeClass('show');
            $('#profileDropdownMenu').removeClass('show');
        }, 150);
    });
    
    $('.cart-img').on('error', function(){
        $(this).attr('src', './img/placeholder.png');
    });
</script>

<script type="text/javascript">
    document.addEventListener("DOMContentLoaded", function () {
        window.addEventListener('scroll', function () {
            if (window.scrollY > 100) {
                document.getElementById('navbar_top').classList.add('fixed-top');
                navbar_height = document.querySelector('.navbar').offsetHeight;
                document.body.style.paddingTop = navbar_height + 'px';
            } else {
                document.getElementById('navbar_top').classList.remove('fixed-top');
                document.body.style.paddingTop = '0';
            }
        });
    });
</script>

<script type="text/javascript">
    $(document).ready(function(){
        $('#btnLogout').on('click', function(e){
            Swal.fire({
                icon: 'warning',
                title: 'Logout?',
                html: '<b>Warning:</b> This will also clear your shopping cart!',
                showCancelButton: true,
                confirmButtonText: 'OK',
                confirmButtonColor: '#f29d16',
                cancelButtonText: 'Cancel',
                reverseButtons: true
            }).then((result) => {
                if(result.value){
                    Swal.fire({
                        icon: 'success',
                        title: 'Logging out...',
                        showConfirmButton: false
                    });
                    window.location.href = "action/logout_action.php";
                }
            });
        });
    });
</script>
