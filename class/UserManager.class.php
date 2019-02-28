<?php

    class UserManager {

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

        // Création d'un user
        public function add(User $user) {
            $req = $this->getBd()->prepare("INSERT INTO user (email, pseudo, mdp, administrator, date_inscription, actif)
                                            VALUES (:email, :pseudo, :mdp, :administrator, :dateInscription, :actif)");
            $req->bindValue(':email', $user->getEmail());
            $req->bindValue(':pseudo', $user->getPseudo());
            $req->bindValue(':mdp', $user->getMdp());
            $req->bindValue(':administrator', $user->getAdministrator());
            $req->bindValue(':dateInscription', $user->getDateInscription());
            $req->bindValue(':actif', $user->getActif());
            $req->execute();
            $user->hydrate([
                'id' => $this->getBd()->lastInsertId()
            ]);
        }

        // Suppression d'un User
        public function delete(User $user) {
            $req = $this->getBd()->prepare("DELETE FROM user WHERE id = :id");
            $req->bindValue(':id', $user->getId());
            $req->execute();
        }

        // Compter le nbr de user
        public function count() {
            $req = $this->getBd()->prepare("SELECT COUNT(id) AS countid FROM user");
            $req->execute();
            for($data = $req->fetch()){
                $rep = $data['countid']." utilisateur(s)";
                return $rep;
            }
        }

        // tous les users
        public function getList() {
            $req = $this->getBd()->prepare("SELECT * FROM user");
            $req->execute();
            $text = "";
            for($data = $req->fetch()){
                $text .= "<b>#".$data['id']."</b>";
                $text .= " - ".$data['email'];
                $text .= " - <b>".$data['pseudo']."</b>";
                $text .= " - <i>".$data['password']."</i>";
                $text .= " - ".if($data['administrator'] == 0){."admin : non".}else{."admin : oui".};
                $text .= " - ".date("d-m-Y");
                $text .= " - ".if($data['actif'] == 0){."actif : non".}else{."actif : oui".};
                return $text;
            }
        }

        // info d'un user
        public function getInfo($id) {
            $req = $this->getBd()->prepare("SELECT * FROM user WHERE id='$id'");
            $req->execute();
            $text = "";
            for($data = $req->fetch()){
                $text .= "<b>#".$data['id']."</b>";
                $text .= " - ".$data['email'];
                $text .= " - <b>".$data['pseudo']."</b>";
                $text .= " - <i>".$data['password']."</i>";
                $text .= " - ".if($data['administrator'] == 0){."admin : non".}else{."admin : oui".};
                $text .= " - ".date("d-m-Y");
                $text .= " - ".if($data['actif'] == 0){."actif : non".}else{."actif : oui".};
                return $text;
            }
        }

        // vérifier si un user exist
        public function exist($pseudo) {
            $req = $this->getBd()->prepare("SELECT pseudo FROM user WHERE pseudo='$pseudo'");
            $rep = $rep->execute();
            if($rep){
                return $text = "L'utilisateur existe déjà !";
            }else{
                return $text = "L'utilisateur n'existe pas encore !";
            }
        }

        // Edit d'un user
        public function edit(User $user, $id) {
            $req = $this->getBd()->prepare("UPDATE user SET 'email'=':email',
                                                            'pseudo'=':pseudo',
                                                            'mdp'=':mdp'
                                                         WHERE id='$id'");
            $req->bindValue(':email', $user->getEmail());
            $req->bindValue(':pseudo', $user->getPseudo());
            $req->bindValue(':mdp', $user->getMdp());
            $req->execute();
        }

    }

?>