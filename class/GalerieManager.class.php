<?php

    class GalerieManager {

        private $bd;

        public function __construct($bd) {
            $this->setBd($bd);
        }

        public function setBd($bd) {
            $this->bd = $bd;
        }

        public function getBd() {
            return $this->bd;
        }

        // Création d'une galerie
        public function add(Galerie $galerie) {
            $req = $this->getBd()->prepare("INSERT INTO galerie (titre, description, date_creation, id_user_create)
                                            VALUES (:titre, :description, :date_creation, :id_user_create)");
            $req->bindValue(':titre', $galerie->getTitre());
            $req->bindValue(':description', $galerie->getDescription());
            $req->bindValue(':date_creation', $galerie->getDate_creation());
            $req->bindValue(':id_user_create', $galerie->getId_user_create());
            $req->execute();
            $user->hydrate([
                'id' => $this->getBd()->lastInsertId()
            ]);
        }

        // Suppression d'une galerie
        public function delete(Galerie $galerie) {
            $req = $this->getBd()->prepare("DELETE FROM galerie WHERE id = :id");
            $req->bindValue(':id', $galerie->getId());
            $req->execute();
        }

        // Suppression des galeries d'un user
        public function deleteGalerieUser(Galerie $galerie) {
            $req = $this->getBd()->prepare("DELETE FROM galerie WHERE id_user_create = :id_user_create");
            $req->bindValue(':id_user_create', $galerie->getId_user_create());
            $req->execute();
        }

        // Suppression de toutes les galeries
        public function deleteAllGalerie(Galerie $galerie) {
            $req = $this->getBd()->prepare("DELETE FROM galerie");
            $req->execute();
        }

        // Récupération des galeries
        public function getGalerie() {
            $req = $this->getBd()->prepare("SELECT * FROM galerie");
            $req->execute();
            $text = "";
            for($data = $req->fetch()){
                $text .= "<b>#".$data['id']."</b><br />";
                $text .= "<b>".$data['titre']."</b><br />";
                $text .= $data['description']."<br />";
                $text .= "<i>".$data['date_creation']." - ".$data['id_user_create']."</i><br />";
                return $text;
            }
        }

        // Récupération des galeries d'un user
        public function getLikeComm(Galerie $galerie) {
            $req = $this->getBd()->prepare("SELECT * FROM galerie WHERE id_user_create = :id_user_create");
            $req->execute();
            $text = "";
            for($data = $req->fetch()){
                $text .= "<b>#".$data['id']."</b><br />";
                $text .= "<b>".$data['titre']."</b><br />";
                $text .= $data['description']."<br />";
                $text .= "<i>".$data['date_creation']." - ".$data['id_user_create']."</i><br />";
                return $text;
            }
        }

        // Récupération d'une galerie par son id
        public function getGalerieId(Galerie $galerie) {
            $req = $this->getBd()->prepare("SELECT * FROM galerie WHERE id = :id");
            $req->execute();
            $text = "";
            for($data = $req->fetch()){
                $text .= "<b>#".$data['id']."</b><br />";
                $text .= "<b>".$data['titre']."</b><br />";
                $text .= $data['description']."<br />";
                $text .= "<i>".$data['date_creation']." - ".$data['id_user_create']."</i><br />";
                return $text;
            }
        }

    }

?>