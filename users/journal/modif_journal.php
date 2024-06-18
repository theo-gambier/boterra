<?php
require_once '../../connexion_bdd.php';
session_start();

if (isset($_GET['parcelle_id']) && filter_var($_GET['parcelle_id'], FILTER_VALIDATE_INT) && isset
	($_GET['journal_id']) && filter_var($_GET['journal_id'], FILTER_VALIDATE_INT))
{
	$parcelleId = $_GET['parcelle_id'];
	$journalId = $_GET['journal_id'];

	$sql = 'select * from journaux where journal_id='. $journalId;

	$query = $bdd->prepare($sql);
	$query->execute();
	$journal = $query->fetch(PDO::FETCH_ASSOC);

	$sql = 'select * from plantations';

	$query = $bdd->prepare($sql);
	$query->execute();
	$plantations = $query->fetchAll(PDO::FETCH_ASSOC);

	$sql = 'select * from actions';

	$query = $bdd->prepare($sql);
	$query->execute();
	$actions = $query->fetchAll(PDO::FETCH_ASSOC);

	$date = date('Y-m-d', $journal['journal_date']);
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
	<title>Document</title>
</head>
<body>

<main id="mainAjoutJardin" class="fondv">

<form action="valid_modif_journal.php" method="post" class="blockblanc formAjout">
	<input type="hidden" value="<?= $parcelleId ?>" name="parcelle_id">
    <input type="hidden" value="<?= $journalId ?>" name="journal_id">
	<label for="date">Date :</label>
	<input id="date" type="date" name="journal_date" value="<?= $date ?>">
	<label for="action">Tâche :</label>
	<select id="action" name="journal_action">
		<?php
		foreach ($actions as $action){
			?>
			<option value="<?=$action['action_id']?>" <?= ($action['action_id'] == $journal['_action_id']) ? 'selected' : '' ?>><?=$action['action_nom']?></option>
			<?php
		}
		?>
	</select>
	<label for="plante">Légume :</label>
	<select id="plante" name="journal_plante">
		<?php
		foreach ($plantations as $plantation){
			?>
			<option value="<?=$plantation['plantation_id']?>" <?= ($plantation['plantation_id'] == $journal['_plantation_id']) ? 'selected' : ''?>><?=$plantation['plantation_nom']?></option>
			<?php
		}
		?>
	</select>
    <div class="journalButtons">
        <a class="boutonMain" href="liste_journal.php?parcelle_id=<?= $parcelleId ?>"><p>Retour</p></a>
	<input class="boutonMain" type="submit">
    </div>
</form>

</main>

</body>
</html>

