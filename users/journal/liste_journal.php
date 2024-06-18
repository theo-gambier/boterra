<?php
require_once '../../connexion_bdd.php';
session_start();

if (filter_var($_GET['parcelle_id'], FILTER_VALIDATE_INT))
{
	$parcelle = $_GET['parcelle_id'];

	$sql = 'select * from journaux 
         inner join actions on journaux._action_id=actions.action_id
         inner join plantations on journaux._plantation_id = plantations.plantation_id
         where _user_id=:user_id and _parcelle_id=:parcelle_id 
         order by journal_date desc ';

	$query = $bdd->prepare($sql);

	$query->bindParam(':user_id', $_SESSION['user_id']);
	$query->bindParam(':parcelle_id', $parcelle);

	$query->execute();

	$journaux = $query->fetchAll(PDO::FETCH_ASSOC);
}

?>
<!doctype html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<meta name="viewport"
	      content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/assets/pages/css/style.css">
    <link rel="stylesheet" href="/assets/pages/css/desktop.css"
    <script src="/assets/js/popupListe.js" defer></script>
	<title>Document</title>
</head>
<body>

<?php
    require_once '../../assets/pages/menu.php';
?>

<main id="mainAjoutJardin" class="fondv">

<section class="blockblanc sectionJournal">
	<article class="journalTitre">
		<h3>Date :</h3>
		<h4>Tâche :</h4>
		<h4>Légume :</h4>
	</article>
	<?php
	foreach ($journaux as $journal)
	{
		$date = date('d/m', $journal['journal_date']);
		?>
	<article class="" data-type="head">
        <div class="journalTitre">
            <h3><?= $date ?></h3>
            <h4><?= $journal['action_nom']?></h4>
            <h4><?= $journal['plantation_nom']?></h4>
        </div>
        <div class="journalButtons">
            <a class="boutonMain" href="modif_journal.php?journal_id=<?= $journal['journal_id'] ?>&parcelle_id=<?= $parcelle
            ?>"><p>Modifier</p></a>
            <div class="boutonMain" data-type="button"><p>Supprimer</p></div>
        </div>
        <div class="journalButtonsMasquer" data-type="content">
            <a class="boutonMain" href="supp_journal.php?journal=<?= $journal['journal_id'] ?>&parcelle=<?= $parcelle
            ?>"><p>Oui</p></a>
            <div class="boutonMain" data-type="retour"><p>Non</p></div>
        </div>
    </article>
	<?php
	}
	?>

	<article>
		<a href="ajout_journal.php?parcelle_id=<?= $parcelle ?>">
            <div class="boutonMain"><p>Ajouter un évènement</div>
            <div class="boutonMain"><p>Retour</p></div>
		</a>
	</article>

</section>

</main>
</body>
</html>
