<?php

use CodeIgniter\Router\RouteCollection;


/**
 * @var RouteCollection $routes
 */
$routes->group('',['filter' => 'AuthCheck'], function ($routes) {
   
  $routes->get('producto/add_nuevo', 'Producto::addproducto');

   $routes->get('panel', 'Home::panel');
   $routes->get('dashboard', 'Home::dashboard');
   

   $routes->get('categoria/getlistadoCB', 'Categoria::getjson_ListadoCategorias/');
   $routes->get('marca/getlistadoCB/', 'Marca::getjson_ListadoMarcasCB/');


   $routes->get('producto/nuevo', 'Producto::addproducto');
   $routes->get('producto/lista', 'Producto::listadoproductos');
   $routes->get('producto/lista_grid', 'Producto::viewProductosGrid/0/0/1');
   $routes->get('producto/lista_grid/(:num)', 'Producto::viewProductosGrid/$1/0/1');
   $routes->get('producto/lista_grid/(:num)/(:num)', 'Producto::viewProductosGrid/$1/$2/1');

   $routes->get('producto/getListado', 'Producto::getjson_ListadoProductos/data');
   $routes->post('producto/add', 'Producto::insertProducto');
   $routes->post('producto/update/(:num)', 'Producto::updateProducto/$1');
   $routes->get('producto/delete/(:num)', 'Producto::deleteProducto/$1');
   
 
   $routes->get('carrito/add/(:num)', 'Carrito::addProducto/$1');
   $routes->get('carrito/countitems', 'Carrito::getCountNotifications');
   $routes->get('carrito/list', 'Carrito::getItemsNotifications');
   $routes->get('carrito/clear', 'Carrito::deleteProducts');
   $routes->get('carrito/vista_listaitems', 'Carrito::viewProductosGrid');

 });

 

 $routes->get('/', 'Login::index');
 $routes->get('login', 'Login::index');
 $routes->post('login', 'Usuario::login');
 $routes->get('logout', 'Usuario::logout');


 
  
