<?php getHead("Blog"); ?>
        <?php 
            if(isset($_POST['titre']) AND isset($_POST['image']) AND isset($_POST['contenu'])){
                $titre = $_POST['titre'];
                $image = $_POST['image'];
                $contenu = $_POST['contenu'];
                $slug = slugify($_POST['titre']);
                $auteur = $_SESSION['pseudo'];
                $message = "L'article a été bien inseré";

                $insertion = $bdd->prepare('INSERT INTO articles (titre, slug, image, contenu, auteur, date_creation) VALUES (:titre, :slug, :image, :contenu, :auteur, NOW())');
                $insertion->execute([
                    'titre' => $titre,
                    'slug' => $slug,
                    'image' => $image,
                    'contenu' => $contenu,
                    'auteur' => $auteur,
                ]);
                ?>
                <p class="alert alert-success"><?php echo $message; ?></p>
                <?php
            }
        ?>
        <h1 class="">Rédaction</h1>
        <hr>
        <form action="" method="post" class="form-register">
            <div class="form-group">
                <label for="titre">Titre : </label>
                <input type="text" name="titre" id="titre" class="form-control">
            </div>
            <div class="form-group">
                <label for="image">Image (url): </label>
                <input type="text" name="image" id="image" class="form-control">
            </div>
            <div class="form-group">
                <label for="contenu">Contenu : </label>
                <textarea name="contenu" id="contenu" class="form-control"></textarea>
            </div>
            <input type="hidden" name="auteur" id="auteur">
            <input type="hidden" name="slug" id="slug">
            <input type="submit" value="Publier" class="btn btn-secondary">
        </form>
<?php getFoot(); ?>