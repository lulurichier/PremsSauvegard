<?php
            function getConnection() {
                try {
                    $connexion = new PDO("mysql:host=localhost;dbname=lafleur;charset=utf8", 'utilfleur', 'secret');
                }
                catch(PDOException $e)
                    {
                    die($e->getMessage());
                    }
                return $connexion ;
            }

        function getCategories() {
             $connexion = getConnection();
             $stm = $connexion->query("SELECT cat_code, cat_libelle FROM categorie");
             $categories=$stm->fetchAll();
             return $categories ;
            }

            function getProduits($cat) {
                $connexion = getConnection();
                $stm = $connexion->prepare("SELECT pdt_ref, pdt_designation, pdt_prix, pdt_image
                                            FROM produit where pdt_categorie = :cat");
                $stm->bindParam(':cat', $cat, PDO::PARAM_INT);
                $stm->execute();
                $produits=$stm->fetchAll();
                return $produits ;

            }

            function getTousProduits() {
                $connexion = getConnection();
                $stm = $connexion->query("SELECT pdt_ref, pdt_designation, pdt_prix, pdt_image FROM produit");
                $produits=$stm->fetchAll();
                return $produits ;

            }

            function insertClient($nom,$mail,$mdp)
            {  if (isset($_POST['Envoyer'])) {
                $connexion = getConnection();
        
                $nom = $_POST['nom'];
                $mdp = password_hash($_POST['mdp'], PASSWORD_DEFAULT);
                $mail = $_POST['mail'];
              
                $sql = 'INSERT INTO client (nomClient, mdpClient, mailClient) VALUES (:nom, :mdp, :mail)';
        
                try {
                    $stm = $connexion->prepare($sql);
                    $stm->bindParam(':nom', $nom, PDO::PARAM_STR);
                    $stm->bindParam(':mdp', $mdp, PDO::PARAM_STR);
                    $stm->bindParam(':mail', $mail, PDO::PARAM_STR);
                    $stm->execute();
        
                    echo "Inscription réussie.";
        
                } catch (PDOException $e) {
                    die("Erreur lors de l'insertion de l'utilisateur : " . $e->getMessage());
                }
            }
        }

        function verifConnection()
        {
            if (isset($_POST['Envoyer'])) 
            {
                $connexion = getConnection();

                $nom = $_POST['nom'];
                $mdp = $_POST['mdp'];

                $sql = 'SELECT * FROM Client WHERE nomClient = :pseudo';
                echo "demarrage test"; 

                try 
                {
                    $stm = $connexion->prepare($sql);
                    $stm->bindParam(':pseudo', $nom, PDO::PARAM_STR);
                    $stm->execute();
                    echo "execution requete";

        
                    $nom = $stm->fetch(PDO::FETCH_ASSOC);
                    var_dump ($nom);

                    if ($nom) 
                    {
          
                        $passwordHash = $nom['mdpClient'];

                        if (password_verify($mdp, $passwordHash))
                        {
                            session_start();
                            $_SESSION['nom'] = $nom;
                            header('Location: index.php');
                            echo'connexion reussi';
                            exit;
                        }
                        else 
                        {
                            echo "Nom d'utilisateur ou mot de passe incorrect.";
                        }
                    }
                    else 
                    {
                        echo "Nom d'utilisateur ou mot de passe incorrect.";
                    }
                } 
                catch (PDOException $e) 
                {
                    die("Erreur lors de la vérification de l'authentification : " . $e->getMessage());
                }
            }
        }
    
function updateClient()
{
if (isset($_POST['Modifier'])) 
{
    $connexion = getConnection();

    $pseudoActuel = $_SESSION['utilisateur']['nomClient'];
    echo $pseudoActuel;
    $pseudoModif = $_POST['nomModif'];
    echo $pseudoModif;
    
    $recupId = 'SELECT idClient FROM Client WHERE nomClient = :pseudoActuel';
    
    $update = 'UPDATE Client SET nomClient = :pseudoModif WHERE idClient = :recupId' ;

    try 
    {
        $stm = $connexion->prepare($update);
        $stm->bindParam(':pseudoModif', $pseudoModif, PDO::PARAM_STR);
        $stm->execute();
        $stmt = $connexion->prepare($recupId);
        $stmt->bindParam(':pseudoActuel', $pseudoActuel, PDO::PARAM_STR);
        $stmt->execute();

        echo "Modification reussi";
        echo $recupId;
        echo $update;
    }
    catch (PDOException $e) 
    {
        die("Erreur lors de la modification du pseudo : " . $e->getMessage());
    }
}
}
function updateMail()
{

}
function updatePassword()
{

}

?>
        
      