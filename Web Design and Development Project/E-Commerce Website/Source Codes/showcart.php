<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Show Cart Page</title>
</head>
<style>
    nav ul {
        display: flex;
    }
    h2{
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        color: orange;
        text-align: center;
        padding: 1em;
    }
    p{
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        font-size: 22px;
        padding: 5em 3em 1em 2em;
    }
    nav li {
        list-style-type: none;
        margin-left: 0.5em;
        margin-right: 0.5em;
    }
    table{
        width: 90%;
        background-color: #333;
        margin: auto;
        text-align: center;
        color: white;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }
    table img{
        border-radius: 10%;
    }
    .checkoout-continue{
        padding-top: 3em;
        padding-bottom: 3em;
        
    }
    .checkoout-continue a{
        text-decoration: none;
        color: orange;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        font-size: 22px;
        padding: 0em 3em 0em 2em;
    }
    .checkoout-continue a:hover{
        color: black;
    }
    .table-product{
        display: flex;
    }
    .name-product{
        padding-top:5em;
        padding-left: 1em;
    }
    input[type=submit] {
        background-color: orange;
        color: white;
        padding: 5px 10px;
        border: none;
        font-size: 16px;
        border-radius: 4px;
    }
    input[type=submit]:hover{
        background-color: black;
    }
    input[type=text]{
        background-color: black;
        color: white;
        padding: 5px 10px;
        border: none;
        font-size: 14px;
        border-radius: 4px;
        text-align: center;
        margin-bottom: .3em;
    }
    button[type=button]{
        background-color: orange;
        color: white;
        padding: 5px 10px;
        border: none;
        font-size: 16px;
        border-radius: 4px;
    }
    @media only screen and (max-width:360px){
        .table-product{
            display: flex;
            flex-direction: column-reverse;
        }
        .img-product img{
            height: 100px;
            width: 100px;
        }   
        table{
            font-size: 12px;
        }
        form .update{
            font-size: 12px;
        }
        input[type=submit] {
        background-color: orange;
        color: white;
        border: none;
        font-size: 10px;
        border-radius: 4px;
    }
        input[type=submit]:hover{
            background-color: black;
        }
        input[type=text]{
            background-color: black;
            color: white;
            padding: 5px 0px;
            border: none;
            font-size: 10px;
            border-radius: 4px;
            text-align: center;
            margin-bottom: .3em;
        }
        button[type=button]{
            background-color: orange;
            color: white;
            padding: 5px 5px;
            border: none;
            font-size: 10px;
            border-radius: 4px;
        }
    }
</style>
<?php
$uid =  isset($_SESSION['SV_Userid']) ? $_SESSION['SV_Userid'] : "NA";
$uname =  isset($_SESSION['MM_Username']) ? $_SESSION['MM_Username'] : "NA";
$filter = "";
if ($uid != "NA") {
    $filter = " WHERE userid='$uid'";
} else {
    header("Location:login.php");
}
$conn = mysqli_connect("localhost", "root", "", "L8_AlexanderAng_DB", "3307");
$cart = "SELECT * FROM cart" . $filter;
$cart_list = mysqli_query($conn, $cart);
?>
</head>

<body>
    <?php require("navbar.php") ?>
    <h2><?php echo $uname ?>'s Shopping Cart</h2>
    <?php
    if ($cart_list->num_rows === 0) {
        echo "<p>No items in cart!</p>";
    } 
    else { ?>
        <table border="0">
            <tr>
                <th>Product</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Total Price</th>
                <th>Actions</th>
            </tr>
            <?php $total = 0; ?>
            <?php $qty = 0; ?>
            <?php while ($cart_prod = mysqli_fetch_assoc($cart_list)) { ?>
                <tr>
                    <?php if ($cart_prod['qty'] != "0") { ?>
                        <td>
                            <div class="table-product"> 
                                <div class="img-product"><img src="<?php echo $cart_prod['cimage'] ?>" alt=""></div>
                                <div class="name-product"><?php echo $cart_prod['cname'] ?></div>   
                            </div>
                        </td>
                        <td>$<?php echo number_format($cart_prod['ccost'], 2) ?></td>
                        <td>
                            <form class="update" action="update_cart.php" method="post">
                                <input type="hidden" name="prodid" value="<?php echo $cart_prod['id'] ?>">                      
                                <br>
                                <button type="button" onclick="decrease('<?php echo $qty ?>')">-</button>
                                <input type="text" id="<?php echo $qty ?>" name="newqty" value="<?php echo $cart_prod['qty']?>" size="1">
                                <button type="button" onclick="increase(<?php echo $qty++ ?>)">+</button>
                                <br>
                                <input type="submit" value="Update Qty" name="updatebtn">
                            </form>
                        </td>
                        <td>
                            $<?php
                            $tcost = $cart_prod['ccost'] * $cart_prod['qty'] ;
                            echo number_format($tcost, 2);
                            ?>
                            </td>
                        <td>
                            <form action="delete_cart.php" method="post">
                                <input type="submit" value="Delete" name="deletebtn">
                                <input type="hidden" name="prodid" value="<?php echo $cart_prod['id'] ?>">
                            </form><br>
                            
                        </td>
                    <?php } else {
                        $tcost = 0;
                    } ?>
                </tr>
                <?php $total = $total + $tcost ?>
            <?php } ?>
            <tr>
                <td colspan="5">Total: $<?php echo number_format($total, 2) ?></td>
            </tr>
        </table>
    <?php } ?>
    <div class="checkoout-continue">
        <a href="products2.php">Continue Browsing</a>
        <?php if ($cart_list->num_rows === 0) { ?>
        <?php } else { ?>
            <a href="checkout.php">Checkout</a>
        <?php } ?>
    </div>
    <?php require('footer.php') ?>
    <script src="js/button.js"></script>
</body>

</html>