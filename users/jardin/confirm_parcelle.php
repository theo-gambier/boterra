<?php
require_once '../../connexion_bdd.php';

if (filter_var($_GET['parcelle'], FILTER_VALIDATE_INT) && $_GET['parcelle'] !== '' & filter_var($_GET['jardin'],
		FILTER_VALIDATE_INT) && $_GET['jardin'] !== '')
{
	$parcelle = $_GET['parcelle'];
	$jardin = $_GET['jardin'];

	$sql = 'update parcelles set parcelle_statut=2 where parcelle_id=:parcelle';

	$query = $bdd->prepare($sql);

	$query->bindValue(':parcelle', $parcelle, PDO::PARAM_INT);

	$query->execute();
}

header('location:gestion_parcelles_jardin.php?jardin='. $jardin);
