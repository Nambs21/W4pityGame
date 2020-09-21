<?php
// fonction qui inclu header.php avec un paramètre $titre qui vaut Accueil par défaut
function getHead($titre = "Accueil")
{
    include('header.php');
}

// fonction qui inclus footer.php
function getFoot()
{
    include('footer.php');
}

// fonction qui transforme $titre en une chaîne de caractère spécial (en slug)
// ex: 
// $titre = "Les caractères spéciaux"
// $slug = "les-caracteres-speciaux"
function slugify($titre) 
{
    // remplace les espaces par un tiret
    // remplace les apostrophes par un tiret
    // remplace les virgules par un tiret
    // enlève les caractères spéciaux é, è, ê, à, û, ù

    $slug = str_replace(" ", "-", strtolower($titre));
    $slug = str_replace("'", "-", $slug);
    $slug = str_replace(",", "-", $slug);
    $slug = str_replace("é", "e", $slug);
    $slug = str_replace("è", "e", $slug);
    $slug = str_replace("ê", "e", $slug);
    $slug = str_replace("à", "a", $slug);
    $slug = str_replace("û", "u", $slug);
    $slug = str_replace("ù", "u", $slug);

    return $slug; 
}
