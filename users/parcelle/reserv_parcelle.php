<?php
require_once ('../../connexion_bdd.php');

if (isset($_GET['jardin']) && filter_var($_GET['jardin'], FILTER_VALIDATE_INT))
{
	$jardinId = $_GET['jardin'];

	$sql = 'select * from parcelles where _potager_id='.$jardinId.' and parcelle_statut=0';

	$query = $bdd->prepare($sql);
	$query->execute();
	$parcelles = $query->fetchAll(PDO::FETCH_ASSOC);
}

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

<section>
	<?php
	if (!isset($parcelles) or count($parcelles) == 0)
	{
		?>
        <article>
            <p>
				Vous arrivez trop tard, il n'y a plus de parcelle disponible dans ce jardin.
                <a href="../jardin/liste_jardin.php">Retourner à la liste des jardins</a>
            </p>
        </article>
    <?php
	}else{
        foreach ($parcelles as $parcelle)
        {
	        ?>
            <article>
                <h3><?= $parcelle['parcelle_numero'] ?></h3>
                <a href="valid_reserv.php?parcelle=<?= $parcelle['parcelle_id'] ?>">
                    Reserver
                </a>

            </article>
	        <?php
        }

    }
	?>
</section>

</body>
</html>
