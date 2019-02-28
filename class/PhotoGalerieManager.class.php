<?php

    class PhotoGalerieManager {

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

        // Création d'une photo galerie
        public function add(PhotoGalerie $photo_galerie) {
            $req = $this->getBd()->prepare("INSERT INTO photo_galerie (id_photo, id_galerie)
                                            VALUES (:id_photo, :id_galerie)");
            $req->bindValue(':id_photo', $photo_galerie->getId_photo());
            $req->bindValue(':id_galerie', $photo_galerie->getId_galerie());
            $req->execute();
            $user->hydrate([
                'id' => $this->getBd()->lastInsertId()
            ]);
        }

        // Suppression d'une photo galerie
        public function delete(PhotoGalerie $photo_galerie) {
            $req = $this->getBd()->prepare("DELETE FROM photo_galerie WHERE id = :id");
            $req->bindValue(':id', $photo_galerie->getId());
            $req->execute();
        }

        // Suppression des photos d'une galerie
        public function deletePhotoGalerie(PhotoGalerie $photo_galerie) {
            $req = $this->getBd()->prepare("DELETE FROM photo_galerie WHERE id_galerie = :id_galerie");
            $req->bindValue(':id_galerie', $photo->getId_galerie());
            $req->execute();
        }

        // Suppression d'une photo à une galerie
        public function deletePhotoGalerieIdPhoto(PhotoGalerie $photo_galerie) {
            $req = $this->getBd()->prepare("DELETE FROM photo_galerie WHERE id_photo = :id_photo");
            $req->bindValue(':id_photo', $photo->getId_photo());
            $req->execute();
        }

        // Suppression des photos galerie
        public function deleteAllPhotoGalerie(PhotoGalerie $photo_galerie) {
            $req = $this->getBd()->prepare("DELETE FROM photo_galerie");
            $req->execute();
        }

        // Récupération des photos galeries
        public function getAllPhotoGalerie() {
            $req = $this->getBd()->prepare("SELECT * FROM photo_galerie");
            $req->execute();
            $text = "";
            for($data = $req->fetch()){
                $text .= "<b>#".$data['id']."<br />";
                $text .= $data['id_photo']." - ".$data['id_galerie']."<br />";
                return $text;
            }
        }

        // Récupération des photos galerie d'une galerie
        public function getPhotoGalerieGalerie(PhotoGalerie $photo_galerie) {
            $req = $this->getBd()->prepare("SELECT * FROM photo_galerie WHERE id_galerie = :id_galerie");
            $req->execute();
            $text = "";
            for($data = $req->fetch()){
                $text .= "<b>#".$data['id']."<br />";
                $text .= $data['id_photo']." - ".$data['id_galerie']."<br />";
                return $text;
            }
        }

        // Récupération d'une photo galerie par id photo
        public function getPhotoGaleriePhoto(PhotoGalerie $photo_galerie) {
            $req = $this->getBd()->prepare("SELECT * FROM photo_galerie WHERE id_photo = :id_photo");
            $req->execute();
            $text = "";
            for($data = $req->fetch()){
                $text .= "<b>#".$data['id']."<br />";
                $text .= $data['id_photo']." - ".$data['id_galerie']."<br />";
                return $text;
            }
        }

        // Récupération d'une photo galerie par son id
        public function getPhotoGalerieId(Photo $photo) {
            $req = $this->getBd()->prepare("SELECT * FROM photo_galerie WHERE id = :id");
            $req->execute();
            $text = "";
            for($data = $req->fetch()){
                $text .= "<b>#".$data['id']."<br />";
                $text .= $data['id_photo']." - ".$data['id_galerie']."<br />";
                return $text;
            }
        }

    }

?>