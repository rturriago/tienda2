  <?php

  foreach ($data as $key => $row) {
      echo '<a class="dropdown-item d-flex align-items-center" href="#">
            <div class="mr-3">
                <div class="icon-circle bg-primary">
                     <img src="assets/imgs/productos/'.$row['foto'].'" alt="" class="img-thumbnail" >
                </div>
            </div>
            <div>
                <div class="small text-gray-500">'.$row['categoria'].'</div>
                <span class="font-weight-bold">'.$row['cantidad']." - ".$row['descripcion'].'</span><br>
                <span class="small text-gray-500">Total: '.number_format($row['valor'] *$row['cantidad'],2).'</span>
            </div>
        </a>' ;
        
    }
    

?>

