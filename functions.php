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
?>