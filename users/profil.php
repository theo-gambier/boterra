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
    require('../assets/pages/menu.php')
    ?>
        <main class="fondv">
            <div>
                <div class="hero heroco">
                    <h2 class="space"><strong>Mon profil</strong></h2>
                    <p>Un condensé de vos activité verte !</p>
                    <img style=" margin: 2vh 0 -1vh 0; width: 40%;" src="../assets/img/Perso-jardin.svg" alt="illustration d'une fille" class="perso">
                </div>
            </div>
            <div class="blockblanc">
 
                <div class="block1 column center acenter">
                    <a href="./jardin/jardin_office.php ">
                        <div class="navblock row">
                            <div class="center acenter"> <h3 style="color:white;">Mes jardins</h3> <img src="../assets/img/vegebowl.png" alt=""></div>
                        </div>
                    </a>
                    <a href="./parcelle/parcelle_office.php">
                        <div class="navblock row">
                            <div class="center acenter"> <h3 style="color:white;">Mes parcelles empruntées</h3><img src="../assets/img/vegebowl.png" alt=""></div>
                        </div>
                    </a>
                    <a href="mes_infos.php">
                        <div class="navblock row">
                            <div class="center acenter"><h3 style="color:white;">Mes informations</h3> <img src="../assets/img/vegebowl.png" alt=""></div>
                        </div>
                    </a>
                </div>
            </div>

        </main>
    <?php
        require_once '../assets/pages/footer.php'
    ?>
    </body>
</html>
