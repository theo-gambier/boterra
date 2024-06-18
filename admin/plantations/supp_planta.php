<?php
require_once ('../../connexion_bdd.php');

if (isset($_GET['planta']) && filter_var($_GET['planta'], FILTER_VALIDATE_INT))
{
    $id = $_GET['planta'];

    $sql = 'delete from plantations where plantations.plantation_id='.$id;

    $query = $bdd->prepare($sql);
    $query->execute();
}

header('location:/admin/plantations/plantation_office.php');
