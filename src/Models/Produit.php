<?php
/** Créer une class produit**/

/** Déclarer des attributs privés pour cette class
// >>> nom / descriptino / prix_ht / is_online **/

/** Créer les méthodes " commutateurs d'accès à ces attributs **/

// Créer plusieurs objets de type produit, dans un fichier dédié. Chaque produit créé aura , par défaut une valeur false pour l'attribut is_online.

// Stocker chaque produit créé dans un tableau php
// A laide d'une boucle, affiner sur votre page, un tableau HTML avec des colonnes identiques aux attributs de la classe produit et un produit par ligne.

// Créer une  méthode dans la classe produit vous permettant d'afficher un prix TTC.

// Dans votre tableau HTML, Afficher, les produits avec un fond vert les produits ayant un prix inférieur à 10€ TTC.

/************************* EXO ****************************/

class Produit{

    private $name;
    private $description;
    private $prix_ht;
    private $is_online;

    public static $facteur_tva = 1.2;
    /**variable de class défini à chaque objet cette variable **/

    public function __construct(bool $is_online = false){
        $this->is_online = $is_online;
    }

        /** Commutateur **/
    public function setName(string $name){
        $this->name = ucfirst($name); /** ucfirst($name) veut dire upper case ca met la 1ere lettre en majuscule **/
    }
    public function getName(){
        return $this->name;
    }

    public function setDescription(string $description){
        $this->description = $description;
    }

    public function getDescription(){
        return $this->description;
    }

    public function setPrixHt(float $prix_ht){
            $this->prix_ht = $prix_ht;
    }

    public function getPrixHt(){
        /** 44 devient 44.00 et 35.2 devient 35.20 **/
        return number_format($this->prix_ht, 2);
    }

    public function setIsOnline(bool $is_online){
         $this->$is_online = $is_online;

    }
    public function getIs_online(){
        return $this->Is_online;
    }

    public function prixTTC(){
        return $this->prix_ht * 1.2;
    }
}





?>
