<?php getHead("Accueil"); ?>
<?php
// requête sql pour récuperer les articles dans la table articles
    $req = $bdd->query("SELECT * FROM articles");

    // si on a des résultats
    if($req->fetch()){
        // on les affiche un par un
        while($data = $req->fetch()){
            ?>
            <div class="card mb-3">
                <div class="row no-gutters">
                    <div class="col-md-4">
                        <img src="/uploads/<?php echo $data['image']; ?>.jpeg" class="img-fluid" alt="<?php echo $data['slug']; ?>">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">
                                <a href="<?php echo $data['slug']; ?>">
                                    <?php echo $data['titre']; ?>
                                </a>
                            </h5>
                            <p class="card-text"><?php echo substr($data['contenu'], 0, 450) ?> ...</p>
                            <div class="row">
                                <div class="col-md-8">
                                    <p class="card-text"><small class="text-muted">Rédigé par <?php echo $data['auteur']; ?></small></p>
                                </div>
                                <div class="col-md-4">
                                    <a href="<?php echo $data['slug']; ?>" class="btn btn-outline-primary"> Continuer </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php 
        }
    }else{
        // sinon on affiche "Pas d'article"
        echo "Pas d'article.";
    }
?>
<?php getFoot(); ?>