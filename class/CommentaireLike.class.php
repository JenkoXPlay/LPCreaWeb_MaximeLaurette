<?php

    class CommentaireLike {

        protected $id;
        protected $id_commentaire;
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

        public protected getId_commentaire() {
            return this.$id_commentaire;
        }

        public void setId_commentaire(protected $id_commentaire) {
            this.$id_commentaire = $id_commentaire;
        }

        public protected getId_user() {
            return this.$id_user;
        }

        public void setId_user(protected $id_user) {
            this.$id_user = $id_user;
        }

    }

?>