<?php
session_start();
if(isset($_SESSION['mail']) and isset($_SESSION['mdp'])){
	include('connexion.php');
}
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
				<br><br>
				<p id ="titre">Si ça c'est pas de la phrase qui accroche !</p>
				<br><br><br>
				<p id="ecrivez">Postez un message !</p>
				<div class="row">
					<div class="col-md-2">
						<p id="amis"><img src="C:\xampp\htdocs\Projet\imgnoir.png" width="100" height="100" margin-right=1em></p>
					</div>
					<div class="col-md-10">
						<form action="" method="post">
							<textarea name="postemsg"" rows="4" cols="80"></textarea>
							<br>
							<p id="envoyer"><input type="submit" value="Poster" /></p>
						</form>
						<?php
						if(isset($_POST["Poster"])){
							$id=$_SESSION["id_user"];
							$msg=$_POST["postemsg"];
							$date=date("Y-m-d");
							$heure=date("H:i");
							$req1=mysqli_query($cn,"insert into comments values (NULL,'$msg','$date','$heure','$id')");
						}
						?>
					</div>
				</div>
			</div>
			<div id="colD" class="col-md-3"><br><br><p id="lienD"><a id="lien" href="">Profil</a><img id="logo" src="C:\xampp\htdocs\Projet\imgnoir.png" width="50" height="50" margin-right=1em></p>
				<br><br>
				<img id="logo" src="C:\xampp\htdocs\Projet\imgnoir.png" width="50" height="50" margin-right=1em><a id="lien" href="">Je poste</a>
				<br><br>
				<p id="lienD"><a id="lien" href="">Profil</a><img id="logo" src="C:\xampp\htdocs\Projet\imgnoir.png" width="50" height="50" margin-right=1em></p>
				<br><br>
				<img id="logo" src="C:\xampp\htdocs\Projet\imgnoir.png" width="50" height="50" margin-right=1em><a id="lien" href="">Annonces</a>
				<p id="et">&</p>
				<p id="lienD"><a id="lien" href="">Evènements</a><img id="logo" src="C:\xampp\htdocs\Projet\imgnoir.png" width="50" height="50" margin-right=1em></p>
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
						<li>jacquesvercucque@orange.fr</a></li>
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
					<img id="logo" src="C:\xampp\htdocs\Projet\imgnoir.png" width="25" height="25" margin-right=1em><a href=""></a><a href="">Instagram</a>
					<br><br>
					<i class="fa-brands fa-instagram"></i><a href=""></a><a href="">Discord</a></div> 
			</div>
		</div>
	</footer>
	</body>
</html>
