<?php

    class TagPhotoManager {

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

        // Création d'un tag_photo
        public function add(TagPhoto $tagphoto) {
            $req = $this->getBd()->prepare("INSERT INTO tag_photo (id_tag, id_photo)
                                            VALUES (:id_tag, :id_photo)");
            $req->bindValue(':id_tag', $tagphoto->getTag());
            $req->bindValue(':id_photo', $tagphoto->getPhoto());
            $req->execute();
            $tag->hydrate([
                'id' => $this->getBd()->lastInsertId()
            ]);
        }

        // Suppression des tag
        public function deleteAll() {
            $req = $this->getBd()->prepare("DELETE FROM tag");
            $req->execute();
        }

        // Suppression d'un tag
        public function delete(TagPhoto $tagphoto) {
            $req = $this->getBd()->prepare("DELETE FROM tag WHERE id = :id");
            $req->bindValue(':id', $tag->getId());
            $req->execute();
        }

        // tous les tags
        public function getList() {
            $req = $this->getBd()->prepare("SELECT * FROM tag_photo");
            $req->execute();
            $text = "";
            for($data = $req->fetch()){
                $text .= "<b>#".$data['id']."</b>";
                $text .= " - ".$data['id_tag'];
                $text .= " - <b>".$data['id_photo']."</b>";
                return $text;
            }
        }

        // info d'un user
        public function getInfo($id) {
            $req = $this->getBd()->prepare("SELECT * FROM tag_photo WHERE id='$id'");
            $req->execute();
            $text = "";
            for($data = $req->fetch()){
                $text .= "<b>#".$data['id']."</b>";
                $text .= " - ".$data['id_tag'];
                $text .= " - <b>".$data['id_photo']."</b>";
                return $text;
            }
        }

    }

?>
