<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>myPurchases Page</title>
    <style>
        h2{
            text-align: center;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        .content{
            width: 80%;
        }
        table{
            width: 100%;
            margin: auto;
            text-align: center;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #333;
            color: white;
        }
        table img{
            border-radius: 10%;
            height: 200px;
            width: 200px;
        }
        .profilepicture img{
            height: 70px;
            width: 80px;
            border-radius: 90%;
        }
        .profilepicture{
            display: flex;
            padding-bottom: 3em;
        }
        h4{
            padding-left: 1em;
        }
        .category{
            background-color: orange;
        }
        .category ul{
            display: flex;
            justify-content: center;
        }
        .category li{
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            font-size: 26px;
            list-style-type: none;
            padding-right: 1em;
            padding-left: 1em;
            color: white;
        }
        .category li a{
            text-decoration: none;
        }
        .category li a:visited{
            color: white;
        }
        .category li a:hover{
            display: block;
            background-color: black;
        }
        .myorders{
            padding: 2em;
            display: flex;
            background-color: white;
            margin-bottom: 3em;
        }
        .sidemenu{
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            width: 15%;
            padding: 1em;
            background-color: #ebebeb;
        }
        .sidemenu a{
            text-decoration: none;
            color: black;
        }
        .sidemenu a:hover{
            color: orange;
        }
        .sidemenu li{
            list-style-type: none;
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
        @media only screen and (max-width:360px){
            .myorders{
                display: flex;
                flex-direction: column;
                padding: 0em;
            }
            form {
                display: flex;
                flex-direction: column;
            }
            .sidemenu{
                width: 80%;
                margin: auto;
                text-align: center;
                font-size: 22px;
            }
            .sidemenu h3{
                font-size: 22px;
            }
            .profilepicture{
                padding-bottom: 1em;
            }
            .profilepicture img{
                margin: auto;
            }
            table{
                font-size: 12px;
                display: flex;
                justify-content: center;
                width: 90%;
            }
            .category ul{
                display: flex;
                flex-direction: column;
                text-align: center;
            }
            .content {
                width: 90%;
                margin: auto;
                padding: 1em;
            }
            .productdeets{
                display: flex;
                flex-direction: column;
                width: 100%;
            }
            .productdeets img{
                height: 100px;
                width: 100px;
            }
            input[type=submit] {
                background-color: orange;
                color: white;
                padding: 2px 1px;
                border: none;
                font-size: 12px;
                border-radius: 4px;
            }
        }
        @media only screen and (max-width:768px){
            .profilepicture {
                display: flex;
                flex-direction: column;
            }
        }
    </style>
    <?php 
        $uid =  isset($_SESSION['SV_Userid']) ? $_SESSION['SV_Userid'] : "NA";
        $uname =  isset($_SESSION['MM_Username']) ? $_SESSION['MM_Username'] : "NA";
        if ($uid != 'NA'){
            $conn = mysqli_connect("localhost", "root", "", "L8_AlexanderAng_DB", "3307");
            $sql = "SELECT * FROM member WHERE id = '$uid'";
            
            $meminfo= mysqli_query($conn, $sql);

            mysqli_close($conn);
        }
        else{
            header("Location:login.php");
        }
        $filter="";
        if(isset($_GET['cat']))
        {
            $cat = $_GET['cat'];
            $filter=" AND orderstatus = '$cat'";
        }
        // Initiate database connection
        $conn = mysqli_connect("localhost", "root", "" , "L8_AlexanderAng_DB" , "3307");

        $sql_orders = "SELECT DISTINCT orderstatus FROM orders";

        $orderdetail_list = mysqli_query ( $conn, $sql_orders);

        // echo $sql_ = "SELECT ord.*, orddet.cimage, orddet.cname, orddet.ccost, orddet.qty FROM orders AS ord INNER JOIN order_details AS orddet ON orddet.orderid = ord.id " ;

        $sql_ = "SELECT * FROM orders WHERE memberid = $uid" . $filter;
        $querydetail = mysqli_query($conn, $sql_);

        $sqlorddetail = "SELECT * FROM order_details ";

        $orderdetail = mysqli_query($conn, $sqlorddetail);

        mysqli_close($conn);
        $order_detail_list = []; //stores the array permanently
        while($detail = mysqli_fetch_assoc($orderdetail))
        {
            $order_detail_list[] = $detail; //array increment
        }

    ?>
</head>
</head>
<body>
    <?php require('navbar.php') ?>
    <h2>My Orders</h2> 
    <?php $mem = mysqli_fetch_assoc($meminfo) ?>
    <div class="myorders">
        <aside class="sidemenu">
            <div class="profilepicture">
                <img src="<?php echo $mem['profilepic'] ?>" alt="">
                <h4><?php echo $mem['name'] ?></h4>
            </div>
            <div class="account-cat">
                <li><h3><a href="profile.php">My Account</a></h3></li>
            </div>
            <li><h3><a href="mypurchases.php">My Purchases</a></h3></li>
        </aside>
        <section class="content">
            <div class="category">
                <ul>
                    <li><a href="mypurchases.php">All</a></li>
                    <li><a href="mypurchases.php?cat=O">Ordered</a></li>
                    <li><a href="mypurchases.php?cat=D">Delivered</a></li>
                    <li><a href="mypurchases.php?cat=C">Cancelled</a></li>
                </ul>
            </div>
            <br>
            <table class="table1" border="1">
                <tr>
                    <th>Product</th>
                    <th>Total Price</th>
                    <th>Quantity</th>
                    <th>Cancel Date/Delivered Date</th>
                </tr>
                <?php while ($orderdetails = mysqli_fetch_assoc($querydetail)) { ?>
                <tr>
                    <td>
                        <table>
                            <?php 
                                foreach ($order_detail_list as $odl){
                                    if ($odl['orderid'] == $orderdetails['id']){
                                    ?>
                                        <div class="bottom">
                                            <tr class="productdeets">
                                                <td><img src="<?php echo $odl['cimage']; ?>" alt=""></td>
                                                <td><?php echo $odl['cname']; ?></td>
                                            </tr>
                                        </div>
                                        <tr><td><h4>Order Date:</h4> <?php echo $orderdetails['orderdate'] ?></td></tr>
                                        <tr><td><h4>Requested Date:</h4> <?php echo $orderdetails['reqdate'] ?></td></tr>   
                                        
                                <?php }
                                } 
                            ?>

                        </table>
                    </td>
                    <td>$<?php echo number_format($orderdetails['totalprice'], 2) ?></td>
                    <td><?php echo $orderdetails['totalquantity'] ?></td>
                    <td>
                        <?php

                            $date1 = new datetime($orderdetails['reqdate']);
                            $date2 = new datetime("now + 2day");
                            $delidate = $orderdetails['reqdate'];

                            $date3 = new datetime($orderdetails['canceldate']);
                            if (strtotime($orderdetails['canceldate']) != "")
                                echo "Cancelled on " . $date3->format('Y-m-d H:i:s');
                            else if($orderdetails['orderstatus'] == "D"){
                                echo "Delivered on " . $delidate;
                            }
                            else if ($date1 > $date2){
                        ?>
                            <form action="cancelorder.php" method="post">
                                <input type="hidden" name="ordid" value="<?php echo $orderdetails['id'] ?>">
                                <input type="submit" name="submit" value="Cancel">
                            </form>
                            <?php } ?>
                    </td>
                </tr>
                <?php } ?>
            </table>
            <div>
                <?php 
                    $val = isset($_GET['stt'])?$_GET['stt']:"";
                            
                    if($val==1) 
                        echo "<b>Cancellation not successful</b>";
                ?>
            </div>
        </section>
    </div>
    <?php require('footer.php') ?>

</body>
</html>
