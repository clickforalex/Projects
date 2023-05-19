<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Profile Picture</title>
    <?php
    function saveData($username, $email, $addr, $phone, $tgt)
    {
       
        $conn = mysqli_connect("localhost", "root", "" , "L8_AlexanderAng_DB" , "3307");

        $sql_ = "UPDATE member SET email = '$email', name = '$username', address = '$addr', hpnumber = '$phone', profilepic = '$tgt' WHERE id='$uid'";

        $result = mysqli_query ( $conn, $sql_);

        mysqli_close($conn);
        // Check result
        if($result) 
        echo "Profile Updated";
        else
        echo "Profile Not Updated!!!";
    }     
    ?>
</head>
<body>
<?php
    session_start();
    $uid =  isset($_SESSION['SV_Userid'])?$_SESSION['SV_Userid']:"NA";
        if (isset($_FILES['fileToUpload']) && $_FILES['fileToUpload']['error'] === UPLOAD_ERR_OK)
        {
            echo "You have selected " . $_FILES["fileToUpload"]["name"] . "<br>";
            echo "The file size is " . $_FILES["fileToUpload"]["size"] . "<br>";
            echo "The file type is " . $_FILES["fileToUpload"]["type"] . "<br>";

            $allowedType = array("image/gif", "image/jpeg", "image/jpg", "image/png");
            if (  in_array ( $_FILES["fileToUpload"]["type"] , $allowedType ))
            {
                echo "File type is acceptable<br>"; 
                if ( $_FILES["fileToUpload"]["size"] < 1000000 ) 
                {
                    echo "File Size is acceptable<br>"; 

                    date_default_timezone_set("Asia/Singapore");
                    $timestamp = date("Ymd_His") ; 

                    

                    $target = "profilepics/" . rand(1,99999) . "_" . $_FILES["fileToUpload"]["name"] ; 

                    $result = move_uploaded_file($_FILES["fileToUpload"]["tmp_name"] , $target);
                    if($result)
                    {
                        $conn = mysqli_connect("localhost", "root", "" , "L8_AlexanderAng_DB" , "3307");

                        $username = $_POST['uname'];
                        $email = $_POST['email'];
                        $addr = $_POST['address'];
                        $phone = $_POST['number'];

                        $sql_ = "UPDATE member SET email = '$email', name = '$username', address = '$addr', hpnumber = '$phone', profilepic = '$target' WHERE id='$uid'";
                        $uploadprofile = mysqli_query ( $conn, $sql_);
                        if($uploadprofile)
                        {
                            header("Location:profile.php");
                        }
                        else
                        {
                            echo'<script>alert("Upload failed!")</script>';
                            echo "<script>location.replace('profile.php')</script>";
                        }
                    }
                    else
                    {
                        echo "<h1>Upload FAILED!</h1>";
                    }
                }  
                else
                {
                    echo " file is too large";
                    exit();
                }
                
            }
                
            else
            {
                echo "Invalid file type";
                exit();
            }
        }
        else
        {
            $conn = mysqli_connect("localhost", "root", "" , "L8_AlexanderAng_DB" , "3307");

                        $username = $_POST['uname'];
                        $email = $_POST['email'];
                        $addr = $_POST['address'];
                        $phone = $_POST['number'];

                        $sql_ = "UPDATE member SET email = '$email', name = '$username', address = '$addr', hpnumber = '$phone' WHERE id='$uid'";
                        $uploadprofile = mysqli_query ( $conn, $sql_);
                        if($uploadprofile)
                        {
                            header("Location:profile.php?profile=1");
                        }
                        else
                        {
                            echo'<script>alert("Upload failed!")</script>';
                            echo "<script>location.replace('profile.php')</script>";
                        }
        }
        
    ?>
</body>
</html>