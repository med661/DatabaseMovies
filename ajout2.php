<!DOCTYPE html>
<html>
<head>
	<title>Ajout2</title>
	<meta charset="utf-8">
</head>
<body>
<?php
session_start();
$connect= new mysqli("127.0.0.1","root","","ec");
//print_r($_POST);
$matricule=$_POST['matricule'];
$_SESSION['matricule']=$matricule;
$nom=$_POST['nom'];
$_SESSION['nom']=$nom;
$prenom=$_POST['prenom'];
$_SESSION['prenom']=$prenom;
$adresse=$_POST['adresse'];
$_SESSION['adresse']=$adresse;
$date=$_POST['date'];
$email=$_POST['email'];
$_SESSION['email']=$email;
$password=$_POST['password'];
$_SESSION['password']=$password;

//******************************************contrôle de date
/*
$e = explode("-", $date);
if(!isset($e[2]) or !isset($e[1]))
	echo "verifiez date";
else
	print_r($e);
*/
	
$sql1="SELECT * FROM etudiant WHERE matricule='$matricule' ";
$res1=mysqli_query($connect,$sql1);


if(empty($matricule))
	{
		include("ajout.php");
echo "

<div class='container'>
<div class='alert alert-danger' style='width: 500px;'>
    <strong>Danger!</strong> Remplir champ matricule.
  </div>
</div>
";
//echo "<a href='ajout3.php'><button type='button'>Retour</button></a>";

//echo "<a href='index2.php'><button type='button'>Home</button></a>";
}

else if(mysqli_num_rows($res1)>0)
{
	include("ajout.php");
echo "
<div class='container'>
<div class='alert alert-danger' style='width: 500px;'>
    <strong>Danger!</strong> Matricule Existant.
  </div>
</div>
";
//echo "<a href='ajout3.php'><button type='button'>Retour</button></a>";
//echo "<a href='index2.php'><button type='button'>Home</button></a>";
}

else if(empty($nom))
	{
		include("ajout.php");
echo "
<div class='container'>
<div class='alert alert-danger' style='width: 500px;'>
    <strong>Danger!</strong> Remplir champ nom.
  </div>
</div>
";
//echo "<a href='ajout3.php'><button type='button'>Retour</button></a>";
//echo "<a href='index2.php'><button type='button'>Home</button></a>";
}
else if(empty($prenom))
	{
		include("ajout.php");
echo "
<div class='container'>
<div class='alert alert-danger' style='width: 500px;'>
    <strong>Danger!</strong> Remplir champ prenom.
  </div>
</div>

";
//echo "<a href='ajout3.php'><button type='button'>Retour</button></a>";
//echo "<a href='index2.php'><button type='button'>Home</button></a>";
}
else if(empty($adresse))
	{
		include("ajout.php");
echo "
<div class='container'>
<div class='alert alert-danger' style='width: 500px;'>
    <strong>Danger!</strong> Remplir champ adresse.
  </div>
</div>
";
//echo "<a href='ajout3.php'><button type='button'>Retour</button></a>";
//echo "<a href='index2.php'><button type='button'>Home</button></a>";
}
else if(empty($email))
	{
		include("ajout.php");
echo "
<div class='container'>
<div class='alert alert-danger' style='width: 500px;'>
    <strong>Danger!</strong> Remplir champ Email.
  </div>
</div>
";
//echo "<a href='ajout3.php'><button type='button'>Retour</button></a>";
//echo "<a href='index2.php'><button type='button'>Home</button></a>";
}
else if(empty($password))
	{
		include("ajout.php");
echo "
<div class='container'>
<div class='alert alert-danger' style='width: 500px;'>
    <strong>Danger!</strong> Remplir champ Mot de passe.
  </div>
</div>
";
//echo "<a href='ajout3.php'><button type='button'>Retour</button></a>";
//echo "<a href='index2.php'><button type='button'>Home</button></a>";
}

else if(empty($date))
	{
		include("ajout.php");
echo "
<div class='container'>
<div class='alert alert-danger' style='width: 500px;'>
    <strong>Danger!</strong> Remplir champ Date de naissance.
  </div>
</div>
";
//echo "<a href='ajout3.php'><button type='button'>Retour</button></a>";
//echo "<a href='index2.php'><button type='button'>Home</button></a>";
}
else
{
		

$sql="INSERT INTO etudiant (matricule,nom,prenom,adresse,date_naissance,email,password) VALUES ('$matricule','$nom','$prenom','$adresse','$date','$email','$password')" ;

if(mysqli_query($connect,$sql))
{
	if(isset($_SESSION['nomm']) )
		header('location:index2.php');
	else
	{


	include("index2.php");
	//echo "<a href='ajout.php'><button type='button'>Retour</button></a>";
	//echo "<a href='index.php'><button type='button'>S'autentifier</button></a>";
	echo "
	<center>
	<br>
	<div class='container'>
<div class='alert alert-success' align='center' style='width: 500px;'>
    <strong>Success!</strong> Nouveau Etudiant ajouté avec succès.
  </div>
</div>
";
}
}
}
$connect->close();



?>
</body>
</html>