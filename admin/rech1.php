<?php
session_start();
include("connect.php");
$i=$_SESSION['id'];
$sq="select * from etudiant WHERE id='$i' ";

$re=mysqli_query($connect,$sq);


	$ro=mysqli_fetch_assoc($re);

?>
<!DOCTYPE html>
<html>
<head>
	<title>Mini projet CRUD et Bootstrap</title>
	<meta charset="utf-8">
</head>
<body>

<header>
<div class="container"> 
<div class="row"> 
<div class="col-md-9 "> 

<h1>
<span class="glyphicon glyphicon-star"></span>
<a href="index2.php"><?php echo $ro['nom']." ".$ro['prenom']?></a>
<br>
<small>Niveau / Spécialité / Groupe</small>
</h1>
</div>
<div class="col-md-3 "> 
<a href="">Telecharger mon CV</a><br>
<?php

if(!empty($ro['photo']))
{
?>
<img src="photos/<?php echo $ro['photo']?>""  height="100" style="position: absolute;left:70%; top: 30%;" class="img-circle">
<?php
}
else 
echo "<img src='photos/profil.png'  height='100' style='position: absolute;left:70%; top: 30%;' >";

?>
<!--<img src="photos/profil.png"  height="100" style="position: absolute;left:70%; top: 30%;" >-->

</div>
</div>
<div class="row"> 
<div class="col-md-10 col-md-offset-1"> 
<nav class="navbar"> 
<ul class="nav nav-tabs nav-justified" role="tablist"> 
<li><a href="index2.php">Accueil</a></li> 
<li><a href="cv/cv.html" target="blank">Mon CV</a></li>
<li><a href="">Mon Projet</a></li>
<li><a href="mailto:rouis.istls@gmail.com">Contact</a></li>
</ul>
</nav>
</div>
</div>
</div>
</header>








	<?php





	$rech=$_POST['rech'];
include"connect.php";
?>

<?php


