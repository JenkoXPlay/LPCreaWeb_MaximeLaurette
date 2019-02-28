<?php

    class PhotoLikeManager {

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

        // Création d'un photo_like
        public function add(PhotoLike $photolike) {
            $req = $this->getBd()->prepare("INSERT INTO photo_like (id_photo, id_user)
                                            VALUES (:id_photo, :id_user)");
            $req->bindValue(':id_photo', $photolike->getPhoto());
            $req->bindValue(':id_user', $photolike->getUser());
            $req->execute();
            $tag->hydrate([
                'id' => $this->getBd()->lastInsertId()
            ]);
        }

        // Suppression d'un photolike
        public function delete(PhotoLike $photolike) {
            $req = $this->getBd()->prepare("DELETE FROM photo_like WHERE id = :id");
            $req->bindValue(':id', $photolike->getId());
            $req->execute();
        }

        // tous les photo_like
        public function getList() {
            $req = $this->getBd()->prepare("SELECT * FROM photo_like");
            $req->execute();
            $text = "";
            for($data = $req->fetch()){
                $text .= "<b>#".$data['id']."</b>";
                $text .= " - ".$data['id_photo'];
                $text .= " - <b>".$data['id_user']."</b>";
                return $text;
            }
        }

        // info d'un photo_like
        public function getInfo(PhotoLike $photolike) {
            $req = $this->getBd()->prepare("SELECT * FROM photo_like WHERE id = :id");
            $req->execute();
            $text = "";
            for($data = $req->fetch()){
                $text .= "<b>#".$data['id']."</b>";
                $text .= " - ".$data['id_photo'];
                $text .= " - <b>".$data['id_user']."</b>";
                return $text;
            }
        }

    }

?>
