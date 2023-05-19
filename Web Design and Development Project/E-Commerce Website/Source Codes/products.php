<?php session_start(); ?>
<!DOCTYPE html>
<php lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Top Products Page</title>
        <style>
            body {
                background-color: #333;
            }

            .product-gallery {
                display: grid;
                background-color: white;
                text-align: center;
                grid-template-columns: auto;
            }

            span h1 {
                text-align: center;
                font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
                color: white;
                padding: .5em;
            }

            .container {
                position: relative;

                font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            }

            .container img {
                width: 300px;
                height: 300px;
                border-radius: 10%;
            }

            .moreBTN {
                padding: 1em;
                font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
                font-size: 26px;
                text-align: center;
                width: 20%;
                margin: auto;
            }

            .moreBTN a {
                text-decoration: none;
                color: white;
                background-color: orange;
                display: block;
                border-radius: 10%;
            }

            .moreBTN a:hover {
                transform: scale(1.5);
                transition: 2s ease;
                color: white;
            }

            .overlay {
                border-radius: 10%;
                position: absolute;
                bottom: 0;
                left: 0;
                right: 0;
                background-color: #333;
                overflow: hidden;
                width: 300px;
                height: 300px;
                transform: scale(0);
                transition: .3s ease;
            }

            .container:hover .overlay {
                transform: scale(1);
            }

            .text {
                color: white;
                font-size: 20px;
                position: absolute;
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%);
                text-align: center;
            }

            .text a {
                text-decoration: none;
                color: white;
            }

            .text a:visited {
                color: white;
            }

            .image {
                display: block;
                width: 100%;
                height: auto;
            }

            @keyframes myAnimation {
                0% {
                    background-position: 0 50%;
                }

                50% {
                    background-position: 100% 50%;
                }

                100% {
                    background-position: 0 50%;
                }
            }

            @media only screen and (max-width:2000px) {
                .product-gallery {
                    display: flex;
                    justify-content: center;
                    width: 100%;
                    height: 40vh;
                    color: #fff;
                    background: linear-gradient(90deg, #A9A9A9, #C0C0C0, white, #C0C0C0);
                    background-size: 300% 300%;
                    position: relative;
                    padding-top: 2em;
                    padding-bottom: 5em;
                    animation: myAnimation 2s ease-in-out infinite;
                    clear: both;
                    /* display: table; */
                    border: 5px inset;
                }

                .overall-container {
                    padding: 1em 3em 1em 3em;
                }
            }

            @media only screen and (max-width:768px) {
                .product-gallery {
                    display: grid;
                    background-color: white;
                    text-align: center;
                    height: 300vh;
                    grid-template-columns: auto;
                }

                .moreBTN a {
                    font-size: 24px;
                }
            }

            @media only screen and (max-width:360px) {
                .product-gallery {
                    display: grid;
                    background-color: white;
                    text-align: center;
                    height: 200vh;
                    grid-template-columns: auto;
                }

                .overall-container {
                    padding: 1em 0em 0em 0em;
                }
            }
        </style>
    </head>
    <?php
    $filter = "";
    if (isset($_GET['CatID'])) {
        $catID = $_GET['CatID'];
        $filter = " Where category_id = '$catID'";
    }
    $conn = mysqli_connect("localhost", "root", "", "L8_AlexanderAng_DB", "3307");

    $sql_product = "SELECT * FROM product" . $filter;
    $product_list = mysqli_query($conn, $sql_product);

    $sql_category = "SELECT * FROM category";
    $category_list = mysqli_query($conn, $sql_category);

    mysqli_close($conn);
    ?>

    <body>
        <?php require("navbar.php") ?>
        <span>
            <h1>Top Sellers</h1>
        </span>
        <div class="product-gallery">
            <section class="overall-container">
                <div class="container">
                    <a href="product_details.php?id=1"><img src="images/shop/Noodles/emeraldnoodles.jpg" alt="" class="image"></a>
                    <div class="overlay">
                        <div class="text">
                            <a href="product_details.php?id=1">
                                EMERALD NOODLES <br>
                                <?php require("starrating.php") ?>
                                <p>$1.55</p>
                            </a>
                        </div>
                    </div>
                </div>
            </section>
            <section class="overall-container">
                <div class="container">
                    <a href=""><img src="images/shop/Noodles/CubieCrispyNoodles-247x300.jpg" alt="" class="image"></a>
                    <div class="overlay">
                        <div class="text">
                            <a href="product_details.php?id=10">
                                Cubie Crispy Noodles <br>
                                <?php require("starrating.php") ?>
                                <p>$4.90</p>
                            </a>
                        </div>
                    </div>
                </div>
            </section>
            <section class="overall-container">
                <div class="container">
                    <a href=""><img src="images/shop/Noodles/charsiew_kolo.jpg" alt="" class="image"></a>
                    <div class="overlay">
                        <div class="text">
                            <a href="product_details.php?id=11">
                                Charsiew Kolo <br>
                                <?php require("starrating.php") ?>
                                <p>$12.80</p>
                            </a>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <div class="moreBTN">
            <a href="products2.php">View More</a>
        </div>
        <?php require('footer.php') ?>
    </body>

    </html>