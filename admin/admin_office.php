<?php
require_once '../connexion_bdd.php';

$sql = 'select * from parcelles';

$query = $bdd->prepare($sql);
$query->execute();
$parcelles = $query->fetchAll(PDO::FETCH_ASSOC);

$sql = 'select * from potagers';

$query = $bdd->prepare($sql);
$query->execute();
$jardins = $query->fetchAll(PDO::FETCH_ASSOC);

$sql = 'select * from potagers order by potager_nb_parcelle desc limit 1';

$query = $bdd->prepare($sql);
$query->execute();
$grandJardin = $query->fetch(PDO::FETCH_ASSOC);

$parcelleOccupe = 0;
$parcelleDemande = 0;

foreach ($parcelles as $parcelle)
{
    if ($parcelle['parcelle_statut'] == 2)
    {
        $parcelleOccupe ++;
    }
    if ($parcelle['parcelle_statut'] == 1)
    {
        $parcelleDemande ++;
    }
}
?>
<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="/assets/pages/css/admin.css">

    <title>Gestion de Boterra</title>
</head>
<body>

<main>

    <h1 id="titreAdmin">Admin</h1>

<section id="containerStats">
    <article>
        <h3>Nombre de jardins :</h3>
        <p><?= count($jardins) ?></p>
    </article>
    <article>
        <h3>Nombre de parcelles occupé :</h3>
        <p><?= $parcelleOccupe ?> / <?= count($parcelles) ?></p>
    </article>
    <article>
        <h3>Nombre de parcelles en attente de confirmation :</h3>
        <p><?= $parcelleDemande ?></p>
    </article>
    <article>
        <h3>Plus grand jardin :</h3>
        <p><?= $grandJardin['potager_adresse'].' ('.$grandJardin['potager_nb_parcelle'].' parcelles) ' ?></p>
    </article>
</section>



<nav id="navAdmin">
    <a href="/index.php">
        Retour
    </a>
    <a href="jardins/jardin_office.php">
        Jardins
    </a>
    <a href="actions/action_office.php">
        Actions
    </a>
    <a href="plantations/plantation_office.php">
        Plantations
    </a>
</nav>

</main>

</body>
</html>
