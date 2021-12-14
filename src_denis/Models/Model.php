<?php

$pathToRootFolder = "../../";
// require_once($pathToRootFolder.'config/functions.php');

require($pathToRootFolder.'config/connect.php');

abstract class Model
{
    // private static $_bdd;

    protected $pdo;

    protected $table;
    



   // instancie la connexion a la bdd
    private static function setBdd()
    {
        //connection à la bdd
        $pdo = new PDO('mysql:host=localhost;dbname=cours_denis;charset=utf8', $db_login, $db_password);
        self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);

    } 

    //Récupère la connexion a la base
    protected function getBdd()
    {
        if(self::$pdo == null)
            // $this->setBdd();
            self::setBdd();
            return self::$pdo;
    }

    //Recup tous
    protected function getAll($table, $obj)
    {
        $var = [];
        $req = self::$pdo->prepare('SELECT * FROM' .table. 'ORDER BY id DESC');
        while($data = $req->fetch(PDO::FETCH_ASSOC))
        {
            $var[] = new $obj($data);

        }
        return $var;
        $req->closeCursor();

    }
}