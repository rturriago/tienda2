  <?php
  $categoria_id = 0; $marca_id = 0; $open_cat=false; $open_marca=false; $open_col=false;
  foreach ($data as $row) {
   
    if($categoria_id != $row['idcategoria']){

      if($open_col) {
        echo '</div>';
        $open_col=false;
     }

     if($open_marca){
        echo '</div></div>';
        $open_marca=false;
      }

      if($open_cat){
           echo '</div></div> ';
      }
      $open_cat = true;       
      echo '<div class="card" style="margin: 0.5em 0.5em 0.5em 0.5em;" >
      <div class="card-header" style="text-align:center"><b><h4>'.$row['categoria'].'</h4></b></div>
      <div class="tr-card-body">';
    }

    if($marca_id != $row['idmarca']){

      if($open_col) {
        echo '</div>';
        $open_col=false;
     }

      if($open_marca){
        echo '</div>
       </div> ';
      }
      $open_marca = true;
      echo '<div class="card" style="margin: 0.5em 0.5em 0.5em 0.5em;">
        <div class="card-header"><b>'.$row['marca'].'</b></div>
        <div class="tr-card-body">';
      
      $col=0;
    }
    
    if(!$open_col) {
        echo '<div class="row pb-3 mb-2" style="margin: 0.5em 0.5em 0.5em 0.5em;">';
        $open_col=true;
    }
              
    echo '<div class="col-lg-3 col-md-6 mb-4 mb-lg-0">
                <!-- Card-->
                <div class="card rounded shadow-sm border-0 text-center">
                  <div class="card-body p-4">
                    <a class="text-dark" href="#">
                    <img src="assets/imgs/productos/'.$row['foto'].'" alt="" class="img-thumbnail" >
                    <p class="text-wrap "><h5>'.$row['descripcion'].'</h5></p></a>

                    
                    <div style="text-align:center">
                    <ul class="social mb-0 list-inline mt-3">
                      <li class="list-inline-item m-1">
                      <a href="javascript:addItemToCart('.$row['id'].')" class="social-link">
                      <i class="fas fa-shopping-cart"></i> Add cart</a> </li>
                   </ul>
                   
                   </div>
                  </div>
                </div>
            </div>';

      
      

    $categoria_id = $row['idcategoria']; $marca_id = $row['idmarca'];
}

if($open_col) {
  echo '</div>';
}

if($open_marca){
  echo '</div></div>';
}

if($open_cat){
     echo '</div></div> ';
}
?>

