<?php
require_once ('../../../connexion_bdd.php');

if (isset($_GET['jardin']) && isset($_GET['parcelle']))
{
    if (filter_var($_GET['jardin'], FILTER_VALIDATE_INT) && filter_var($_GET['parcelle'], FILTER_VALIDATE_INT))
    {
        $jardin = $_GET['jardin'];
        $parcelle = $_GET['parcelle'];

        $sql = 'update parcelles set parcelle_statut=0, _user_id=-1 where _potager_id='.$jardin.' and parcelle_id='.$parcelle;

        $query = $bdd->prepare($sql);
        $query->execute();
    }
}

header('location:/admin/jardins/parcelles/parcelle_office.php?id='.$jardin);

