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
            $req->bindValue(':id_photo', $likephoto->getPhoto());
            $req->bindValue(':id_user', $likeuser->getUser());
            $req->execute();
            $tag->hydrate([
                'id' => $this->getBd()->lastInsertId()
            ]);
        }

        // Suppression d'un photolike
        public function delete(PhotoLike $photolike) {
            $req = $this->getBd()->prepare("DELETE FROM photo_like WHERE id = :id");
            $req->bindValue(':id', $tag->getId());
            $req->execute();
        }

        // Compter le nbr de photolike
        public function count() {
            $req = $this->getBd()->prepare("SELECT COUNT(id) AS countid FROM photo_like");
            $req->execute();
            for($data = $req->fetch()){
                $rep = $data['countid']."photo_like";
                return $rep;
            }
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
                /*$text .= " - <i>".$data['password']."</i>";
                $text .= " - ".if($data['administrator'] == 0){."admin : non".}else{."admin : oui".};
                $text .= " - ".date("d-m-Y");
                $text .= " - ".if($data['actif'] == 0){."actif : non".}else{."actif : oui".};*/
                return $text;
            }
        }

        // info d'un photo_like
        public function getInfo($id) {
            $req = $this->getBd()->prepare("SELECT * FROM photo_like WHERE id='$id'");
            $req->execute();
            $text = "";
            for($data = $req->fetch()){
                $text .= "<b>#".$data['id']."</b>";
                $text .= " - ".$data['id_photo'];
                $text .= " - <b>".$data['id_user']."</b>";
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
