<?php
require_once ('../../connexion_bdd.php');
session_start();

if (filter_var($_GET['id'], FILTER_VALIDATE_INT))
{
    $id = filter_var($_GET['id'], FILTER_VALIDATE_INT);
    $_SESSION['idModifJardin'] = $id;
}

$sql = 'select * from potagers where potager_id='.$id;

$query = $bdd->prepare($sql);
$query->execute();
$jardin = $query->fetch();

?>

<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

<form action="valid_modif.php" method="post">
    <label for="adresse">Adresse :</label>
    <input id="adresse" type="text" name="potager_adresse" value="<?= $jardin['potager_adresse'] ?>">

    <label for="nb_parcelles">Nombre de parcelles :</label>
    <input id="nb_parcelles" type="number" name="potager_nb_parcelle" value="<?= $jardin['potager_nb_parcelle'] ?>">
    <input type="submit">
</form>

</body>
</html>
