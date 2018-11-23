<?php session_start();
if(!isset($_SESSION['lignes'])) {
    $_SESSION['lignes'] = array();
}
if (isset($_POST['mail']) && isset($_POST['mdp']) && isset($_POST['confirm'])) {
    $mail = $_POST["mail"];
    $mdp = $_POST["mdp"];
    $confirm = $_POST["confirm"];
    $lignes[] = array("mail" => $mail);
    $lignes[] = array("mdp" => $mdp);
    $confirmation[] = array("confirm" => $confirm);
    $chemin = 'csv.csv';
    $delimiteur = ';';

    if ($mdp != $confirm){
        echo "Votre mot de passe est différent de votre confirmation de mot de passe";
    }

    if (!empty($_POST["mail"]) && !empty($_POST["mdp"]) && !empty($_POST["confirm"])) {
        $csv_csv = fopen($chemin, 'a+');
        fprintf($csv_csv, chr(0xEF) . chr(0xBB) . chr(0xBF));
        foreach ($lignes as $ligne) {
            fputcsv($csv_csv, $ligne, $delimiteur);
            require_once "index.php";
        }
        fclose($csv_csv);
    } else {
        echo "Merci de remplir tous les champs";
    }
}
session_destroy();
?><!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Inscription</title>
</head>
<body>
    <h1>Inscription</h1>
    <form class="form-inline" action="" method="post">
        <input class="form-control mb-2 mr_sm-2" type="email" name="mail" placeholder="Entrer votre adresse mail" >
        <input class="form-control mb-2 mr_sm-2" type="password" name="mdp" placeholder="Entrer votre mot de passe" >
        <input class="form-control mb-2 mr_sm-2" type="password" name="confirm" placeholder="Confirmer votre mot de passe" >
        <button class="btn btn-primary" type="submit">Valider</button>
    </form>
    </body>
</html>