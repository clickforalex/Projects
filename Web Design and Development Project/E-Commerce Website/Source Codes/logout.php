<?php
    session_start(); 
    session_destroy();
    header("Location:login.php?fail=2"); // go back to login page
?>