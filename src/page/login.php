<?php getHead("Connexion"); ?>
    <?php 
        // si on a ces deux variable $_POST
        if(isset($_POST['pseudo']) AND isset($_POST['password'])){
            // on definie les deux variables $_POST
            $pseudo = $_POST['pseudo'];
            $password = $_POST['password'];
            // on défini un message d'erreur
            $error = "Identifiant ou mot de passe invalides";
            // requête pour savoir si un user a un même pseudo et un même mot de passe dans la bdd
            $query = $bdd->prepare('
                SELECT * FROM user 
                WHERE pseudo = :pseudo 
                AND password = :password
            ');
            // le mot de passe est crypté dans la bdd donc il faut crypté avec sha1 le mot de passe entré dans le formulaire
            $query->execute(['pseudo' => $pseudo, 'password' => sha1($password)]);
            $result = $query->fetch();

            // si le résultat est vide
            if(empty($result)){
                ?>
                <p class="alert alert-danger text-center"><?php echo $error; ?></p>
                <?php 
            }else{
                // sinon on cré la session
                $_SESSION['pseudo'] = $result['pseudo'];
                ?>
                <div class="jumbotron">
                    <h1 class="text-center">
                        Bonjour <strong><?php echo $_SESSION['pseudo']; ?></strong>
                    </h1>
                </div>
                <?php header( "refresh:3;URL=/blog" ); // redirection à l'url /blog apres 3 s ?>
                <?php 
            }
        }else{
            // sinon on affiche le formulaire
            ?>
                <h1 class="">S'identifier</h1>
                <hr>
                <form action="" method="post" class="form-register">
                    <div class="form-group">
                        <label for="pseudo">Pseudo : </label>
                        <input type="text" name="pseudo" id="pseudo" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="password">Mot de passe : </label>
                        <input type="password" name="password" id="password" class="form-control">
                    </div>
                    <input type="submit" value="Connexion" class="btn btn-secondary">
                </form>
            <?php 
        }
    ?>
<?php getFoot(); ?>