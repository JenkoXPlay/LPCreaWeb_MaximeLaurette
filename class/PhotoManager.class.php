<?php

    class PhotoManager {

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

        // Création d'une photo
        public function add(Photo $photo) {
            $req = $this->getBd()->prepare("INSERT INTO photo (titre, image, description, date_create, id_user_create, credit, lieu)
                                            VALUES (:titre, :image, :description, :date_create, :id_user_create, :credit, :lieu)");
            $req->bindValue(':titre', $photo->getTitre());
            $req->bindValue(':image', $photo->getImage());
            $req->bindValue(':description', $photo->getDescription());
            $req->bindValue(':date_create', $photo->getDate_create());
            $req->bindValue(':id_user_create', $photo->getId_user_create());
            $req->bindValue(':credit', $photo->getCredit());
            $req->bindValue(':lieu', $photo->getLieu());
            $req->execute();
            $user->hydrate([
                'id' => $this->getBd()->lastInsertId()
            ]);
        }

        // Suppression d'une photo
        public function delete(Photo $photo) {
            $req = $this->getBd()->prepare("DELETE FROM photo WHERE id = :id");
            $req->bindValue(':id', $photo->getId());
            $req->execute();
        }

        // Suppression des photos d'un user
        public function deletePhotoUser(Photo $photo) {
            $req = $this->getBd()->prepare("DELETE FROM photo WHERE id_user_create = :id_user_create");
            $req->bindValue(':id_user_create', $photo->getId_user());
            $req->execute();
        }

        // Suppression des photos
        public function deleteAllPhoto(Photo $photo) {
            $req = $this->getBd()->prepare("DELETE FROM photo");
            $req->execute();
        }

        // Récupération des photos
        public function getAllPhoto() {
            $req = $this->getBd()->prepare("SELECT * FROM photo");
            $req->execute();
            $text = "";
            for($data = $req->fetch()){
                $text .= "<b>#".$data['id']." - ".$data['titre']."</b><br />";
                $text .= "<img src='".$data['image']."' /><br />";
                $text .= $data['description']."<br />";
                $text .= "<i>".$data['date_create']." - ".$data['id_user_create']."</i><br />";
                $text .= $data['credit']."<br />";
                $text .= $data['lieu']."<br />";
                return $text;
            }
        }

        // Récupération des photos d'un user
        public function getPhotoUser(Photo $photo) {
            $req = $this->getBd()->prepare("SELECT * FROM photo WHERE id_user_create = :id_user_create");
            $req->execute();
            $text = "";
            for($data = $req->fetch()){
                $text .= "<b>#".$data['id']." - ".$data['titre']."</b><br />";
                $text .= "<img src='".$data['image']."' /><br />";
                $text .= $data['description']."<br />";
                $text .= "<i>".$data['date_create']." - ".$data['id_user_create']."</i><br />";
                $text .= $data['credit']."<br />";
                $text .= $data['lieu']."<br />";
                return $text;
            }
        }

        // Récupération d'une photo par son id
        public function getPhotoId(Photo $photo) {
            $req = $this->getBd()->prepare("SELECT * FROM photo WHERE id = :id");
            $req->execute();
            $text = "";
            for($data = $req->fetch()){
                $text .= "<b>#".$data['id']." - ".$data['titre']."</b><br />";
                $text .= "<img src='".$data['image']."' /><br />";
                $text .= $data['description']."<br />";
                $text .= "<i>".$data['date_create']." - ".$data['id_user_create']."</i><br />";
                $text .= $data['credit']."<br />";
                $text .= $data['lieu']."<br />";
                return $text;
            }
        }

    }

?>