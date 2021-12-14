<?php

// namespace next_src_wip_denis/Models;

use src_denis\Models\Manager;
use src_denis\Models\Comments;
use src_denis\Models\User;

$pathToRootFolder = "../../";

 require($pathToRootFolder.'config/connect.php');
// require_once($pathToRootFolder.'next_src_wip_denis/Models/Model.php');
require_once($pathToRootFolder.'src_denis/Models/Manager.php');
require_once($pathToRootFolder.'config/functions.php');


class Article extends Manager
{

    protected $table = "articles";
   // private $pdo;
    
    public function __construct()
    {
        $pdo = $this->dbConnect();
        
    }

      //Create article for article_write.php
      public function createArticle($user_id, $categorie_id, $title, $content, $author, $image, $hastag)
      {
        $pdo = $this->dbConnect1();
          // preparation de al requete
          $req = $pdo->prepare('INSERT INTO articles (user_id, categories_id, title, content, author, date) VALUES (?, ?, ?, ?, ?, NOW())');
          $req->execute(array($user_id, $categorie_id, $title, $content, $author));
          $req1 = $this->pdo->prepare('SELECT id FROM articles ORDER BY id DESC LIMIT 0,1');
          $postId = $req1->execute();
          
          if($req1->rowCount() > 0)
          {
              $data = $req1->fetch(PDO::FETCH_OBJ);
          
              $article_id = $data->id;
              
              $req1 = $this->pdo->prepare('INSERT INTO images (article_id, name, user_id) VALUES (?, ?, ?)');
              $req1->execute(array($article_id, $image, $user_id));
  
              $req1->closeCursor(); 
          }
      }
  


    /**
     * Retourne la liste des articles classés par date de création
     * 
     * @return array
     */
    public function getArticles(): array
    {
    
        $pdo = $this->dbConnect();

        $req = $pdo->prepare('SELECT * FROM articles ORDER BY id DESC');
        ///* execute() = Exécute la première requête */
        //
        $req->execute();
        /* fetch() = Récupération de la première ligne uniquement depuis le résultat et fetchAll recup tous*/
        $data = $req->fetchAll(PDO::FETCH_OBJ);
        return $data;
        /* L'appel suivant à closeCursor() peut être requis par quelques drivers */
        $req->closeCursor();
        
    }
    
    /**
     * Supprime un article par son id
     * 
     * @param integer $id
     * @return void
     */
    public function delete(int $id): void
    {
        
        $deleteArticle = $this->pdo->prepare('DELETE FROM articles WHERE id = :id');
        $deleteArticle->execute(['id' => $id]);
        $deleteArticle->closeCursor();
        
    }
    
    /**
     * Retourne la liste des 5 derniers articles créés
     * 
     */
    // function qui récupère les 5 derniers articles
    public function getLastArticles()
    {
        $pathToRootFolder = "../../";

        require($pathToRootFolder.'config/connect.php');
        ///* prepare() = Création d'un objet PDOStatement */
        $req = $pdo->prepare('SELECT * FROM articles ORDER BY id DESC lIMIT 5');
        ///* execute() = Exécute la première requête */
        //
        $req->execute();
        /* fetch() = Récupération de la première ligne uniquement depuis le résultat et fetchAll recup tous*/
        $data = $req->fetchAll(PDO::FETCH_OBJ);
        return $data;
        /* L'appel suivant à closeCursor() peut être requis par quelques drivers */
        $req->closeCursor();
        
    }

        
    // Get my articles
    public function getMyArticles($id)
    {
        $pathToRootFolder = "../../";

        require($pathToRootFolder.'config/connect.php');

        $req = $pdo->prepare('SELECT * FROM articles WHERE user_id = ? ORDER BY id DESC');
        $req->execute(array($id));
        if($req->rowCount() >= 1)
        {
            $data = $req->fetchAll(PDO::FETCH_OBJ);
            return $data;
            $req->closeCursor();
        }
        else{
            echo "Vous n'avez pas rédigé d'articles";
            //header('Location: home.php');
        $req->closeCursor();
        }
    
        
    }

        
    // Fonction qui récupère un article
    public function getArticle($id)
    {
        $pathToRootFolder = "../../";

        require($pathToRootFolder.'config/connect.php');

        $req = $pdo->prepare('SELECT * FROM articles WHERE id = ?');
        $req->execute(array($id));
        if($req->rowCount() == 1)
        {
            /////////////////////////////////////////////////// START ADD NBR VIEW ARTICLE
            $nbrView = +1;
            $insNbrView = $pdo->prepare('UPDATE articles SET nbr_view = nbr_view+1 WHERE id = ? ');
            $insNbrView->execute(array($id));
            $insNbrView->closeCursor();
            if($insNbrView != TRUE) {
                var_dump($insNbrView);
                die();
            }
            /////////////////////////////////////////////////// END ADD NBR VIEW ARTICLE

            ///// get data de $req
            $data = $req->fetch(PDO::FETCH_OBJ);
            return $data;
            // $req->closeCursor();
        }
        else{
            header('Location: index.php');
            $req->closeCursor();
        }
    }



    ////////////////////////////// create article with multi img
    public function createArticleMulti($postId, $author, $userId)
    {
        $pathToRootFolder = "../../";

        require($pathToRootFolder.'config/connect.php');
        // preparation de la requete
        $req = $this->pdo->prepare('INSERT INTO images (article_id, name, user_id) VALUES (?, ?, ?)');
        $req->execute(array($postId, $author, $userId));

        $req->closeCursor(); 
    }

    public function dbConnect1()
    {
        // //connection à la bdd
        try{
            // $pdo = new PDO('mysql:host=localhost;dbname=blog_dccg_test;charset=utf8', $db_login, $db_password, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
            $pdo = new PDO('mysql:host=localhost;dbname=blog_dccg_test;charset=utf8', "root", "", array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

            return $pdo;
        }
        catch(Exception $e)
        {
            die('Erreur : '.$e->getMessage());
        }
    }




}

?>