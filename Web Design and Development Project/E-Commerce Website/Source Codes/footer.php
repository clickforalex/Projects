<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Footer</title>
    <link rel="stylesheet" href="stylesheet/footer.css">
    <style>
        @media screen and (max-width: 360px) {
            #shop-footer li a {
                font-size: 14px;
            }

            #support-footer li a {
                font-size: 14px;
            }

            img {
                height: 60px;
                width: 150px;
            }

            #empty {
                display: none;
            }

            .social-media-icons img {
                height: 20px;
                width: 20px;
            }

            .social-media-icons {
                margin-left: 1.5em;
            }

            span {
                font-size: 16px;
            }

            h3 {
                font-size: 14px;
                margin-left: .5em;
            }
        }

        @media screen and (max-width: 540px) {
            #shop-footer li a {
                font-size: 18px;
            }

            #support-footer li a {
                font-size: 18px;
            }

            #empty {
                display: none;
            }
        }
    </style>
</head>

<body>
    <!-- Footer 1 is here -->
    <div id="footer1">
        <section id="shop-footer">
            <span class="shop-title">SHOP</span>
            <div class="shop-container">
                <ul class="shop">
                    <li><a href="products2.php?CatID=1">Noodles</a></li>
                    <li><a href="products2.php?CatID=2">Wrappers</a></li>
                    <li><a href="products2.php?CatID=3">Pantry</a></li>
                    <li><a href="products2.php?CatID=4">Kitchenware</a></li>
                </ul>
            </div>
        </section>
        <div id="empty">
            <p>should not be visible</p>
        </div>
        <section id="support-footer">
            <span class="support-title">SUPPORT</span>
            <div class="support-container">
                <ul class="support">
                    <li><a href="contact.php">Contact Us</a></li>
                    <li><a href="about.php">About Us</a></li>
                    <li><a href="profile.php">My Account</a></li>
                </ul>
            </div>
        </section>
        <div id="empty">
            <p>should not be visible</p>
        </div>
        <aside id="rightside">
            <img src="images/Logos/logo.png" alt="Handpicked" height="80" width="200">
            <h3>Connect With Us</h3>
            <div class="social-media-icons">
                <div class="ig">
                    <a href="www.instagram.com"><img src="images/Logos/Instagram.png" alt="Instagram" height="50px" width="50px" title="Instagram"></a>
                </div>
                &nbsp;
                <div class="twitter">
                    <a href="www.twitter.com"><img src="images/Logos/Twitter.png" alt="Twitter" height="50px" width="50px" title="Twitter"></a>
                </div>
                &nbsp;
                <div class="fb">
                    <a href="www.facebook.com"><img src="images/Logos/Facebook.png" alt="Facebook" height="50px" width="50px" title="Facebook"></a>
                </div>
            </div>
        </aside>
    </div>
    <!-- End of Footer 1 -->

    <!-- Main Footer -->
    <footer>&copyCopyright 2021 Alexander Ang 201906L</footer>
</body>

</html>