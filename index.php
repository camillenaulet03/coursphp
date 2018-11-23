<?php session_start();

if (isset($_POST['mail']) && isset($_POST['mdp'])) {
    $mail = $_POST["mail"];
    $mdp = $_POST["mdp"];

    if (!empty($_POST["mail"]) && !empty($_POST["mdp"])) {
        $fic = fopen("csv.csv", "r");
        $i = 1;//Compteur de ligne
        while (!feof($fic)) {
            $ligne = fgets($fic, 1024);
            if ($ligne != $mail or $ligne != $mdp)
                echo "Erreur d'identification";
        $i++;
    }
    fclose($fic);
} else {
        echo "remplir tous les champs";
    }
}
session_destroy();
?><!DOCTYPE.html>
<html lang ="en">
<head>
    <meta charset = "utf-8">
    <title>Login Page</title>
</head>
<body>
<form method="POST" action="">
<h1 align="center"><input type="email" name="mail" placeholder="Entrer votre adresse mail"></h1>
<h2 align="center"><input type="password" name="mdp" placeholder="Entrer votre mot de Passe"></h2>
    <input type="submit" name="Mot de passe oublié ?" value="Mot de passe oublié ?" >
    <button class="btn btn-primary" type="submit">Valider</button>
</form>
</body>
</html>
