<?php
require_once ('../../connexion_bdd.php');

if (isset($_GET['jardin']))
{
	if (filter_var($_GET['jardin'], FILTER_VALIDATE_INT))
	{
		$jardin = $_GET['jardin'];

		$sql = 'select potager_adresse from potagers where potager_id='.$jardin;

		$query = $bdd->prepare($sql);
		$query->execute();
		$potager = $query->fetch();
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
	<title>Document</title>
</head>
<body>

<main>
	<p>
		Etes vous sûr de vouloir supprimer le jardin au <?= $potager['potager_adresse'] ?>
	</p>
	<a href="supp_jardin.php?id=<?= $jardin ?>">Oui</a>
	<a href="jardin_office.php">Non</a>
</main>

</body>
</html>
