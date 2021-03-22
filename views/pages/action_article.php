<?php

if(isset($_POST['submit_article']))
    {
        if(isset($_POST['title'], $_POST['content'], $_POST['image'], $_POST['categorie'])) 
        {
            if(!empty($_POST['title']) AND !empty($_POST['content']) AND !empty($_POST['categorie'])) 
            {
                
                $title = htmlspecialchars($_POST['title']);
                $content = htmlspecialchars($_POST['content']);
                $categorie = htmlspecialchars($_POST['categorie']);

                $taillemax = 2097152;
                $extensionsValides = array('jpg', 'jpeg', 'png', 'gif');
                // loop for get all pictures
                foreach ($_FILES['image']['tmp_name'] as $key => $value) {
                    $filename = $_FILES['image']['name'][$key];
                    $filename_tmp = $_FILES['image']['name_tmp'][$key];
                    echo '<br>';
                    $ext = pathinfo($filename, PATHINFO_EXTENSION);

                    $finalimg = '';
                    if(in_array($ext, $extensionsValides))
                    {
                        if(!file_exists('images/'.$filename))
                        {
                            move_uploaded_file($filename_tmp, 'images/'.$filename);
                            $finalimg = $filename;

                        } else {
                            $filename = str_replace('.', '-', basename($filename, $ext));
                            $newfilename = $filename.time().".".$ext;
                            move_uploaded_file($filename_tmp, 'images/'.$filename);
                            $finalimg = $filename;

                            $ins = createArticleMulti($title, $content, $author, $image);

                        }
                    } else {
                        // Display errors
                    }
                }


                $message = 'Votre article a bien été posté';
                // $ins = $bdd->prepare('INSERT INTO articles (title, content, date)')

            } else {
                $message = 'Veuillez remplir tous les champs';
            }
        }
    }