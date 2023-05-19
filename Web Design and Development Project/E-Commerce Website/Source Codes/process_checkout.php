<?php 
    session_start();
    $uid =  isset($_SESSION['SV_Userid']) ? $_SESSION['SV_Userid'] : "NA";
    if ($uid != 'NA')
    {
        $reqdate = $_POST['date'];
        $totalcost = $_POST['totalcost'];
        $totalqty = $_POST['totalqty'];
        date_default_timezone_set("Asia/Singapore");
        $currentdate = date("Y-m-d H:i:s");

        $conn = mysqli_connect("localhost", "root", "","L8_AlexanderAng_DB", "3307" );

        $sql_order = "INSERT INTO orders (memberid, orderdate, reqdate, totalquantity, totalprice) VALUES ('$uid', '$currentdate', '$reqdate', '$totalqty', '$totalcost')";
        $_result = mysqli_query( $conn, $sql_order);

        if ($_result)
        {
            
            // $filter = " WHERE memberid = $uid AND orderdate = $currentdate";
            $sql_orderid = "SELECT * FROM orders WHERE memberid = '$uid' AND orderdate = '$currentdate' ";

            $sql_orderdetails = mysqli_query( $conn, $sql_orderid);

            if($sql_orderdetails)
            {
                $orderlist = mysqli_fetch_assoc($sql_orderdetails);
                $orderid = $orderlist['id']; //Get back id in orders table

                $sql_orderinfo = "INSERT INTO order_details (cname, ccost, qty, cimage, userid, orderid) SELECT crt.cname, crt.ccost, crt.qty, crt.cimage, crt.userid, ord.id FROM cart AS crt INNER JOIN orders AS ord ON ord.id= $orderid" ;
                $insert_prod = mysqli_query($conn, $sql_orderinfo);

                if($insert_prod)
                {
                    $sql = "DELETE FROM cart WHERE userid = '$uid'";
                    $result = mysqli_query($conn, $sql);
                    header('Location:products2.php?redirect=1');
                }
                
            }
        }
        else{
            header('Location:checkout.php');
        }
    }
    else{
        header("Location:login.php");
    }
?>
