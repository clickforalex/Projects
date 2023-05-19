<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Password</title>
    <script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>
    <link rel="stylesheet" href="stylesheet/strength.css">
    <script src="js/strength.js"></script>
</head>
<style>
    .overall-container{
        margin: auto;
        padding: 3em;
        display: flex;
        background-color: white;
        margin-bottom: 3em;
    }
    .sidemenu{
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
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
    .profilepicture img{
        height: 70px;
        width: 80px;
        border-radius: 90%;
    }
    .profilepicture{
        display: flex;
        padding-bottom: 3em;
    }
    button[type=submit] {
        margin-top: 1em;
        background-color: orange;
        color: white;
        padding: 5px 10px;
        border: none;
        border-radius: 4px;
        font-size: 22px;
    }
    button[type=submit]:hover{
        background-color: black;
    }
    form{
            padding: 1em;
            font-size: 22px;
        }
        input{
            font-size: 22px;
        }
    @media only screen and (max-width:360px){
        .overall-container{
            margin:auto;
            text-align: center;
            display: flex;
            flex-direction: column;
        }
        .profilepicture{
            display: none;
        }
        form {
            display: flex;
            flex-direction: column;
            padding: 1em;
            text-align: center;
        }
        .sidemenu{
            /* display: none; */
            width: 80%;
            margin: auto;
            text-align: center;
            padding-bottom: 1em;
        }
    }
    @media only screen and (max-width:768px){
        form{
            padding: 1em;
            font-size: 22px;
        }
        input{
            font-size: 22px;
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
    
?>
<body>
    <?php
        $profile = isset($_GET['profile']) ? $_GET['profile'] : 'NA';
        if ($profile != 'NA') {
            echo "<script>alert('Update Successful!')</script";
        }
    ?>
    <?php require("navbar.php") ?>
    <?php $mem = mysqli_fetch_assoc($meminfo) ?>
    <div class="overall-container">
        <aside class="sidemenu">
            <div class="profilepicture">
                <img src="<?php echo $mem['profilepic'] ?>" alt="">
                <h4><?php echo $mem['name'] ?></h4>
            </div>
            <div class="account-cat">
                <li><h3><a href="profile.php">My Account</a></h3></li>
            </div>
            <div class="account-pwd">
                <li><h3><a href="profilepwd.php">Change Password</a></h3></li>
            </div>
            <li><h3><a href="mypurchases.php">My Purchases</a></h3></li>
        </aside>
        <form action="uploadpwd.php" method="post">
            <div name="frmCheckPassword" id="frmCheckPassword">
                <i class="fa fa-lock"></i></span>
                <label for="cfmpwd">New Password</label>
                <input type="password" id="password" placeholder="New Password" name="pwd" onKeyUp="checkPasswordStrength();" required />
                <div id="password-strength-status"></div>
            </div>
            <div name="frmCheckPassword" id="frmCheckPassword">
                <i class="fa fa-lock"></i></span>   
                <label for="cfmpwd">Confirm Password</label>
                <input type="password" name="cfmpwd" placeholder="Confirm Password" id="pw2">
            </div>
            <div class="button">
                <button type="submit">Confirm Password</button>
            </div>
        </form> 
    </div>
   
    <?php require("footer.php") ?>
</body>
</html>