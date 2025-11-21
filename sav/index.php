<?php 
include_once 'include/main.inc.php';
/**
 * Connexion de l'utilisateur
 */
if($_POST['BEnvoyer'] && $_POST['sav_utilisateur_login'] != '' && $_POST['sav_utilisateur_mdp'] != '') {
	
	// Formatage des données reèues
	$login = trim($_POST['sav_utilisateur_login']);
	$pwd = trim($_POST['sav_utilisateur_mdp']);

	//$bdd = new PDO('mysql:host=dg298513-001.privatesql;dbname=pi_finale;charset=utf8;port=35189', 'pi_user_finale', 'Mdmd2018');
	//$bdd = new PDO('mysql:host=localhost;dbname=sav;charset=utf8', 'root', 'T9trXfww');	
	$bdd = new PDO('mysql:host=192.168.0.3;dbname=priximbattfr;charset=utf8;port=3306', 'priximbattfr', 'hu9wL5yB8YH4');

	// SELECT
	$query = "SELECT * FROM sav_utilisateur
						WHERE sav_utilisateur_login = ? 
						AND sav_utilisateur_mdp = ?";
	$query_prepare = $bdd->prepare($query);
	$query_prepare->execute(array($login,$pwd));
	$item = $query_prepare->fetchAll();
	$_SESSION['user'] = $item[0];

	$nb = count($item);
	if ($nb == 1) {
			header( "Location:listing_sav.php");
	}else{
		$parametres['msg'] = "Erreur lors de la connexion";
	}

} // fin login
?>
<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Gestion SAV</title>
	<style>
	body{
		padding:0px;
	}
	.titre{
		padding:10px;
		background-color:red; color:#FFF; font-family:Arial;font-size:17p;text-transform:uppercase;
	}
	</style>
  </head>
  <body class="login">
  <h1 class="titre">GESTION DES SAV</h1>
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>

      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
            <form method="POST">
              <h1>Connectez-vous</h1>
              <div>
                <input name="sav_utilisateur_login" type="text" class="form-control" placeholder="Utilisateur" required="" />
              </div>
              <div>
                <input name="sav_utilisateur_mdp" type="password" class="form-control" placeholder="Mot de passe" required=""/>
              </div>
              <div>
			   <input type="hidden" id="BEnvoyer" name="BEnvoyer" value="BEnvoyer"/>

                 <button id="send" type="submit" class="btn btn-default submit">Connexion</button>
				<!--<a class="btn btn-default submit" href="tableau_bord.php">Connexion</a>-->
                
              </div>

              <div class="clearfix"></div>

              <div class="separator">
               

                <div class="clearfix"></div>
                <br />

                <div>
                   <h1></h1>
                  <p>©<?php echo(date("Y"));?> Priximbattable.net</p>
                </div>
              </div>
            </form>
          </section>
        </div>

       
      </div>
    </div>
  </body>
</html>
