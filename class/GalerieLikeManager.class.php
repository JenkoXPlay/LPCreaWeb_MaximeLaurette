<?php

    class GalerieLikeManager {

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

        // Création d'un like d'une galerie
        public function add(GalerieLike $galerie_like) {
            $req = $this->getBd()->prepare("INSERT INTO galerie_like (id_galerie, id_user)
                                            VALUES (:id_galerie, :id_user)");
            $req->bindValue(':id_galerie', $galerie_like->getId_galerie());
            $req->bindValue(':id_user', $galerie_like->getId_user());
            $req->execute();
            $user->hydrate([
                'id' => $this->getBd()->lastInsertId()
            ]);
        }

        // Suppression d'un like d'une galerie
        public function delete(GalerieLike $galerie_like) {
            $req = $this->getBd()->prepare("DELETE FROM galerie_like WHERE id = :id");
            $req->bindValue(':id', $galerie_like->getId());
            $req->execute();
        }

        // Suppression des likes d'un user
        public function deleteGalerieLikeUser(GalerieLike $galerie_like) {
            $req = $this->getBd()->prepare("DELETE FROM galerie_like WHERE id_user = :id_user");
            $req->bindValue(':id_user', $galerie_like->getId_user());
            $req->execute();
        }

        // Suppression des likes d'une galerie
        public function deleteAllGalerieLike(GalerieLike $galerie_like) {
            $req = $this->getBd()->prepare("DELETE FROM galerie_like WHERE id_galerie = :id_galerie");
            $req->bindValue(':id_galerie', $galerie_like->getId_galerie());
            $req->execute();
        }

        // Suppression des likes des galeries
        public function deleteAllGalerieLike(GalerieLike $galerie_like) {
            $req = $this->getBd()->prepare("DELETE FROM galerie_like");
            $req->execute();
        }

        // Récupération des likes des galeries
        public function getAllGalerieLike() {
            $req = $this->getBd()->prepare("SELECT * FROM galerie_like");
            $req->execute();
            $text = "";
            for($data = $req->fetch()){
                $text .= "<b>#".$data['id']."</b><br />";
                $text .= $data['id_galerie']." - ".$data['id_user']."<br />";
                return $text;
            }
        }

        // Récupération des likes d'un user
        public function getLikeGalerieUser(GalerieLike $galerie_like) {
            $req = $this->getBd()->prepare("SELECT * FROM galerie_like WHERE id_user = :id_user");
            $req->execute();
            $text = "";
            for($data = $req->fetch()){
                $text .= "<b>#".$data['id']."</b><br />";
                $text .= $data['id_galerie']." - ".$data['id_user']."<br />";
                return $text;
            }
        }

        // Récupération des likes d'une galerie
        public function getLikeGalerie(GalerieLike $galerie_like) {
            $req = $this->getBd()->prepare("SELECT * FROM galerie_like WHERE id_galerie = :id_galerie");
            $req->execute();
            $text = "";
            for($data = $req->fetch()){
                $text .= "<b>#".$data['id']."</b><br />";
                $text .= $data['id_galerie']." - ".$data['id_user']."<br />";
                return $text;
            }
        }

        // Récupération d'un like d'une galerie par son id
        public function getGalerieLikeId(GalerieLike $galerie_like) {
            $req = $this->getBd()->prepare("SELECT * FROM galerie_like WHERE id = :id");
            $req->execute();
            $text = "";
            for($data = $req->fetch()){
                $text .= "<b>#".$data['id']."</b><br />";
                $text .= $data['id_galerie']." - ".$data['id_user']."<br />";
                return $text;
            }
        }

    }

?>