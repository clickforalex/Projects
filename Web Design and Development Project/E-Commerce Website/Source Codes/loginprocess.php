<?php
    if (isset($_POST['submit']) && $_POST['submit'] == 'Login') {
        $email = $_POST['email'];
        $password = $_POST['pwd'];

        $conn = mysqli_connect("localhost", "root", "", "L8_AlexanderAng_DB", "3307");

        $sql_insert = "SELECT * FROM member WHERE email ='$email' and pw ='$password'";


        $result = mysqli_query($conn, $sql_insert);
        $userinfo = mysqli_fetch_assoc($result);
        $userfound = mysqli_num_rows($result);
        if ($userfound >= 1) {
                session_start();
                $_SESSION['MM_Username'] = $userinfo['name'];
                $_SESSION['SV_Userid'] = $userinfo['id'];
                header("Location:homepage.php?success=1");
            }
            else{
                header("Location:login.php?error=2");
            }
        mysqli_close($conn);
    }
?>