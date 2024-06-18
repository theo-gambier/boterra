<?php
require_once ('../../connexion_bdd.php');

if (isset($_POST['plantation_nom']) && isset($_POST['plantation_id']))
{
    $id = filter_var($_POST['plantation_id'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $id = intval($id);

    $nom = filter_var($_POST['plantation_nom'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    $sql = 'update plantations set plantation_nom="'.$nom.'" where plantation_id='.$id;

    $query = $bdd->prepare($sql);
    $query->execute();
}

header('location:/admin/plantations/plantation_office.php');

