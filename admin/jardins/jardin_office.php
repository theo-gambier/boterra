<?php
require_once ('../../connexion_bdd.php');

$sql = 'select * from potagers';

$query = $bdd->prepare($sql);
$query->execute();
$jardins = $query->fetchAll(PDO::FETCH_ASSOC);

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

    <h1>Liste des jardins</h1>

    <section id="containerData">

    <?php
        foreach ($jardins as $jardin)
        {
            ?>
            <article class="articleData">
                <h3><?= $jardin['potager_adresse']?></h3>
                <div>
                    <a href="parcelles/parcelle_office.php?id=<?= $jardin['potager_id'] ?>">parcelles</a>
                    <?php
                    if ($jardin['_user_id'] == -1){
                        ?>
                        <a href="confirm_annul.php?jardin=<?= $jardin['potager_id'] ?>">supprimer</a>
                    <?php
                    }
                    ?>
                </div>
            </article>
        <?php
        }

    ?>
        <article id="containerLinks">
            <a href="../admin_office.php">Retour</a>
            <a href="ajouter_jardin.php">Ajouter un jardin</a>
        </article>
    </section>


</main>

</body>
</html>
