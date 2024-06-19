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
require_once('../assets/pages/menu.php')
?>
<main class="fondo formulaireCoInsDesktop">
            <div>
                <div class="hero heroco">
                    <h2 class="space"><strong>Inscrivez vous!</strong></h2>
                   
                    <img src="/assets/img/P3.svg" alt="illustration d'une fille" class="perso">
 
                </div>
            </div>
            <div class="blockblanc">
                <div class="formulaire">
                    <form action="verif_inscription.php" method="post" enctype="multipart/form-data" class="column space between">
                       <div class="infocase column">
                        <label for="photo">Photo de profil :</label>
                        <input id="photo" type="file" name="user_photo">
                       </div>
                        <div class="infocase column">
                        <label for="pseudo">Pseudo</label>
                        <input id="pseudo" type="text" name="user_pseudo">
                        </div>
                        <div class="infocase column">
                        <label for="mail">Mail</label>
                        <input id="mail" type="email" name="user_mail">
                        </div>
                        <div class="infocase column">
                        <label for="password">Mot de passe</label>
                        <input id="password" type="password" name="user_password">
                        </div>
                        <div class="infocase column">
                        <label for="passwordConf">Confirmez votre mot de passe</label>
                        <input id="passwordConf" type="password" name="conf_password">
                        </div>

                        <input type="submit" placeholder="Inscription" class="boutonMain">
                    </form>
                </div>
            </div>

</main>

<?php
    require_once '../assets/pages/footer.php'
?>

</body>
</html>
