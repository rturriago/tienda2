<?php

namespace App\Controllers;

use App\Models\marca_model;


class Marca extends BaseController
{

  

    ///////////// JSON /////////////////////////
    public function getjson_ListadoMarcasCB($ArrayName) {
        $model = new marca_model();
        $datos = $model->getListado();
        if ($datos) 
            if($ArrayName!="")
                 echo json_encode([$ArrayName => $datos]);
            else
            echo json_encode($datos);
    
    }


    
      
}
