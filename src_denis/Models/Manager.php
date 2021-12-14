<?php

namespace src_denis\Models;

class Manager
{
    protected function dbConnect()
    {
        // //connection à la bdd
        try{
            // $pdo = new PDO('mysql:host=localhost;dbname=blog_dccg_test;charset=utf8', $db_login, $db_password, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
            $pdo = new \PDO('mysql:host=localhost;dbname=blog_dccg_test;charset=utf8', "root", "", array(\PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION));

            return $pdo;
        }
        catch(\Exception $e)
        {
            die('Erreur : '.$e->getMessage());
        }
    }
}