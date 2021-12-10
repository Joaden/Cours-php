<?php


$pathToRootFolder = "../../";
require_once($pathToRootFolder.'config/functions.php');

require($pathToRootFolder.'config/connect.php');


class Article {


      //Create article for article_write.php
      public function createArticle($user_id, $categorie_id, $title, $content, $author, $image, $hastag)
      {
          $pathToRootFolder = "../../";
          require($pathToRootFolder.'config/connect.php');
          
          // preparation de al requete
          $req = $bdd->prepare('INSERT INTO articles (user_id, categories_id, title, content, author, date) VALUES (?, ?, ?, ?, ?, NOW())');
          $req->execute(array($user_id, $categorie_id, $title, $content, $author));
          $req1 = $bdd->prepare('SELECT id FROM articles ORDER BY id DESC LIMIT 0,1');
          $postId = $req1->execute();
          
          if($req1->rowCount() > 0)
          {
              $data = $req1->fetch(PDO::FETCH_OBJ);
          
              $article_id = $data->id;
              
              $req1 = $bdd->prepare('INSERT INTO images (article_id, name, user_id) VALUES (?, ?, ?)');
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

        $pathToRootFolder = "../../";
        require($pathToRootFolder.'config/connect.php');
        ///* prepare() = Création d'un objet PDOStatement */
        $req = $bdd->prepare('SELECT * FROM articles ORDER BY id DESC');
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
     * Retourne la liste des 5 derniers articles créés
     * 
     * @return array
     */
    // function qui récupère les 5 derniers articles
    public function getLastArticles(): array
    {
        $pathToRootFolder = "../../";
        require($pathToRootFolder.'config/connect.php');
        ///* prepare() = Création d'un objet PDOStatement */
        $req = $bdd->prepare('SELECT * FROM articles ORDER BY id DESC lIMIT 5');
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
        $req = $bdd->prepare('SELECT * FROM articles WHERE user_id = ? ORDER BY id DESC');
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
        $req = $bdd->prepare('SELECT * FROM articles WHERE id = ?');
        $req->execute(array($id));
        if($req->rowCount() == 1)
        {
            /////////////////////////////////////////////////// START ADD NBR VIEW ARTICLE
            $nbrView = +1;
            $insNbrView = $bdd->prepare('UPDATE articles SET nbr_view = nbr_view+1 WHERE id = ? ');
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
    public function createArticleMulti($articleId, $author, $userId)
    {
        $pathToRootFolder = "../../";
        require($pathToRootFolder.'config/connect.php');
        // preparation de la requete
        $req = $bdd->prepare('INSERT INTO images (article_id, name, user_id) VALUES (?, ?, ?)');
        $req->execute(array($postId, $name, $userId));

        $req->closeCursor(); 
    }






}

?>