<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/asset/css/bootstrap/bootstrap.css">
    <link rel="stylesheet" href="/asset/css/style.css">
    <title><?php echo $titre; ?></title>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <?php if(isset($_SESSION['pseudo'])){ ?>
                    <li class="nav-item">
                        <a class="nav-link" href="/blog">Rédaction</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/logout">Se deconnecter</a>
                    </li>
                    <?php }else{ ?>
                    <li class="nav-item">
                        <a class="nav-link" href="/membre">Devenir membre</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/login">Se connecter</a>
                    </li>
                    <?php } ?>
                </ul>
                <div class="text-left">
                    <?php 
                        if(isset($_SESSION['pseudo'])){
                            echo 'Salut '.$_SESSION['pseudo'];
                        }
                    ?>
                </div>
            </div>
        </div>
    </nav>
    <div class="container main">