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
	<?php $mail = $_SESSION['mail']; ?>
	<!--Corps du site-->
	<div id="mid" class="container">
		<div class="row">
			<div class="col-md-9">
				<br>
				<br>
				<br>
				<br>
				<br><h4 id="com">Modifier mes informations</h4>
				<div id="profil" class="row">
					<div class="col-md-2">
						<br>
					</div>
					<div id="com" class="col-md-10"><br><br>
						<form method="post">
                            <p id="connect">
                            <?php
                                if(!empty($_POST)){
                                    if(isset($_SESSION['nom'])){
                                        include("connexion.php");
                                        if(isset($_POST["form1"])){
                                            if($_POST['mail']!=$mail){
                                                $id=$_SESSION['id_user'];
                                                $mail=$_POST['mail'];
                                                mysqli_query($cn,"UPDATE user SET addresse_mail='$mail' where id_user='$id' ");
                                                echo '<strong>Adresse mail modifiée</strong><br><br>';
												$_SESSION['mail']=$mail;
                                            }
                                        }
                                    }
                                }
                                ?>
                                Adresse mail:<br>
                                <input type="email" name="mail" value="<?php echo $mail ?>"/><br><br>
                                <input class="btn btn-outline-light" type="submit" name="form1" value="modifier" />
                            </p>
                        </form>
                        <form method="post" >
                            <p id="connect"><br>
                            
                                Votre mot de passe:<br>
                                <input name="amdp" type="password" required/><br><br>
                                
                                Nouveau mot de passe:<br>
                                <input name="mdp" type="password" required/><br><br>

                                Comfirmer le mot de passe:<br>
                                <input name="cmdp" type="password" required/><br><br>
                                <input class="btn btn-outline-light" type="submit" name="form2" value="Modifier" />
                            <?php
                            if(!empty($_POST)){
                                if(isset($_SESSION['nom'])){
                                    if(isset($_POST["form2"])){
                                        if(md5($_POST['amdp'])==$_SESSION['mdp'] && $_POST['mdp']==$_POST['cmdp']){
                                            $id=$_SESSION['id_user'];
                                            $mdp=md5($_POST['mdp']);
                                            mysqli_query($cn,"UPDATE user SET Mdp='$mdp' WHERE id_user=$id");
                                            echo '<strong>Mot de passe modifié</strong><br>';
                                        }elseif($_POST['amdp']!=$_SESSION['mdp']){
                                            echo '<strong>Mauvais mot de passe</strong><br>  ';
                                        }elseif($_POST['mdp']!=$_POST['cmdp']){
                                            echo '<strong>Nouveau mot de passe et confirmation non identiques</strong><br>';
                                        }
                                    }
                                    if(isset($_POST['supp_cpt'])){
                                        $id=$_SESSION['id_user'];
										$res=mysqli_query($cn,"SELECT * from comments where id_user ='$id'");
										mysqli_query($cn,"DELETE FROM rep WHERE id_user='$id'");
										while($data=mysqli_fetch_assoc($res)){
										$id_com=$data['id_com'];
										mysqli_query($cn,"DELETE FROM rep WHERE id_com='$id_com'");
										}
										mysqli_query($cn,"DELETE from comments where id_user ='$id'");
                                        mysqli_query($cn,"DELETE FROM user WHERE id_user='$id'");
                                        include("logout.php");
                                    }
                                }
                                             
                            }
                            ?>
                            </p></form><form method="post"> 
                            <p id="envoyer"><input class="btn btn-outline-light" type="submit" name="supp_cpt" value="Supprimer mon compte" /><p></form>
                        <br>
					</div>
				</div><br><br>
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
					<img id="logo" src="images/Logo_discord.png" width="25" height="25" margin-right=1em><a href="https://discord.gg/hvhHvUMev3"> Discord</a></div>  
			</div>
		</div>
	</footer>
	</body>
</html>
