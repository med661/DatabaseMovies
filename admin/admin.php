<?php

session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Document</title>
</head>
<body>


<link rel="stylesheet" href="../style/site.css">

<!--<h1>bienvenu <?php //echo $_SESSION['username'];?></h1>-->

<ul class="nav-links">
<li><a href="?action=add">add a movies</a></li>
<li><a href="?action=modifyanddelete">modifie a movies / delete</a><br><br></li>
<li><a href="?action=add_category">add category</a></li>
<li><a href="?action=modifyanddelete_category">deleate and modifie category</a></li>
<li><a href="consult.php">users</a></li>
</ul>




<div class="panel-body" align="center">


<div class="navbar-form navbar-right" style="margin-right: 5px;">
<a href="deconnexion.php" type="submit" class="btn btn-danger"><span class="glyphicon glyphicon-remove-circle"> </span> Log out</a>
</div>

	</div>

<?php
try{
    $db =new PDO('mysql:host=localhost;dbname=ec','root','');
    $db->setAttribute(PDO::ATTR_CASE,PDO::CASE_LOWER);
    $db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    
    }catch(Exception $e){
    echo"error venu";
    die();
    
    }
    
if(isset($_SESSION['username'])){
    if(isset($_GET['action'])){

if($_GET['action']=='add'){
if(isset($_POST['submit'])){
$stock=$_POST['stock'];
$title =$_POST['title'];
$description=$_POST['description'];
$price=$_POST['price']; 
$img =$_FILES['img']['name'];
$img_tmp=$_FILES['img']['tmp_name'];

if(!empty($img_tmp)){


    $image=explode('.',$img);
$image_ext=end($image);

if(in_array(strtolower($image_ext),array('png','jpej','jpg'))==false){
    echo"<br>veulle importer ume image de extansiant 'pnj','png','jpej' <br>";


}else{

$image_size = getimagesize($img_tmp); 
print_r($image_size);
echo"<div class='alert alert-primary' role='alert'> successful upload</div>";

    if($image_size['mime']=='image/jpeg'){

        $image_src=imagecreatefromjpeg($img_tmp);
    }elseif($image_size['mime']=='image/png'){

        $image_src=imagecreatefrompng($img_tmp);
    }else{
        $image_src=false;
        echo "<br> veuillez entre une image valide";
    }if($image_src!==false){
        $image_width=350;
        if($image_size[0]==$image_width){

            $image_finale=$image_src;
        }else{

            $new_width[0]=$image_width;
            $new_height[1]=400;
            $image_finale=imagecreatetruecolor( $new_width[0],$new_height[1]);
            imagecopyresampled($image_finale,$image_src,0,0,0,0,$new_width[0],$new_height[1],$image_size[0],$image_size[1]);
        }
        imagejpeg($image_finale,'img/'.$title.'.jpg');


    }
}

}else{

    echo"<br>veulle importer ume image";
}





if($title&&$description&&$stock){ 
$category=$_POST['category'];
$weight=$_POST['weight'];
$select=$db->query("SELECT price FROM weights WHERE name='$weight'");
$se =$select->fetch(PDO::FETCH_OBJ);
$shipping=$se->price;
$old_price=$price;
//$select=$db->query("SELECT tva FROM products");
//$s1 =$select->fetch(PDO::FETCH_OBJ);

//$tva=$s1->tva;
//$Final_price=$old_price+$shipping;

//$finalprice=$Final_price+ ($Final_price*$tva/100);
//****************************** */
$insert=$db->prepare("INSERT INTO products(title,description,price,category,weight,shipping,tva,final_price,stock)VALUES('$title','$description','$price','$category','$weight','$shipping','5','400','$stock')");
$insert ->execute();





}else {
    echo"<br>il faut remplire tous les champs ";
}
}


    ?>
    <form action="" method="POST" enctype="multipart/form-data">
        <h3>movie</h3>
 <input type="text" name="title">
 <h3>description</h3>
 <textarea name="description" cols="50" rows="10"></textarea> 
<h3>rating</h3>
<input type="number" name="price"><br>
<h3>image</h3>
<input type="file" name="img" id=""> <br>
<h3>category</h3><select name="category">


       <?php $select=$db->query("SELECT * FROM category");
            while($se =$select->fetch(PDO::FETCH_OBJ)){
                ?>
             <option ><?php echo $se->name; ?></option>

<?php  

     }
    ?>


        </select><br><br>
       <!-- <h3>poid plus de::</h3>-->
        <select name="weight"> 
       
        <?php $select=$db->query("SELECT * FROM weights");
            while($se =$select->fetch(PDO::FETCH_OBJ)){
                ?>
             <option ><?php echo $se->name; ?></option>

                <?php  

         }
         ?>
       
        </select><h3>url</h3>
        <input type="url" name="stock" ><br>
         <input type="submit" name="submit">
        

 </form>


<?php
}else if($_GET['action']=='modifyanddelete'){
        $select=$db->prepare("SELECT * FROM products");
       
        $select->execute();  


echo"<br><br>";
           while($s=$select->fetch(PDO::FETCH_OBJ)){
           

            echo $s->title;
           ?>
           <a href="?action=modify&amp;id=<?php echo $s->id;?>">modifier</a>
           <a href="?action=delete&amp;id=<?php echo $s->id;?>">X</a><BR></BR>

           <?php

             }

}elseif($_GET['action']=='modify'){
    
    
    $id=$_GET['id'];
    $select=$db->prepare("SELECT * FROM products WHERE id=$id");
    $select->execute();  
    $data= $select->fetch(PDO::FETCH_OBJ) ;


  



    ?>
<form action="" method="POST">
        <h3>modifier</h3>
 <input type="text" name="title" value="<?php echo $data->title;?>">
 <h3>description</h3>
 <textarea name="description" ><?php echo $data->description;?></textarea> 
<h3>price</h3>
<input type="number" name="price" value="<?php echo $data->price;?>">
<h3>stock</h3>
        <input type="text" name="stock" value="<?php echo $data->stock;?>" ><br>
<input type="submit" name="submit" value="modifier">
 </form>



    <?php
if(isset($_POST['submit'])){
    $stock=$_POST['stock'];
    $title=$_POST['title'];
    $description=$_POST['description'];
    $price=$_POST['price'];
    echo"hello";
$update =$db->prepare("UPDATE products SET title='$title',description='$description',price='$price',stock='$stock' WHERE id =$id");
$update ->execute();

header('location: admin.php?action=modifyanddelete');


}






}elseif($_GET['action']=='delete'){
    $id=$_GET['id'];
    $delete=$db->prepare("DELETE FROM products WHERE id=$id");
    $delete->execute();  



}elseif($_GET['action']=='add_category'){
  if(isset($_POST['submit'])){
    $name = $_POST['name'];
    echo $name;
   if($name){
    echo $name;
    $insert=$db->prepare("INSERT INTO category VALUES ('','$name')");
    $insert->execute();
    

   }else{

    echo"<br>il faut remplire les champs";
   }
    

}

   



   



?>
<form action="" method="POST">
<input type="text" name="name" ><br>
<input type="submit" name="submit" value="add">
</form>



<?php





}elseif($_GET['action']=='modifyanddelete_category'){
    
echo"hello";
$select=$db->prepare("SELECT * FROM category");
       
        $select->execute();  


echo"<br><br>";
           while($s=$select->fetch(PDO::FETCH_OBJ)){
           

            echo $s->name;
           ?>
           <a href="?action=modify_category&amp;id=<?php echo $s->id;?>">modifier</a>
           <a href="?action=delete_category&amp;id=<?php echo $s->id;?>">X</a><BR></BR>

           <?php

             }




}elseif($_GET['action']=='modify_category'){


    $id=$_GET['id'];
    $select=$db->prepare("SELECT * FROM category WHERE id=$id");
    $select->execute();  
    $data= $select->fetch(PDO::FETCH_OBJ) ;


  



    ?>
<form action="" method="POST">
        <h3>modifier</h3>
 <input type="text" name="title" value="<?php echo $data->name;?>">

<input type="submit" name="submit" value="modifier">
 </form>



    <?php
if(isset($_POST['submit'])){
    $title=$_POST['title'];
   
$update =$db->prepare("UPDATE category SET name='$title' WHERE id =$id");
$update ->execute();

header('location: admin.php?action=modifyanddelete_category');


}








}elseif($_GET['action']=='delete_category'){

    $id=$_GET['id'];
    $delete=$db->prepare("DELETE FROM category WHERE id=$id");
    $delete->execute();  
    header('location: admin.php?action=modifyanddelete_category');




    
    



}else {
    die('erroe s\'e produit');
}
}


}else{


    header('location: ../index.php');

}

?>
   <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

    
   </body>
</html>