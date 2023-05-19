<?php session_start() ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Page</title>
</head>
<style>
    body{
        background-color: #ebebeb;
    }
    h2, .desc{
        text-align: center;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }
    form{
        display: flex;
        flex-direction: row-reverse;
    }
    .myprofile{
        width: 90%;
        margin: auto;
        padding: 3em;
        display: flex;
        background-color: white;
        margin-bottom: 3em;
    }
    .profile-details{
        font-size: 22px;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        width: 70%;
    }
    .profile-details input{
        font-size: 22px;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }
    .profilepic{
        width: 30%;
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
    .img{
        text-align: center;
    }
    .img img{
        border-radius: 90%;
        width: 70%;
        text-align: center;
    }
    .sidemenu{
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        width: 30%;
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
    .form-group td{
        padding: 1em;
    }
    input[type=submit] {
        background-color: orange;
        color: white;
        padding: 5px 10px;
        border: none;
        border-radius: 4px;
    }
    input[type=submit]:hover{
        background-color: black;
    }
    p{
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        color: grey;
    }
    @media only screen and (max-width:360px){
        .profile-details .form-group{
            font-size: 1px;
        }
        .myprofile{
            display: flex;
            flex-direction: column;
        }
        .profilepic{
            margin-left: 5em;
        }
        .profilepicture{
            display: none;
        }
        form {
            display: flex;
            flex-direction: column;
        }
        .sidemenu{
            /* display: none; */
            width: 80%;
            margin: auto;
            text-align: center;
            padding-bottom: 1em;
        }
        
        table{
            font-size: 12px;
            padding-right: 4em;
        }
        .profile-details input{
            font-size: 1px;
        }
    }
    @media only screen and (max-width:768px){
        form {
            display: flex;
            flex-direction: column;
            font-size: 12px;
            text-align: center;
        }
        .myprofile{
            padding: 1em;
        }
        table{
            font-size: 20px;
            padding-right: 4em;
        }
        .profile-details input{
            font-size: 20px;
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
    <?php require('navbar.php') ?>
    <h2>My Profile</h2> 
    <p class="desc">Manage and Protect your account</p>
    <?php $mem = mysqli_fetch_assoc($meminfo) ?>
    <div class="myprofile">
        
        <aside class="sidemenu">
            <div class="profilepicture">
                <img src="<?php echo $mem['profilepic'] ?>" alt="">
                <h4><?php echo $mem['name'] ?></h4>
            </div>
            <div class="account-cat">
                <li><h3><a href="#">My Account</a></h3></li>
            </div>
            <div class="account-pwd">
                <li><h3><a href="profilepwd.php">Change Password</a></h3></li>
            </div>
            <li><h3><a href="mypurchases.php">My Purchases</a></h3></li>
        </aside>
        <form class="form" action="upload.php" method="post" enctype="multipart/form-data">
            <table class="profile-details">
                <div class="form-group">
                    <tr class="form-group">
                        <td><label><h3>Username:</h3></label></td>
                        <td><input type="text" name="uname" value="<?php echo $mem['name'] ?>"   required></td>
                    </tr>
                    <tr class="form-group">
                        <td><label><h3>Email:</h3></label></td>
                        <td><input type="text" name="email" value="<?php echo $mem['email'] ?>"   required></td>
                    </tr>
                    <tr class="form-group">
                        <td><label><h3>Address:</h3></label></td>
                        <td><input type="text" name="address" value="<?php echo $mem['address'] ?>"   required></td>
                    </tr>
                    <tr class="form-group">
                        <td><label><h3>Phone Number:</h3></label></td>
                        <td><input type="text" name="number" value="<?php echo $mem['hpnumber'] ?>"   required></td>
                    </tr>
                    <tr class="form-group">
                        <td><input type="submit" name="submit" value="Update"></td>
                    </tr> 
                </div>
                <div class="profilepic">
                    <label for="fileToUpload" id="img" class="img"><img src="<?php echo $mem['profilepic'] ?>" alt=""></label>
                    <input type="file" name="fileToUpload" id="fileToUpload"/> 
                    <br>
                    <p class="photodesc">File extension: .JPEG, .PNG, .JPG</p>
                </div>
            </table>
        </form>  
    </div>
    <?php require('footer.php') ?>

</body>

</html>
