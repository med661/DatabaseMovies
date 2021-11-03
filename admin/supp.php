<?php

session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Suppression</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="style.css">
</head>
<body>
	<br>
<div class="container">

<?php
if(isset($_SESSION['email']) and isset($_SESSION['password']) )
{


$id=$_GET['id'];

echo "
<div class='alert alert-warning'>
  <strong>Info!</strong> Voulez vous vraiment supprimer cet etudiant.
</div>
";
echo "<a href='supp2.php?id=$id'><button type='button' class='btn btn-default'>Confirmer</button></a>";
echo "<a href='index2.php'><button type='button' class='btn btn-default'>Annuler</button></a>";
}
else
{
echo "
<br>
<div class='alert alert-danger'>
  <strong>Danger!</strong> Vous n'êtes pas autorisé à accéder à cette page !!!!.
</div>
<b>";
echo "<a href='index.php'><button type='button' class='btn btn-default'>S'autentifier</button></a>";
}
?>

</div>
</body>
</html>