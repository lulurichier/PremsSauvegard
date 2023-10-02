<?php
    include 'header.php' ;
    require_once 'menu.php' ;

?>
    <main class="page">
        <h2>Formulaire d'inscription</h2>
        <form action="#" method="post">

      <label for="nom">Nom :</label>
      <input type="text" id="nom" name="nom" required>
      
      <label for="mail">Email :</label>
      <input type="text" id="mail" name="mail" required>

      <label for="mdp">Mot de passe:</label>
      <input type="password" id="mdp" name="mdp" required>
      
      <input type="submit" value="Envoyer" name="Envoyer">
    </form>
        
    </main>
<?php
require_once 'models/gestionBdd.php';
if (isset($_POST['Envoyer']))
                {
                    echo "insertion en cours <br>";
                $nom=$_POST["nom"];
                $mail=$_POST["mail"];
                $mdp=$_POST["mdp"];
                insertClient($nom,$mail,$mdp);
            }

include 'piedpage.php' ;
?>