<?php

$pathToRootFolder = "../../";
require_once($pathToRootFolder.'config/functions.php');

require($pathToRootFolder.'config/connect.php');


/**
 * Created by PhpStorm.
 * User: cisco
 * Date: 26/12/2018
 * Time: 12:32
 */
/** Creation de class **/
class User {

//    public $prenom;
//    public $nom;
//    private $age;

//    public function _construct(string $prenom) {
//        $this->prenom = $prenom;
//    }

//    public function setAge(int $age){

//        if($age < 18){
//            // déclancher une exception
//            throw new Exception("L'utilisateur doit être majeur");
//            //return false;
//        } else {
//            $this->age = $age;
//        }

//        }
//    public function getAge(){
//         return $this->age;
//    }

  
    ////////////////////////////// Create User & userinfo for page session_register.php //  done by chrisptophe
    public function createUser()
    {
        $pathToRootFolder = "../../";
        require($pathToRootFolder.'config/connect.php');
        if(!empty($_POST['name']) AND !empty($_POST['email'])AND !empty($_POST['email2']) AND !empty($_POST['pseudo']) AND !empty($_POST['mdp']) AND !empty($_POST['mdp2']) AND empty($_POST['antibot']) AND !empty($_POST['captcha']))
        {
                $name = htmlspecialchars($_POST['name']);
                $email = htmlspecialchars($_POST['email']);
                $email2 = htmlspecialchars($_POST['email2']);
                $pseudo = htmlspecialchars($_POST['pseudo']);
                $password = htmlspecialchars($_POST['mdp']);
                $password2 = htmlspecialchars($_POST['mdp2']);
                $phrase = htmlspecialchars($_POST['phrase']);
                // $avatar = htmlspecialchars($_POST['avatar']);
                $captcha = htmlspecialchars($_POST['captcha']);
                
                // sha1, md5, sha256 et sha512 ne sont plus sûres aujourdhui donc à ne plus utiliser !!!!
                // j'utilise password_hash() MAIS, faudra faire une petite recherche pour être sûr que ce soit sécurisé
                // $br = '<br>';
                        // echo $name . $br;
                        // echo $email . $br;
                        // echo $pseudo . $br;
                        // echo $hashedmdp . $br;
                        // echo " Send form register ok <br>";
                        // echo $hashedmdp2 . $br;
                if($_POST['captcha']=="20")
                {
                    $pseudolength = strlen($pseudo);
                    if($pseudolength <= 30)
                    {
                        $reqpseudo = $pdo->prepare("SELECT * FROM users WHERE pseudo = ?");
                        $reqpseudo->execute(array($pseudo));
                        $pseudoexist = $reqpseudo->rowCount();
                        if($pseudoexist == 0)
                        {
                            if($email == $email2)
                            {
                                // function avec filtre qui permet de vérifier si c'est bien une adresse mail
                                if(filter_var($email, FILTER_VALIDATE_EMAIL))
                                {
                                    $reqmail = $pdo->prepare("SELECT * FROM users WHERE email = ?");
                                    $reqmail->execute(array($email));
                                    $mailexist = $reqmail->rowCount();
                                    // Si il n'y a pas cet email en base
                                    if($mailexist == 0)
                                    {
                                        if($password == $password2)
                                        {
                                            // hash de mdp , a voir si il y a plus sûr comme function
                                            $hashedmdp = password_hash($password, PASSWORD_DEFAULT);

                                            // Creation de user
                                            $insertUser = $pdo->prepare("INSERT INTO users(name, email, pseudo, password, phrase) VALUE(?, ?, ?, ?, ?)");
                                            $insertUser->execute(array($name, $email, $pseudo, $hashedmdp, $phrase));
                                            $insertUser->closeCursor();

                                            // get id of last register
                                            $selectIdLastUser = $pdo->prepare("SELECT id FROM users ORDER BY ID DESC LIMIT 1");
                                            $selectIdLastUser->execute();
                                            /* fetch() = Récupération de la première ligne uniquement depuis le résultat et fetchAll recup tous*/
                                            $users_id = $selectIdLastUser->fetch();
                                            var_dump($users_id);
                                            die();
                                            $selectIdLastUser->closeCursor();
                                            
                                            // Creation de user_info 
                                            $insertUserInfos = $pdo->prepare("INSERT INTO users_infos(users_id, date_inscription) VALUE(?, NOW())");
                                            $insertUserInfos->execute(array($users_id));
                                            $insertUserInfos->closeCursor();
                                            // get id of last register
                                            $selectIdLastUserInfo = $pdo->prepare("SELECT id FROM users_infos ORDER BY ID DESC LIMIT 1");
                                            $selectIdLastUserInfo->execute();
                                            $usersInfos_id = $selectIdLastUserInfo->fetch();
                                            $selectIdLastUserInfo->closeCursor();
                                            // Update de user
                                            $updatetUser = $pdo->prepare("UPDATE users SET users_infos_id = :userInfo WHERE id = :iduser ");
                                            $updatetUser->execute(array(
                                                'userInfo' => $usersInfos_id,
                                                'iduser' => $users_id
                                            ));
                                            $updatetUser->closeCursor();
                                            // $insNbrView = $pdo->prepare('UPDATE articles SET nbr_view = nbr_view+1 WHERE id = ? ');
                                            // $insNbrView->execute(array($id));
                                            // $insNbrView->closeCursor();

                                            //vérification & upload image 
                                            $updateAvatar = updateAvatar();
                                            
                                            $erreur = "Votre compte à bien été créé ! <a href=\"session_login.php\">Me Connecter</a>";
                                            $_SESSION['comptecree'] = "Votre compte à bien été créé !";
                                            header('Location: session_login.php');
                                            
                                        }
                                        else
                                        {
                                            $erreur = "Vos mots de passes ne correspondent pas.";
                                        }
                                    }
                                    else
                                    {
                                        $erreur = "Votre adresse mail est déjà utilisé.";
                                    }
                                }
                                else
                                {
                                    $erreur = "Votre adresses mail n'est pas valide.";
                                }
                            }
                            else
                            {
                                // erreur email
                                $erreur = "Vos adresses mails ne correspondent pas.";
                            }
                        }
                        else
                        {
                            // erreur pseudo deja pris
                            $erreur = "Votre pseudo est déjà utlisé.";
                        }
                    }
                    else{
                        // erreur pseudo trop long
                        $erreur = "Votre pseudo ne doit pas dépasser 30 caractères.";
                    }
                }
            else
            {
                // erreur captcha
                $erreur = "Veuillez renseigner la bonne réponse";
            }
        }else{
        // $erreurs champs incomplet
        $erreur = "Tous les champs doivent être complétés";
        }
        $req->closeCursor(); 

    }


