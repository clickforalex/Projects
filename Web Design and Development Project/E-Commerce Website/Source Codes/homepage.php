<?php session_start(); ?>
<!DOCTYPE html>
<php lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Homepage</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <style>
            .nav-title {
                color: orange;
            }
            form{
                padding-top: 25em;
                width: 10%;
                margin: auto;
            }
            button {
                background-color: orange;
                color: white;
                font-size: 22px;
                padding: 5px 10px;
                border: none;
                border-radius: 4px;
            }
            button:hover{
                background-color: black;
            }
            #entershop{
                display: flex;
                text-align: center;
                align-items: center;
                justify-content: center;
                padding: 10px 0px 10px 0px;
                background-color: black;
            }
            #entershop a{
                text-decoration: none;
            }
            #entershop a:active{
                color: orange;
            }
            #entershop a:visited{
                color: orange;
            }
            #entershop button{
                background-color: inherit;
                border: 2px solid white;
                color: white;
                padding: 5px 10px;
                text-decoration: none;
                font-size: 24px;
                font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
                font-weight: bold;
                cursor: pointer;
            }
            #entershop button{
                color: #339933;
                box-shadow: 0 0 5px white,
                inset 0 0 5px rgba(255,165,0,.1);
                background: linear-gradient(#333933,#222922);
                animation: neonh .8s ease-out infinite alternate;
            }
            @keyframes neon{
                0%{
                    border-color: white;
                    box-shadow: 0 0 5px rgba(255,165,0,.2),
                    inset 0 0 5px rgba(0,0,0,.1);
                }
                100%{
                    border-color: white;
                    box-shadow: 0 0 20px rgba(255,165,0,.6),
                    inset 0 0 10px rgba(255,165,0,.4);
                }
            }
            #featured{
                background-color: #ebebeb;
                display: grid;
                margin-left: auto;
                margin-right: auto;
                grid-template-columns: repeat(5,1fr);
                grid-gap: 20px;
                padding: 3em 10px 10px 10px;
            }
            #featured div{
                text-align: center;
            }
            #featured img{
                border-radius: 10%;
                width: 10vw;
            }
            #featured img:hover{
                transform: scale(1.2);
            }
            #nav {
                display: flex;
                justify-content: space-between;
                width: 100%;
            }

            #content {
                border: 4px solid red;
            }

            #imgContainer {
                background-repeat: no-repeat;
                height: 600px;
                background-size: 100%;
                position: relative;
            }

            #mainnav li {
                padding-bottom: 1em;
                padding-right: 3em;
            }

            li {
                list-style-type: none;
                /* display: flex; */
                font-size: 22px;
            }

            span {
                font-size: 22px;
            }
            #spantitle{
                background-color: black;
            }
            #spantitle h2 {
                font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
                text-align: center;
                
                color: white;
                width: 30%;
                margin: auto;
            }

            #text {
                font-size: 42px;
                font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
                color: white;
                text-align: center;
                position: absolute;
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%);
            }

            @media only screen and (max-width:360px) { 
                #imgContainer {
                    height: 230px;
                    background-position: 50% 50%;
                }
                #spantitle h2{
                    font-size: 12px;
                }
                body {
                    background-color: black;
                    width: 100%;
                }
                .nav {
                    display: none;
                    background-color: black;
                }

                .openbtn {
                    visibility: visible;
                }

                .sidepanel {
                    width: 0;
                    position: fixed;
                    z-index: 1;
                    height: 100%;
                    left: 0;
                    background-color: #111;
                    overflow-x: hidden;
                    transition: 0.5s;
                    padding-top: 60px;
                    visibility: visible;
                }
                #text{
                    font-size: 22px;
                }
                .sidepanel a {
                    padding: 8px 8px 8px 32px;
                    text-decoration: none;
                    font-size: 25px;
                    background-color: #111;
                    color: #818181;
                    display: block;
                    transition: 0.3s;
                    visibility: visible;
                }

                .sidepanel a:hover {
                    color: #f1f1f1;
                }

                .sidepanel .closebtn {
                    position: absolute;
                    top: 0;
                    right: 25px;
                    font-size: 36px;
                    visibility: visible;
                }

                .openbtn {
                    font-size: 20px;
                    cursor: pointer;
                    background-color: #111;
                    color: white;
                    padding: 10px 15px;
                    border: none;
                    visibility: visible;
                }

                .openbtn:hover {
                    background-color: #444;
                }
                form{
                    padding-top: 5em;
                    width: 10%;
                    margin: auto;
                }
                #button{
                    display: none;
                }
            }

            @media only screen and (max-width:768px) {
                body {
                    background-color: black;
                }
                form{
                    padding-top: 25em;
                    width: 10%;
                    margin: auto;
                }
                button {
                    background-color: orange;
                    color: white;
                    font-size: 14px;
                    padding: 5px 10px;
                    border: none;
                    border-radius: 4px;
                }
                button:hover{
                    background-color: black;
                }
                #imgContainer {
                    background-position: 50% 50%;
                }
                #spantitle{
                    font-size: 14px;
                }
                .nav {
                    display: none;
                    background-color: black;
                }

                .openbtn {
                    visibility: visible;
                }

                .sidepanel {
                    width: 0;
                    position: fixed;
                    z-index: 1;
                    height: 100%;
                    left: 0;
                    background-color: #111;
                    overflow-x: hidden;
                    transition: 0.5s;
                    padding-top: 60px;
                    visibility: visible;
                }

                #mainnav {
                    float: right;
                }

                .sidepanel a {
                    padding: 8px 8px 8px 32px;
                    text-decoration: none;
                    font-size: 25px;
                    background-color: #111;
                    color: #818181;
                    display: block;
                    transition: 0.3s;
                    visibility: visible;
                }

                .sidepanel a:hover {
                    color: #f1f1f1;
                }

                .sidepanel .closebtn {
                    position: absolute;
                    top: 0;
                    right: 25px;
                    font-size: 36px;
                    visibility: visible;
                }

                .openbtn {
                    font-size: 20px;
                    cursor: pointer;
                    background-color: #111;
                    color: white;
                    padding: 10px 15px;
                    border: none;
                    visibility: visible;
                }

                .openbtn:hover {
                    background-color: #444;
                }

            }
        }
            

            /* @media only screen and (min-width:1039px) {
                #imgContainer {
                    height: 1000px;
                }

                #mySidepanel {
                    display: none;
                    visibility: none;
                }
                #text{
                    font-size: 42px;
                }
                .openbtn {
                    display: none;
                }
                .nav {
                    display: block;
                    background-color: black;
                }
            } */
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
        <!-- Slide show -->
        <section id="imgContainer">
            <!-- <img id="myImage" name="slide" src=""> -->
            <h1 id="text"></h1>
            <form action="products2.php">
                <button id="button">SHOP NOW</button>
            </form>
        </section>
        <script src="js/homepage.js"></script>
        <!-- For the content -->
        <div id="spantitle">
            <h2>We carefully source for some of the best everyday ingredients for your daily cooking and nourishment. We hope to not only feed bellies but also family bonds.</h2>
        </div>
        <section id="featured">
            <div class="product">
                <img src="images/shop/noodles/fam_prawnpaste.jpeg" alt="Prawn Paste Recipe">
            </div>
            <div class="product">
                <img src="images/shop/noodles/threesome_bundle.jpg" alt="Threesome Bundle">
            </div>
            <div class="product">
                <img src="images/shop/Pantry/threesomepantrybundle.jpg" alt="Threesome Pantry Bundle">
            </div>
            <div class="product">
                <img src="images/shop/Pantry/white_peppercorn.jpg" alt="White Peppercorn">
            </div>
            <div class="product">
                <img src="images/shop/Pantry/sichuan_peppercorn.jpg" alt="Sichuan Pepper">
            </div>
        </section>
        <div id="entershop">
            <button><a href="products2.php">Enter Shop</a></button>
        </div>
        <?php require('footer.php') ?>
    </body>

    </html>