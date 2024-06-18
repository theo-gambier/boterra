<?php
require_once ('../../connexion_bdd.php');
session_start();

$sql = 'select * from parcelles 
    inner join potagers on potagers.potager_id = parcelles._potager_id 
    inner join users on users.user_id = parcelles._user_id
    where parcelles._user_id='. $_SESSION['user_id']. ' and parcelles.parcelle_statut = 2
	order by potagers.potager_adresse asc, parcelles.parcelle_numero asc';

$query = $bdd->prepare($sql);
$query->execute();
$parcelles = $query->fetchAll(PDO::FETCH_ASSOC);
?>
<!doctype html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<meta name="viewport"
	      content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">

 
    <link rel="stylesheet" href="/assets/pages/css/style.css">
 
    <script src="/assets/js/popup.js" defer></script>
	<title>Document</title>
</head>
<body>
 
<?php
        require('../../assets/pages/menu.php')
    ?>
<main class="fondo">
<div>
                <div class="hero heroco">
					<h2>Gestion de vos parcelles</h2>
                    <img style=" margin: 2vh -4vh -1vh 0; width: 40%;" src="/assets/img/P6.svg" alt="illustration d'une fille" class="perso">
                </div>
            </div>
<div class="blockblanc">

   
 

<section id="containerData">
	<?php
	if (count($parcelles) == 0)
	{
		?>
		<article class="articleData">
			<h3>
				Vous n'avez pas encore de parcelle confirmée, <a href="../jardin/liste_jardin.php">réservez-en une</a>
			</h3>
		</article>

	<?php
	}else{
		foreach ($parcelles as $parcelle)
		{
			?>
			<article class="articleData" data-type="head">

                <img src="/assets/img/upload/<?= $parcelle['potager_photo'] ?>" alt="photo du jardin au <?= $parcelle['potager_adresse'] ?>">
                <h3><?= $parcelle['potager_adresse'] ?></h3>
                <p>parcelle numéro <?= $parcelle['parcelle_numero'] ?></p>
                <p>Propriétaire : <?= $parcelle['user_pseudo'] ?></p>

                    <div class="containerLinks">
                        <button data-type="button">Annuler</button>
                        <a href="../journal/liste_journal.php?parcelle_id=<?= $parcelle['parcelle_id'] ?>">Journal</a>
                    </div>

			    <div class="masquer" data-type="content">
                    <div class="containerPopup">
                        <p>
                            Etes vous sûr de vouloir rendre la parcelle numero <?= $parcelle['parcelle_numero'] ?> du jardin au
                            <?= $parcelle['potager_adresse'] ?>
                        </p>
                        <div id="containerLinks">
                            <button data-type="retour">Non</button>
                            <a href="annul_reserv.php?parcelle=<?= $parcelle['parcelle_id'] ?>">Oui</a>
                        </div>
                    </div>
                </div>
            </article>
	<?php
		}
	}
	?>

	<article class="containerLinks">
        <a href="../profil.php">Retour</a>
		<a href="../jardin/liste_jardin.php">Réserver une parcelle</a>
	</article>

</section>
 
</div>
 
</main>

</body>
</html>
