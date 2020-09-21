<?php getHead("Profil"); ?>

<?php 
    if (isset($_POST['pseudo']) AND isset($_POST['email']) AND isset($_POST['pass1']) AND isset($_POST['pass2'])) {
  
        $email = $_POST['email'];
        $pseudo = $_POST['pseudo'];
        $pass1 = $_POST['pass1'];
        $pass2 = $_POST['pass2'];
        $error = [];
        $i = 0;

        if($pass1 != $pass2){
            $error['password'] = "Les mots de passes diffèrent";
            $i++;
        }

        if(strlen($pseudo) < 3){
            $error['pseudo'] = "Votre pseudo est trop court";
            $i++;
        }

        if(!empty($error)){
            ?>
            <div class="text-center">
                <h3><?php echo $i ?> erreur(s) lors de l'enregistrement</h3>
                <?php 
                foreach ($error as $key => $value) {
                    ?>
                    <p class="alert alert-danger"><?php echo $value; ?></p>
                    <?php 
                }
                ?>
            </div>
            <?php 
        }else{
            $req = $bdd->prepare('
                INSERT INTO user (pseudo, email, password, date) 
                VALUE (:pseudo, :email, :password, NOW())
            ');
            $req->execute([
                'pseudo' => $pseudo,
                'email' => $email,
                'password' => sha1($pass1)
            ]);
            echo 'Bonjour '. $pseudo. ', vous êtes maintenant connecté. ';
            $_SESSION['pseudo'] = $pseudo;
            $req->closeCursor();
        }
    } else {
        ?>
        <h1 class="">Formulaire d'inscription</h1>
        <hr>
        <form action="" method="post" class="form-register">
            <div class="form-group">
                <label for="pseudo">Pseudo : </label>
                <input type="text" name="pseudo" id="pseudo" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="pass1">Mot de passe : </label>
                <input type="password" name="pass1" id="pass1" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="pass2">Confirmer le mot de passe : </label>
                <input type="password" name="pass2" id="pass2" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="email">Adresse mail : </label>
                <input type="text" name="email" id="email" class="form-control" required>
            </div>
            <input type="submit" value="Valider" class="btn btn-secondary">
        </form>
        <?php
    }
?>

<?php getFoot(); ?>