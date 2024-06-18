<?php
require_once '../../connexion_bdd.php';
session_start();

if (filter_var($_POST['journal_action'], FILTER_VALIDATE_INT) && filter_var($_POST['journal_plante'],
		FILTER_VALIDATE_INT) && filter_var($_POST['parcelle_id'], FILTER_VALIDATE_INT))
{
	$parcelleId = $_POST['parcelle_id'];
	$action = $_POST['journal_action'];
	$plante = $_POST['journal_plante'];

	if ($_POST['journal_date'] == ''){
		$date = time();
	}else{
		$date = strtotime($_POST['journal_date']);
	}

	$sql = 'insert into journaux (journal_date, _user_id, _action_id, _parcelle_id, _plantation_id) VALUES (:date, :userId, :action, :parcelle, :plantation)';

	$query = $bdd->prepare($sql);

	$query->bindParam(':date', $date);
	$query->bindParam('userId', $_SESSION['user_id']);
	$query->bindParam(':action', $action);
	$query->bindParam(':parcelle', $parcelleId);
	$query->bindParam(':plantation', $plante);

	$query->execute();
}

header('location:liste_journal.php?parcelle_id='. $parcelleId);

