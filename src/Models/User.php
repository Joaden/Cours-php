<?php
/**
 * Created by PhpStorm.
 * User: cisco
 * Date: 26/12/2018
 * Time: 12:32
 */
/** Creation de class **/
class User {

   public $prenom;
   public $nom;
   private $age;

   public function _construct(string $prenom) {
       $this->prenom = $prenom;
   }

   public function setAge(int $age){

       if($age < 18){
           // déclancher une exception
           throw new Exception("L'utilisateur doit être majeur");
           //return false;
       } else {
           $this->age = $age;
       }

       }
   public function getAge(){
        return $this->age;
   }
}