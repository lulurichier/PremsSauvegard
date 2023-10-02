<?php
    include 'header.php' ;
    require_once 'menu.php' ;
    require_once 'models/gestionBdd.php';
    session_destroy();
    header('Location: index.php');
?>
    <main>
    <h2>DECONNEXION</h2>
    
    
<?php

include 'piedpage.php';
?>