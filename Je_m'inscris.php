<?php
session_start();
?>

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
	<!--Police-->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Oswald&family=Roboto:wght@400;700&display=swap" rel="stylesheet">
	<!--Materialize-->
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  </head>

  <body id="fond4">
	<!--Barre de recherche-->
	<nav id="Haut" class="navbar navbar-expand">
  	<a class="navbar-brand"><img id="logo" src="images/imgnoir.png" width="40" height="40" margin-right=1em>  Climb 2gether</a>
  	<ul class="navbar-nav mr-auto">
  	  	<li class="nav-item">
  	  		<a class="nav-link" href="Site.php">Accueil</a>
  	 	</li>
  	  	<li class="nav-item">
   	  		<a class="nav-link" href="Je_recherche.php">Je recherche</a>
  	  	</li>
   	 	<li class="nav-item">
   	  		<a class="nav-link" href="Je_poste.php">Je poste</a>
		</li>		
	
 	 </ul>
 	 <div>
	  <?php
	if(isset($_SESSION["nom"])){
			echo ' <a class="nav-link" href="logout.php">Déconnexion <button class="btn"><i class="medium material-icons">logout</i></button></a>';
		}else echo '<a class="nav-link" href="Je_me_connecte.php">Connexion<button class="btn"><i class="medium material-icons">login</i></button></a>'
	?>
 	 </div>
	</nav> 
	
	<!--Corps du site-->
	<div id="mid" class="container">
		<div class="row">
			<div id="mid" class="col-md-9">
				<br><br><br>
                <h4>Je m'inscris</h4>
				<form id="profil" method="post" action="Je_m'inscris.php">
                    <p id="connect"><br>
                        Nom:<br>
                        <input name="nom" type="text" required/><br><br>
                        Prenom:<br>
                        <input name="prenom" type="text" required/><br><br>
                        Age:<br>
                        <input name="age" type="number" required/><br><br>
                        Mail:<br>
                        <input name="mail" type="email" required/><br><br>
                        Mot de passe:<br>
                        <input name="mdp" type="password" required/><br><br>
                        Comfirmez votre mot de passe:<br>
                        <input name="valmdp" type="password" required/><br><br>
                        Quelle salle fréquentez-vous? (facultatif)<br>
                        <input name="salle" type="text"/><br><br>
                        Quel est votre niveau?
                        <select name="niveau" required>
                            <option value="Débutant">Débutant</option>
                            <option value="S_améliore">Je m'améliore</option>
                            <option value="Confirmé">Confirmé</option>
                            <option value="Maître du mur">Maître du mur</option>
                        </select>
						
                        <p id="envoyer"><input type="submit" name="M'inscrire" value="M'inscrire" />
                    </p><hr>
					<?php
					include("connexion.php");
					if(isset($_POST["M'inscrire"])){
						$mail=$_POST['mail'];
						$q=mysqli_query($cn,'SELECT addresse_mail FROM user WHERE addresse_mail="'.$mail.'"')or die(mysql_error());
						if (mysqli_fetch_array($q)==FALSE){	
							$nom=$_POST['nom'];
							$prenom=$_POST['prenom'];
							$age=$_POST['age'];
							$mdp1=$_POST['mdp'];
							$mdp2=$_POST['valmdp'];
							$salle=$_POST['salle'];
							$niveau=$_POST['niveau'];
							if($mdp1==$mdp2){
								$mdp=md5($mdp1);
								mysqli_query($cn,"insert into user value ('','$nom','$prenom','$age','$mail','$mdp','$salle','$niveau')");
								
								$id=mysqli_insert_id($cn);
								
								echo '<h4>Inscription réussi !</h4>';
							}else echo 'Les mots de passe ne sont pas identiques';
							
						} else {	
							echo "<h4>email déjà utilisée :/</h4>";
						}
					}
					?>
                </form>

                <h5>Deja un compte?<a href="Je_me_connecte.php">  Connectez-vous !</a></h5>
                <br><br>
			</div>
			<div id="colD" class="col-md-3"><br><br>
                <p id="lienD"><?php
					if(isset($_SESSION['nom'])){
							echo '<a id="lienD" href="Mon_profil.php">Mon profil   </a>';}
						else{echo '<a id="lienD" href="Je_me_connecte.php">Mon profil   </a>';}
					?><i class="medium material-icons">person</i></p>
				<br><br>
				<p id="lienG"><a id="lienG" href="Je_poste.php"><i class="medium material-icons">edit</i>Je poste</a></p>
				<br><br>
				<p id="lienD"><a id="lienD" href="Je_recherche.php">Je recherche<i class="medium material-icons">search</i></a></p>
				<br><br>
				<p id="lienG"><a id="lienG" href="Annonces_&_evenements.php"><i class="medium material-icons">announcement</i>Annonces</a></p>
				<p id="et">&</p>
				<p id="lienD"><a id="lienD" href="Annonces_&_evenements.php">Evènements   <i class="medium material-icons">event</i></a></p>
			</div>
		</div>
	</div>

	<!--Pied de page-->
	<footer>
		<div class="container">
			<div class="row">
				<div class="col-md-4">
					<h5 id="liste">VERCUCQUE JACQUES</h5>
					<ul id="liste">
						<li>jacquesvercucque@orange.fr</li>
						<li>Tel: 06 06 06 06 06</li>
						<li>L2 Sorbonne université</li>
					</ul>
				</div>
				<div class="col-md-5">
					<h4><a id="lienD" href="#Haut">Haut de page</a></h4>
					<l id="liste">
						<li><a id="lienD" href="Je_poste.php">Je poste</a></li>
						<li><a id="lienD" href="Je_recherche.php">Je recherche</a></li>
						<li><?php 
						if(isset($_SESSION['nom'])){echo '<a id="lienD" href="logout.php">Déconnexion</a>';}
							else{echo '<a id="lienD" href="Je_me_connecte.php">Je me connecte</a>';}?></li>
					</l>
				</div>
				<div id="colD" class="col-md-3">
				<br>
					<img id="logo" src="images/Instagram_icon.png.webp" width="23" height="23" margin-right=1em><a href=""></a><a href="https://www.instagram.com/climb_2gether/">  Instagram</a>
					<br><br>
					<img id="logo" src="images/Logo_discord.png" width="25" height="25" margin-right=1em><a href=""></a><a href=""> Discord</a></div> 
			</div>
		</div>
	</footer>
	</body>
</html>