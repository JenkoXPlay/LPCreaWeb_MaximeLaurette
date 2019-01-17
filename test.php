<?php

    include('autoload.php');

    include('connexion.php');

    // $array = array(
    //     'id' => '11',
    //     'email' => 'toto@toto.fr',
    //     'pseudo' => 'toto',
    //     'password' => 'tata',
    //     'admin' => 'true',
    //     'date_inscription' => '17/01/2019',
    //     'actif' => 'true'
    // );

    // $user = new User($array);
    
    // echo '<pre>';
    // print_r($user);
    // echo '</pre>';

    $userManager = new UserManager($bdd);

    if(isset($_POST['create'])){
        if($_POST['email']&&$_POST['pseudo']&&$_POST['password']&&$_POST['rp_password']){
            if($_POST['password'] == $_POST['rp_password']){
                $array_user = array(
                    'email' => $_POST['email'],
                    'pseudo' => $_POST['pseudo'],
                    'mdp' => $_POST['password'],
                    'administrator' => 0,
                    'dateInscription' => date('Y-m-d'),
                    'actif' => 1
                );
                $user = new User($array_user);
                $userManager->add($user);
            }else echo "erreur";
        }else echo "erreur";
    }

?>

<h1>Inscription</h1>

<form method="post" action="" autocomplete="off">
    <input type="email" name="email" placeholder="Adresse mail" /><br /><br />
    <input type="text" name="pseudo" placeholder="Pseudo" /><br /><br />
    <input type="password" name="password" placeholder="Mot de passe" /><br /><br />
    <input type="password" name="rp_password" placeholder="Confirmation mot de passe" /><br /><br />
    <input type="submit" name="create" value="Créer le compte" />
</form>
