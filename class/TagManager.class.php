<?php

    class TagManager {

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

        // Création d'un tag
        public function add(Tag $tag) {
            $req = $this->getBd()->prepare("INSERT INTO tag (nom, color)
                                            VALUES (:nom, :color)");
            $req->bindValue(':nom', $tag->getNom());
            $req->bindValue(':color', $tag->getColor());
            $req->execute();
            $tag->hydrate([
                'id' => $this->getBd()->lastInsertId()
            ]);
        }

        // Suppression d'un tag
        public function delete(Tag $tag) {
            $req = $this->getBd()->prepare("DELETE FROM tag WHERE id = :id");
            $req->bindValue(':id', $tag->getId());
            $req->execute();
        }

        // tous les tags
        public function getList() {
            $req = $this->getBd()->prepare("SELECT * FROM tag");
            $req->execute();
            $text = "";
            for($data = $req->fetch()){
                $text .= "<b>#".$data['id']."</b>";
                $text .= " - ".$data['nom'];
                $text .= " - <b>".$data['color']."</b>";
                return $text;
            }
        }

        // info d'un tag
        public function getInfo($id) {
            $req = $this->getBd()->prepare("SELECT * FROM tag WHERE id='$id'");
            $req->execute();
            $text = "";
            for($data = $req->fetch()){
                $text .= "<b>#".$data['id']."</b>";
                $text .= " - ".$data['nom'];
                $text .= " - <b>".$data['color']."</b>";
                return $text;
            }
        }

    }

?>
