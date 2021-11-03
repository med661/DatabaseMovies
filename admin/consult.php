<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Mini projet CRUD et Bootstrap</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="style.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<link rel="stylesheet" href="../style/site.css">

</head>
<body>
<ul class="nav-links">

<li><a href="admin.php?action=add">add a product</a></li>
<li><a href="admin.php?action=modifyanddelete_category">modifie a product / delete</a><br><br></li>
<li><a href="admin.php?action=add_category">ajouter une category</a></li>
<li><a href="admin.php?action=modifyanddelete_category">deleate and modifie category</a></li>
<li><a href="consult.php">users</a></li>
</ul>










<?php
$connect= new mysqli("127.0.0.1","root","","ec");
?>






<section>
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
	</td>
	<td>
		<form action="supp3.php" method="post" >
		<input type="checkbox" name="supp[]" value="<?php echo $row['id'] ?>" class="btn btn-default">

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
		
			

		
				
					
				
	

</div>
</section>
<footer>
	<div class="container" style="text-align: center;">
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<hr>
<a href="">Informations</a> -
<a href="">Mentions Legales</a> -
<a href="mailto:rouis.istls@gmail.com">Contact</a>
<br>
				
			</div>
			
		</div>
		
	</div>
</footer>
















		</div>
		</div>
		
	</div>

	
</div>
</section>

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

</body>
</html>