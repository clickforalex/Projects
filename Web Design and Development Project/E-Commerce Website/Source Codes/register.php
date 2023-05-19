<!DOCTYPE html>
<php lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Registration Page</title>
        <link rel="stylesheet" href="stylesheet/register.css">
        <link rel="stylesheet" href="stylesheet/strength.css">
        <script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>
    </head>
    <style>
        @media only screen and (max-width:360px){
            input{
                padding: .2em;
                font-size: 12px;
            }
        }
        @media only screen and (max-width:768px){
            input{
                padding: .2em;
            }
        }
    </style>
    <?php
        $registered = isset($_GET['failed']) ? $_GET['failed'] : 'NA';
        if ($registered != 'NA') {
            echo "<script>alert('Email already exists!')</script";
        }
        ?>
    <body>
        <?php require("navbar.php") ?>
        
        <div id="backgroundImg">
            <section class="form">
                <form action="registered.php" id="login" method="post">
                    <div class="small-logo"><img src="images/logos/logo.png" alt="Handpicked" title="Welcome to Handpicked" height="150px" width="500px"></div>
                    <i class="fa fa-user"></i></span>
                    <input type="text" placeholder="Name" name="name"  required>
                    <br>
                    <br>
                    <i class="fa fa-envelope"></i></span> 
                    <input type="text" placeholder="Email Address" name="emailadd"  required>
                    <br>
                    <br>
                    <i class="fa fa-home"></i></span>
                    <input type="text" placeholder="Home Address" name="homeadd"  required>
                    <br>
                    <br>
                    <i class="fa fa-phone"></i></span>
                    <input type="text" placeholder="Mobile Number" name="mobileNo"  required>
                    <br>
                    <br>
                    <script src="js/strength.js"></script>
                    <div name="frmCheckPassword" id="frmCheckPassword">
                        <i class="fa fa-lock"></i></span>
                        <input type="password" id="password" placeholder="Password" name="pwd"  onKeyUp="checkPasswordStrength();" required />
                        <div id="password-strength-status"></div>
                    </div>
                    
                    <br>
                    <i class="fa fa-lock"></i></span>
                    <input type="password" id="cfmpwd" placeholder="Confirm Password" name="cpwd"  required>
                    <br>
                    <br>
                    <input type="submit" name="submit" value="Register">
                </form>
            </section>
        </div>
        <?php require('footer.php') ?>
    </body>

    </html>