<?php

$connect= new mysqli("127.0.0.1","root","","ec");

if(!$connect)
    die(" la connexion a echoué");
    
    
$email=$_POST['email'];

$password=$_POST['password'];

if(isset($email) and isset($password))
{
	session_start();
$_SESSION['email']=$email;
$_SESSION['password']=$password;


}


$sql="SELECT email,password,prenom,nom,id,photo from etudiant where email='$email' and password='$password' ";

$res=mysqli_query($connect,$sql);
$row=mysqli_fetch_assoc($res);
/*
$_SESSION['photo']=$row['photo'];
$_SESSION['cvweb']=$row['cvweb'];
$_SESSION['cv']=$row['cv'];*/

if(mysqli_num_rows($res)>0)
{
$_SESSION['prenom']=$row['prenom'];
  $_SESSION['nom']=$row['nom'];
  $_SESSION['id']=$row['id'];
header('location:boutique.php');
}
else
{
	session_destroy();
include("index2.php");

echo "
<br>
<div class='alert alert-danger' style='width: 500px;'>

    <strong>Danger!</strong> Vérifiez votre Email et votre Mot de passe.
  </div>

";

}

?>