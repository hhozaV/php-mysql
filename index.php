<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Mon site de recettes</title>
    </head>
 
    <body>
 
    <!-- L'en-tête -->
    
    <header>
        <!-- Le menu -->
        <?php include_once('header.php'); ?>
        <style>
    body {
        font-family: Verdana, sans-serif;
    }

    ul {
        list-style-type: none;
        padding: 0;
    }

    li {
        margin: 10px 0;
        padding: 10px;
    }

    li.disabled {
        opacity: 0.5;
    }
</style>
       
    </header>
    
    <!-- Le corps -->
    
    <div id="corps">
        <h1>Mon site de recettes</h1>

        <!-- Inclusion des variables et fonctions -->
        <?php include_once('functions.php'); ?>
        <?php include_once('variables.php'); ?>

        <!-- Inclusion de l'entête du site -->
        <?php include_once('header.php'); ?>
                
            <p>
                Bienvenue sur mon site de recettes !
            </p>

            <ul>
                <?php foreach ($validRecipes as $recipe): ?>
                    <?php $authorName = displayAuthor($recipe['author'], $users); ?>
                    <?php if ($authorName !== null): ?>
                        <li>
                            <h2><?php echo $recipe['title']; ?></h2>
                            <p><?php echo $recipe['recipe']; ?></p>
                            <p><?php echo $authorName; ?></p>
                        </li>
                    <?php else: ?>
                        <li>
                            <h2><?php echo $recipe['title']; ?></h2>
                            <p><?php echo $recipe['recipe']; ?></p>
                            <p><?php echo 'Auteur Inconnu'; ?></p>
                        </li>
                    
                    <?php endif; ?>
                <?php endforeach; ?>
            </ul>
        </div>
    
    <!-- Le pied de page -->
    <?php include_once('footer.php'); ?>

    
    </body>
</html>