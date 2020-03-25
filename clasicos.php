<div class="site-section bg-light">
    <div class="container">
      <div class="row align-items-stretch retro-layout-2">
  
  <?php
    $db = new Sqlite3('animes.db');
    $stm = $db->prepare("SELECT * FROM animes where Estado='classico' limit 5");
   
    $res = $stm->execute();
    $i = 0;
    while ($row = $res->fetchArray()) {
       $nom = $row['nombre'];
       $uuid = $row['uuid']; 
       $genero = $row['genero'];
       $descripcion = $row['descrpipcion'];
       $img = $row['img'];
       $i = $i+1;
       if ($i == 1){
        $class = "h-entry mb-30 v-height gradient";
        $col = "col-md-4";
        $tancament = ""; 
       }
       elseif($i == 2 ){
        $class = "h-entry v-height gradient";
        $col = "";
        $tancament = "</div>";      
       }
       elseif($i == 3){
        $class = "h-entry img-5 h-100 gradient";
        $col = "col-md-4";
        $tancament = "</div>"; 
       }
       elseif($i == 4){
        $class = "h-entry mb-30 v-height gradient";
        $col = "col-md-4";
        $tancament = ""; 
       }
       else{
        $class = "h-entry v-height gradient";
        $col = "";
        $tancament = "</div>";
       }
  ?>
    <?php if ($col != ""){
      echo "<div class=".'"'.$col.'"'.">\n";
    }
    ?>
      <a href="single.html" class="<?php echo $class ?>" style="background-image: url('<?php echo $img ?>');">
                
        <div class="text">
          <div class="post-categories mb-3">
            <span class="post-category bg-danger"><?php echo $genero ?></span>
          </div>
            <h2><?php echo $nom ?></h2>
        </div>
      </a>
      <?php echo $tancament; ?>
    
   
  <?php } ?>
  
  
  
      </div>
    </div>
  </div>