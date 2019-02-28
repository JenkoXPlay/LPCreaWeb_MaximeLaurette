<?php

    class CommentaireManager {

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

        // Création d'un commentaire
        public function add(Commentaire $commentaire) {
            $req = $this->getBd()->prepare("INSERT INTO commentaire (texte, date_create, id_user_create, id_photo)
                                            VALUES (:texte, :date_create, :id_user_create, :id_photo)");
            $req->bindValue(':texte', $commentaire->getEmail());
            $req->bindValue(':date_create', $commentaire->getPseudo());
            $req->bindValue(':id_user_create', $commentaire->getMdp());
            $req->bindValue(':id_photo', $commentaire->getAdministrator());
            $req->execute();
            $user->hydrate([
                'id' => $this->getBd()->lastInsertId()
            ]);
        }

        // Suppression d'un commentaire
        public function delete(Commentaire $commentaire) {
            $req = $this->getBd()->prepare("DELETE FROM commentaire WHERE id = :id");
            $req->bindValue(':id', $commentaire->getId());
            $req->execute();
        }

        // Suppresion des commentaires d'une photo
        public function deleteCommPhoto(Commentaire $commentaire) {
            $req = $this->getBd()->prepare("DELETE FROM commentaire WHERE id_photo = :id_photo");
            $req->bindValue(':id_photo', $commentaire->getId_photo());
            $req->execute();
        }

        // Suppresion de tous les commentaires
        public function deleteAllComm(Commentaire $commentaire) {
            $req = $this->getBd()->prepare("DELETE FROM commentaire");
            $req->execute();
        }

        // Récupération des commentaires
        public function getCommentaire() {
            $req = $this->getBd()->prepare("SELECT * FROM commentaire");
            $req->execute();
            $text = "";
            for($data = $req->fetch()){
                $text .= "<b>#".$data['id']."</b><br />";
                $text .= $data['texte']."<br />";
                $text .= "<i>".$data['date_create']."</i><br />";
                $text .= "<i>".$data['id_user_create']."</i>";
                $text .= " - <i>".$data['id_photo']."</i>";
                return $text;
            }
        }

        // Récupération des commentaires d'une photo
        public function getCommentairePhoto(Commentaire $commentaire) {
            $req = $this->getBd()->prepare("SELECT * FROM commentaire WHERE id_photo = :id_photo");
            $req->execute();
            $text = "";
            for($data = $req->fetch()){
                $text .= "<b>#".$data['id']."</b><br />";
                $text .= $data['texte']."<br />";
                $text .= "<i>".$data['date_create']."</i><br />";
                $text .= "<i>".$data['id_user_create']."</i>";
                $text .= " - <i>".$data['id_photo']."</i>";
                return $text;
            }
        }

        // Récupération d'un commentaire par son id
        public function getCommentairePhotoId(Commentaire $commentaire) {
            $req = $this->getBd()->prepare("SELECT * FROM commentaire WHERE id = :id");
            $req->execute();
            $text = "";
            for($data = $req->fetch()){
                $text .= "<b>#".$data['id']."</b><br />";
                $text .= $data['texte']."<br />";
                $text .= "<i>".$data['date_create']."</i><br />";
                $text .= "<i>".$data['id_user_create']."</i>";
                $text .= " - <i>".$data['id_photo']."</i>";
                return $text;
            }
        }

    }

?>