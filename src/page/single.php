<?php getHead("Blog"); ?>
<?php
if(!empty($post)){
    ?>
    <h1><?php echo $post['titre']; ?></h1>
    <p>Publié le <?php echo $post['date_creation']; ?> par <strong><?php echo $post['auteur']; ?></strong></p>
    <img src="/uploads/<?php echo $post['image']; ?>.jpeg" alt="<?php echo $post['slug']; ?>" class="img-fluid">
    <div><?php echo $post['contenu']; ?></div>
    <?php
}

if(!empty($errormsg)){
    ?>
    <h1 class="text-center"><?php echo $errormsg; ?></h1>
    <?php
}
?>
<?php getFoot(); ?>