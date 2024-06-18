<?php
require_once ('../../connexion_bdd.php');

if (isset($_POST['action_nom']) && isset($_POST['action_id']))
{
    $id = filter_var($_POST['action_id'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $id = intval($id);

    $nom = filter_var($_POST['action_nom'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    $sql = 'update actions set action_nom="'.$nom.'" where action_id='.$id;

    $query = $bdd->prepare($sql);
    $query->execute();

}

header('location:/admin/actions/action_office.php');

