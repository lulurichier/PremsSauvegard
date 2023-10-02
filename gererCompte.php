<?php
    include 'header.php' ;
    require_once 'menu.php' ;
    require_once 'models/gestionBdd.php';
    
    

?>
    <main>
        <h2>MON COMPTE : <?php echo  $_SESSION['utilisateur']['nomUtil']?></h2>
        
        <form method="post">
        <div class ="champ">
            <label for="nomModif">Modifier votre nom d'utilisateur </label>
            <input type="text" id="nomModif" name="nomModif">
        </div>
        <div class="champ">
            <label for="mailModif">Modifier votre mail</label>
            <input type="text" id="mailModif" name="mailModif">
        </div>
        <div class="champ">
            <label for="mdpModif">Modifier votre mot de passe</label>
            <input type="password" id="mdpModif" name="mdpModif">
        </div>
        <div class="champ">
            <input type="submit" name="Modifier" value="Modifier">
        </div>
    </form>
</main>
    </main>

<?php 
include 'piedpage.php';
updatePseudo();
?>