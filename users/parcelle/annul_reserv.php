<?php
require_once ('../../connexion_bdd.php');

if (isset($_GET['parcelle']) && filter_var($_GET['parcelle']))
{
	$parcelleId = $_GET['parcelle'];

	$sql = 'update parcelles set _user_id=-1, parcelle_statut=0 where parcelle_id='.$parcelleId;

	$query = $bdd->prepare($sql);
	$query->execute();
}

header('location:parcelle_office.php');