<?php session_start(); ?>
<!DOCTYPE html>
<php lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Recipes Page</title>
        <style>
            .category img {
                width: 30vw;     
                border-radius: 10%;
            }

            .recipe-gallery {
               display: grid;
               grid-template-columns: 1fr 1fr 1fr;
               padding-bottom: 4em;
               font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
               font-size: 20px;
               text-align: center;
               
            }
            .category img:hover {
                transform: scale(1.1);
            }
            ul a:hover{
                color: orange;
                
            }
            a:visited{
                color: black;
                
            }
            a{
                text-decoration: none;
                color: black;
            }
            h1 {
                text-align: center;
                font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
                font-size: 42px;
                padding: 1em;
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
        <!-- Gallery -->
        <section id="container">
            <h1>RECIPES</h1>
            <div class="recipe-gallery">
                <?php while ($one_cat = mysqli_fetch_assoc($category_list)) { ?>
                <div class="category">
                    <a href="recipe_list.php?recipeID=<?php echo $one_cat['id'] ?>"> <img src="<?php echo $one_cat['banner'] ?>" alt=""></a>
                    <ul class="cat"><a href="recipe_list.php?recipeID=<?php echo $one_cat['id']; ?>"><?php echo $one_cat['catname']; ?></a></ul>
                </div>    
                <?php } ?>
            </div>  
        </section>
        <?php require('footer.php') ?>
    </body>

    </html>