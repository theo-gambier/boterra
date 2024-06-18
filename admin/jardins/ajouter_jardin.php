<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="/assets/pages/css/admin.css">

    <title>Document</title>
</head>
<body>

<main>

    <h1>Ajouter un jardin</h1>

<form action="valid_ajout.php" method="post" id="formulaire" enctype="multipart/form-data">
    <div cl>

    </div>
    <div class="containerLabelInput">
        <label for="adresse">Adresse :</label>
        <input id="adresse" type="text" name="potager_adresse">
    </div>
    <div class="containerLabelInput">
        <label for="ville">Ville :</label>
        <input id="ville" type="text" name="potager_ville">
    </div>
    <div class="containerLabelInput">
        <label for="nb_parcelles">Nombre de parcelles :</label>
        <input id="nb_parcelles" type="number" name="potager_nb_parcelle">
    </div>
    <div id="containerLinks">
        <a href="jardin_office.php">Retour</a>
        <input type="submit">
    </div>
</form>

</main>

</body>
</html>