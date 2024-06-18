<?php
session_start();

require_once('../connexion_bdd.php');

$erreur = 0;
$retour = "";

if (isset($_POST['user_pseudo']) and isset($_POST['user_mail']) and isset($_POST['user_password']) and isset($_POST['conf_password']))
{
    $mail = filter_var($_POST['user_mail'], FILTER_SANITIZE_EMAIL);
    $pseudo = filter_var($_POST['user_pseudo'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    if (filter_var($mail, FILTER_VALIDATE_EMAIL))
    {
        $validateMail = filter_var($mail, FILTER_VALIDATE_EMAIL);
    }else{
        $erreur++;
        $retour .= 'Veillez rentrer une adresse mail valide.';
    }

    if ($erreur === 0)
    {   
        if ($_POST['user_password'] === $_POST['conf_password'])
        {
            $password = password_hash($_POST['user_password'], PASSWORD_DEFAULT);

	        if (isset($_FILES['user_photo']) && $erreur == 0){
		        $imageType=$_FILES["user_photo"]["type"];

		        if ( ($imageType != "image/png") && ($imageType != "image/jpg") && ($imageType != "image/jpeg") ) {
			        $retour .= 'L\'image n\'est pas dans le bon format, les formats accepté sont png et jpg. ';
			        $erreur++;
		        }else{
			        $nouvelleImage = date("Y_m_d_H_i_s") . "---" . $_FILES['user_photo']['name'];
			        if (is_uploaded_file($_FILES["user_photo"]["tmp_name"])) {
				        if (!move_uploaded_file($_FILES["user_photo"]["tmp_name"], '../assets/img/upload/' .
					        $nouvelleImage)) {
					        $retour .= 'Problème avec la sauvegarde de l\'image, désolé.';
				        } else {
					        $sql = 'insert into users (user_pseudo, user_mail, user_password, user_photo) values ("'
						        .$pseudo.'", "'.$mail.'", "'.$password.'", "'. $nouvelleImage .'")';
				        }
			        } else {
				        $retour .= 'Problème : image non chargée.';
				        $erreur++;
			        }
		        }
	        }else{
		        $sql = 'insert into users (user_pseudo, user_mail, user_password) values ("'.$pseudo.'", "'.$mail.'", "'.$password.'")';
	        }

	        $request = $bdd->prepare($sql);
	        $request->execute();

        }else{
            $erreur++;
            $retour = 'Mots de passe différents, réessayez';
        }
    }

    if ($erreur === 0 )
    {
        $_SESSION['user_pseudo'] = $pseudo;
		$_SESSION['user_photo'] = $nouvelleImage;
        var_dump($nouvelleImage);
        header('location:../index.php');
    }else{
        $_SESSION['retourInscription'] = $retour;
        header('location:/users/inscription.php');
    }
}else{
	header('location:/users/inscription.php');
}

