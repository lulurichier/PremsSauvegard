
<?php
    require_once 'models/gestionBdd.php' ;
    $categories=getCategories();
    session_start();
    $utilisateurConnecte = isset($_SESSION['utilisateur']);
?>
    <body>
    <div class="conteneur">
    <header>
        <h1> La Fleur</h1>
        <h3>Fleurs d'ornements pour jardins</h3>
    </header>
    <nav class="menu">
        <ul>
            <li><a href="index.php">Accueil</a></li>
        </ul>
        <hr>
        <p> Nos produits</p>
        <ul>
        <?php

            foreach ($categories as $categories) 
            {
                $lib = $categories['cat_libelle'];
                $lien = "lesproduits.php?cat=". $categories['cat_code']. "&lib=".$lib;
            ?>
            <li>
                <a href="<?php echo $lien ; ?>">
                <?php echo $lib; ?></a>
            </li>
            <?php 
            }  ?>

        </ul>
        <hr>
        <ul>
        <?php
            if ($utilisateurConnecte) 
            {
                echo '<li>Bienvenue, ' . $_SESSION['utilisateur']['nomClient'] . '!</li>';
                echo '<li><a href="monCompte.php">Gerer mon compte</a></li>';
                echo '<li><a href="deconnexion.php">Déconnexion</a></li>';
            } 
            else 
            {
                echo '<li><a href="inscription.php">Inscription</a></li>';
                echo '<li><a href="connexion.php">Connexion</a></li>';
            }
            ?>
        </ul>
    </nav>
