
<!DOCTYPE html>
<html>
<head>
	<title>Modification</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="style.css">
	<link rel="stylesheet" href="../style/site.css">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
</head>
<body>
<br>
<ul class="nav-links">

<li><a href="admin.php">add a product</a></li>
<li><a href="admin.php?action=modifyanddelete_category">modifie a product / delete</a><br><br></li>
<li><a href="admin.php">ajouter une category</a></li>
<li><a href="admin.php">deleate and modifie category</a></li>
<li><a href="consult.php">users</a></li>
</ul>

<div class="container" align="center">

<?php
session_start();

//if(isset($_SESSION['email']) and isset($_SESSION['password']) )
//{
	//print_r($_GET);

$id=$_GET['id'];
$_SESSION['mat']=$_GET['mat'];
//echo $_SESSION['mat'];
$connect= new mysqli("127.0.0.1","root","","ec");

$sql="SELECT * from etudiant where id = '$id' ";

$res=mysqli_query($connect,$sql);

$row=mysqli_fetch_assoc($res);
?>

			<div class="panel-group" style="width: 600px;">
    <div class="panel panel-primary">
      <div class="panel-heading"> <span style="font-size: 2em;font-family: Times New Roman;">MISE A JOUR</span></b></div>
      <div class="panel-body">
      	<div class="media">
  <div class="media-left media-top">
    <img src="img/update2.jpg" class="media-object"  >
  </div>
  <div class="media-body">

<form action="edit2.php" method="post">
	<table border="1" align="center" class="table table-striped">
		<tr>
			<th>ID</th>
			<td><input type="text" name="id" value="<?php echo$row['id'] ?>" readonly></td>
		</tr>

		<tr>
			<th>Matricule</th>
			<td><input type="text" name="matricule" value="<?php echo $row['matricule'] ?>"></td>
		</tr>

		<tr>
			<th>Nom</th>
			<td><input type="text" name="nom" value="<?php echo $row['nom'] ?>"></td>
		</tr>

		<tr>
			<th>Prénom</th>
			<td><input type="text" name="prenom" value="<?php echo $row['prenom'] ?>"></td>
		</tr>

		<tr>
			<th>Adresse</th>
			<td><input type="text" name="adresse" value="<?php echo $row['adresse'] ?>"></td>
		</tr>

		<tr>
			<th>Date de naissance</th>
			<td><input type="text" name="date" value="<?php echo $row['date_naissance'] ?>"></td>
		</tr>

		<tr>
			<th>Email</th>
			<td><input type="text" name="email" value="<?php echo $row['email'] ?>"></td>
		</tr>

		<tr>
			<th>Mot de passe</th>
			<td><input type="text" name="password" value="<?php echo $row['password'] ?>"></td>
		</tr>
		
		<tr>
			<td colspan="2" align="center"> <input type="submit" value="mettre à jour" class="btn btn-default">
<a href="consult.php"><button type="button" class="btn btn-default">Annuler</button></a>
			</td>
		</tr>

	</table>

</form>
</div>
</div>
<?php
//}
//else
//{
/*echo "
<br>
<div class='alert alert-danger'>
  <strong>Danger!</strong> Vous n'êtes pas autorisé à accéder à cette page !!!!.
</div>
<b>";
echo "<a href='index.php'><button type='button' class='btn btn-default'>S'autentifier</button></a>";
}*/

?>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>
</html>




