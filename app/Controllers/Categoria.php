<?php

namespace App\Controllers;

use App\Models\categoria_model;


class Categoria extends BaseController
{

  

    ///////////// JSON /////////////////////////
    public function getjson_ListadoCategorias($ArrayName) {
        $model = new categoria_model();
        $datos = $model->getListado();
        if ($datos) 
            if($ArrayName!="")
                 echo json_encode([$ArrayName => $datos]);
            else
            echo json_encode($datos);
    
    }


    public function insertCategoria()
    {
        $input = $this->getRequestInput($this->request);

        $rules = [
            'descripcion' => [
                'rules'  => 'required|max_length[100]',
                'errors' => ['required' => 'Descripción de la Categoría requerida'],
            ]
        ];


        if (!$this->validateRequest($input, $rules))
            return $this->sendResponse(['validaciones' => $this->getErrorsAsArray($this->validator->getErrors())], ResponseInterface::HTTP_BAD_REQUEST);

        try {
            $model = new categoria_model();
            $model->insert($input);
            return $this->sendResponse(['message' => 'Categoría creada correctamente. ID: ' . $model->getInsertID()]);
        } catch (Exception $e) {
            return $this->sendResponse(['error' => $e->getMessage()], ResponseInterface::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function updateCategoria($id)
    {
        if (!isset($id))         return $this->sendBadRequest('Parámetro ID requerido');
        if (!is_numeric($id))    return $this->sendBadRequest('Parámetro ID numérico');
        if ($id < 1)             return $this->sendBadRequest('Parámetro ID numérico mayor a 0');

        $input = $this->getRequestInput($this->request);

        $model = new categoria_model();
        $subc = $model->findById($id); 
        if(!$subc) return $this->sendBadRequest("Categoría a actualizar No existe");
        
        

        $rules = [
            'descripcion' => [
                'rules'  => 'required|max_length[100]',
                'errors' => ['required' => 'Descripción de la Categoría requerida'],
            ]
        ];

        if (!$this->validateRequest($input, $rules))
            return $this->sendResponse(['validaciones' => $this->getErrorsAsArray($this->validator->getErrors())], ResponseInterface::HTTP_BAD_REQUEST);

     

       try {
            $model->update($id, $input);
            return $this->sendResponse(['message' => 'Categoría editada correctamente']);
        } catch (Exception $e) {
            return $this->sendResponse(['error' => $e->getMessage()], ResponseInterface::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function deleteCategoria($id)
    {
        if (!isset($id))         return $this->sendBadRequest('Parámetro ID requerido');
        if (!is_numeric($id))    return $this->sendBadRequest('Parámetro ID numérico');
        if ($id < 1)             return $this->sendBadRequest('Parámetro ID numérico mayor a 0');


        $model = new categoria_model();
        $subc = $model->findById($id); 
        if(!$subc) return $this->sendBadRequest("Categoría a eliminar No existe");
        
        if($model->hasSubCategorias($id)) return $this->sendBadRequest("Categoría ".$subc['descripcion']." tiene SubCategorías registradas, NO se puede eliminar");
        
       try {
            $model->delete($id);
            return $this->sendResponse(['message' => 'Categoría eliminada correctamente']);
        } catch (Exception $e) {
            return $this->sendResponse(['error' => $e->getMessage()], ResponseInterface::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
      
}
