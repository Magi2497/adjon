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
<div class="site-section bg-light">
    <div class="container">
      <div class="row align-items-stretch retro-layout-2">
        <div class="col-lg-12">
          <div class="entry2">
            <h2><a href="single.html"><?php echo $nom?></a><span class="post-category text-white <?php echo $color ?> mb-3"> <?php echo $genero ?></span></h2>
          </div>
        </div>
        <div class="col-lg-4 mb-4">   

            <div class="entry2">
              
              <a href=""><img class="img-ficha" src="<?php echo $img?>"></a>
              <div>
                <?php echo  '<h5>Lista de episodios</h5>';
                $stm = $db->prepare("SELECT * FROM episodios where uuid like ?");
                $uuid= $uuid."%";
                $stm->bindParam(1, $uuid);
                $res = $stm->execute();
            
                while ($row = $res->fetchArray()) {
                  $nom = $row['nom'];
                  $uuid = $row['uuid']; 
                  $num = $row['num'];
                  $url = $row['url'];
                
                  echo  $num.' '.  $nom.' '. ' <input class="boton" type="submit" name="grabar" value =""><a href="'.$url.'" target = "_blank"></a> <br>'; 
                
                }
                ?>
              </div>
              <div class="excerpt">
                 
           

                <div class="post-meta align-items-center text-left clearfix">
              
                  <span class="d-inline-block mt-1"></a></span>
                </div>
              </div>
            </div>
        </div>
        <div class="col-lg-5 mb-5 descripcion">
          <?php 
          echo '<h5>Sinopsis</h5>';
          echo $descripcion; 
          ?>
        </div>
      </div>
    </div>
</div>


<?php include "includes/footer.php"?>
</body>
</html>