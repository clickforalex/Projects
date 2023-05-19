<?php
session_start();
$uid = isset($_SESSION['SV_Userid'])?$_SESSION['SV_Userid']:'NA';
if ($uid != 'NA')
{
    $conn = mysqli_connect("localhost", "root", "","L8_AlexanderAng_DB","3307" );

    $newqty = $_POST["ordid"];

    $sql = "UPDATE orders SET orderstatus='C', canceldate=now() where id=$newqty AND memberid = '$uid' " ;

    $result = mysqli_query($conn, $sql);

    mysqli_close();

    if($newqty!="0"){
        $result = mysqli_query($conn,$sql);
        if($result)
        {
            Header("Location:mypurchases.php");
        }
    }
    else{
        $result = mysqli_query($conn,$sql2);
        if($result)
        {
            Header("Location:mypurchases.php?stt=1");
        }
    }
}
else{
    header("Location:login.php?stt=3");
}
?>