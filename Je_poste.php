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
	<!--Police-->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Oswald&family=Roboto:wght@400;700&display=swap" rel="stylesheet">
	<!--Materialize-->
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  </head>

  <body id="fond3">
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
				<?php if(!isset($_SESSION["nom"])){
					echo "<br><br><br>
					<p id='mot1'>Vous n'êtes pas connecté...<br><br>Connectez-vous pour poster votre message!</p>";
				}
				?>
				<br><br>
				<p id="ecrivez">Postez un message !</p>
				<div class="row">
					<div class="col-md-2">
						<p id="amis"><img src="images/imgnoir.png" width="100" height="100" margin-right=1em></p>
					</div>
					<div class="col-md-10">
						<form action="" method="post">
							<textarea name="postemsg" rows="4" cols="80"></textarea>
							<br>
							<p id="envoyer"><input type="submit" name="Submit" value="Poster" /></p>
						</form>
						<?php
						include("connexion.php");
						if(isset($_POST["Submit"])){
							$id=$_SESSION["id_user"];
							$msg=$_POST["postemsg"];
							$date=date("Y-m-d");
							$heure=date("H:i");
							mysqli_query($cn,"insert into comments values (NULL,'$msg','$date','$heure','$id')");
						}
						
						?><p id="mini-titre">Mes messages :</p><br>
					</div>
					<?php 
					if(isset($_SESSION["nom"])){
						$nb=0;
						if(isset($_POST['supp_com'])){
							$id=$_POST['id_com'];
							mysqli_query($cn,"DELETE FROM comments WHERE id_com='$id'");
						}
						$res=mysqli_query($cn,"SELECT * from user,comments where user.id_user=comments.id_user order by id_com desc ");
						while($data=mysqli_fetch_assoc($res)){
							if($_SESSION['id_user']==$data['id_user']){
							echo '<div id="com" class="col-md-2">
								<img src="images/'.$data['id_user'].'.jpg" class="photo" width="50px" height="50px">';
							echo $data['Nom'];
							echo '<br>'.$data['Prenom'].'</div>';
							echo '<div id="com" class="col-md-10">Posté le : '.$data['date'];
							echo ' à '.$data['heure'];
							echo '<form method="post"><input type="hidden" name="id_com" value="'.$data['id_com'].'"></input>';
							echo '<br>'.$data['contenu'].'<p id="envoyer"><a class="btn btn-outline-light"  href="Modifier_msg.php?id='.$data['id_com'].'">Modifier</a>   
								<input type="submit" class="btn btn-secondary" name="supp_com" value="Supprimer"></input>
								<p id="envoyer"><a class="btn btn-outline-light"  href="Réponses_postes.php?id='.$data['id_com'].'">Acceder au fil de réponses</a></p></p></form></div>' ;
							$nb=$nb+1;	
							}
							if($nb==0){
								echo "<p id='mini-titre'>Vous n'avez posté aucun message</p>";
								$nb=$nb+1;
							}
						}
					}else{
						echo "<p id='mini-titre'>Vous n'avez posté aucun message</p>";
					}
					?><br>
				</div><hr>
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
						<li>jacquesvercucque@orange.fr</a></li>
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
					<img id="logo" src="images/Logo_discord.png" width="25" height="25" margin-right=1em><a href="https://discord.gg/hvhHvUMev3"> Discord</a></div>
			</div>
		</div>
	</footer>
	</body>
</html>
