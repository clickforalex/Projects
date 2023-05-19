<?php session_start(); ?>
<!DOCTYPE html>
<php lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>About Us Page</title>
        <style>
            #about {
                background-color: rgb(77, 74, 74);
            }

            @media only screen and (max-width:2000px) {
                .imgbanner {
                    background-image: url(images/dishes/Handmade-Wantons-1500px.jpg);
                    background-size: cover;
                    position: relative;
                    padding: 3em;
                    text-align: center;
                    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
                    font-size: 48px;
                    color: white;
                    background-position: center;
                }

                .text {
                    background-color: rgb(77, 74, 74);
                    color: white;
                    padding: 3em;
                    font-family: Verdana, Geneva, Tahoma, sans-serif;
                    font-size: 24px;
                }

                .social-media-icons {
                    display: flex;
                    padding: 1em;
                    padding-top: 3em;
                }
            }

            @media only screen and (max-width:900px) {
                .imgbanner {
                    background-image: url(images/dishes/Handmade-Wantons-1500px.jpg);
                    background-size: 700px 500px;
                    background-repeat: no-repeat;
                    position: relative;
                    /* padding: 3em; */
                    text-align: center;
                    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
                    font-size: 48px;
                    color: white;
                    background-position: center;
                }

                .text {
                    background-color: rgb(77, 74, 74);
                    color: white;
                    font-family: Verdana, Geneva, Tahoma, sans-serif;
                    font-size: 24px;
                }

                .social-media-icons {
                    display: flex;
                    padding: 1em;
                    padding-top: 3em;
                }
            }

            @media only screen and (max-width: 630px) {
                .imgbanner {
                    background-image: url(images/dishes/Handmade-Wantons-1500px.jpg);
                    background-size: 300px 200px;
                    background-repeat: no-repeat;
                    position: relative;
                    /* padding: 3em; */
                    text-align: center;
                    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
                    font-size: 22px;
                    color: white;
                    background-position: center;
                }

                .text {
                    background-color: rgb(77, 74, 74);
                    color: white;
                    font-family: Verdana, Geneva, Tahoma, sans-serif;
                    font-size: 16px;
                }

                .social-media-icons {
                    display: flex;
                    padding-top: 3em;
                    padding-right: 3em
                }
            }
        </style>
    </head>

    <body>
        <?php require("navbar.php") ?>
        <div id="about">
            <section class="about-background">
                <div class="imgbanner">
                    <h2>About Handpicked</h2>
                </div>
                <div class="text">
                    <p>Here at Handpicked, we are strong advocates for home cooking and the love of cooking at home. One of the greatest joy for the everyday home chef is the opportunity to cook with the best ingredients and filling the tummies of our loved ones. The simple fact is, for many, cooking is love made visible.</p>
                    &nbsp;
                    <p>We carefully source for some of the best everyday ingredients for your daily cooking and nourishment. We hope to not only feed bellies but also family bonds.</p>
                    <div class="social-media-icons">
                        <div class="ig">
                            <a href="www.instagram.com"><img src="images/Logos/Instagram.png" alt="Instagram" height="100px" width="100px" title="Instagram"></a>
                        </div>
                        &nbsp;
                        <div class="twitter">
                            <a href="www.twitter.com"><img src="images/Logos/Twitter.png" alt="Twitter" height="100px" width="100px" title="Twitter"></a>
                        </div>
                        &nbsp;
                        <div class="fb">
                            <a href="www.facebook.com"><img src="images/Logos/Facebook.png" alt="Facebook" height="100px" width="100px" title="Facebook"></a>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <?php require('footer.php') ?>
    </body>

    </html>