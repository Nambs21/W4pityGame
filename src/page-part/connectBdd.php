<?php
// initiation session
session_start();

// connexion à la bdd
// à remplacer par le nom, l'utilisateur et le mot de passe de la base de données 
try {
    $bdd = new PDO('mysql:host=localhost;dbname=mydatabase', 'root', '');
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}
