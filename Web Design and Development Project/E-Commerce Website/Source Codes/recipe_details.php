<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Details Page</title>
    <?php
    $filter = "";
    if (isset($_GET['id'])) {
        $selected_code2 = $_GET['id']; //get the recipe id that was passed over
        $filter = " WHERE id='$selected_code2' ";
    }
    $conn = mysqli_connect("localhost", "root", "", "L8_AlexanderAng_DB", "3307");
    $sql = "SELECT * FROM recipes " . $filter;
    $selectedRecipe = mysqli_query($conn, $sql);

    mysqli_close($conn);
    ?>
    <style>
        #container {
            display: flex;
            justify-content: center;
            width: 90%;
            margin: auto;
            padding-top: 1em;
            padding-bottom: 1em;
        }

        #details {
            padding: 0em 0em 0em 4em;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            font-size: 22px;
        }

        #details p {
            padding-bottom: 2em;
        }

        #img img {
            border-radius: 20%;
            width: 40vw;
        }

        p {
            font-size: 18px;
        }
        .recipe-details{
            width: 80%;
            margin: auto;
            padding-bottom: 3em;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            font-size: 18px;
            display: flex;   
            background-color: white;
            padding: 1.5em;
        }
        .method{
            
        }
        .ingredients{
            padding-right: 5em;
            width: 100%;
        }
        .overall-container{
            background-color: #ebebeb;
        }
        @media only screen and (max-width:360px){
            #container{
                display: flex;
                flex-direction: column;
            }
            #details{
                padding: 0em 0em 0em 0em;
                font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
                font-size: 16px;
                text-align: center;
            }
            #img img{
                height: 270px;
                width: 320px;
            }
            .recipe-details{
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
</head>

<body>
    <?php require("navbar.php") ?>
    <?php $recipe = mysqli_fetch_assoc($selectedRecipe); ?>
    <div class="overall-container">
        <section id="container">
            <div id="img">
                <img src="<?php echo $recipe['recipepic'] ?>" alt="img">
            </div>
            <div id="details">
                <h1><?php echo $recipe['recipename'] ?></h1>
                <p>Info: <?php echo $recipe['recipeinfo'] ?></p>
            </div>
        </section>
        <section class="recipe-details">
            <div class="ingredients">
                <p><?php echo $recipe['recipeingredients'] ?></p>
            </div>
            <div class="method">
                <p><?php echo $recipe['recipemethod'] ?></p>
            </div>
        </section>   
    </div>
     
    <?php require('footer.php') ?>
</body>

</html>