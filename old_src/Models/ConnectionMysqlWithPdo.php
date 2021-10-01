<?php
$pathToRootFolder = "../../";

/**
 * An instance of this class will create a 
 * new connection to MySQL database through PDO.
 * 
 */
class ConnectionMysqlWithPdo {

    // VARIABLES D'INSTANCE =================
    private $dbHost;
    private $dbName;
    private $dbLogin;
    private $dbPassword;
    private $dbCharset="utf8";
    
    // CONSTRUCTOR(S) =======================
    public function __construct ($dbHost_given, $dbName_given, $dbLogin_given, $dbPassword_given, $dbCharset_given="utf8") {
        
        try {
            // ICI VÉRIFIER SI LES PARAMÈTRES PASSÉS SONT DES STRINGS
        } catch (Exception $receivedException) {
            echo <<<LABEL_SHOW_EXCEPTION
                <script>
                    console.log('Exception happened when creating a connection to database: {$receivedException}')\;
                </script>
            LABEL_SHOW_EXCEPTION;
        }


        $this->dbHost = $dbHost_given;

    }

    // GETTERS / SETTERS ====================

    // Getters --------------------
    public function getDbHost (){
        return $this->dbHost;
    }
    public function getDbName (){
        return $this->dbName;
    }
    public function getDbCharset (){
        return $this->dbCharset;
    }

    /* For security reason, no getters for $dbLogin and $dbPassword are created. */

    // Setters --------------------
    public function setDbHost ($dbHost_given){
        $this->dbHost = $dbHost_given;
    }
    public function setDbName ($dbName_given){
        $this->dbName = $dbName_given;
    }
    public function setDbLogin ($dbLogin_given){
        $this->dbLogin = $dbLogin_given;
    }
    public function setDbPassword ($dbPassword_given){
        $this->dbPassword = $dbPassword_given;
    }
    public function setDbCharset ($dbCharset_given){
        $this->dbCharset = $dbCharset_given;
    }

    // METHODS ==============================
    
    public function openConnection () {
        $bdd = new PDO('mysql:host=localhost;dbname=cours_denis;charset=utf8', $db_login, $db_password);
    }

    // public function closeConnection () {}
}

$db_connection = new ConnectionMysqlWithPdo("localhost", "cours_denis", $db_login, $db_password);

$db_connection.openConnection();

// .............. 
// .............. 
// .............. 
// .............. 

$db_connection.closeConnection();


/* 
PROCHAINES ÉTAPES : 
1. remplir la méthode openConnection() avec les mêmes instructions que dans `connect.php`

2. utiliser plutôt les identifiants et infos indiquées dans le fichier 
`./personal_variables/db_credentials.php`, pour que cette classe et ses méthode s'adapte à chaque développeur et ses propres infos phpmyadmin.  
*/