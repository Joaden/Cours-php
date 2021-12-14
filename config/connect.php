<?php
//namespace config;

$pathToRootFolder = "../../";

    /* Please create on the project folder : 
        folder "personal_variables"    containing
            db_credentials.php    containing
                $db_login = "..." 
                $db_password = "..."
    */
    require($pathToRootFolder."personal_variables/db_credentials.php");

    // //connection à la bdd
    try{
        $pdo = new \PDO('mysql:host=localhost;dbname=blog_dccg_test;charset=utf8', $db_login, $db_password, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        // $pdo = new PDO('mysql:host=localhost;dbname=blog_dccg_test;charset=utf8', "root", "", array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        // le array pdo attr erromode et execption afficherons plus clairement les erreurs

        //affiche le msg d'erreur
        //  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);

        return $pdo;
    }
    catch(\Exception $e)
    {
        die('Erreur : '.$e->getMessage());
    }


    if (!function_exists('DbConnect')) { 
        
        /**
         * retourne une connexion a la bdd
         * @return PDO
         */
        function DbConnect(): \PDO
        {

            try{
                // $pdo = new PDO('mysql:host=localhost;dbname=blog_dccg_test;charset=utf8', $db_login, $db_password, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
                $pdo = new \PDO('mysql:host=localhost;dbname=blog_dccg_test;charset=utf8', "root", "", array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
                // le array pdo attr erromode et execption afficherons plus clairement les erreurs

                //affiche le msg d'erreur
                //  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);

                return $pdo;
            }
            catch(\Exception $e)
            {
                die('Erreur : '.$e->getMessage());
            }
        }
        
    }
// }
// catch (Exception $e)
// {
// 2eme solution pour afficher le msg d'erreur 
//         die('Erreur : ' . $e->getMessage());
// }
// 
// PDO avantages :
// API limitée (moins de méthodes, demande moins d'instructions pour exécuter une requête et en exploiter le résultat)
// PDO::quote ajoute les quotes (= ton code est un peu plus lisible)
// API commune à plusieurs SGBD
// comme le SQL est réécrit, les marqueurs peuvent être nommés ou non (nativement, ils sont positionnels chez MySQL)
// plus d'options de fetch (GROUP, UNIQUE, KEY_PAIR, FUNCTION notamment)

// inconvénients :
// une injection SQL est plus dévastatrice du fait que par défaut

// les requêtes multistatement sont permises
// les requêtes préparées sont émulées

// quand tu crois mettre fin à la connexion ce n'est pas forcément le cas

// mysqli :

// avantages :
// ça colle à MySQL et à son API, c'est natif, pas d'émulation ou autre donc sans doute un poil plus rapide
// inconvénients :
// on dépend quand même de l'implémentation (libmysql vs mysqlnd ; mysqli_fetch_all n'est disponible qu'avec la seconde)
// vaste API (d'autres le verront peut être comme un avantage)
// le bind des paramètres est quand même assez "spécial" (en commençant par les s/i pour indiquer les types)

// Je voie de plus en plus de personne qui ont des codes mysqli sur le forum et je n'arrive pas a comprendre l’intérêt d'avoir un système d’accès a ses données qui ce limite a mysql

// Les hébergeurs proposent surtout MySQL et les gens s'arrêtent au MySQL qu'ils ont dans leur package *AMP ou ne connaissent rien d'autre ? Peut être voit-on plus de mysqli en ce moment parce que ce sont des gens qui ont "bêtement" (ajouter un i en gros) migré de mysql à mysqli pour PHP 7.
 