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
<div class="site-section">
      <div class="container">
        <div class="row mb-5">
          <div class="col-12">
          </div>
        </div>
        <div class="row"> 
       
<?php        

if (isset($_GET['genero'])){
  $genero = $_GET['genero'];}
  
  else {
    $genero = 'isekai';
 }
  $db = new Sqlite3('animes.db');
  $stm = $db->prepare("SELECT * FROM animes where genero=?");
  $stm->bindParam(1, $genero);
  $res = $stm->execute();


  $color = color_genero($genero);
  while ($row = $res->fetchArray()) {
     $nom = $row['nombre'];
     $uuid = $row['uuid']; 
     $descripcion = $row['descripcion'];
     $img = $row['img'];
?>
     
    
          <div class="col-lg-4 mb-4">
            <div class="entry2">
                  <a href="fichas.php?id=<?php echo $uuid ?>"><img src="<?php echo $img?>" alt="Image" class="img-fluid rounded"></a>
                  <div class="excerpt">
                    <span class="post-category text-white <?php echo $color ?> mb-3"><?php echo $genero ?></span>

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
    <?php include "includes/footer.php"?>
</body>
</html>