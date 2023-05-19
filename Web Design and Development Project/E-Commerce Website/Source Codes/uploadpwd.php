<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Password Change</title>
</head>
<body>
    <?php 
        session_start();
        $uid =  isset($_SESSION['SV_Userid'])?$_SESSION['SV_Userid']:"NA";
        if($uid != 'NA')
        {
            $conn = mysqli_connect("localhost", "root", "" , "L8_AlexanderAng_DB" , "3307");

            $pwd1 = $_POST['newpwd'];
            $pwd2 = $_POST['cfmpwd'];
            

            if($pwd1 == $pwd2){
                $sql_ = "UPDATE member SET pw = '$pwd1' WHERE id = '$uid'";
                $uploadpwd = mysqli_query( $conn, $sql_);
                if($uploadpwd)
                {
                    echo'<script>alert("Upload Success!")</script>';
                    header("Location:profilepwd.php?pwd=1");
                }
                else
                {
                    echo'<script>alert("Password does not match!")</script>';
                    echo "<script>location.replace('profilepwd.php')</script>";
                }
            }
        }
    ?>
</body>
</html>


