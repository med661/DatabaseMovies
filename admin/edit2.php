<?php
session_start();
$connect= new mysqli("127.0.0.1","root","","ec");
$id=$_POST['id'];
$sq="select * from etudiant WHERE id='$id' ";

$re=mysqli_query($connect,$sq);


	$ro=mysqli_fetch_assoc($re);

$matricule=$_POST['matricule'];
$nom=$_POST['nom'];
$prenom=$_POST['prenom'];
$adresse=$_POST['adresse'];
$dat=$_POST['date'];
$email=$_POST['email'];
$pas=$_POST['password'];

/*if(empty ($ro['photo']))
$photo=$_POST['photo'];
else if($_POST['photo']=="")
	$photo=$ro['photo'];
else
	$photo=$_POST['photo'];*/


/*if(empty ($ro['cvweb']))
$cvweb=$_POST['cvweb'];
else if($_POST['cvweb']=="")
	$cvweb=$ro['cvweb'];
else
	$cvweb=$_POST['cvweb'];

if(empty ($ro['cv']))
$cv=$_POST['cv'];
else if($_POST['cv']=="")
	$cv=$ro['cv'];
else
	$cv=$_POST['cv'];
*/
?>
<!DOCTYPE html>
<html>
<head>
	<title>Mise ajour</title>
		<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="style.css">
	<link rel="stylesheet" href="../style/site.css">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
</head>
<body>
<ul class="nav-links">

<li><a href="admin.php">add a product</a></li>
<li><a href="admin.php?action=modifyanddelete_category">modifie a product / delete</a><br><br></li>
<li><a href="admin.php">ajouter une category</a></li>
<li><a href="admin.php">deleate and modifie category</a></li>
<li><a href="consult.php">users</a></li>
</ul>


<div class="container">

<?php

//include"edit.php";

if($_SESSION['mat']!=$matricule)
{

$sql1="SELECT * FROM etudiant WHERE matricule='$matricule' ";
$res1=mysqli_query($connect,$sql1);

if(mysqli_num_rows($res1)>0)
{
echo "
<br>
<div class='alert alert-danger'>
  <strong>Danger!</strong> Matricule Existant.
</div>
";
echo "<a href='edit.php?id=$id&mat=".$_SESSION['mat']."'><button type='button' class='btn btn-default'>Retour</button></a>";
}
else
{
$sql="UPDATE etudiant set matricule='$matricule' , nom='$nom' , prenom='$prenom' , adresse='$adresse' 
, date_naissance='$dat' , email='$email' , password='$pas' , photo='kk' , cvweb='dd' ,cv='s' where id ='$id' ";

$res=mysqli_query($connect,$sql);

$_SESSION['mat']=$matricule;





if($res)
{
	echo "
	<br>
<div class='alert alert-success'>
  <strong>Success!</strong> Modification effectuée avec succès .
</div>";

echo "<a href='edit.php?id=$id&mat=$matricule'><button type='button' class='btn btn-default'>Retour</button> </a>";
echo "<a href='consult.php'><button type='button' class='btn btn-default'>Index</button></a>";
}

}

}//fermeture

else
{



$sql="UPDATE etudiant set  nom='$nom' , prenom='$prenom' , adresse='$adresse' 
, date_naissance='$dat' , email='$email' , password='$pas' ,photo='j' ,cvweb='hh' ,cv='kjh' where id ='$id' ";

$res=mysqli_query($connect,$sql);







if($res)
{
	echo "
	<br>
<div class='alert alert-success'>
  <strong>Success!</strong> Modification effectuée avec succès .
</div>
	 ";

echo "<a href='edit.php?id=$id&mat=$matricule'><button type='button' class='btn btn-default'>Retour</button> </a>";
echo "<a href='consult.php'><button type='button' class='btn btn-default'>Index</button></a>";
}

}

?>









</div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>
</html>