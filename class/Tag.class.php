<?php

    class Tag {

        protected $id;
        protected $nom;
        protected $color;

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

        public protected getId(){
            return this.$id;
        }

        public void setId(protected $id){
            this.$id = $id;
        }

        public protected getNom(){
            return this.$nom;
        }

        public void setNom(protected $nom){
            this.$nom = $nom;
        }

        public protected getColor(){
            return this.$color;
        }

        public void setColor(protected $color){
            this.$color = $color;
        }

    }

?>