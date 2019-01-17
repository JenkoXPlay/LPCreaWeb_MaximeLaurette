<?php

    class User {

        protected $id;
        protected $email;
        protected $pseudo;
        protected $mdp;
        protected $administrator;
        protected $dateInscription;
        protected $actif;
        
        public function __construct(array $donnees) {
            $this->hydrate($donnees);
        }

        public function hydrate(array $donnees) {
            foreach($donnees as $key => $value) {
                $method = 'set'.ucfirst($key);
                if(method_exists($this, $method)){
                    $this->$method($value);
                }
            }
        }

        public function getId(){
            return $this->id;
        }

        public function setId($id){
            $this->id = (int) $id;
        }

        public function getEmail(){
            return $this->email;
        }

        public function setEmail($email){
            $this->email = $email;
        }

        public function getPseudo(){
            return $this->pseudo;
        }

        public function setPseudo($pseudo){
            $this->pseudo = $pseudo;
        }

        public function getMdp(){
            return $this->mdp;
        }

        public function setMdp($mdp){
            $this->mdp = $mdp;
        }

        public function getAdministrator(){
            return $this->administrator;
        }

        public function setAdministrator($administrator){
            $this->administrator = $administrator;
        }

        public function getDateInscription(){
            return $this->dateInscription;
        }

        public function setDateInscription($dateInscription){
            $this->dateInscription = $dateInscription;
        }

        public function getActif(){
            return $this->actif;
        }

        public function setActif($actif){
            $this->actif = $actif;
        }

    }

?>