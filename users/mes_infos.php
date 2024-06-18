<?php
require_once ('../connexion_bdd.php');
session_start();

$sql = 'select * from users where user_id='. $_SESSION['user_id'];

$query= $bdd->prepare($sql);
$query->execute();
$user= $query->fetch(PDO::FETCH_ASSOC);
?>
<!doctype html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<meta name="viewport"
	      content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" href="../assets/pages/css/style.css">
	<title>Document</title>
</head>
<body>
<?php
    require_once '../assets/pages/menu.php';
?>

<main id="mainAjoutJardin" class="fondv">

<section class="blockblanc containerMesInfo">
	<article class="articleMesInfo">
		<h3>Pseudo : </h3>
		<p><?= $user['user_pseudo'] ?></p>
	</article>
	<article class="articleMesInfo">
		<h3>Mail : </h3>
        <p><?= $user['user_mail'] ?></p>
	</article>
	<article></article>


	<article class="journalButtons">
        <a class="boutonMain" href="/users/profil.php">
            <p>
                Retour
            </p>
        </a>
		<a class="boutonMain" href="modif_profil.php">
			<p>Modifier mes informations</p>
		</a>

	</article>
</section>

</main>

</body>
</html>
