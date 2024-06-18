<?php
require_once ('../../../connexion_bdd.php');

$erreur = 0;
$retour = '';

if (filter_var($_GET['id'], FILTER_VALIDATE_INT))
{
    $id = filter_var($_GET['id'], FILTER_VALIDATE_INT);
}else{
    $erreur++;
    $retour .= 'Un problème est survenue, veuillez réessayer !';
}

if (isset($id))
{
    $sql = 'select * from parcelles where _potager_id='.$id.' order by parcelle_numero asc';

    $query = $bdd->prepare($sql);
    $query->execute();
    $parcelles = $query->fetchAll(PDO::FETCH_ASSOC);

    $sql = 'select potager_adresse from potagers where potager_id='.$id;

    $query = $bdd->prepare($sql);
    $query->execute();
    $adresse = $query->fetch();
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

<h1>Parcelles du <?= $adresse['potager_adresse'] ?></h1>

<section id="containerData">
<?php
    if (isset($parcelles))
    {
        foreach ($parcelles as $parcelle)
        {
            ?>
            <article class="articleData">
                <div>
                    <h3><?= $parcelle['parcelle_numero'] ?></h3>
                    <?php
                    switch ($parcelle['parcelle_statut'])
                    {
                        case 0:
                            echo '<div class="libre">Libre</div>';
                            break;
                        case 1:
                            echo '<div class="demande">Demandé</div>';
                            break;
                        case 2:
                            echo '<div class="reserve">Réservé</div>';
                            break;
                        default:
                            break;
                    }

                    ?>
                </div>
                <?php
                if ($parcelle['parcelle_statut'] == 1 && $parcelle['_user_id'] !== -1)
                {
                    ?>
                    <div class="containerLinksParcelles">
                        <a href="refus_reserv.php?parcelle=<?= $parcelle ['parcelle_id'] ?>&id=<?= $id ?>">Refuser</a>
                        <a href="consult_reserv.php?parcelle=<?= $parcelle['parcelle_id'] ?>&id=<?= $id ?>">Consulter</a>
                        <a href="accept_reserv.php?parcelle=<?= $parcelle['parcelle_id'] ?>&id=<?= $id ?>">Accepter</a>
                    </div>

                    <?php
                }



                if ($parcelle['parcelle_statut'] == 2)
                {
                    ?>
                    <div class="containerLinksParcelles">
                        <a href="confirm_annul.php?parcelle=<?= $parcelle['parcelle_id']?>&jardin=<?= $id ?>">Annuler la réservation</a>
                        <a href="contact_parcelle.php?user= <?= $parcelle['_user_id'] ?>&parcelle=<?= $parcelle['parcelle_numero'] ?>&jardin=<?= $id ?>">Contacter le membre</a>
                        <a href="lire_journal.php?id=<?= $parcelle['parcelle_id'] ?>&jardin=<?= $id ?>">Journal</a>
                    </div>
                    <?php
                }
                ?>
            </article>
        <?php
        }
    }
    ?>
    <article id="containerRetour">
        <a href="../jardin_office.php">
            <h3>Retour</h3>
        </a>
    </article>
</section>

</main>
</body>
</html>


