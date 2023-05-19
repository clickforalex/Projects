<?php

if (isset($_POST['deletebtn']) && $_POST['deletebtn'] == 'Delete')
{
    $conn = mysqli_connect("localhost", "root", "","L8_AlexanderAng_DB","3307" );
    $cidToDelete = $_POST["prodid"] ;
    $sql = "DELETE FROM cart WHERE id = '$cidToDelete'" ;
    $result = mysqli_query($conn,$sql);
    if($result)
    {
        Header("Location:showcart.php") ;
    }
}
?>