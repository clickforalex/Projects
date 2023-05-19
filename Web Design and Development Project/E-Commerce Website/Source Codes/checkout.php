<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php 
        $uname =  $_SESSION['SV_Userid'] ;
        if ($uname != 'NA'){
            $conn = mysqli_connect("localhost", "root", "","L8_AlexanderAng_DB", "3307" );
            $cart = "SELECT * FROM cart";
            $cart_list = mysqli_query($conn,$cart);
        }
        else{
            header("Location:login.php");
        }
        
    ?>
    <style>
        table{
            width: 90%;
            margin: auto;
            text-align: center;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #333;
            color: white;
        }
        table img{
            border-radius: 10%;
        }
        h2{
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: orange;
            text-align: center;
            padding: 1em;
        }
        form{
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            padding: 1em;
            font-size: 22px;
        }
        .back{
            padding: 1.3em;
        }
        .back a{
            text-decoration: none;
            display: block;
            background-color: orange;
            border-radius: 4px;
            width: 150px;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            font-size: 22px;
            text-align: center;
        }
        .back a:visited{
            color: white;
        }
        .back a:hover{
            background-color: black;
        }
        input[type=submit] {
            background-color: orange;
            color: white;
            padding: 5px 10px;
            border: none;
            font-size: 22px;
            border-radius: 4px;
        }
        input[type=submit]:hover{
            background-color: black;
        }
        .table-product{
        display: flex;
        }
        .name-product{
            padding-top:5em;
            padding-left: 1em;
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
        }
    </style>
</head>
    <body>
    <?php require('navbar.php') ?>
    <h2>Checkout</h2>
        <?php $total = 0; ?>
        <?php $totalqty = 0; ?>
        <?php while($cart_prod = mysqli_fetch_assoc($cart_list)) {?>
            <table border='0'>
                <tr>
                    <td>
                        <div class="table-product"> 
                            <div class="img-product"><img src="<?php echo $cart_prod['cimage'] ?>" alt=""></div>
                            <div class="name-product"><?php echo $cart_prod['cname'] ?></div>   
                        </div>
                    </td>
                    <td><?php echo 'Price: $'.number_format($cart_prod['ccost'],2)?></td>
                    <td><?php echo 'Quantity: '.$cart_prod['qty']?></td>
                    <td>
                        <?php 
                            $tcost = $cart_prod['ccost'] * $cart_prod['qty'];
                            echo 'Total Price: $'.number_format($tcost, 2);
                        ?>
                    </td> 
                </tr>
            </table>
            <?php $total = $total + $tcost ?>
            <?php $totalqty = $totalqty + $cart_prod['qty'] ?>
        <?php } ?>
        <form action="process_checkout.php" method="post" onsubmit="">
            
            <p>Total: $<?php echo number_format($total, 2) ?></p>
            <br>
            <label>Select Date of Delivery (7 Days after purchased date):</label>
            <input type="datetime-local" name="date" id="date" required>
            <br>
            <br>
            <input type="submit" value="Place Order" name="checkout">
            <input type="hidden" value="<?php echo $total ?>" name="totalcost">
            <input type="hidden" value="<?php echo $totalqty ?>" name="totalqty">
        </form> 
        <div class="back"><a href="showcart.php">Back</a></div>
         

    <?php require('footer.php') ?>
    </body>

</html>