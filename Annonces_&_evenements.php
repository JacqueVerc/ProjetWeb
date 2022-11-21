<?php
session_start();
?>

<!DOCTYPE html>
<html lang="fr">

  <head>
  	<link rel="stylesheet" href="Poste.css">
	  <link rel="stylesheet" href="site.css">
	  <link rel="stylesheet" href="Select.css">
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

  <body id="fond">
	<!--Barre de recherche-->
	<nav id="Haut" class="navbar navbar-expand">
  	<a class="navbar-brand"><img id="logo" src="images/icone_esc.jpg" width="40" height="40" margin-right=1em>  Climb 2gether</a>
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
			<div id="mid" class="col-md-9"><br><br>
			
			<?php
				include("connexion.php");
				if(isset($_SESSION['id_user']) && $_SESSION['id_user']==1){
					echo '<form method="post">
    					<div class="group">      
							<input id="custom" type="text" name="annonce" required>
							<span class="highlight"></span>
							<span class="bar"></span>
							<label id=#la>Ajouter une annonce</label>
							<p id="select"><select name="type">
								<option  value="Annonce">-- Annonce --</option>
								<option  value="Evênement">-- Evênement --</option></select></p>
    					</div>
						</form>';
					if(isset($_POST['annonce'])){
						$contenu=$_POST['annonce'];
						$id=$_SESSION['id_user'];
						$type=$_POST['type'];
						mysqli_query($cn,"INSERT INTO annonces VALUE ('', '$contenu', '$type','$id') ");
					}
					if(isset($_POST['Supprimer'])){
						$id=$_POST['id_an'];
						mysqli_query($cn,"DELETE FROM annonces WHERE id_an='$id' ");
					}
				}
				$res=mysqli_query($cn,"SELECT * FROM annonces where id_user=1 order by id_an DESC");
				echo '<ul id="liste">';
				while($data=mysqli_fetch_assoc($res)){
					echo $data['type'].':';
					echo '<li>'.$data['contenu'].'<br><br><br>';
					if(isset($_SESSION['id_user']) && $_SESSION['id_user']==1){
						echo '<form method="post" id="envoyer">
							<button class="btn btn-dark" type"submit" name="Supprimer" value="Supprimer">
								<i class="material-icons">delete</i>
							</button>
							<input type="hidden" name="id_an" value="'.$data['id_an'].'"></input>
						</form></p></li>';	
					}
				}

			?>
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
					<h4 id="liste"><a id="lienD" href="#Haut">Haut de page</a></h4>
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
					<img id="logo" src="images/Logo_discord.png" width="25" height="25" margin-right=1em><a href="https://discord.gg/hvhHvUMev3"></a><a href=""> Discord</a></div>
			</div>
		</div>
	</footer>
	</body>
</html>
