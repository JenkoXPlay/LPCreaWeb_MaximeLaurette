<?php

    class PhotoGalerie {

        protected $id;
        protected $id_photo;
        protected $id_galerie;

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

        public protected getId_photo() {
            return this.$id_photo;
        }

        public void setId_photo(protected $id_photo) {
            this.$id_photo = $id_photo;
        }

        public protected getId_galerie() {
            return this.$id_galerie;
        }

        public void setId_galerie(protected $id_galerie) {
            this.$id_galerie = $id_galerie;
        }

    }

?>