<!DOCTYPE html>
<html lang="fr">

  <head>
  	<link rel="stylesheet" href="site.css">
    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Climb 2gether</title>
    <!-- CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" />
    <link rel="stylesheet" href="../css/styles.css"/>
    <!-- JavaScripts -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
  </head>

  <body id="fond">
	<!--Barre de recherche-->
	<nav class="navbar navbar-expand">
  	<a class="navbar-brand"><img id="logo" src="C:\Users\33682\Documents\Univ\Dev.Web\Projet_Web\imgnoir.png" width="40" height="40" margin-right=1em>  Climb 2gether</a>
  	<ul class="navbar-nav mr-auto">
  	  <li class="nav-item">
  	    <a class="nav-link" href="file:///C:/xampp/htdocs/Projet/Site.php">Accueil</a>
  	  </li>
  	  <li class="nav-item">
   	   <a class="nav-link" href="">Je recherche</a>
  	  </li>
   	 <li class="nav-item">
   	   <a class="nav-link" href="poster.php">Je poste</a>
  	  </li>
		<?php
	if(isset($_SESSION["nom"])){
			echo ' <li class="nav-item"><a href="logout.php">Deconexion</a></li>';
		}else echo '<li class="nav-item"><a class="nav-link" href="Je_me_connecte.php">Je me connecte</a></li>'
	?>
 	 </ul>
 	 <div>
 	 	Messages
   	 <a href="utilisateur.php" class="btn btn-outline-dark"><i class="fas fa-shopping-cart"></i>
   	 </a>
 	 </div>
	</nav> 
	
	<!--Corps du site-->
	<div id="mid" class="container">
		<div class="row">
			<div id="mid" class="col-md-9">
                <br><br><br>
                <h4>Je me connecte</h4>
				<form id="profil" method="post" action="Je_me_connecte.php">
                    <p id="connect"><br>
                        Mail:<br>
                        <input name="mail" type="email"/><br><br>
                        Mot de passe:<br>
                        <input name="mdp" type="password"/><br>
                        <p id="envoyer"><input type="submit" name="Me connecter"/></p>
                    </p><hr>
					<?php
					include("connexion.php");
					if(isset($_POST['Me connecter'])){
						$email=$_POST['mail'];
						$mdp=md5($_POST['mdp']);
						$res=mysqli_query($cn,'SELECT addresse_mail,Mdp FROM user WHERE addresse_mail="'.$mail.'" and Mdp="'.$mdp.'"');
						if (mysqli_fetch_array($res)==FALSE){ echo "Mot de passe ou email incorrects";}
						else{
							$data=mysqli_fetch_assoc($res);
							$_SESSION['id_user']=$data['id_user'];
							$_SESSION['nom']=$data['Nom'];
							$_SESSION['prenom']=$data['Prenom'];
							$_SESSION['mail']=$data['adresse_mail'];
							$_SESSION['mdp']=$data['Mdp'];
							header("location:Site.php");
						}
					}
					?>
                </form>
                <h5>Pas de compte?<a href="Je_m'inscris.php">  Inscrivez-vous !</a></h5>
			</div>

            <!--Colonne de droite-->
			<div id="colD" class="col-md-3"><br><br><p id="lienD"><a id="lien" href="" target="_blank">Profil</a><img id="logo" src="C:\Users\33682\Documents\Univ\Dev.Web\Projet_Web\imgnoir.png" width="50" height="50" margin-right=1em></p>
				<br><br>
				<p id="lienG"><img id="logo" src="C:\Users\33682\Documents\Univ\Dev.Web\Projet_Web\imgnoir.png" width="50" height="50" margin-right=1em><a id="lien"href="">Je poste</a></p>
				<br><br>
				<p id="lienD"><a id="lien" href="">Je recherche</a><img id="logo" src="C:\Users\33682\Documents\Univ\Dev.Web\Projet_Web\imgnoir.png" width="50" height="50" margin-right=1em></p>
				<br><br>
				<p id="lienG"><img id="logo" src="C:\Users\33682\Documents\Univ\Dev.Web\Projet_Web\imgnoir.png" width="50" height="50" margin-right=1em><a id="lien" href="">Annonces</a></p>
				<p id="et">&</p>
				<p id="lienD"><a id="lien" href="">Evènements</a><img id="logo" src="C:\Users\33682\Documents\Univ\Dev.Web\Projet_Web\imgnoir.png" width="50" height="50" margin-right=1em></p>
			</div>
		</div>
	</div>

	<!--Pied de page-->
	<footer>
		<div class="container">
			<div class="row">
				<div class="col-md-4">
					<h5>VERCUCQUE JACQUES</h5>
					<ul>
						<li>jacquesvercucque@orange.fr</li>
						<li>Tel: 06 06 06 06 06</li>
						<li>L2 Sorbonne université</li>
					</ul>
				</div>
				<div class="col-md-5">
					<h4>Haut de page</h4>
					<l>
						<li><a id="lien" href="utilisateur.php">Je m'identifie</a></li>
						<li><a id="lien" href="poster.php">Je poste</a></li>
						<li><a id="lien" href="">Je recherche</a></li>
					</l>
				</div>
				<div id="colD" class="col-md-3">
					<br>
					<img id="logo" src="C:\Users\33682\Documents\Univ\Dev.Web\Projet_Web\imgnoir.png" width="25" height="25" margin-right=1em><a href=""></a><a href="">Instagram</a>
					<br><br>
					<i class="fa-brands fa-instagram"></i><a href=""></a><a href="">Discord</a></div> 
			</div>
		</div>
	</footer>
	</body>
</html>
