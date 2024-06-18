<?php
require_once ('../../connexion_bdd.php');
session_start();

$erreur = 0;
$retour = '';

if (isset($_POST['potager_adresse']) && isset($_POST['potager_ville']) && isset($_POST['potager_nb_parcelle'])) {
	$adresse = $_POST['potager_adresse'];
	$ville = filter_var($_POST['potager_ville'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);

	if (filter_var($_POST['potager_nb_parcelle'], FILTER_VALIDATE_INT)) {
		$nbParcelles = filter_var($_POST['potager_nb_parcelle'], FILTER_VALIDATE_INT);
	} else {
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

		if (isset($_FILES['potager_photo']) && $erreur == 0){
			$imageType=$_FILES["potager_photo"]["type"];

			if ( ($imageType != "image/png") && ($imageType != "image/jpg") && ($imageType != "image/jpeg") ) {
				$retour .= 'L\'image n\'est pas dans le bon format, les formats accepté sont png et jpg. ';
				$erreur++;
			}else{
				$nouvelleImage = date("Y_m_d_H_i_s") . "---" . $_FILES['potager_photo']['name'];
				if (is_uploaded_file($_FILES["potager_photo"]["tmp_name"])) {
					if (!move_uploaded_file($_FILES["potager_photo"]["tmp_name"], '../../assets/img/upload/' .
						$nouvelleImage)) {
						$retour .= 'Problème avec la sauvegarde de l\'image, désolé.';
					} else {
						$sql = 'insert into potagers (potager_adresse, potager_longitude, potager_latitude, potager_nb_parcelle, _user_id, potager_photo) values ("' . $adresseComplete . '", "' . $longitude . '", "' . $latitude . '",' . $nbParcelles . ', ' . $_SESSION['user_id'] . ', "'. $nouvelleImage.'")';
					}
				} else {
					$retour .= 'Problème : image non chargée.';
					$erreur++;
				}
			}
		}else{
			$sql = 'insert into potagers (potager_adresse, potager_longitude, potager_latitude, potager_nb_parcelle, _user_id) values ("' . $adresseComplete . '", "' . $longitude . '", "' . $latitude . '",' . $nbParcelles . ', ' . $_SESSION['user_id'] . ')';
		}

		$query = $bdd->prepare($sql);
		$query->execute();

		$sql = 'select potager_id from potagers where potager_adresse="' . $adresseComplete . '"';

		$query = $bdd->prepare($sql);
		$query->execute();
		$potager = $query->fetch();

		for ($parcelle = 1; $parcelle <= $nbParcelles; $parcelle++) {
			$sql = 'insert into parcelles (parcelle_statut, parcelle_numero, _user_id, _potager_id) values (0, '.
				$parcelle . ', ' . -1 . ', ' . $potager['potager_id'] . ')';

			$query = $bdd->prepare($sql);
			$query->execute();
		}
	}
}

header('location:/users/jardin/jardin_office.php');


