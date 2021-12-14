<?php
    
require('src_denis/Models/Article.php');
require('src_denis/Models/Comments.php');
require('src_denis/Models/User.php');


function listPosts()
{
    $modelPosts = new Article(); // Création d'un objet

    $articles = $modelPosts->getArticles(); // Appel d'une fonction de cet objet

    require('views/pages/article_all.php');

}

function post()
{
    $modelPost = new Article();
    $modelComs = new Comments();

    $post = $modelPost->getArticle($_GET['id']);
    $comments = $modelComs->getCommentByArticle($_GET['id']);

    require('views/pages/article_read.php');
}


function getFiveLastArticles()
{
    $modelPost = new Article();

    $articles = $modelPost->getLastArticles();

    require('views/pages/home.php');

}

function postComment($postId, $author, $comment)
{
    $modelAddCom = new Comments();

    $affectedLines = $modelAddCom->addComment($postId, $author, $comment);

    if ($affectedLines === false) {
        throw new Exception('Impossible d\'ajouter le commentaire !');
    }
    else {
        header('Location: index.php?action=post&id=' . $postId);
    }
}






