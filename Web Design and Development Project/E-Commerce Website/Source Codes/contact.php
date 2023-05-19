<?php session_start(); ?>
<!DOCTYPE html>
<php lang="en">

  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us Page</title>
  </head>
  <style>
    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      justify-content: center;
      height: 100vh;
      color: #fff;
      background: linear-gradient(-45deg, #A9A9A9, #C0C0C0, white, #C0C0C0);
      background-size: 300% 300%;
      position: relative;
      animation: myAnimation 10s ease-in-out infinite;
      clear: both;
    }

    * {
      box-sizing: border-box;
    }

    h1 {
      text-align: center;
      color: orange;
    }

    input[type=text],
    select,
    textarea {
      width: 100%;
      padding: 12px;
      border: 1px solid #ccc;
      border-radius: 4px;
      box-sizing: border-box;
      margin-top: 6px;
      margin-bottom: 16px;
      resize: vertical;
    }

    input[type=submit] {
      background-color: black;
      color: white;
      padding: 12px 20px;
      border: none;
      border-radius: 4px;
      cursor: pointer;
    }

    input[type=submit]:hover {
      background-color: orange;
    }

    .empty {
      visibility: hidden;
    }

    .container {
      border-radius: 5px;
      background-color: #333;
      padding: 20px;
      display: flex;
      width: 90%;
      margin: auto;
      color: white;
      margin-bottom: 3em;
    }

    .enquiries {
      margin-right: 5em;
      padding-top: 3em;
    }

    h4 {
      color: orange;
    }

    @keyframes myAnimation {
      0% {
        background-position: 0 50%;
      }

      50% {
        background-position: 100% 50%;
      }

      100% {
        background-position: 0 50%;
      }
    }
    @media only screen and (max-width:360px){
      .container{
        display: flex;
        flex-direction: column;
      }
    }
    @media only screen and (max-width:768px){
      .category{
        display: none;
      }
    }
  </style>

  <body>
    <?php require('navbar.php') ?>
    <h1>Contact Us</h1>

    <div class="container">
      <aside class="enquiries">
        <div class="header-title">
          <h4>FOR ENQUIRIES</h4>
        </div>
        <div class="empty">
          <p>Should not be visible</p>
        </div>
        <div class="email">
          <h4>Email</h4>
          201906L@mymail.nyp.edu.sg
        </div>
        <div class="empty">
          <p>Should not be visible</p>
        </div>
        <div class="contact">
          <h4>Contact</h4>
          9876 5432
        </div>
        <div class="empty">
          <p>Should not be visible</p>
        </div>
        <div class="hours">
          <h4>Operating Hours</h4>
          9am to 6pm daily
        </div>
      </aside>
      <form action="mailto:201906L@mymail.nyp.edu.sg" method="get" enctype="text/plain">
        <label for="email">Email Address</label>
        <input type="text" id="email" name="emailAdd" placeholder="Email Address...">

        <label for="fname">Name</label>
        <input type="text" id="fname" name="firstname" placeholder="Name...">

        <label for="Subject">Subject</label>
        <input type="text" id="Subject" name="Subject" placeholder="Subject">

        <label for="message">Message</label>
        <textarea id="message" name="message" placeholder="Message..." style="height:200px"></textarea>

        <input type="submit" value="Send">
      </form>
    </div>
    <?php require('footer.php') ?>
  </body>

  </html>