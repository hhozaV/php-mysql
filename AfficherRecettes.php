<?php

// Fonction pour vérifier la validité d'une recette
function isValidRecipe(array $recipe) : bool {
    if (array_key_exists('is_enabled', $recipe)) {
    $isEnabled = $recipe['is_enabled'];
    } else {
    $isEnabled = false;
    }
    return $isEnabled;
    }

// Fonction pour récupérer les recettes valides
function getRecipes(array $recipes) : array {
$validRecipes = [];
foreach($recipes as $recipe) {
if (isValidRecipe($recipe)) {
$validRecipes[] = $recipe;
}
}
return $validRecipes;
}

// Fonction pour afficher le nom de l'auteur en fonction de l'e-mail
function displayAuthor(string $authorEmail, array $users) : string
{
for ($i = 0; $i < count($users); $i++) {
$author = $users[$i];
if ($authorEmail === $author['email']) {
return $author['full_name'] . '(' . $author['age'] . ' ans)';
}
}
}


$users = [
    [
        'full_name' => 'Mickaël Andrieu',
        'email' => 'mickael.andrieu@exemple.com',
        'age' => 34,
    ],
    [
        'full_name' => 'Mathieu Nebra',
        'email' => 'mathieu.nebra@exemple.com',
        'age' => 34,
    ],
    [
        'full_name' => 'Laurène Castor',
        'email' => 'laurene.castor@exemple.com',
        'age' => 28,
    ],
];

$recipes = [
    [
        'title' => 'Cassoulet',
        'recipe' => 'Etape 1 : Munissez vous de vos meilleurs flageolets !',
        'author' => 'mickael.andrieu@exemple.com',
        'is_enabled' => true,
    ],
    [
        'title' => 'Couscous',
        'recipe' => 'Etape 1 : Sortez votre meilleure semoule !',
        'author' => 'mickael.andrieu@exemple.com',
        'is_enabled' => false,
    ],
    [
        'title' => 'Escalope milanaise',
        'recipe' => 'Saisissez votre meilleure escalope !',
        'author' => 'mathieu.nebra@exemple.com',
        'is_enabled' => true,
    ],
    [
        'title' => 'Salade Romaine',
        'recipe' => 'Prenez de la bonne salade verte',
        'author' => 'laurene.castor@exemple.com',
        'is_enabled' => false,
    ],
];

$validRecipes = getRecipes($recipes);
?>

<!DOCTYPE html>
<html>
<head>
<title>Affichage des recettes</title>
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
</head>
<body>
<h1>Affichage des recettes</h1>
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
</body>
</html>