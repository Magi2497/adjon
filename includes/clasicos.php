 <h2 class= "top">ANIMES CLASICOS</h2>
 <div id="llistat" class="site-section ">
    <div class="container">
    
      <div class="row align-items-stretch retro-layout-2 ">
     
  <?php
    $db = new Sqlite3('animes.db');
    $stm = $db->prepare("SELECT * FROM animes where Estado='clasico' limit 5");
   
    $res = $stm->execute();
    $i = 0;
    while ($row = $res->fetchArray()) {
       $nom = $row['nombre'];
       $uuid = $row['uuid']; 
       $genero = $row['genero'];
       $descripcion = $row['descripcion'];
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
       

       $color = color_genero($genero);

  ?>
  
    <?php if ($col != ""){
      echo "<div class=".'"'.$col.' zoom"'.">\n";
    }
    ?>
    
      <a href="fichas.php?id=<?php echo $uuid ?>"  class="<?php echo $class ?> filtro" style="background-image: url('<?php echo $img ?>');"> 
   
                
        <div class="text">
          <div class="post-categories mb-3">
            <span class="post-category <?php echo $color?>"><?php echo $genero ?></span>
          </div>
            <h2><?php echo $nom ?></h2>
        </div >
      </a>
      <?php echo $tancament; ?>
    
   
  <?php } ?>
  
  
  
      </div>
    </div>
  </div>