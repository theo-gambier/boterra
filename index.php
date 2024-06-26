<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/assets/pages/css/style.css">
    <link rel="stylesheet" href="/assets/pages/css/desktop.css">
    <link rel="icon" href="assets/img/favicon.ico">
    <title>Boterra</title>

</head>
<body style="background: rgb(0,176,68);
background: linear-gradient(90deg, rgba(0,176,68,1) 0%, rgba(0,255,134,1) 100%);">
<?php
	require_once('assets/pages/menu.php')
?>

<div class="hero row center acenter column">
        <img src="assets/img/logo-pc.svg" alt="">
        <p class="heracc" style="color:white;"><strong>Jardinons partout, ensemble</strong></p>
        <img src="/assets/img/fleche-bas.svg" alt="" class="arrow-home">
</div>

<main>


    <div class="blockblanc">
        <div class="block1 column center acenter main-garden">
            <a href="">
                <div class="navblock row">
                    <div class="center acenter"><h2>NOS JARDINS</h2> <img src="assets/img/vege2.svg" alt=""></div>
                </div>
            </a>
            <a href="">
                <div class="navblock row">
                    <div class="center acenter"><h2>NOS CULTURES</h2> <img src="assets/img/vegebowl.png" alt=""></div>
                </div>
            </a>
            <a href="">
                <div class="navblock row">
                    <div class="center acenter"><h2>OÙ PRATIQUER</h2> <img src="assets/img/vege3.svg" alt=""></div>
                </div>
            </a>
        </div>
        <div class="block2">
            <div class="space center row why-title"><p>Pourquoi nous choisir ?</p> </div>
            <div class="row space-between wrap">
                <div class="qualitec center acenter why-card">
                    <p>Convivialité</p>
                </div>
                <div class="qualitec center acenter why-card">
                    <p>Partage</p>
                </div>
                <div class="qualitec center acenter why-card">
                    <p>Qualité</p>
                </div>
                <div class="qualitec center acenter why-card">
                    <p>Apprendre</p>
                </div>
            </div>
        </div>
        <div class="block3 space">
            <div class="space center row how-title"><p>Comment nous rejoindre ?</p></div>
            <div class="column how-container">
                <div class="etape row nowrap ">
                    <div class="casepaire column center acenter">
                        <div class="chiffre row center acenter">1</div>
                        <p><strong>S'INSCRIRE</strong></p>
                    </div>
                    <div class="casevide1 desktopIgnore ">
                        <img src="assets/img/Arrow-7.svg" alt="flèche">
                    </div>
                </div>
                <div class="etape row nowrap">
                    <div class="casevide2 desktopIgnore ">
                        <img src="assets/img/Arrow-4.svg" alt="flèche">
                    </div>
                    <div class="caseimpaire column center acenter">
                        <div class="chiffre row center acenter">2</div>
                        <p><strong>SE CONNECTER</strong></p>
                    </div>
                </div>
                <div class="etape row nowrap">
                    <div class="casepaire column center acenter">
                        <div class="chiffre row center acenter">3</div>
                        <p><strong>VOIR LES JARDINS </strong></p>
                    </div>
                    <div class="casevide1 desktopIgnore ">
                        <img src="assets/img/Arrow-7.svg" alt="flèche">
                    </div>
                </div>
                <div class="etape row nowrap">
                    <div class="casevide2 desktopIgnore ">
                        <img src="assets/img/Arrow-4.svg" alt="flèche">
                    </div>
                    <div class="caseimpaire column center acenter">
                        <div class="chiffre row center acenter">5</div>
                        <p><strong>RDV SUR PLACE</strong></p>
                    </div>
                </div>
                <div class="etape row nowrap">
                    <div class="casepaire column center acenter">
                        <div class="chiffre row center acenter">6</div>
                        <p><strong>A VOTRE<br> TOUR</strong></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="block4">
            <h2 class="space call-title"><strong>Rejoignez nous<br>dès maintenant !</strong></h2>
            <a href="users/inscription.php"><div class="boutoninsc"><h2>INSCRIPTION</h2></a></div>
        </div>
    </div>
    <?php
        require_once 'assets/pages/footer.php'
    ?>
 
</main>
</body>
</html>