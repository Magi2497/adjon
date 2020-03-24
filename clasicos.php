<div class="site-section bg-light">
      <div class="container">
        <div class="row align-items-stretch retro-layout-2">
<?php
  $db = new Sqlite3('animes.db');
  $stm = $db->prepare("SELECT * FROM animes where Estado='classico'");
 
  $res = $stm->execute();

  while ($row = $res->fetchArray()) {
     $nom = $row['nombre'];
     $uuid = $row['uuid']; 
     $genero = $row['genero'];
     $descripcion = $row['descrpipcion'];
     $img = $row['img'];

?>
    


          <div class="col-md-4">
            <a href="single.html" class="h-entry mb-30 v-height gradient" style="background-image: url('<?php echo $img ?>');">
              
              <div class="text">
                <div class="post-categories mb-3">
                  <span class="post-category bg-danger"><?php echo $genero ?></span>
                </div>
                <h2><?php echo $nom ?></h2>
              </div>
            </a>
          </div>
          <?php } ?>


        
        </div>
      </div>
    </div>