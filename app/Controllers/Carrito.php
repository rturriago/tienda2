<?php

namespace App\Controllers;

use App\Models\producto_model;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Files\File;

class Carrito extends BaseController
{

    
    public function viewProductosGrid(): string
    {
        $session = session();
        if ($session->has('carro'))
           return view('producto/listitemcarts', ['data' => $session->get('carro')]);
        else 
            return view('producto/listitemcarts',  ['data' => null]);
    }



    ///////////// JSON /////////////////////////
    public function getjson_ListadoProductos($ArrayName) {
        $model = new producto_model();
        $datos = $model->getListado();
        if ($datos) 
            if($ArrayName!="")
                 echo json_encode([$ArrayName => $datos]);
            else
            echo json_encode($datos);
    
    }


    public function addProducto($id)
    {
        if (!isset($id))         return $this->sendBadRequest('Parámetro ID requerido');
        if (!is_numeric($id))    return $this->sendBadRequest('Parámetro ID numérico');
        if ($id < 1)             return $this->sendBadRequest('Parámetro ID numérico mayor a 0');

        $model = new producto_model();
        $producto = $model->findById($id); 
        if(!$producto) return $this->sendBadRequest("Producto a agregar No existe");

        $carro_session = array();
        $session = session();

        if (!$session->has('carro')){
            $session->set('items', 0);
            $session->set('total_precio','0.00');
        }else {
               $carro_session =$session->get('carro');
        }
        

        if (isset($carro_session[$id])) {
               $item = $carro_session[$id];
               $item['cantidad']++;
               $carro_session[$id] = $item;
        }else {
                $item = [
                    "cantidad" => 1,
                    "descripcion" => $producto[0]['descripcion'],
                    "categoria" => $producto[0]['categoria'],
                    "marca" => $producto[0]['marca'],
                    "valor" => $producto[0]['pvp'],
                    "foto" => $producto[0]['foto'],
                ];
                $carro_session[$id] = $item;
        }

        $session->set('items', $session->get('items') + 1 );
        $session->set('total_precio', $session->get('total_precio') + $item['valor'] );
        $session->set('carro', $carro_session);

        return $this->sendResponse(['message' => 'Producto agregado correctamente.']);
    }

    public function getItemsNotifications()
    {

        $session = session();
        $carro_session = array();
        if ($session->has('carro')){
            $carro_session = $session->get('carro');
        }
        echo json_encode($carro_session);

    }

    public function getCountNotifications()
    {

        $session = session();
        $item = array();
        if ($session->has('carro')){
            $item = [
                "cantidad" =>  $session->get('items'),
                "total_precio" => number_format($session->get('total_precio'),2)
            ];
        }else{
            $item = [
                "cantidad" => 0,
                "total_precio" => 0
            ];
        }
        echo json_encode($item);

    }

    public function deleteProducts()
    {
        $session = session();
        $session->set('items', 0);
        $session->set('total_precio','0.00');
        $session->remove('carro');
    }
      
}
