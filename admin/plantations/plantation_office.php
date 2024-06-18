<?php
require_once ('../../connexion_bdd.php');

$sql = 'select * from plantations order by plantations.plantation_nom asc';

$query = $bdd->prepare($sql);
$query->execute();
$plantations = $query->fetchAll(PDO::FETCH_ASSOC);

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

    <h1>liste des plantations</h1>

<section id="containerData">
    <?php

    foreach ($plantations as $plante)
    {
        $id = $plante['plantation_id']
        ?>
        <article class="articleData">
            <h3><?= $plante['plantation_nom'] ?></h3>
            <div>
                <a href="modif_planta.php?planta=<?= $id ?>">Modifier</a>
                <a href="confirm_annul.php?planta=<?= $id ?>">Supprimer</a>
            </div>
        </article>

    <?php
    }
    ?>
    <article id="containerLinks">
        <a href="../admin_office.php">Retour</a>
        <a href="ajout_planta.php">Ajouter une plantation</a>
    </article>
</section>

</main>

</body>
</html>
