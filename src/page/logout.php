<?php getHead("Déconnexion"); ?>
    <?php session_destroy(); // on detruit la session ?>
    <div class="jumbotron">
        <h1 class="text-center">Merci de votre visite!</h1>
    </div>
    <?php header( "Location:/" ); // redirection à la page d'accueil ?>
<?php getFoot(); ?>