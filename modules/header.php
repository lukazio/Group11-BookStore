<?php
if(!isset($_SESSION))
    session_start();
?>

<nav class="navbar navbar-expand-md navbar-light px-3 px-lg-5" style="background-color: #e3f2fd;">
    <a class="navbar-brand logo-header" href="index.php">
        <img src="img/logo.png" width="50" height="50" class="d-inline-block align-top mr-1" alt="">
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarContent" aria-controls="navbarContent" aria-expanded="false" aria-label="Expand navbar">
        <span class="navbar-toggler-icon"></span>
    </button>
    
    <div class="collapse navbar-collapse" id="navbarContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active color-fade">
                <a class="nav-link font-weight-bold" href="index.php">Store</a>
            </li>
            <li class="nav-item active color-fade">
                <a class="nav-link" href="about.php">About</a>
            </li>
            <li class="nav-item active color-fade">
                <a class="nav-link" href="contact.php">Contact</a>
            </li>
        </ul>
        
        <ul class="navbar-nav flex-row ml-auto">
            <li class="nav-item active dropdown" id="profileDropdownContainer">
                <a class="nav-link dropdown-toggle" href="" id="profileDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img src="img/profile_icon.png" width="50" height="50" class="d-none d-md-inline-block align-middle mr-2" alt="">
                    <?php
                    if(isset($_SESSION['username']))
                        echo $_SESSION['username'];
                    else
                        echo 'Login';
                    ?>
                </a>
                <?php if(isset($_SESSION['username'])) { ?>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="profileDropdown" id="profileDropdownMenu">
                    <a class="dropdown-item" href="profile.php">Profile</a>
                    <a class="dropdown-item text-danger" href="action/logout_action.php">Logout</a>
                </div>
                <?php } else { ?>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="profileDropdown" id="profileDropdownMenu">
                    <a class="dropdown-item" href="login.php">Login</a>
                    <a class="dropdown-item" href="register.php" style="color: #f29d16;">Register</a>
                </div>
                <?php } ?>
            </li>
        </ul>
    </div>
</nav>

<script type="text/javascript">
var hoverTimeout;
$('#profileDropdownContainer').hover(function() {
    clearTimeout(hoverTimeout);
    $('#profileDropdownContainer').addClass('show');
    $('#profileDropdownMenu').addClass('show');
}, function() {
    hoverTimeout = setTimeout(function() {
        $('#profileDropdownContainer').removeClass('show');
        $('#profileDropdownMenu').removeClass('show');
    }, 150);
});
</script>