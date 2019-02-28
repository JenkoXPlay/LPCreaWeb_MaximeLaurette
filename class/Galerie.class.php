<?php

    class Galerie {

        protected $id;
        protected $titre;
        protected $description;
        protected $date_creation;
        protected $id_user_create;

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

        public protected getTitre() {
            return this.$titre;
        }

        public void setTitre(protected $titre) {
            this.$titre = $titre;
        }

        public protected getDescription() {
            return this.$description;
        }

        public void setDescription(protected $description) {
            this.$description = $description;
        }

        public protected getDate_creation() {
            return this.$date_creation;
        }

        public void setDate_creation(protected $date_creation) {
            this.$date_creation = $date_creation;
        }

        public protected getId_user_create() {
            return this.$id_user_create;
        }

        public void setId_user_create(protected $id_user_create) {
            this.$id_user_create = $id_user_create;
        }

    }

?>