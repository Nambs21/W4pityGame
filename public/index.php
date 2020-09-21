<?php 

// Requête pour avoir l'url
$path = $_SERVER['REQUEST_URI'];
// echo $path;

// Liason entre url et page
$map = [
    '/' => 'home.php',
    '/login' => 'login.php',
    '/logout' => 'logout.php',
    '/blog' => 'blog.php',
    '/membre' => 'membre.php'
];

// foreach($map as $cle => $value){
//     echo $cle.' => '.$value.' <br>';
// }


// __DIR__ : dossier parent
// inclure connexion bdd et les functions
include __DIR__ .'/../src/page-part/connectBdd.php';
include __DIR__ .'/../src/page-part/functions.php';

// si $path est définie dans $map
if(isset($map[$path])){
    // on inclu la page qui correspond à $map avec la clé $path
    include __DIR__ .'/../src/page/'.$map[$path];
}else{
    // sinon on fait une requête sql pour vérifier si le $path correspond à un slug dans la table articles
    // echo substr($path, 1);
    $q = $bdd->query('
        SELECT * FROM articles 
        WHERE slug = \''.substr($path, 1).'\'
    ');
    $post = $q->fetch();

    // si on a une réponse de la requête sql
    if(!empty($post)){
        // on envoie la réponse dans le fichier single.php
        $post;
    }else{
        // sinon on envoie un message d'erreur
        $errormsg = "La page que vous cherchez n'existe pas.";
    }

    // on inclu le fichier single.php
    include __DIR__ .'/../src/page/single.php';
}
