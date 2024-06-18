<?php
require_once ('../../../connexion_bdd.php');

if (isset($_GET['parcelle']) && filter_var($_GET['parcelle'], FILTER_VALIDATE_INT))
{
	$id = filter_var($_GET['id'], FILTER_VALIDATE_INT);

    $parcelleId = $_GET['parcelle'];

    $sql = 'update parcelles set parcelle_statut = 0 where parcelle_id='.$parcelleId;

    $query = $bdd->prepare($sql);
    $query->execute();
}

header('location:/admin/jardins/parcelles/parcelle_office.php?id='.$id);