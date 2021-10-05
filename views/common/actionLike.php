<?php
session_start();
    $pathToRootFolder = "../../";
    $PAGE_TITLE = "Article";

// secure session user
// check if user is connected
require_once($pathToRootFolder.'config/connect.php');
require_once($pathToRootFolder.'config/functions.php');
require($pathToRootFolder.'config/functions/function_file.php');
require($pathToRootFolder."views/common/checkSessionUser.php");


if(isset($_SESSION['userid']) and $userInfo['id'] == $_SESSION['userid']) {
    if(isset($_SESSION['sessionid']) and $_SESSION['sessionid'] == session_id()){
        //echo "</br>if isset session_id == à s_session['sessionid :: ".$_SESSION['sessionid']."</br>";
        
        $idsession = htmlspecialchars($_SESSION['sessionid']);
        $idusersession = htmlspecialchars($_SESSION['userid']);
        $iduserinfo = htmlspecialchars($userInfo['id']);
        $author = htmlspecialchars($userInfo['pseudo']);

        $idsession = strip_tags($idsession);
        $idusersession = strip_tags($idusersession);
        $iduserinfo = strip_tags($iduserinfo);
        $author = strip_tags($author);

        $errors = array();

        // echo "</br>idsession ".$idsession;
        // echo "</br>idusersession ".$idusersession;
        // echo "</br>author ".$author;
        // echo "</br>iduserinfo ".$iduserinfo;
        // die();


        if (isset($_GET['id']) AND !empty($_GET['id'])){
            extract($_GET);

            // secure data
            $id = htmlspecialchars($_GET['id']);
            $id = strip_tags($id);
        
            if (isset($_GET['t'], $_GET['id']) AND !empty($_GET['t']) AND !empty($_GET['id'])) {

                $getid = (int) htmlspecialchars($_GET['id']);
                $gett = (int) htmlspecialchars($_GET['t']);

                $sessionid = $iduserinfo;
                //echo "</br>Voici l'id du post choisi  => ".$idPostReportOk;
                echo('after htmlspecialchars getid');

                $check = $bdd->prepare('SELECT id FROM articles WHERE id = ?');
                $check->execute(array($getid));
                
                if($check->rowCount() == 1) {
                    if($gett == 1) {

                        // On récupère l'id du post_like
                        $check_like = $bdd->prepare('SELECT id FROM post_like WHERE article_id = ? AND user_id = ?');
                        $check_like->execute(array($getid, $sessionid));

                        // On Supprime l'id du dislike
                        $del = $bdd->prepare('DELETE FROM dislikes WHERE article_id = ? AND user_id = ?');
                        $del->execute(array($getid, $sessionid));

                        if($check_like->rowCount() == 1) {
                            // Si il y a deja une entree on delete
                            $del = $bdd->prepare('DELETE FROM post_like WHERE article_id = ? AND user_id = ?');
                            $del->execute(array($getid, $sessionid));
                        header('Location: http://localhost:8000/views/pages/article_read.php?id='.$getid);

                        
                        }else{
                            // Si il n'y a pas d'entree on insert
                        $ins = $bdd->prepare('INSERT INTO post_like (article_id, user_id) VALUES (?, ?)');
                        $ins->execute(array($getid, $sessionid));
                        header('Location: http://localhost:8000/views/pages/article_read.php?id='.$getid);

                        }

                    }elseif($gett == 2){
                    
                        $check_like = $bdd->prepare('SELECT id FROM dislikes WHERE article_id = ? AND user_id = ?');
                        $check_like->execute(array($getid, $sessionid));

                        // On Supprime l'id du dislike
                        $del = $bdd->prepare('DELETE FROM post_like WHERE article_id = ? AND user_id = ?');
                        $del->execute(array($getid, $sessionid));

                        if($check_like->rowCount() == 1) {
                            $del = $bdd->prepare('DELETE FROM dislikes WHERE article_id = ? AND user_id = ?');
                            $del->execute(array($getid, $sessionid));
                            header('Location: http://localhost:8000/views/pages/article_read.php?id='.$getid);
        
                            echo('check_like');  
                        
                        }else{
                            $ins = $bdd->prepare('INSERT INTO dislikes (article_id, user_id) VALUES (?, ?)');
                            $ins->execute(array($getid, $sessionid));
                        }

                    header('Location: http://localhost:8000/views/pages/article_read.php?id='.$getid);

                    }else{
                        exit('Error 1');

                    }
                }else{
                exit('Error fatale 2');
                }
            }
        }
    }
}


?>