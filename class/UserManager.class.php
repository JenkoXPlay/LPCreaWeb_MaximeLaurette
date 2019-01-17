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

    }

?>