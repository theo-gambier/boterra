<?php
require_once ('../../connexion_bdd.php');

if (isset($_GET['id']) and filter_var($_GET['id'], FILTER_VALIDATE_INT))
{
    $id = $_GET['id'];

    $sql = 'select * from potagers where potager_id='.$id;

    $query = $bdd->prepare($sql);
    $query->execute();
    $jardin = $query->fetch();

    $sql = 'delete from potagers where potager_id='.$id;

    $query = $bdd->prepare($sql);
    $query->execute();

    $sql = 'delete from parcelles where _potager_id='.$id;

    $query = $bdd->prepare($sql);
    $query->execute();

    $retour = 'Suppression éffectué avec succès';
}else{
    $retour = 'Un problème est survenu, veuillez réessayer ultérieurement.';
    $erreur = 1;
}

header('location:jardin_office.php');

