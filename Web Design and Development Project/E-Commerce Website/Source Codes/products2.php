<?php session_start(); ?>
<!DOCTYPE html>
<php lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Products Page</title>
        <style>
            li {
                list-style-type: none;
                /* display: flex; */
                font-size: 22px;
            }

            #container {
                width: 100%;
                padding-top: 2em;
            }

            .category {
                float: left;
                width: 20%;
                min-height: 600px;
                font-size: 20px;
                padding-top: 3em;
                text-decoration: none;
            }

            .product-gallery {
                display: grid;
                grid-template-columns: 1fr 1fr 1fr;
                grid-row-gap: 10px;
                width:auto;
            }

            .product-gallery img {
                border-radius: 10%;
                width: 20vw;
            }

            .product-gallery img:hover {
                box-shadow: 0 0 20px #ccc;
            }

            .prod {
                padding: 1em;
                font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            }

            .prod ul a {
                text-decoration: none;
                color: orange;
            }

            .prod ul a:hover {
                color: red;
            }

            ul .cat-header {
                color: grey;
                font-size: 24px;
            }

            .category li a {
                text-decoration: none;
                color: orange;
                font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
                font-weight: bold;
            }

            .category li a:hover {
                color: red;
            }

            .category li {
                padding-bottom: 1em;
                padding-left: 1em;
                font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            }

            #footer1 {
                clear: both;
            }

            .dropdown a {
                color: orange;
            }

            .dropdown-content a:hover {
                color: orange;
            }

            footer {
                clear: both;
            }
            input[type=submit] {
                background-color: orange;
                color: white;
                padding: 5px 10px;
                border: none;
                border-radius: 4px;
                /* cursor: pointer; */
            }
            input[type=submit]:hover{
                background-color: black;
            }
            #searchbutton {
                height: 40px;
                width: 70%;
                margin: auto;
                margin-bottom: 2em;
            }
            .submitsearch{
                padding: 1em !important;
            }
            @media only screen and (max-width:360px){
                .category{
                    display: none;
                }
                .product-gallery{
                    font-size: 12px;
                }
            }
            @media only screen and (max-width:768px){
                .category{
                    display: none;
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
    else if(isset($_GET['search'])){
        $search = strtoupper($_GET['search']);
        $filter = " Where productname LIKE '%$search%'";
    }
    else if (isset($_GET['id'])) {
        $selected_code = $_GET['id']; //get the product id that was passed over
        $filter = " WHERE id='$selected_code' ";
    }
    $conn = mysqli_connect("localhost", "root", "", "L8_AlexanderAng_DB", "3307");

    $sql = "SELECT * FROM product " . $filter;
    $selectedProduct = mysqli_query($conn, $sql);

    $sql_product = "SELECT * FROM product" . $filter;
    $product_list = mysqli_query($conn, $sql_product);

    $sql_category = "SELECT * FROM category";
    $category_list = mysqli_query($conn, $sql_category);
    
    mysqli_close($conn);
    ?>

    <body>
    <?php
        $registered = isset($_GET['redirect']) ? $_GET['redirect'] : 'NA';
        if ($registered != 'NA') {
            echo "<script>alert('Checkout Successful!')</script";
        }
    ?>
        <?php require("navbar.php") ?>
        <!-- Content Starts here -->
        <div id="container">
            <aside class="category">
                <ul>
                    <li class="cat-header">PRODUCT CATEGORIES</li>
                    <li class="cat"><a href="products2.php">ALL</a></li>
                    <?php while ($one_cat = mysqli_fetch_assoc($category_list)) { ?>
                        <li class="cat"><a href="products2.php?CatID=<?php echo $one_cat['id'] ?>"><?php echo $one_cat['catname'] ?></a></li>
                    <?php } ?>
                </ul>
            </aside>
            <form action="#" method="get" class="searchBTN">
                <input type="search" name="search" id="searchbutton" placeholder="Search..." >
                <input type="submit" value="Search" class="submitsearch">
            </form>
            <section class="product-gallery">
                <?php while ($one_product = mysqli_fetch_assoc($product_list)) { ?>
                    <div class="prod">
                        <a href="product_details.php?id=<?php echo $one_product['id']; ?>"></a>
                        <a href="product_details.php?id=<?php echo $one_product['id']; ?>"><img src="<?php echo $one_product['productimage'] ?>" alt=""></a>
                        <ul class="desc"><a href="product_details.php?id=<?php echo $one_product['id']; ?>"><?php echo $one_product['productname']; ?></a></ul>
                        $<?php echo number_format($one_product['unitprice'], 2) ?>
                        <?php $product = mysqli_fetch_assoc($selectedProduct); ?>
                        <form action="insert_cart.php" method="post" enctype="multipart/form-data">
                            <input type="submit" name="addtocart" value="Add To Cart" class="cartBTN">
                            <input type="hidden" name="pname" value="<?php echo $product['productname'] ?>">
                            <input type="hidden" name="pimg" value="<?php echo $product['productimage'] ?>">
                            <input type="hidden" name="pcost" value="<?php echo $product['unitprice'] ?>">
                        </form>
                    </div>
                <?php } ?>
            </section>
        </div>
        <!-- Content ends here -->
        <?php require('footer.php') ?>
    </body>

    </html>