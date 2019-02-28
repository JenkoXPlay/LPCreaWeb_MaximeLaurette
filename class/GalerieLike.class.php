<?php

    class GalerieLike {

        protected $id;
        protected $id_galerie;
        protected $id_user;

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

        public protected getId_galerie() {
            return this.$id_galerie;
        }

        public void setId_galerie(protected $id_galerie) {
            this.$id_galerie = $id_galerie;
        }

        public protected getId_user() {
            return this.$id_user;
        }

        public void setId_user(protected $id_user) {
            this.$id_user = $id_user;
        }

    }

?>