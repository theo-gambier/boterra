<?php
require_once ('../../connexion_bdd.php');
session_start();

if (isset($_POST['parcelle_id']) && filter_var($_POST['parcelle_id'], FILTER_VALIDATE_INT))
{
	$parcelleId = $_POST['parcelle_id'];


	$sql = 'update parcelles 
			set parcelle_statut=1, _user_id='. $_SESSION['user_id'] .'  
			where parcelle_id='.$parcelleId;

	$query = $bdd->prepare($sql);
	$query->execute();

	header('location:parcelle_office.php');
}else{
	header('location:reserv_parcelle.php');
}