if(isset($_SESSION['email']) and isset($_SESSION['password']) )
{
	?>
<!DOCTYPE html>
<html>
<head>
	<title>Consultation</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="style.css">
</head>
<body>


<div class="container-fluid">
	<br>
	<div class="row">
		<div class="col-md-10">
			<div class="panel panel-primary">
				<div class="panel-heading">
					<h4>Consultation</h4>
					
				</div>
				<div class="panel-body">
					<div class="col-md-12">




	
<table border="1" align="center" class="table table-condensed table-responsive">
	<tr style="align-self: center;">
		<th align="center">Matricule</th>
		<th align="center">Nom</th>
		<th>Prénom</th>
		<th>adresse</th>
		<th>Date de naissance</th>
		<th>Email</th>
		<th>Mot de Passe</th>
		<th>Option</th>
		<th>Suppression Multiple</th>
	</tr>
<?php

include("connect.php");

$sql="select * from etudiant";

$res=mysqli_query($connect,$sql);

if(mysqli_num_rows($res))
	while($row=mysqli_fetch_assoc($res))
	{
		$_SESSION['mat']=$row['matricule'];
?>
<tr align="center">
	<td><?php echo$row['matricule'] ?></td>
	<td><?php echo$row['nom'] ?></td>
	<td><?php echo$row['prenom'] ?></td>
	<td><?php echo$row['adresse'] ?></td>
	<td><?php echo$row['date_naissance'] ?></td>
	<td><?php echo$row['email'] ?></td>
	<td><?php echo$row['password'] ?></td>
	<td>
		<a href="edit.php?id=<?php echo $row['id']?>&mat=<?php echo $row['matricule'] ?>"><button type="button" class="btn btn-default">Modif</button></a>
		<a href="supp.php?id=<?php echo $row['id'] ?>"><button type="button" class="btn btn-default">Supprim</button></a>
	</td>
	<td>
		<form action="supp3.php" method="post">
		<input type="checkbox" name="supp[]" value="<?php echo $row['id'] ?>">

	</td>
</tr>


<?php 
}
else
{
?>
<tr>
	<td colspan="8">Pas de données disponible</td>
	<td></td>
</tr>
<?php
}
?>
<tr align="center">
	<td colspan="8"></td>
	<td><input type="submit" value="Suppression" class="btn btn-default"></td>
</form>
</tr>
</table>


						
					</div>

									
				</div>
				
					
			</div>
			<div class="panel panel-primary">
					<div class="panel-heading">
						<h4>Recherche Etudiant</h4>
					</div>
					<div class="panel-body">
						<div class="col-md-3" align="left">
							<img src="img/rechh.jpg" class="img-responsive" style="width: 150px;">
						</div>
						<div class="col-md-9" >
							<form action="rech1.php" method="post" class="form-inline" style="margin-left: 120px;">
	<input type="text" name="rech" placeholder="Tapez n'importe quelle information" size="25" class="form-control">
	<input type="submit" value="Rechercher" class="btn btn-default">
	
</form>
						</div>
						<!--<div class="col-md-12" align="center">--><br><br>
<?php
$sql="SELECT * from etudiant where matricule like '%$rech%' or nom like '%$rech%' or prenom like '%$rech%' or adresse like '%$rech%' or date_naissance like '%$rech%' or email like '%$rech%' or password like '%$rech%' ";
//$sql="SELECT * from etudiant where nom like '_$rech%' ";
$res=mysqli_query($connect,$sql);

?>

<table border="1" class="table table-striped" >
	<tr>
		<th>
			Matricule
		</th>
		<th>
			Nom
		</th>
		<th>
			Prénom
		</th>
		<th>
			Adresse
		</th>
		<th>
			Date de naissance
		</th>
		<th>
			Email
		</th>
		<th>
			Mot de Passe
		</th>
		
	</tr>
	<?php
if(mysqli_num_rows($res)>0)
{
	
while ($row=mysqli_fetch_assoc($res)) {

	
	?>
	<tr align="center" >
	<td>

		<?php echo $row['matricule'] ;?>
	</td>
	<td>
		<?php echo $row['nom'] ;?>
	</td>
	<td>
		<?php echo $row['prenom'] ;?>
	</td>
	<td>
		<?php echo $row['adresse'] ;?>
	</td>
	<td>
		<?php echo $row['date_naissance'] ;?>
	</td>
	<td>
		<?php echo $row['email'] ;?>
	</td>
	<td>
		<?php echo $row['password'] ;?>
	</td>
</tr>
<?php
}
}
else
{

?>
<tr>
	<td colspan="7" align="center"> Pas d'information trouvée</td>
</tr>
<?php
}

?>
</table>




						<!--</div>  <!-- fermeture div-->
						
					</div>
					
			</div>
				
			
			

		</div> <!--fermeture col md 9-->
		<div class="col-md-2">
			<div class="panel panel-primary">
				<div class="panel-heading">
					<h4>Bienvenue</h4>
				</div>
				<div class="panel-body" align="center">
					<b> <?php /*$tab=explode("@",$_SESSION['email']);*/ echo "<font color='red'>".$ro['nom']." ".$ro['prenom']; ?></b></font>
					<br><b><small>Cliquez Ici pour se déconnecter</small></b>
					<a href="auttemp.php"><button type="button" class="btn btn-danger">Se déconnecter</button></a>
				</div>
				
			</div>
			
			<div class="panel panel-primary">
				<div class="panel-heading">
					<h4>Ajout Etudiant</h4>
					
				</div>
				<div class="panel-body" align="center">
					<b><small>Cliquez Ici pour Ajouter un Etudiant</small></b>

					<a href="ajout.php"><button type="button" class="btn btn-danger">Ajout Etudiant</button></a>	
				</div>
				
			</div>
		</div>
		
	</div>

	
</div>

















<?php
//include "rech1.php";
}
else
{
echo "<b>Vous n'êtes pas autorisé à accéder à cette page !!!!<br><br>";
echo "<a href='index.php'><button type='button'>S'autentifier</button></a>";
}

?>

</table>

<footer>
	<div class="container" style="text-align: center;">
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<hr>
<a href="">Informations</a> -
<a href="">Mentions Legales</a> -
<a href="mailto:rouis.istls@gmail.com">Contact</a>
<br>
<p>(c) TP CRUD Simple-2020 Conception et réalisation par <?php echo $ro['nom']." ".$ro['prenom']?>. Tous droits réservés.</p>
				
			</div>
			
		</div>
		
	</div>
</footer>
</body>
</html>



