<?php
require_once ('../../connexion_bdd.php');
session_start();

$erreur = 0;
$retour = '';

if (isset($_POST['potager_adresse']) and isset($_POST['potager_nb_parcelle']))
{
    if (filter_var($_POST['potager_nb_parcelle']))
    {
        $nbParcelles = $_POST['potager_nb_parcelle'];
    }else{
        $erreur++;
        $retour = 'Veuillez rentrer un nombre entier de parcelles';
    }

    $id = $_SESSION['idModifJardin'];


    if ($erreur === 0) {
        $adresseComplete = filter_var($_POST['potager_adresse'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);

        $adresseCompleteURL = urlencode($adresseComplete);
        $url = "https://nominatim.openstreetmap.org/search?q={$adresseCompleteURL}&format=json&addressdetails=1&limit=1";

        $opts = [
            "http" => [
                "header" => "User-Agent: PHP-Geocoding-App"
            ]
        ];
        $context = stream_context_create($opts);
        $response = file_get_contents($url, false, $context);
        $response = json_decode($response, true);

        if (!empty($response)) {
            $latitude = $response[0]['lat'];
            $longitude = $response[0]['lon'];
            $point = ['latitude' => $latitude, 'longitude' => $longitude];
        } else {
            $latitude = '';
            $longitude = '';
            $point = [];
        }

        $sql = 'update potagers set potager_adresse = "'.$adresseComplete.'", potager_longitude = "'.$longitude.'", potager_latitude = "'.$latitude.'", potager_nb_parcelle ='.$nbParcelles.' where potager_id='.$id;

        $query = $bdd->prepare($sql);
        $query->execute();
    }
}else{
    $erreur++;
    $retour .= 'Veuillez renseigner l\'adresse et le nombre de parcelles';
}

if ($erreur === 0)
{
    $_SESSION['retourModif'] = 'Modification éffectué avec succès';
    header('location:jardin_office.php');
}else{
    $_SESSION['retourAjout'] = $retour;
    header('location:modif_jardin.php');
}



