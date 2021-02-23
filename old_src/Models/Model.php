<?php

abstract class Model
{
    private static $_bdd;

    // instancie la connexion a la bdd
    private static function setBdd()
    {
        //connection à la bdd
        $bdd = new PDO('mysql:host=localhost;dbname=cours_denis;charset=utf8', $db_login, $db_password);
        self::$_bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);

    } 
    // Récupère la connexion a la base
    protected function getBdd()
    {
        if(self::$_bdd == null)
            // $this->setBdd();
            self::setBdd();
            return self::$_bdd;
    }

    // Recup tous
    protected function getAll($table, $obj)
    {
        $var = [];
        $req = self::$_bdd->prepare('SELECT * FROM' .table. 'ORDER BY id DESC');
        while($data = $req->fetch(PDO::FETCH_ASSOC))
        {
            $var[] = new $obj($data);

        }
        return $var;
        $req->closeCursor();

    }
}