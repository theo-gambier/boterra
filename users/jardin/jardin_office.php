<?php
require_once ('../../connexion_bdd.php');
session_start();

$userId = $_SESSION['user_id'];

$sql = 'select * from potagers where _user_id='.$userId;

$query = $bdd->prepare($sql);
$query->execute();
$jardins = $query->fetchAll(PDO::FETCH_ASSOC);

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
<body style="background: rgb(0,176,68);
background: linear-gradient(90deg, rgba(0,176,68,1) 0%, rgba(0,255,134,1) 100%);">

<?php
require('../../assets/pages/menu.php')
?>
 
 
<main class="fondvio">
<div>
                <div class="hero heroco">
                    <h2 class="space"><strong>Mes jardins</strong></h2>
                     <img style=" margin: 2vh 0 -1vh 0; width: 40%;" src="/assets/img/P5.svg" alt="illustration d'une fille" class="perso">
                </div>
            </div>
<div class="blockblanc">
 

<h1>Mes jardins</h1>

<section id="containerData">
<?php
if (count($jardins) <= 0)
{
    ?>
    <article class="articleData">
        <p>
            Vous n'avez pas encore mis de jardin à disposition des autres utilisateurs, voulez-vous en ajouter un ?
        </p>
    </article>

<?php
}else{
    foreach ($jardins as $jardin){
    ?>
    <article class="articleData">
        <img src="/assets/img/upload/<?= $jardin['potager_photo'] ?>">
        <h3><?= $jardin['potager_adresse'] ?></h3>
        <p>Nombre de parcelles : <?= $jardin['potager_nb_parcelle'] ?></p>
        <div class="containerBoutonsJardinOffice">
            <a href="confirm_annul.php?jardin= <?= $jardin['potager_id'] ?>">Annuler</a>
            <a href="gestion_parcelles_jardin.php?jardin=<?= $jardin['potager_id'] ?>">Parcelles en attentes de confirmation</a>
        </div>
    </article>
    <?php
    }
}
?>
    <article class="containerLinks">
        <a class="boutonMain" href="../profil.php"><p>Retour</p></a>
        <a class="boutonMain" href="ajout_jardin.php"><p>Ajouter un jardin</p></a>
    </article>
</section>
 
</div>

</main>

<?php
    require_once '../../assets/pages/footer.php'
?>

</body>
</html>


