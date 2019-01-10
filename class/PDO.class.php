<?php

    class PDO {

        public function __construct() {
            $bdd = new PDO('mysql:host=localhost;dbname=galerie_photo;charset=utf8', 'root', '');
        }

    } 

?>