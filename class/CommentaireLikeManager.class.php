<?php

    class CommentaireLikeManager {

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

        // Création d'un like
        public function add(CommentaireLike $commentaire_like) {
            $req = $this->getBd()->prepare("INSERT INTO commentaire_like (id_commentaire, id_user)
                                            VALUES (:id_commentaire, :id_user)");
            $req->bindValue(':id_commentaire', $commentaire_like->getId_commentaire());
            $req->bindValue(':id_user', $commentaire_like->getId_user());
            $req->execute();
            $user->hydrate([
                'id' => $this->getBd()->lastInsertId()
            ]);
        }

        // Suppression d'un like
        public function delete(CommentaireLike $commentaire_like) {
            $req = $this->getBd()->prepare("DELETE FROM commentaire_like WHERE id = :id");
            $req->bindValue(':id', $commentaire_like->getId());
            $req->execute();
        }

        // Suppression des likes d'un commentaire
        public function deleteLikeComm(CommentaireLike $commentaire_like) {
            $req = $this->getBd()->prepare("DELETE FROM commentaire_like WHERE id_commentaire = :id_commentaire");
            $req->bindValue(':id_commentaire', $commentaire_like->getId_commentaire());
            $req->execute();
        }

        // Suppression de tous les likes d'un user
        public function deleteLikeUser(CommentaireLike $commentaire_like) {
            $req = $this->getBd()->prepare("DELETE FROM commentaire_like WHERE id_user = :id_user");
            $req->bindValue(':id_user', $commentaire_like->getId_user());
            $req->execute();
        }

        // Suppression de tous les likes
        public function deleteAllLike(CommentaireLike $commentaire_like) {
            $req = $this->getBd()->prepare("DELETE FROM commentaire_like");
            $req->execute();
        }

        // Récupération des likes
        public function getLike() {
            $req = $this->getBd()->prepare("SELECT * FROM commentaire_like");
            $req->execute();
            $text = "";
            for($data = $req->fetch()){
                $text .= "<b>#".$data['id']."</b><br />";
                $text .= $data['id_commentaire']." - ";
                $text .= $data['id_user']."<br />";
                return $text;
            }
        }

        // Récupération des likes d'un commentaire
        public function getLikeComm(CommentaireLike $commentaire_like) {
            $req = $this->getBd()->prepare("SELECT * FROM commentaire_like WHERE id_commentaire = :id_commentaire");
            $req->execute();
            $text = "";
            for($data = $req->fetch()){
                $text .= "<b>#".$data['id']."</b><br />";
                $text .= $data['id_commentaire']." - ";
                $text .= $data['id_user']."<br />";
                return $text;
            }
        }

        // Récupération des likes d'un user
        public function getLikeUser(CommentaireLike $commentaire_like) {
            $req = $this->getBd()->prepare("SELECT * FROM commentaire_like WHERE id_user = :id_user");
            $req->execute();
            $text = "";
            for($data = $req->fetch()){
                $text .= "<b>#".$data['id']."</b><br />";
                $text .= $data['id_commentaire']." - ";
                $text .= $data['id_user']."<br />";
                return $text;
            }
        }

        // Récupération d'un like par son id
        public function getLikeId(CommentaireLike $commentaire_like) {
            $req = $this->getBd()->prepare("SELECT * FROM commentaire_like WHERE id = :id");
            $req->execute();
            $text = "";
            for($data = $req->fetch()){
                $text .= "<b>#".$data['id']."</b><br />";
                $text .= $data['id_commentaire']." - ";
                $text .= $data['id_user']."<br />";
                return $text;
            }
        }

    }

?>