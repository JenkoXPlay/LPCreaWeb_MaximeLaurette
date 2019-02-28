<?php

    class Photo {

        protected $id;
        protected $titre;
        protected $image;
        protected $description;
        protected $date_create;
        protected $id_user_create;
        protected $credit;
        protected $lieu;

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

        public protected getImage() {
            return this.$image;
        }

        public void setImage(protected $image) {
            this.$image = $image;
        }

        public protected getDescription() {
            return this.$description;
        }

        public void setDescription(protected $description) {
            this.$description = $description;
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

        public protected getCredit() {
            return this.$credit;
        }

        public void setCredit(protected $credit) {
            this.$credit = $credit;
        }

        public protected getLieu() {
            return this.$lieu;
        }

        public void setLieu(protected $lieu) {
            this.$lieu = $lieu;
        }

    }

?>