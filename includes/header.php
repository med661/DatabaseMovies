<?php
//session_start();
try{
    $db =new PDO('mysql:host=localhost;dbname=ec','root','');
    $db->setAttribute(PDO::ATTR_CASE,PDO::CASE_LOWER);
    $db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
   
    }catch(Exception $e){
    echo"error venu";
    die();
    
    }
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
   <link rel="stylesheet" href="style/site.css">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
   <style>


* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}
body {
  font-family: sans-serif;
}

nav {
  height: 10vh;
  background: #5b78c7;
}

.nav-links {
  display: flex;
  list-style: none;
  width: 100%;
  height: 100%;
  justify-content: space-around;
  align-items: center;
  margin-left: auto;
  background: #5b78c7;

}
nav  a{
  height: 10vh;
  background: #5b78c7;
}
.hamburger{
  background: #5b78c7;



}
.nav--links{
  background: #24386e;



}
a:hover {
  text-decoration: none;




}





  




   </style>


  </head>
<body>




<header>
<!--<ul id="yo">
  <li><a  href="index.php">accueille</a></li>
  <li><a href="boutique.php">Movies</a></li>
  <li><a href="#about">contact</a></li>
</ul>-->









<nav>
      <ul class="nav-links">
        <li><a href="index.php">accueille</a></li>
        <li><a href="boutique.php">Movies</a></li>
        <li><a href="admin/index.php" onClick="alert('are youthe admin of this page? ')" >only admins</a></li>
      




      
        <li><a href="index2.php">create account or login</a></li>
      

        <li><a href="https://www.youtube.com/channel/UCS5Vg6CMOecJa0Cu3LUqGrg">Ska's Movies</a></li>
      </ul>
    </nav>


    </header>

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>