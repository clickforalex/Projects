<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Details Page</title>
    <?php
    $filter = "";
    if (isset($_GET['id'])) {
        $selected_code = $_GET['id']; //get the product id that was passed over
        $filter = " WHERE id='$selected_code' ";
    }
    $conn = mysqli_connect("localhost", "root", "", "L8_AlexanderAng_DB", "3307");
    $sql = "SELECT * FROM product " . $filter;
    $selectedProduct = mysqli_query($conn, $sql);
    mysqli_close($conn);
    ?>
    <style>
        #container {
            display: flex;
            justify-content: center;
            width: 90%;
            margin: auto;
            padding-top: 1em;
            padding-bottom: 1em;
        }

        #details {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            font-size: 22px;
            margin-left: 2em;
            margin-right: 2em;
        }

        #details p {
            padding-bottom: 2em;
        }

        img {
            border-radius: 20%;
        }

        p {
            font-size: 18px;
        }
        input[type=submit] {
                background-color: orange;
                color: white;
                padding: 5px 10px;
                border: none;
                border-radius: 4px;
        }
        input[type=submit]:hover{
            background-color: black;
        }
        @media only screen and (max-width:768px){
            #container{
                display: flex;
                flex-direction: column;
                text-align: center;
            }
            h1{
                font-size:22px;
            }
            #img img{
                height: 300px;
                width: 300px;
            }
        }
        @media only screen and (max-width:360px){
            #container{
                display: flex;
                flex-direction: column;
                text-align: center;
            }
            h1{
                font-size:22px;
            }
            #img img{
                height: 300px;
                width: 300px;
            }
        }
    </style>
</head>

<body>
    <?php require("navbar.php") ?>
    <?php $product = mysqli_fetch_assoc($selectedProduct); ?>
    <div id="container">
        <aside id="img">
            <img src="<?php echo $product['productimage'] ?>" alt="img">
        </aside>
        <section id="details">
            <h1><?php echo $product['productname'] ?></h1>
            <p>Description: <?php echo $product['productdescrip'] ?></p>
            <p>Price: $<?php echo number_format($product['unitprice'], 2) ?></p>  
            
            <form action="insert_cart.php" method="post" enctype="multipart/form-data">
                <input type="submit" name="addtocart" value="Add To Cart">
                <input type="hidden" name="pname" value="<?php echo $product['productname'] ?>">
                <input type="hidden" name="pimg" value="<?php echo $product['productimage'] ?>">
                <input type="hidden" name="pcost" value="<?php echo $product['unitprice'] ?>">
            </form>
        </section>
    </div>
    <?php require('footer.php') ?>
</body>

</html>