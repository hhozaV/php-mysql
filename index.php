<!-- index.php -->

<?php session_start(); // $_SESSION ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Site de recettes - Page d'accueil</title>
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" 
            rel="stylesheet"
        >
    </head>
    <body class="d-flex flex-column min-vh-100">
        <div class="container">

        <?php include_once('header.php'); ?>
            <h1>Site de recettes</h1>

            <!-- inclusion des variables et fonctions -->
            <?php
                include_once('variables.php');
                include_once('functions.php');
                include_once('mysql.php');
            ?>

            <!--          Inclusion          du          formulaire          de          connexion          -->
            <?php include_once('login.php');?>

            <!-- inclusion de l'entête du site -->
            <?php include_once('header.php'); ?>

            <?php if(isset($_SESSION['LOGGED_USER'])): ?>
                <!-- On se connecte à MySQL -->
                <?php include_once('mysql.php'); ?>
                <!-- Si tout va bien, on peut continuer -->
                <?php
                    // On récupère tout le contenu de la table recipes
                    $sqlQuery = 'SELECT * FROM recipes';
                    $recipesStatement = $db->prepare($sqlQuery);
                    $recipesStatement->execute();
                    $recipes = $recipesStatement->fetchAll();
                ?>
                <!-- On affiche chaque recette une à une -->
                <?php foreach ($recipes as $recipe) : ?>
                    <p><?php echo $recipe['title']; ?> </p>
                    <p><?php echo $recipe['author']; ?> </p>
                <?php endforeach; ?>
                <?php endif; ?>
        </div>

        <!-- inclusion du bas de page du site -->
        <?php include_once('footer.php'); ?>
    </body>
</html>