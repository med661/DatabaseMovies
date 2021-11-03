<div class='container'> 
<div class='row'> 
<div class='col-sm-12 col-md-8'>
<div class="sidebar baa">
    <h4>dernere article</h4>
    <link rel="stylesheet" href="../style/site.css">

<?php

$select=$db->prepare("SELECT * FROM products ORDER BY ID DESC LIMIT 0,1");     

$select->execute();  



           while($s=$select->fetch(PDO::FETCH_OBJ)){
            $lenght=45;
            $description=$s->description;
            $new_description=substr($description,0,$lenght)."...";
            $description_final=wordwrap($new_description,25,'<br>',true);
     
     ?>
<div >
    <div class="card">
<img  src="admin/img/<?php echo$s->title;?>.jpg" /> 

            <h2><?php  echo $s->title;       ?></h2>
            <h5><?php  echo $description_final;       ?></h5>
            <h4><?php  //echo $s->price;       ?> </h4>
            <br><br>
          
     </div></div>
            <?php
           }



?>

</div></div></div></div>

