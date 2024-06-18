
<div class="nav center">
    <nav class="row center acenter space-around">
        <div id="maDiv"  class="">
            <a href="/users/contact.php">Contact</a>
            <a href="/admin/admin_office.php">Admin</a>
 
            <a href="/users/mentions.php" class="desktopIgnore">Mentions légales</a>
            <a href="/users/deconnexion.php">Déconnexion</a>
 
 
        </div>
        <a href="/index.php"><img src="/assets/img/home.svg" alt="pictogramme de l'accueil"></a>
        <?php

        if (session_status() !== PHP_SESSION_ACTIVE) {
	        session_start();
        }
        if (isset($_SESSION['user_pseudo']) && $_SESSION['user_pseudo'] !== '')
        {
            if (isset($_SESSION['user_photo']) && $_SESSION['user_photo'] !== '')
            {
	            ?>
                <a href="/users/profil.php"><img id="photoProfil" src="/assets/img/upload/<?= $_SESSION['user_photo']
                    ?>" alt="votre photo de profil"></a>
	            <?php
            }else{
            ?>
            <a href="/users/profil.php"><img id="photoProfil" src="/assets/img/perso.svg" alt="pictogramme de profil"></a>
        <?php
            }
        }else{
            ?>
            <a href="/users/connexion.php"><img id="photoProfil" src="/assets/img/perso.svg" alt="pictogramme de connexion"></a>
        <?php
        }
        ?>
        <a href="/users/jardin/liste_jardin.php"><img src="/assets/img/carrot.svg" alt="pictogramme du contact"></a>
        <!-- <a href="./users/contact.php"><img src="./assets/img/mail.svg" alt="pictogramme du contact"></a> -->
        <div id="monBouton"><img src="/assets/img/menu.svg" alt="pictogramme de menu"></div>


        <script>
            const bouton = document.getElementById('monBouton');
            const div = document.getElementById('maDiv');

            bouton.addEventListener('click', () => {
                div.classList.toggle('visible');
            });
        </script>
    </nav>
</div>