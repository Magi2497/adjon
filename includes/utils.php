<?php
function color_genero($genero){
      switch ($genero) {
        case 'isekai':
            $color = 'bg-success';
            break;
        case 'seinen':
            $color = 'bg-danger';
            break;
        case 'drama':
            $color = 'bg-secondary';
            break;
        case 'shonen':
           $color = 'bg-primary';
            break; 

        default: 
          $color = 'bg-warning';
    }
    return $color;
  }
  ?>