    public function getUsers()
    {
        $pathToRootFolder = "../../";
        require($pathToRootFolder.'config/connect.php');
    
        // Sécurité authentification obligatoire à décommenter pour obliger la connexion d'un admin
        // if(!isset($_SESSION['id']) OR $_SESSION['id'] != 1) {
        //     echo "<div class=\"container\"><div class=\"jumbotron\"><h1>Vous devez vous authentifier .</h1></div></div>";
        //     exit();
        // }
        // Si il y Get type and qu'il est égale à user
            if(isset($_GET['type']) AND $_GET['type'] == 'user') {
                //
                if(isset($_GET['confirme']) AND !empty($_GET['confirme'])) {
                    $confirme = (int) $_GET['confirme'];
    
                    $req = $pdo->prepare('UPDATE users SET is_verified = 1 WHERE id = ?');
                    $req->execute(array($confirme));
                }
                if(isset($_GET['supprime']) AND !empty($_GET['supprime'])) {
                    $supprime = (int) $_GET['supprime'];
                    // Get Detail User before delete
                    // $reqUser = $bdd->prepare('SELECT id FROM users WHERE id = ?');
                    // $reqUser->execute(array($reqUser));
    
                    // // Update to UNSUBSCRIBE
                    // $comment = "Désinscrit par l'administrateur";
                    // $req = $bdd->prepare('INSERT INTO unsubscribe (user_id, date, comment) VALUE (?, NOW(), ?,) WHERE id = ?');
                    // $req->execute(array($user_id, $comment));
    
                    // DELETE USERS
                    $req = $pdo->prepare('DELETE FROM users WHERE id = ?');
                    $req->execute(array($supprime));
                }
            } elseif(isset($_GET['type']) AND $_GET['type'] == 'commentaire') {
                if(isset($_GET['approved']) AND !empty($_GET['approved'])) {
                    $approved = (int) $_GET['approved'];
    
                    $req = $pdo->prepare('UPDATE users SET approved = 1 WHERE id = ?');
                    $req->execute(array($approved));
                }
                if(isset($_GET['supprime']) AND !empty($_GET['supprime'])) {
                    $supprime = (int) $_GET['supprime'];
    
                    $req = $pdo->prepare('DELETE FROM comments WHERE id = ?');
                    $req->execute(array($supprime));
                } 
            }
    
                
    
        $req = $pdo->prepare('SELECT * FROM users ORDER BY id DESC');
        // $req = $bdd->prepare('SELECT * FROM users WHERE is_verified = 0 ORDER BY id DESC');
    
        
        ///* execute() = Exécute la première requête */
        $req->execute();
        /* fetch() = Récupération de la première ligne uniquement depuis le résultat et fetchAll recup tous*/
        $data = $req->fetchAll(PDO::FETCH_OBJ);
        return $data;
        /* L'appel suivant à closeCursor() peut être requis par quelques drivers */
        $req->closeCursor();
    }
    

    // function qui récupère tout les users connectés
    public function getUsersConnected()
    {
        $pathToRootFolder = "../../";
        require($pathToRootFolder.'config/connect.php');
        ///* prepare() = Création d'un objet PDOStatement */
        $reqGetUserConnected = $pdo->prepare('SELECT user_id FROM sessions');
        ///* execute() = Exécute la première requête */
        $reqGetUserConnected->execute();
        /* fetch() = Récupération de la première ligne uniquement depuis le résultat et fetchAll recup tous*/
        $data = $reqGetUserConnected->fetchAll(PDO::FETCH_OBJ);
        return $data;
        /* L'appel suivant à closeCursor() peut être requis par quelques drivers */
        $reqGetUserConnected->closeCursor();
        
    }







}