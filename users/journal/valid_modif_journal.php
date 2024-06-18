<?php
require_once '../../connexion_bdd.php';
session_start();

if (filter_var($_POST['journal_action'], FILTER_VALIDATE_INT) && filter_var($_POST['journal_plante'],
		FILTER_VALIDATE_INT) && filter_var($_POST['parcelle_id'], FILTER_VALIDATE_INT) && filter_var($_POST['journal_id'], FILTER_VALIDATE_INT))
{
	$parcelleId = $_POST['parcelle_id'];
	$action = $_POST['journal_action'];
	$plante = $_POST['journal_plante'];
	$journalId = $_POST['journal_id'];

	if ($_POST['journal_date'] == ''){
		$date = time();
	}else{
		$date = strtotime($_POST['journal_date']);
	}

	$sql = 'update journaux set journal_date=:date, _plantation_id=:plantation, _action_id=:action where journal_id=:journal';

	$query = $bdd->prepare($sql);

	$query->bindParam(':date', $date);
	$query->bindParam(':action', $action);
	$query->bindParam(':plantation', $plante);
	$query->bindParam(':journal', $journalId);

	$query->execute();
}

header('location:liste_journal.php?parcelle_id='. $parcelleId);
