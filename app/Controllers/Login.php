<?php

namespace App\Controllers;

use App\Models\categoria_model;


class Login extends BaseController
{

     ///////////////Rutas//////////////
    public function index(): string
    {
        session()->destroy();
        return view('login/login');
    }

    
      
}
