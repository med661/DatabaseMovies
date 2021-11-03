<?php
session_start();
$connect= new mysqli("127.0.0.1","root","","ec");

$supp=$_POST['supp'];

foreach ($supp as $key => $value) {
	
$sql="DELETE from etudiant where id='$value'";
$res=mysqli_query($connect,$sql);

}

foreach ($supp as $key => $value) {
	if($_SESSION['id']==$value)
		session_destroy();
		
		
}

//include "index2.php";
header('location:consult.php');




?>