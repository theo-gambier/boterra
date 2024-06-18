<?php
require_once ('../../connexion_bdd.php');

if (isset($_GET['parcelle']) && filter_var($_GET['parcelle'], FILTER_VALIDATE_INT))
{
		$parcelle = $_GET['parcelle'];

		$sql = 'select * from parcelles inner join potagers on potagers.potager_id = parcelles._potager_id where parcelles.parcelle_id='
            .$parcelle;

		$query = $bdd->prepare($sql);
		$query->execute();
		$potager = $query->fetch();
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

<main>
	<p>
		Etes vous sûr de vouloir rendre la parcelle numero <?= $potager['parcelle_numero'] ?> du jardin au <?= $potager['potager_adresse'] ?>
	</p>
	<a href="annul_reserv.php?parcelle=<?= $parcelle ?>">Oui</a>
	<a href="jardin_office.php">Non</a>
</main>

</body>
</html>
