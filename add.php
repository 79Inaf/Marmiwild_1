<?php

require_once 'config.php';
require __DIR__ . '/src/models/recipe-model.php';
$errors = [];

if ($_SERVER["REQUEST_METHOD"] === 'POST') {
    $recipe = array_map('trim', $_POST);
    

    if(!isset($recipe['title']) || empty($recipe['title']))
        $errors[] = 'le titre est obligatoire';

    if(strlen($recipe['title']) > 100)
        $errors[] = 'le titre ne doit pas dépacer 100 caractères';

    if(!isset($recipe['description']) || empty($recipe['description']))
        $errors[] = 'le recette est obligatoire';     

    if (empty($errors)) {
        saveRecipe($recipe);
        header('Location: /');
        die();
    }
}

require __DIR__ . '/src/views/form.php';