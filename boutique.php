<?php

echo"<img src='m.jpg' class='img-fluid' alt='Responsive image'>";

require_once('includes\header.php');
//require_once('includes\sidebar.php');
session_start();

if(isset($_SESSION['email']) and isset($_SESSION['password']) )
{ 
  $connect= new mysqli("127.0.0.1","root","","ec");
  

  $id=$_SESSION['id'];
  $sq="select * from etudiant WHERE id='$id'; ";
  
  $re=mysqli_query($connect,$sq);
  
  
    $ro=mysqli_fetch_assoc($re);


?>
<br>










<div class="panel-body" align="right">
         
         <img src="photos/profil.png"  height="100"  >
					<b> <?php echo $_SESSION['nom'];?></b><br>
					<a href="deconnexion.php"><button type="button" class="btn btn-danger">Se déconnecter</button></a>
          <br><b><small>Cliquez Ici pour se déconnecter</small></b>

				
        </div>
				
<?php

if(isset($_GET['show'])){

$product=$_GET['show'];
$select=$db->prepare("SELECT * FROM products WHERE title='$product'");
    $select->execute();  
    $s=$select->fetch(PDO::FETCH_OBJ);
    $description=$s->description;
    $description_final=wordwrap($description,50,'<br>',true);

?>
<br>    <link rel="stylesheet" href="style/site.css">
        <link rel="stylesheet" href="ta.css">
<br><br>

<div class="container">
  <div class="row">

 <div class="col-md-6"><img src="admin/img/<?php echo$s->title;?>.jpg"  /></div>
 <div class="col-md-6">
 <div class="col-md-6"><h1><?php echo $s->title;?></h1>   </div>     <!--//affiechage dun produit par click-->
 
 <div class="col-md-12"><h5><?php  echo $description_final;?></h5> </div>
<!-- hhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhh-->

<table width="1040%" class="table table-condensed table-responsive">

	
<?php



$sql="select * from comments";

$res=mysqli_query($connect,$sql);

if(mysqli_num_rows($res))
	while($row=mysqli_fetch_assoc($res))
	{
	//	$_SESSION['mat']=$row['matricule'];
?>
<tr align="center">
	<td><h5 style="color:red"><?php echo$row['name'] ?>:</h5></td>
	<td><?php echo$row['comment'] ?></td>
</tr>


<?php 
}
else
{
?>
<tr>
	<td colspan="2">no comments</td>

</tr>
<?php
}
?>

</table>
















 
 <h4><?php // echo "<br><br><br><br>".$s->price;?></h4> 
 </div>

 <h5> link:</h5>
  <a href="<?php echo $s->stock;  ?>" >Fast Streaming Disabled</a>
 </div>
 </div>
<!--fraj--------------------------------------------- -->
<br><br><div class="container">
  <div class="row">


<form action="comment.php" method="post">

<input type="text" name="name" value="<?php echo $_SESSION['nom'];?>" readonly>


 <br> <input type="text" name="comment" id="">
<br><input type="submit"  value="ajouter votre comment">





</form>







 </div>
 </div>
 
















  <?php         
}else{


if(isset($_GET['category'])){

$category=$_GET['category'];
$select=$db->prepare("SELECT * FROM products WHERE category='$category' ORDER BY id DESC");
    $select->execute();  
    //$lenght=100;
   // $description=$s->description;
   // $new_description=substr($description,0,$lenght)."...";
//echo"<table class='table'><thead><th scope='col'>image</th><th scope='col'>****descr</th></thead> <tbody>";
?>


<?php

echo"<div class='container'>";
echo"<div class='row'>";
echo"<div class='col-sm-12'>";
echo"<div class='col-sm-7'>";
echo"<h3> search :</h3>";
echo"<input id='myInput'  type='text' placeholder='Search..'  aria-label='Search'>";
echo"</div></div></div></div>";


echo"<div class='container' >";        
echo"<div class='row'>";
echo"<div class='col-sm-12'>";
echo"<table class='table table-dark'><thead><th scope='col'>image</th><th scope='col'>description</th></thead> <tbody id='myTable'>";

           while($s=$select->fetch(PDO::FETCH_OBJ)){
            $lenght=350;
            $description=$s->description;
            $new_description=substr($description,0,$lenght)."...";
            $description_final=wordwrap($new_description,70,'<br>',true);
            ?>
          <?php


?>
        
         
           <!-- <div class="container" >
           
        
                <div class="row">
                
                <div class="col-sm-6">-->
               <tr>
               <td> <a href="?show=<?php echo$s->title;?>"> <img  src="admin/img/<?php echo$s->title;?>.jpg" /> </a>
               <br><br> 
                <a href="?show=<?php echo$s->title;?>">  <h2 ><?php  echo $s->title; ?></h2></a></div> 
            
                <td> <div class="col-sm-6"><br><br><br>
                <h5><?php  echo $description_final;?></h5>
<br><br>
            <h6> category: <?php echo $category;?></h6>
           <a href="<?php echo $s->stock;  ?>" >Fast Streaming Disabled</a></td>
           </tr>
           </div>
           
             <!--<h5> stock(<?php //echo $s->stock;?>)</h5>
             <?php //if($s->stock!=0) { ?> <a href="panier.php?action=ajout&amp;l=<?php //echo $s->title ;?>&amp;q=1&amp;p=<?php //echo $s->price ;?>">ajouter au panier</a><?php  //}else{ echo'<h5 style="color:red"> stock epuise</h5>';} ?>-->
                     <br><br>
                      </div>
                     </div>

                
            </div>
            
          
         
            <?php 
          
        } 

echo"   </tbody></table>"; 




}else{

$select=$db->query("SELECT * FROM category");
while($se =$select->fetch(PDO::FETCH_OBJ)){

?>

<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>


<div class="container">


    <div class="row">
    <div class="col-md-12"> 
    
    
 <a href="?category=<?php echo $se->name;?>" class="text-warning" ><button type="button" class="btn btn-default btn-lg btn-block"><h3><?php echo $se->name?></h3></button></a>
 </div>	</div>	</div>
















<?php

}
   /*************/ 
  
$select=$db->prepare("SELECT * FROM products");
  $select->execute(); 
echo"<div class='container'>";
echo"<div class='row'>";
echo"<div class='col-sm-12'>";
echo"<div class='col-sm-7'>";
echo"<h3> search :</h3>";
echo"<input id='myInput'  type='text' placeholder='Search..'  aria-label='Search'>";
echo"</div></div></div></div>";


echo"<div class='container' >";        
echo"<div class='row'>";
echo"<div class='col-sm-12'>";
echo"<table class='table table-dark'><thead><th scope='col'>image</th><th scope='col'>description</th></thead> <tbody id='myTable'>";

           while($s=$select->fetch(PDO::FETCH_OBJ)){
            $lenght=120;
            $description=$s->description;
            $new_description=substr($description,0,$lenght)."...";
            $description_final=wordwrap($new_description,70,'<br>',true);
?>


           <!-- <div class="container" >
           
        
                <div class="row">
                
                <div class="col-sm-6">-->
                <tr>
               <td> <a href="?show=<?php echo$s->title;?>"> <img  src="admin/img/<?php echo$s->title;?>.jpg" /> </a>
               <br><br> 
                <a href="?show=<?php echo$s->title;?>">  <h2 ><?php  echo $s->title; ?></h2></a></div> 
            
                <td> <div class="col-sm-6"><br><br><br>
                <h5><?php  echo $description_final;?></h5>
<br><br>
            <h6> categorys : <?php echo $s->category;?></h6>
           <a href="<?php echo $s->stock;  ?>" >Fast Streaming Disabled</a></td>
           </tr>
           </div>
           
           <?php }
  }
    }?>
            </h5>
                     <br><br>
                      </div>
                     </div>

                
            </div>



<?php
           
          
         
  
  echo"   </tbody></table>"; 
  













   
echo"<br><br><br><br><br><br><br><br><br><br><br><br><br><br>";


?>
<script src="ta.js"></script>

<?php

require_once('includes\footer.php');
}else{





  echo"<h1> login to watch movies and series directly from any link  </h1>";
}
?>