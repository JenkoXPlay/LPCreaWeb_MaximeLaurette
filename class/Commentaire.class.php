<?php

    class Commentaire {

        protected $id;
        protected $texte;
        protected $date_create;
        protected $id_user_create;
        protected $id_photo;

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

        public protected getId() {
            return this.$id;
        }

        public void setId(protected $id) {
            this.$id = $id;
        }

        public protected getTexte() {
            return this.$texte;
        }

        public void setTexte(protected $texte) {
            this.$texte = $texte;
        }

        public protected getDate_create() {
            return this.$date_create;
        }

        public void setDate_create(protected $date_create) {
            this.$date_create = $date_create;
        }

        public protected getId_user_create() {
            return this.$id_user_create;
        }

        public void setId_user_create(protected $id_user_create) {
            this.$id_user_create = $id_user_create;
        }

        public protected getId_photo() {
            return this.$id_photo;
        }

        public void setId_photo(protected $id_photo) {
            this.$id_photo = $id_photo;
        }        

    }

?>