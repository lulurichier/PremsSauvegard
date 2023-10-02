<?php
    include 'header.php' ;
    require_once 'menu.php' ;

?>
    <main class="page">
        <h2>Connexion</h2>
        <form action="#" method="post">

      <label for="nom">Nom :</label>
      <input type="text" id="nom" name="nom" required>
      
      <label for="mdp">Mot de passe:</label>
      <input type="password" id="mdp" name="mdp" required>
      
      <input type="submit" value="Envoyer" name="Envoyer">
    </form>
        
    </main>
    <?php
    if(isset($_POST['Envoyer'])) {
        verifConnection();
        
    }

    include "piedpage.php";  


    

    

