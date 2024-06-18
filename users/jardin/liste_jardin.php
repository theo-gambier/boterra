<?php
require_once ('../../connexion_bdd.php');
session_start();

$sql = 'select potagers.potager_adresse, users.user_pseudo, potagers.potager_id, potagers._user_id, potagers.potager_nb_parcelle, potagers.potager_latitude, potagers.potager_longitude, potagers.potager_photo from potagers
		inner join users on users.user_id = potagers._user_id
        order by potager_adresse asc';

$query = $bdd->prepare($sql);
$query->execute();
$jardins = $query->fetchAll(PDO::FETCH_ASSOC);

foreach ($jardins as $jardin)
{
	$sql = 'select * from parcelles where parcelle_statut=0 and _potager_id='. $jardin['potager_id'];

	$query = $bdd->prepare($sql);
	$query->execute();
	$parcelles = $query->fetchAll(PDO::FETCH_ASSOC);

    $tabParcelles[$jardin['potager_id']] = $parcelles;
}
?>
<!doctype html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<meta name="viewport"
	      content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css">
    <link rel="stylesheet" href="https://unpkg.com/leaflet.markercluster@1.3.0/dist/MarkerCluster.css">
    <link rel="stylesheet" href="https://unpkg.com/leaflet.markercluster@1.3.0/dist/MarkerCluster.Default.css">
    <link rel="stylesheet" href="../../assets/pages/css/style.css">


    <script src="https://unpkg.com/leaflet/dist/leaflet.js" defer></script>
    <script src="https://unpkg.com/leaflet.markercluster@1.3.0/dist/leaflet.markercluster.js" defer></script>
    <script defer>
        let jardins = <?= json_encode($jardins) ?>;
        let parcelles = <?= json_encode($tabParcelles) ?>;
    </script>
    <script src="/assets/js/map.js" defer></script>
    <script src="/assets/js/popupListe.js" defer></script>
	<title>Document</title>
    <style>
        *{
            box-sizing: border-box;
        }

        body{
            margin: 0;
        }

        /* Taille de la carte */
        #mapid {
            width: 90%;
            height: 30%;
            margin: 10px auto;
        }

        /* Style du marqueur */
        .containerPin {
            display: flex;
            flex-direction: column;
            align-items: center;
            width: 70px;
            position: relative;
        }

        /* Image principale du marqueur */
        .imagePin{
            width: 50px;
            height: 50px;
        }

        /* Informations complémentaires du marqueur */
        #containerInfoPin{
            display: flex;
            justify-content: space-between;
            width: 100%;
            position: absolute;
            bottom: 0;
            padding: 0 5px;
        }

        .infoPin {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .infoPin img {
            width: 20px !important;
        }

        /* Style de la popup */
        .containerPopup{
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .containerStatut {
            width: 100%;
            text-align: center;
        }

        .containerBanking, .containerCapacity {
            display: flex;
            justify-content: space-between;
            width: 95%;
            margin: 5px 0;
        }

        .containerBanking .dataData, .containerCapacity .dataData {
            width: 45%;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .containerBanking .dataTitle, .containerCapacity .dataTitle {
            width: 45%;
            display: flex;
            justify-content: start;
            align-items: center;
        }

        footer {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 50px;
            width: 100vw;
            position: absolute;
            bottom: 0;
        }
    </style>
</head>
<body>
<?php
        require('../../assets/pages/menu.php')
    ?>
<main class="fondv">
<div>
                <div class="hero heroco">
                    <h2 class="space"><strong>Nos jardins</strong></h2>
                    <p>Découvrez nos jardins haut en couleur!</p>
                    <img style=" margin: 2vh 0 -1vh 0; width: 40%;" src="../../assets/img/Perso-jardin.svg" alt="illustration d'une fille" class="perso">
                </div>
            </div>
            <div class="blockblanc">
<section id="sectionCard">
	<?php
	foreach ($jardins as $jardin)
	{
        $sql = 'select * from parcelles where parcelle_statut=0 and _potager_id='. $jardin['potager_id'];

        $query = $bdd->prepare($sql);
        $query->execute();
        $parcelles = $query->fetchAll(PDO::FETCH_ASSOC);


	?>
	<article id="<?= $jardin['potager_id'] ?>" data-type="head" >
		<div class="imgDiv" style="background-image: url('../../assets/img/upload/<?= $jardin['potager_photo'] ?>');">
			<!-- <img src="/itinérant/sae202/assets/img/upload/<?= $jardin['potager_photo'] ?>" alt="photo du jardin au <?= $jardin['potager_adresse'] ?>"> -->
			
		</div>
		<div class="text">
            <h3><?= $jardin['potager_adresse'] ?></h3>
			<div class="infoJardin">
                <p> parcelle de <?= ($jardin['_user_id'] == -1) ? 'admin' : $jardin['user_pseudo'] ?></p>
                <p><?= $jardin['potager_nb_parcelle'] ?> parcelles</p>
            </div>


			<div class="boutonMain" data-type="button"><p>Réserver</p></div>
		</div>  
        <?php
		if (!isset($parcelles) or count($parcelles) == 0)
		{
			?>
            <div data-type="content" class="masquer">
                <p>
                    Vous arrivez trop tard, il n'y a plus de parcelle disponible dans ce jardin.
                </p>
            </div>
			<?php
		}else{
            ?>
            <div class="text masquer" data-type="content">
                <h3>Choisissez votre parcelle</h3>
                <form action="../parcelle/valid_reserv.php" method="post">
                    <label for="parcelle_id">Numéro de parcelle</label>
                    <select name="parcelle_id">
	                    <?php
	                    foreach ($parcelles as $parcelle)
	                    {
		                    ?>
                            <option value="<?= $parcelle['parcelle_id'] ?>">
                                <?= $parcelle['parcelle_numero'] ?>
                            </option>

		                    <?php
	                    }
	                    ?>
                    </select>
                    <input type="submit">
                </form>
            </div>
                <?php
		}
		?>
	</article>

	<?php
	}
	?>
</section>

<div id="mapid"></div>

</main>

</body>
</html>
