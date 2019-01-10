<?php

    class User {

        protected $id;
        protected $email;
        protected $pseudo;
        protected $password;
        protected $admin;
        protected $date_inscription;
        protected $actif;
        
        public function __construct($id, $email, $pseudo, $password, $admin, $date_inscription, $actif) {
            $this->setId($id);
            $this->setEmail($email);
            $this->setPseudo($pseudo);
            $this->setPassword($password);
            $this->setAdmin($admin);
            $this->setDateInscription($date_inscription);
            $this->setActif($actif);
        }

        public function getId(){
            return $this->id;
        }

        public function setId($id){
            $this->id = $id;
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

        public function getPassword(){
            return $this->password;
        }

        public function setPassword($password){
            $this->password = $password;
        }

        public function getAdmin(){
            return $this->admin;
        }

        public function setAdmin($admin){
            $this->admin = $admin;
        }

        public function getDateInscription(){
            return $this->date_inscription;
        }

        public function setDateInscription($date_inscription){
            $this->date_inscription = $date_inscription;
        }

        public function getActif(){
            return $this->actif;
        }

        public function setActif($actif){
            $this->actif = $actif;
        }

    }

?>