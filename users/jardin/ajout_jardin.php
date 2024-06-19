<?php
require_once ('../../connexion_bdd.php');
session_start();

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

	<?php
	require_once '../../assets/pages/menu.php';
	?>

<form action="valid_ajout.php" method="post" enctype="multipart/form-data" class="blockblanc formAjout">
    <label for="photo">Photo du potager :</label>
    <input id="photo" type="file" name="potager_photo">
	<label for="adresse">Adresse :</label>
	<input id="adresse" type="text" name="potager_adresse">
	<label for="ville">Ville :</label>
	<input id="ville" type="text" name="potager_ville">
	<label for="nb_parcelles">Nombre de parcelles :</label>
	<input id="nb_parcelles" type="number" name="potager_nb_parcelle">

    <div class="articleGestionParcelles">
        <a class="boutonMain" href="liste_jardin.php"><p>Retour</p></a>
        <input type="submit" class="boutonMain">
    </div>
</form>
</main>

<?php
    require_once '../../assets/pages/footer.php'
?>

</body>
</html>