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

    <h1>Ajouter une action</h1>

<form action="valid_ajout.php" method="post" id="formulaire">
    <div class="containerLabelInput">
        <label for="nom">Nom</label>
        <input id="nom" type="text" name="nom">
    </div>
    <div id="containerLinks">
        <a href="action_office.php">Retour</a>
        <input type="submit" placeholder="Valider">
    </div>
</form>

</main>

</body>
</html>