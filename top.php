<!DOCTYPE html>
<html>
<head>
<title>Ficha animes</title>

</head>
<body>
<?php
/* Activamos los flags para que nos muestre los errores.
Este código no debería ir en producción */
ini_set('display_errors', 1);
error_reporting(E_ALL);
ini_set("display_errors", 1);
?>
<div class="site-section">
      <div class="container">
        <h2>Top de la semana</h2>
        <div class="row mb-5">
          <div class="col-12">
          </div>
        </div>
        <div class="row">
          
<?php
  $db = new Sqlite3('animes.db');
  $stm = $db->prepare("SELECT * FROM animes where Estado='top'");
  $stm->bindParam(1, $id);
 
  $res = $stm->execute();

  while ($row = $res->fetchArray()) {
     $nom = $row['nombre'];
     $uuid = $row['uuid']; 
     $genero = $row['genero'];
     $descripcion = $row['descrpipcion'];
     $img = $row['img'];
  ?>  
    
          <div class="col-lg-4 mb-4">
            <div class="entry2">
                  <a href="single.html"><img src="<?php echo $img?>" alt="Image" class="img-fluid rounded"></a>
                  <div class="excerpt">
                    <span class="post-category text-white bg-secondary mb-3"><?php echo $genero ?></span>

                    <h2><a href=><?php echo $nom ?></a></h2>
                  <div class="post-meta align-items-center text-left clearfix">

  
              </div>
            
                <p></p>
              </div>
            </div>
          </div>

          <?php } ?>
        </div> <!--row-->
    </div>

</body>
</html>