<!doctype html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
            content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="../assets/pages/css/style.css">
 
        <link rel="stylesheet" href="../assets/pages/css/desktop.css">
        <title>Boterra</title>
    </head>
    <body style="background: rgb(0,176,68);
background: linear-gradient(90deg, rgba(0,176,68,1) 0%, rgba(0,255,134,1) 100%);">
    <?php
    require_once('../assets/pages/menu.php')
    ?>
        <main class="fondvio legumes formulaireCoInsDesktop">
 
 
            <div>
                <div class="hero heroco">
                    <h2 class="space"><strong>Connectez vous!</strong></h2>
                   
 
                    <img src="/assets/img/P1.svg" alt="illustration d'une fille" class="perso">
                </div>
            </div>
            <div class="blockblanc wide">
                <div class="formulaire">    
                    <form action="verif_connexion.php" method="post" class="column space between"   >
 
                        <div class="infocase column"> 
                            <label for="email">Email</label>
                            <input id="email" type="email" name="user_mail" class="inputcache">
                        </div>
                        <div class="infocase column"> 
                            <label for="password">Mot de passe</label>
                            <input id="password" type="password" name="user_password" class="inputcache">
                        </div>
                        <div class="pacommpte space">
                            <p>
                                <span>
                                    Pas encore de compte ? <a href="inscription.php">C'est par ici</a>
                                </span>
                            </p>
                        </div>
 
                        <input type="submit" placeholder="Connexion" class="boutonMain">
                    </form>
                </div>
            </div>

        </main>
        <?php
        require_once '../assets/pages/footer.php'
    ?>
 
        <script>
            document.querySelectorAll('.infocase').forEach(function(caseDiv) {
                caseDiv.addEventListener('click', function() {
                    var input = this.querySelector('.inputcache');
                    input.style.display = 'block';
                    input.focus();

                    input.addEventListener('blur', function() {
                        if (input.value === '') {
                            input.style.display = 'none';
                        }
                    });
                });
            });
        </script>
    </body>
</html>