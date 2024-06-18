<?php
require_once '../../connexion_bdd.php';

if (filter_var($_GET['journal'], FILTER_VALIDATE_INT))
{
	$sql = 'delete from journaux where journal_id=:journal';

	$query = $bdd->prepare($sql);

	$query->bindParam(':journal', $_GET['journal']);

	$query->execute();
}

header('location: liste_journal.php?parcelle_id='. $_GET['parcelle']);