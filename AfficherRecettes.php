<?php

// Déclaration du tableau des recettes
$recipes = [
[
'title' => 'Cassoulet',
'recipe' => 'Etape 1 : Des flageolets !',
'author' => 'mickael.andrieu@exemple.com',
'is_enabled' => true,
],
[
'title' => 'Couscous',
'recipe' => '',
'author' => 'mickael.andrieu@exemple.com',
'is_enabled' => false,
],
[
'title' => 'Escalope milanaise',
'recipe' => 'Etape 1 : Prenez une belle escalope',
'author' => 'mathieu.nebra@exemple.com',
'is_enabled' => true,
]
];
?>

<!DOCTYPE html>
<html>
<head>
<title>Affichage des recettes</title>
<style>
        /* Ajout de CSS pour améliorer l'affichage */
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
</head>
<body>
<h1>Affichage des recettes</h1>
<ul>
    <?php foreach ($recipes as $recipe): ?>
        <?php if ($recipe['is_enabled']): ?>
            <li>
                <h2><?php echo $recipe['title']; ?></h2>
                <p><?php echo $recipe['recipe']; ?></p>
                <p><?php echo $recipe['author']; ?></p>
            </li>
        <?php endif; ?>
    <?php endforeach; ?>
</ul>
</body>
</html>