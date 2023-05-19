<?php
if (isset($_POST['updatebtn']) && $_POST['updatebtn'] == 'Update Qty')
{
    $conn = mysqli_connect("localhost", "root", "","L8_AlexanderAng_DB","3307" );
    $cidToUpdate = $_POST["prodid"] ;
    $newqty = $_POST["newqty"];
    $sql = "UPDATE cart SET qty = '$newqty' WHERE id = '$cidToUpdate' " ;
    $sql2 =  "DELETE FROM cart WHERE id = '$cidToUpdate'";
    if($newqty!="0"){
        $result = mysqli_query($conn,$sql);
        if($result)
        {
            Header("Location:showcart.php");
        }
    }
    else{
        $result = mysqli_query($conn,$sql2);
        if($result)
        {
            Header("Location:showcart.php");
        }
    }
}
?>