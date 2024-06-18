<?php
require_once '../../connexion_bdd.php';

if (filter_var($_GET['jardin'], FILTER_VALIDATE_INT) && $_GET['jardin'] !== '')
{
    $jardin = $_GET['jardin'];

	$sql = 'select * from parcelles where _potager_id=:jardin and parcelle_statut = 1';

	$query = $bdd->prepare($sql);

	$query->bindValue(":jardin", $jardin, PDO::PARAM_INT);

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
    <link rel="stylesheet" href="/assets/pages/css/style.css">
	<title>Document</title>
</head>
<body>
<?php
    require_once '../../assets/pages/menu.php';
?>

<main id="mainAjoutJardin" class="fondv">

<section class="blockblanc ">
	<?php
    if (!isset($parcelles) || $parcelles == [])
    {
     ?>
        <article class="articleGestionParcelles">
            <h3>Aucune parcelles en attente, attendez qu'une demande arrive</h3>
        </article>
        <?php
    }else{
	    foreach ($parcelles as $parcelle)
	    {
		    ?>
            <article class="articleGestionParcelles">
                <h3><?= $parcelle['parcelle_numero'] ?></h3>
                <div class="divGestionParcelles">
                    <a class="boutonMain" href="confirm_parcelle.php?parcelle=<?= $parcelle['parcelle_id'] ?>&jardin=<?= $jardin
                    ?>"><p>Confirmer</p></a>
                    <a class="boutonMain" href="refuse_parcelle.php?parcelle=<?= $parcelle['parcelle_id']
                    ?>&jardin=<?= $jardin ?>"><p>Refuser</p></a>
                </div>
            </article>
		    <?php
	    }
    }
	?>
    <article class="articleGestionParcelles">
        <a class="boutonMain" href="jardin_office.php"><p>Retour</p></a>
    </article>
</section>

</main>
</body>
</html>
