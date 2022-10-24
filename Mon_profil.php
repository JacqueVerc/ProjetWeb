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
  </head>

  <body id="fond">
	<!--Barre de recherche-->
	<nav class="navbar navbar-expand">
  	<a class="navbar-brand"><img id="logo" src="imgnoir.png" width="40" height="40" margin-right=1em>  Climb 2gether</a>
  	<ul class="navbar-nav mr-auto">
  	  <li class="nav-item">
  	    <a class="nav-link" href="Site.php">Accueil</a>
  	  </li>
  	  <li class="nav-item">
   	   <a class="nav-link" href="Je_rechercher.php">Je recherche</a>
  	  </li>
   	 <li class="nav-item">
   	   <a class="nav-link" href="Je_poste.php">Je poste</a>
  	  </li>
		<?php
	if(isset($_SESSION["nom"])){
			echo ' <li class="nav-item"><a class="nav-link" href="logout.php">Deconexion</a></li>';
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
			<div class="col-md-9">
				<br>
				<br>
				<br>
				<br>
				<br><h4>Mon profil</h4>
				<div id="profil" class="row">
					<div class="col-md-2">
						<br>
						<p id="pp"><img id="pp" src="imgnoir.png" width="90" height="90" margin-right=1em></p>
					</div>
					<div class="col-md-10">
						<hr>
						Nom: <?php echo $_SESSION["nom"];	 ?><br>
						Prenom: <?php echo $_SESSION["prenom"];	 ?><br>
						Age: <?php echo $_SESSION["age"];	 ?><br><br>
						Adresse mail: <?php echo $_SESSION["mail"];	 ?><br><br>
						Salle fréquentée: <?php echo $_SESSION["salle"];	 ?><br>
						Niveau: <?php echo $_SESSION["niveau"];	 ?><br><hr>
					</div>
				</div>
				<p id="infos"><p id="envoyer"><input type="submit" value="Modifier mes informations" /></p></p>
			</div>
			<div id="colD" class="col-md-3"><br><br>
				<p id="lienD"><a id="lien" href="Mon_profil.php">Profil</a><img id="logo" src="imgnoir.png" width="50" height="50" margin-right=1em></p>
				<br><br>
				<p id="lienG"><img id="logo" src="imgnoir.png" width="50" height="50" margin-right=1em><a id="lien" href="Je_poste.php">Je poste</a></p>
				<br><br>
				<p id="lienD"><a id="lien" href="Je_recherche.php">Je recherche</a><img id="logo" src="imgnoir.png" width="50" height="50" margin-right=1em></p>
				<br><br>
				<p id="lienG"><img id="logo" src="imgnoir.png" width="50" height="50" margin-right=1em><a id="lien" href="Annonces_&_evenements.php">Annonces</a></p>
				<p id="et">&</p>
				<p id="lienD"><a id="lien" href="Annonces_&_evenements.php">Evènements</a><img id="logo" src="imgnoir.png" width="50" height="50" margin-right=1em></p>
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
					<img id="logo" src="imgnoir.png" width="25" height="25" margin-right=1em><a href=""></a><a href="">Instagram</a>
					<br><br>
					<i class="fa-brands fa-instagram"></i><a href=""></a><a href="">Discord</a></div> 
			</div>
		</div>
	</footer>
	</body>
</html>
