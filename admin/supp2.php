
<!DOCTYPE html>
<html>
<head>
	<title>Suppression</title>
		<meta charset="utf-8">
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">

<?php
  $connect= new mysqli("127.0.0.1","root","","ec");

$id=$_GET['id'];


$sql="DELETE from etudiant where id='$id' ";

session_start();
if($_SESSION['id'] == $id)
session_destroy();
//$_SESSION['nom']="";

if(mysqli_query($connect,$sql))
{
	echo "
	<br>
<div class='alert alert-success'>
  <strong>Success!</strong> Suppression effectuée avec succès .
</div>
	 ";
	echo "<a href='index2.php'><button type='button' class='btn btn-default'>Retour</button></a>";
}

?>

</div>
</body>
</html>