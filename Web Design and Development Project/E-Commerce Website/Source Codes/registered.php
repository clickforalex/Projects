<?php   
        if(isset($_POST['submit']) && $_POST['submit'] == 'Register')
        {
            $name = $_POST['name'];
            $emailadd = $_POST['emailadd'];
            $homeadd = $_POST['homeadd'];
            $phone = $_POST['mobileNo'];
            $password = $_POST['pwd'];
            $cpassword = $_POST['cpwd'];
            
            if($password == $cpassword)
            { 
                $conn = mysqli_connect("localhost", "root", "","L8_AlexanderAng_DB" , "3307" );
                $sql_insert = "SELECT * FROM member WHERE email= '$emailadd'";
        
                $result = mysqli_query ($conn,$sql_insert);
                $userfound = mysqli_num_rows($result);
                mysqli_close($conn);
                if($userfound >= 1) 
                {
                    echo '<script>alert("Email already exists!")</script>'; 
                    header("Location:Register.php?failed=1");
                }
                else
                {
                    saveData($emailadd, $name, $homeadd, $phone, $cpassword);
                    //function to update database
                }    
            }
            else
            {
                header("Location:login.php?success=1");
                // echo '<script>alert("Password did not match")</script>';
            }                                  
        }
        function saveData($emailadd, $name, $homeadd, $phone, $cpassword)
        {
            $conn = mysqli_connect("localhost", "root", "","L8_AlexanderAng_DB" , "3307" );

            $sql_insert = "INSERT INTO member(email, name, pw, address, hpnumber) VALUES ('$emailadd', '$name', '$cpassword', '$homeadd', '$phone') ";
            $result = mysqli_query ($conn,$sql_insert);
            mysqli_close($conn);

            if ($result)
            {
                header ("Location:login.php?success=1");
            }
            else
            {
                echo '<script>alert("Error!")</script>'; 
            }
        }
?>
