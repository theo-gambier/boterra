<?php
require_once ('../../../connexion_bdd.php');

if (isset($_GET['parcelle']) && filter_var($_GET['parcelle'], FILTER_VALIDATE_INT))
{
	$id = filter_var($_GET['id'], FILTER_VALIDATE_INT);

    $parcelleId = $_GET['parcelle'];

    $sql = 'select * from parcelles inner join users on parcelles._user_id = users.user_id where parcelle_id='.$parcelleId;

    $query = $bdd->prepare($sql);
    $query->execute();
    $parcelle = $query->fetch();

    $sql = 'select * from parcelles inner join potagers on parcelles._potager_id=potagers.potager_id where parcelles._user_id='.$parcelle['user_id'].' and parcelle_statut=2';

    $query = $bdd->prepare($sql);
    $query->execute();
    $userParcelles = $query->fetchAll(PDO::FETCH_ASSOC);
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

    <title>Document</title>
</head>
<body>

<main>

    <h1>Consultation de la demande</h1>

<section id="containerData">
    <article class="articleData">
        <h3>Pseudo de l'utilisateur : <?= $parcelle['user_pseudo'] ?></h3>
        <p>Nombre de réservations de l'utilisateur : <?= count($userParcelles) ?></p>
    </article>
    <?php
    if (count($userParcelles) > 0)
    {
        foreach ($userParcelles as $userParcelle)
        {
            ?>
            <article class="articleData">
                <h3><?= $userParcelle['potager_adresse'] ?></h3>
                <p>Numéro de parcelle : <?= $userParcelle['parcelle_numero'] ?></p>
            </article>
            <?php
        }
    }
    ?>

    <article id="containerLinks">
        <a href="refus_reserv.php?parcelle=<?= $parcelleId ?>&id=<?= $id ?>">Refuser</a>
        <a href="parcelle_office.php?id=<?= $id ?>">Retour</a>
        <a href="accept_reserv.php?parcelle=<?= $parcelleId ?>&id=<?= $id ?>">Accepter</a>
    </article>
</section>

</main>
</body>
</html>
