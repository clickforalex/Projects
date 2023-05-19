<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Details Page</title>

    <style>
        body {
            background-color: #3444;
        }

        .recipe-gallery {
            display: grid;
            grid-template-columns: 1fr 1fr 1fr;
            grid-row-gap: 10px;
            width:auto;
            text-align: center;
            width: 90%;
            margin: auto;
            height: 60vh;
            color: black;
            background: linear-gradient(-45deg, #A9A9A9, #C0C0C0, white, #C0C0C0);
            background-size: 300% 300%;
            position: relative;
            padding-top: 2em;
            padding-bottom: 6em;
            animation: myAnimation 10s ease-in-out infinite;
            clear: both;
            border: 5px inset;
        }

        p {
            font-size: 22px;
            color: black;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .recipe-gallery img {
            width: 20vw;
            border-radius: 10%;
        }

        .prod {
            padding: 1em;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .recipe a {
            text-decoration: none;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: black;
        }

        .recipe a:hover {
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
            .recipe-gallery{
               padding: 0.5em;
            }
        }
        @media only screen and (max-width:768px){
            .recipe-gallery{
                height: 40vh;
            }
        }
    </style>
</head>
<?php
$filter = "";
if (isset($_GET['recipeID'])) {
    $recipeID = $_GET['recipeID'];
    $filter = " Where category_id = '$recipeID'";
}
$conn = mysqli_connect("localhost", "root", "", "L8_AlexanderAng_DB", "3307");

$sql_recipe = "SELECT * FROM recipes" . $filter;
$recipe_list = mysqli_query($conn, $sql_recipe);

$sql_category = "SELECT * FROM recipecategory";
$category_list = mysqli_query($conn, $sql_category);

mysqli_close($conn);
?>

<body>
    <?php require("navbar.php") ?>
    <?php while ($recipe_name = mysqli_fetch_assoc($category_list)) { ?>
    <?php } ?>
    <section class="recipe-gallery">
        <?php while ($one_recipe = mysqli_fetch_assoc($recipe_list)) { ?>
            <div class="recipe">
                <a href="recipe_details.php?id=<?php echo $one_recipe['id']; ?>"></a>
                <a href="recipe_details.php?id=<?php echo $one_recipe['id']; ?>"><img src="<?php echo $one_recipe['recipepic'] ?>" alt=""></a>
                <ul><a href="recipe_details.php?id=<?php echo $one_recipe['id']; ?>"><?php echo $one_recipe['recipename']; ?></a></ul>
            </div>
        <?php } ?>
    </section>
    <?php require('footer.php') ?>
</body>

</html>