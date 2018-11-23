<?php
$mail=(isset($_POST["mail"])) ? $_POST["mail"]:false;
$mdp=(isset($_POST["mdp"])) ? $_POST["mdp"]:false;
$confirm=(isset($_POST["confirm"])) ? $_POST["confirm"]:false;

$lignes[] = array("mail" => $mail);
$lignes[] = array("mdp" => $mdp);
$lignes[] = array("confirm" => $confirm);
$chemin = 'csv.csv';
$delimiteur = ';';

if(isset($_GET["check"])) {
    $csv_csv = fopen($chemin, 'w+');
    fprintf($csv_csv, chr(0xEF) . chr(0xBB) . chr(0xBF));
    foreach ($lignes as $ligne) {
        fputcsv($csv_csv, $ligne, $delimiteur);
    }
    fclose($csv_csv);
}
?><!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Inscription</title>
</head>
<body>
    <h1>Inscription</h1>
    <table>
        <thead>
            <tr>
                <th>Email</th>
                <th>Mot de passe</th>
                <th>Confirmation du mot de passe</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><input type="email" name="email" placeholder="Entrer votre adresse mail" ></td>
                <td><input type="password" name="password" placeholder="Entrer votre mot de passe" ></td>
                <td><input type="password" name="confirm" placeholder="Confirmer votre mot de passe" ></td>
                <td><button><a class="btn btn-primary" href="?check=<?php echo $index ?>">Enregistrer</a></button></td>
            </tr>
            </tbody>
    </table>
    </body>
</html>