<?php
require_once ('../../../connexion_bdd.php');
$erreur = 0;
$retour = '';

if (isset($_GET['id']) and isset($_GET['jardin'])) {
    if (filter_var($_GET['id'], FILTER_VALIDATE_INT) and filter_var($_GET['jardin'], FILTER_VALIDATE_INT)) {
        $parcelleId = $_GET['id'];
        $jardinId = $_GET['jardin'];
    } else {
        $erreur++;
        $retour .= 'Un problème est survenue, veuillez réessayer';
    }

    if (isset($parcelleId)) {
        $sql = 'select * from journaux 
        inner join actions on actions.action_id = journaux._action_id 
        inner join users on users.user_id=journaux._user_id 
        inner join plantations on plantations.plantation_id=journaux._plantation_id where journaux._parcelle_id=' . $parcelleId .' order by journaux.journal_date desc';

        $query = $bdd->prepare($sql);
        $query->execute();
        $journaux = $query->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>
    <!doctype html><html lang="fr">
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

    <h1>Consultation du journal</h1>

<section id="containerData">
<?php

if (isset($journaux))
{
    foreach ($journaux as $journal)
    {
        $date = date('d/m/y', $journal['journal_date']);
        ?>
        <article class="articleJournaux">
            <h3><?= $date ?></h3>
            <p><?= $journal['action_nom'] ?></p>
            <p><?= $journal['plantation_nom'] ?></p>
        </article>
        <?php
    }

}
?>

    <article id="containerRetour">
        <a href="parcelle_office.php?id=<?= $jardinId ?>">Retour</a>
    </article>
</section>

</main>
</body>
</html>

