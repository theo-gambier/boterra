<?php
require_once ('../../connexion_bdd.php');

if (isset($_GET['action']) && filter_var($_GET['action'], FILTER_VALIDATE_INT))
{
    $id = $_GET['action'];

    $sql = 'delete from actions where action_id='.$id;

    $query = $bdd->prepare($sql);
    $query->execute();
}

header('location:/admin/actions/action_office.php');
