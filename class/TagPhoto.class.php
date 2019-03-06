<?php

    class TagPhoto {

        protected $id;
        protected $id_tag;
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

        public protected getId(){
            return this.$id;
        }

        public void setId(protected $id){
            this.$id = $id;
        }

        public protected getId_tag(){
            return this.$id_tag;
        }

        public void setId_tag(protected $id_tag){
            this.$id_tag = $id_tag;
        }

        public protected getId_photo(){
            return this.$id_photo;
        }

        public void setId_photo(protected $id_photo){
            this.$id_photo = $id_photo;
        }

    }

?>