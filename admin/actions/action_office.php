<?php
require_once ('../../connexion_bdd.php');

$sql = 'select * from actions order by action_nom asc';

$query = $bdd->prepare($sql);
$query->execute();
$actions = $query->fetchAll(PDO::FETCH_ASSOC);

?>

<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="/assets/pages/css/admin.css">

    <title>Liste des actions</title>
</head>
<body>

<main>

<h1>Liste des actions</h1>


<section id="containerData">
    <?php

    foreach ($actions as $action)
    {
        $id = $action['action_id']
        ?>
        <article class="articleData">
            <h3><?= $action['action_nom'] ?></h3>
            <div>
                <a href="modif_action.php?action=<?= $id ?>">Modifier</a>
                <a href="confirm_annul.php?action=<?= $id ?>">Supprimer</a>
            </div>
        </article>

    <?php
    }
    ?>
    <article id="containerLinks">
        <a href="../admin_office.php">Retour</a>
        <a href="ajout_action.php">Ajouter une action</a>
    </article>
</section>

</main>

</body>
</html>
