<?php


session_start();
$user="meds661+";
$passw="58962808661";
if(isset($_POST['submit'])){
$username=$_POST['username'];
$password=$_POST['password'];
if($username&&$password){
if($username==$user&&$password==$passw){

$_SESSION['username']=$username;
header("location: admin.php");

}else{
 

    echo" <div class='alert alert-danger' role='alert'>";


echo"votre identifiant est incorrect </div>";

}









}else{
    echo"remlpire tou les champ";
}


}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/site.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <title>Document</title>
</head>
<body>
    
</body>
</html>

<h1>administration connection</h1>

<form action="" method="POST">
    
    <fieldset>
    <div class="form-group">
<label for="name"><h3>your name</h3></label>
<input type="text" name="username" id="name">
</div>


<div class="form-group">

<label for="psw"><h3>password</h3></label>
<input type="password" name="password" id="psw">
</div>

<input type="submit"  class="btn btn-primary" name="submit">

</fieldset>

</form>
<br>
<a href="../index.php" class="btn btn-secondary btn-sm">home</a>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>
</html>