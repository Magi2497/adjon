<!DOCTYPE html>
<html>
<head>
<title>Ficha animes</title>

<?php include "includes/navbar.php"?>
<?php include "includes/utils.php"?>
</head>
<body>
<?php
/* Activamos los flags para que nos muestre los errores.
Este código no debería ir en producción */
ini_set('display_errors', 1);
error_reporting(E_ALL);
ini_set("display_errors", 1);
?>
<?php


?>
<?php

 
  $nom = 'not found';
  $uuid = 'not found'; 
  $genero = 'not found';
  $descripcion = 'not found';
  $img = 'not found';


 if (isset($_GET['id'])){
  $id = $_GET['id'];
  $db = new Sqlite3('animes.db');
  $stm = $db->prepare("SELECT * FROM animes where uuid=?");
  $stm->bindParam(1, $id);
 
  $res = $stm->execute();

  while ($row = $res->fetchArray()) {
     $nom = $row['nombre'];
     $uuid = $row['uuid']; 
     $genero = $row['genero'];
     $descripcion = $row['descripcion'];
     $img = $row['img'];

    
  }

}
  
$color = color_genero($genero);
    ?>
<div class="col-lg-4 mb-4">   

            <div class="entry2">
              <h2><a href="single.html"><?php echo $nom?></a></h2>
              <a href=""><img src="<?php echo $img?>"></a>
        

            <div class="excerpt">
                 <span class="post-category text-white <?php echo $color ?> mb-3"> <?php echo $genero ?></span>
           

              <div class="post-meta align-items-center text-left clearfix">
              
               <span class="d-inline-block mt-1"></a></span>
              </div>
               <p><?php echo $descripcion ?></p> 
                <?php  $stm = $db->prepare("SELECT * FROM episodios where uuid like ?");
                  $uuid= $uuid."%";
                  $stm->bindParam(1, $uuid);
                  $res = $stm->execute();
                
                  while ($row = $res->fetchArray()) {
                    $nom = $row['nom'];
                    $uuid = $row['uuid']; 
                    $num = $row['num'];
                    $url = $row['url'];
                   
               echo  $num.' '.  $nom.' '. ' <a href="'.$url.'" target = "_blank"> ver episodio </a> <br>'; 
                   
                 }
                ?>

              </div>
            </div>
          </div>

</div>
</div>


<?php include "includes/footer.php"?>
</body>
</html>