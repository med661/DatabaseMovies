<?php
require_once('includes\header.php');
require_once('includes\sidebar.php');
require_once('includes\functions_panier.php');
$error=false;
$action=(isset($_POST['action'])?$_POST['action']:(isset($_GET['action'])?$_GET['action']:null));
if($action!==null){

if(!in_array($action,array('ajout','suppression','refresh')))

 $error=true;
 $l=(isset($_POST['l'])?$_POST['l']:(isset($_GET['l'])?$_GET['l']:null));
 $q=(isset($_POST['q'])?$_POST['q']:(isset($_GET['q'])?$_GET['q']:null));
 $p=(isset($_POST['p'])?$_POST['p']:(isset($_GET['p'])?$_GET['p']:null));

$l=preg_replace('#\v#','',$l);
$p =floatval($p);

if(is_array($q)){
   $qteProduit=array();
   $i=0;
   foreach($q as $contenu){
      $qteProduit[$i++]=intval($contenu);




   }
}else{

   $q=intval($q);
}

}





if(!$error){
switch($action){
   case "ajout":
      ajouterArticle($l,$q,$p);
   break;
   case "suppression":
      SupprimerArticle($l);
   break;
   case "refresh":
      

for($i=0;$i<count($qteProduit);$i++){
   ModifierQteProduit($_SESSION['panier']['libelleProduit'][$i],round($qteProduit[$i]));

}

 
   break;
   default:
   break;





}
}







?>
<form action="" method="post">
<table border="1">
<tr>
<td colspan="5" >vote panier</td>
</tr>
<tr>
<td>libeller produit</td>
<td>prixt unitaire</td>
<td>quantity</td>
<td>tva</td>
<td>action</td>
</tr>
<?php

if(isset($_GET['deletepanier']) && $_GET['deletepanier']==true){

   SupprimerPanier();
}




$_SESSION['panier']=array();
$_SESSION['panier']['libelleProduit']=array();
$_SESSION['panier']['qteProduit']=array();
$_SESSION['panier']['prixProduit']=array();
$_SESSION['panier']['verrou']=false;

$select=$db->query("SELECT tva FROM products");
$tva =$select->fetch(PDO::FETCH_OBJ);

$_SESSION['panier']['tva']=$tva;

if(creationPanier()){
 


$nbproduit= count($_SESSION['panier']['libelleProduit']);
if($nbproduit<0){
   echo"<br> <h5>oops paanier vide <h5>";


}else{
   for($i=0;$i<$nbproduit;$i++){
?>
<tr>
  <td>  <?php echo $_SESSION['panier']['libelleProduit'][$i] ; ?></td>
  <td> <input name="q[]" value=" <?php echo $_SESSION['panier']['qteProduit'][$i] ; ?>"  size="5"/></td>
  <td>  <?php echo $_SESSION['panier']['prixProduit'][$i] ; ?></td>
  <td>  <?php echo $_SESSION['panier']['tva']."%"; ?></td>
  <td><a href="panier.php?action=suppression&amp;l=<?php echo rawurldecode($_SESSION['panier']['libelleProduit'][$i]) ;         ?>">  </a></td>
</tr>
<?php   } ?>
<tr>

<td colspan="2"> <br>
<p>total: <?php  echo montantGlobal() ; ?></p>
<p>total avec tva:   <?php montantGlobalTVA() ; ?></p>
</td>

</tr>
<tr>
<td colspan ="5">
<input type="submit" value="rafraichir">
<input type="hidden" name="action" value="refresh">
<a href="panier.php?deletepanier=true">supprier le panier</a>



</td>
</tr>









<?php



 
}

}



?>










</table>
</form>




<?php
echo"hello";
?>