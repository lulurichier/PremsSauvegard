<?php
    include 'header.php' ;
    require_once 'menu.php' ;
?>
    <main>
        <h2>CONFIRMATION DE CONNEXION</h2>
    </main>
<?php 
    session_start(); 
    if (isset($_SESSION['nom'])) 
    {
        $nomUtilisateur = $_SESSION['nom'];
        echo "Bienvenue, $nomUtilisateur!";
    } 
    else 
    {
        echo 'Erreur de connexion veuillez réessayer';
    }
?>
<?php
include 'piedpage.php';
?>

