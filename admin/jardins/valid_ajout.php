<?php
session_start();
require_once ('../../connexion_bdd.php');

$erreur = 0;
$retour = '';

if (isset($_POST['potager_adresse']) and isset($_POST['potager_nb_parcelle']) and isset($_POST['potager_ville']))
{
    $adresse = filter_var($_POST['potager_adresse'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $ville = filter_var($_POST['potager_ville'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    if (filter_var($_POST['potager_nb_parcelle'], FILTER_VALIDATE_INT))
    {
        $nbParcelles = filter_var($_POST['potager_nb_parcelle'], FILTER_VALIDATE_INT);
    }else{
        $erreur++;
        $retour = 'Veuillez rentrer un nombre entier';
    }

    if ($erreur === 0) {
        $adresseComplete = $adresse . ' ' . $ville;

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

	    $sql = 'insert into potagers (potager_adresse, potager_longitude, potager_latitude, potager_nb_parcelle, _user_id) values ("'.$adresseComplete.'", "'.$longitude.'", "'.$latitude.'",'.$nbParcelles.', '. -1 .')';

	    $query = $bdd->prepare($sql);
	    $query->execute();

	    $sql = 'select potager_id from potagers where potager_adresse="'. $adresseComplete.'"';

	    $query = $bdd->prepare($sql);
	    $query->execute();
	    $potager = $query->fetch();

	    for ($parcelle = 1; $parcelle <= $nbParcelles; $parcelle++)
	    {
		    $sql = 'insert into parcelles (parcelle_statut, parcelle_numero, _user_id, _potager_id) values (0, '. $parcelle .', -1, '. $potager['potager_id'].')';

		    $query = $bdd->prepare($sql);
		    $query ->execute();
	    }
    }
}else{
    $erreur++;
    $retour .= 'Veuillez renseigner l\'adresse et le nombre de parcelles';
}

if ($erreur === 0)
{
    $_SESSION['retourAjout'] = 'Ajout éffectué avec succès';
    header('location:jardin_office.php');
}else{
    $_SESSION['retourAjout'] = $retour;
    header('location:ajouter_jardin.php');
}
