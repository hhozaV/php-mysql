<?php
session_start();

include_once('mysql.php');
include_once('login.php');
include_once('variables.php');

if (!isset($_POST['title']) || !isset($_POST['recipe'])) {
    echo 'Il faut un titre et une recette pour soumettre le formulaire.';
    return;
}

$title = $_POST['title'];
$recipe = $_POST['recipe'];

// Insérer la recette dans la base de données
$insertRecipe = $db->prepare('INSERT INTO recipes(title, recipe, author, is_enabled) VALUES(:title, :recipe, :author, :is_enabled)');
$insertRecipe->execute([
    'title' => $title,
    'recipe' => $recipe,
    'author' => $_SESSION['LOGGED_USER'],
    'is_enabled' => 1,
]);

if ($insertRecipe) {
    header('Location: index.php');
    exit;
} else {
    echo 'Erreur lors de la création de la recette';
}
?>

    