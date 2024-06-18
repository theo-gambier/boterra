<?php
require_once ('../../connexion_bdd.php');

if (isset($_POST['nom']))
{
    $nom = filter_var($_POST['nom'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    $sql = 'insert into actions (action_nom) values ("' .$nom.'")';

    $query = $bdd->prepare($sql);
    $query->execute();
}

header('location:/admin/actions/action_office.php');