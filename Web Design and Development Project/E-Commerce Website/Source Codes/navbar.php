<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nav Bar</title>
    <link rel="stylesheet" href="stylesheet/nav.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<style>
    @media screen and (min-width: 769px) {
        .sidelogin {
            display: none;
        }

        .mainnav a {
            padding-left: 1em;
            padding-right: 1em;
        }
    }

    @media screen and (max-width: 768px) {
        .topnav a {
            display: none;
        }

        .topnav a.icon {
            float: left;
            display: block;
        }

        .loginnav {
            visibility: hidden;
        }

        .topnav.responsive {
            position: relative;
        }

        .topnav.responsive .icon {
            position: absolute;
            right: 0;
            top: 0;
            padding-left: 1em;
        }

        .topnav.responsive a {
            float: none;
            display: block;
            text-align: left;
        }

        .mainnav {
            padding-left: .3em;
            padding-right: .3em;
        }
    }

    @media screen and (max-width: 360px) {
        .firstnav {
            width: 100%;
        }

        #empty {
            display: none;
        }

        .logo img {
            height: 130px;
            width: 350px;
            margin: auto;
        }

        .topnav a {
            display: none;
        }

        .topnav a.icon {
            float: left;
            display: block;
        }

        .loginnav {
            display: none;
        }

        .topnav.responsive {
            position: relative;
        }

        .topnav.responsive .icon {
            position: absolute;
            right: 0;
            top: 0;
            padding-left: 1em;
        }

        .topnav.responsive a {
            float: none;
            display: block;
            text-align: left;
        }

        .mainnav {
            padding-left: .3em;
            padding-right: .3em;
        }
    }
</style>
<?php 
    $uid =  isset($_SESSION['SV_Userid']) ? $_SESSION['SV_Userid'] : "NA";
    $uname =  isset($_SESSION['MM_Username']) ? $_SESSION['MM_Username'] : "NA";
    $conn = mysqli_connect("localhost", "root", "", "L8_AlexanderAng_DB", "3307");
        
    mysqli_close($conn);
?>
<body>
    <nav>
        <div class="firstnav">
            <div id="empty">
                <p>Should not be visible</p>
            </div>
            <div class="logo">
                <a href="homepage.php"><img src="images/logos/logo.png" alt="logo" title="Handpicked Noodles - Artisan Noodles"></a>
            </div>
            <div class="loginnav">
                <?php
                if (isset($_SESSION['MM_Username'])) {
                    echo '<li><a href="profile.php" class="login">View Profile</a></li>';
                    echo '<li><a href="showcart.php" class="login">Cart</a></li>';
                    echo '<li><a href="logout.php">Logout</a></li>';
                } else {
                    echo '<li><a href="Login.php" class="login">Login</a></li>';
                }
                ?>
            </div>
        </div>
        <section class="mainnav">
            <div class="topnav" id="myTopnav">
                <a href="homepage.php">Home</a>
                <a href="products.php">Products</a>
                <a href="recipes.php">Recipes</a>
                <div class="sidelogin">
                    <?php
                    if (isset($_SESSION['MM_Username'])) {
                        echo '<a href="profile.php" class="login">View Profile</a>';
                        echo '<a href="showcart.php" class="login">Cart</a>';
                        echo '<a href="logout.php">Logout</a>';
                    } else {
                        echo '<a href="Login.php" class="login">Login</a>';
                    }
                    ?>
                </div>
                <a href="javascript:void(0);" class="icon" onclick="myFunction()">
                    <i class="fa fa-bars"></i>
                </a>
                <script src="js/nav.js"></script>
            </div>
        </section>
    </nav>
</body>

</html>