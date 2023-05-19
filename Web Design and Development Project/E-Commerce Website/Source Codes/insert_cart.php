<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Cart</title>
</head>
<body>
    <?php require('navbar.php') ?>
    <?php
        session_start();

        $uid = isset($_SESSION['SV_Userid'])?$_SESSION['SV_Userid']:"NA";
        if ($uid !="NA")
        {

            $pname = isset ($_POST['pname'])?$_POST['pname']:"";
            $pimg = isset ($_POST['pimg'])?$_POST['pimg']:"";
            $pcost = isset ($_POST['pcost'])?$_POST['pcost']:"";

            $conn = mysqli_connect("localhost", "root", "", "L8_AlexanderAng_DB", "3307");
            
            echo $sql_ = "INSERT INTO cart (cname, ccost, cimage, userid) VALUES ('$pname', '$pcost', '$pimg', '$uid')" ;

            $_result = mysqli_query ( $conn, $sql_);

            mysqli_close($conn);
            if ($_result)
            {
                header("Location:showcart.php");
            }
            else{
                header("Location:homepage.php");
            }
        }
        else
            header("Location:login.php?fail=3");
    ?>
    <?php require("footer.php") ?>
</body>
</html>