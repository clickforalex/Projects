<!DOCTYPE html>
<php lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login Page</title>
        <link rel="stylesheet" href="stylesheet/login.css">

    </head>
    <style>
        @media only screen and (max-width:360px){
            input{
                padding: .2em;
                font-size: 12px;
            }
            .register p{
                font-size: 12px;
            }
        }
        @media only screen and (max-width:768px){
            .category{
                display: none;
            }
        }
    </style>

    <body>
        <?php require("navbar.php") ?>
        <?php
        $registered = isset($_GET['success']) ? $_GET['success'] : 'NA';
        if ($registered != 'NA') {
            echo "<script>alert('Registration Successful!')</script";
        }
        ?>
        <?php
        $error = isset($_GET['error']) ? $_GET['error'] : 'NA';
        if ($error != 'NA') {
            echo "<script>alert('Not a valid user!')</script";
        }
        ?>
        <div id="backgroundImg">
            <section class="form">
                <form action="loginprocess.php" id="login" method="post">
                    <div class="small-logo"><img src="images/logos/logo.png" alt="Handpicked" title="Welcome to Handpicked" height="150px" width="500px"></div>
                    <input type="text" placeholder="Email Address" name="email" required>
                    <br>
                    <br>
                    <input type="password" placeholder="Password" name="pwd" required>
                    <br>
                    <br>
                    <input type="submit" name="submit" value="Login">

                    <?php 
                        $val = isset($_GET['fail'])?$_GET['fail']:"";
                        
                        if($val==1) 
                            echo "<b>Invalid username or password</b>";
                        else if ($val==2) 
                            echo "<b>You have successfully logout</b>";
                        else if ($val==3)
                            echo "<b>Please Login before you add to cart</b>"
                    ?>
                </form>
                <br>
                <div class="register">
                    
                    <p>New to Handpicked? <a href="register.php">Click here</a> to Register!</p>
                </div>
            </section>
        </div>
        <?php require('footer.php') ?>
    </body>

    </html>