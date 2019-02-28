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

        // Compter le nbr de tag
        public function count() {
            $req = $this->getBd()->prepare("SELECT COUNT(id) AS countid FROM tag");
            $req->execute();
            for($data = $req->fetch()){
                $rep = $data['countid']."tag(s)";
                return $rep;
            }
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
                /*$text .= " - <i>".$data['password']."</i>";
                $text .= " - ".if($data['administrator'] == 0){."admin : non".}else{."admin : oui".};
                $text .= " - ".date("d-m-Y");
                $text .= " - ".if($data['actif'] == 0){."actif : non".}else{."actif : oui".};*/
                return $text;
            }
        }

        // info d'un user
        public function getInfo($id) {
            $req = $this->getBd()->prepare("SELECT * FROM tag WHERE id='$id'");
            $req->execute();
            $text = "";
            for($data = $req->fetch()){
                $text .= "<b>#".$data['id']."</b>";
                $text .= " - ".$data['nom'];
                $text .= " - <b>".$data['color']."</b>";
                /*$text .= " - <i>".$data['password']."</i>";
                $text .= " - ".if($data['administrator'] == 0){."admin : non".}else{."admin : oui".};
                $text .= " - ".date("d-m-Y");
                $text .= " - ".if($data['actif'] == 0){."actif : non".}else{."actif : oui".};*/
                return $text;
            }
        }

        /* vérifier si un user exist
        public function exist($pseudo) {
            $req = $this->getBd()->prepare("SELECT pseudo FROM user WHERE pseudo='$pseudo'");
            $rep = $rep->execute();
            if($rep){
                return $text = "L'utilisateur existe déjà !";
            }else{
                return $text = "L'utilisateur n'existe pas encore !";
            }
        }*/

        /* Edit d'un user
        public function edit(User $user, $id) {
            $req = $this->getBd()->prepare("UPDATE user SET 'email'=':email',
                                                            'pseudo'=':pseudo',
                                                            'mdp'=':mdp'
                                                         WHERE id='$id'");
            $req->bindValue(':email', $user->getEmail());
            $req->bindValue(':pseudo', $user->getPseudo());
            $req->bindValue(':mdp', $user->getMdp());
            $req->execute();
        }*/

    }

?>
