<?php

namespace App\Controllers;

use App\Models\usuario_model;


class Usuario extends BaseController
{

    public function login()
    {
            $data = [];
            $rules = [
                'usuario' => 'required|min_length[3]|max_length[20]|existsUser[usuario]',
                'clave' => 'required|min_length[8]|max_length[20]|validateUser[usuario,clave]',
            ];

            $errors = [
                'usuario' => [
                    'required' => 'Ingrese su Usuario',
                    'min_length' => 'Usuario debe contener 3 dígitos',
                    'max_length' => 'Usuario debe contener máximo 20 dígitos',
                    'existsUser' => 'Usuario NO registrado'
                ],
                'clave' => [
                    'validateUser' => "Usuario y Clave no son correctas",
                    'required' => 'Ingrese una clave',
                    'min_length' => 'Clave debe contener mínimo 8 dígitos',
                    'max_length' => 'Clave debe contener máximo 20 dígitos'
                ]
                
            ];

            if (!$this->validate($rules, $errors)) {

                return view('login/login', ["validation" => $this->validator]);

            } else {
                $model = new usuario_model();

                $user = $model->where('usuario', $this->request->getVar('usuario'))
                                ->first();
                $this->setUserSession($user);                

                return redirect()->to("panel");

            }
     
    }

    private function setUserSession($user)
    {
        $data = [
            'id' => $user['id'],
            'usuario' => $user['usuario'],
            'nombres' => $user['nombres'],
            'isLoggedIn' => true,
        ];

        session()->set($data);
        return true;
    }

    

    public function logout()
    {
        session()->destroy();
        return redirect()->to(base_url('login'));
    }
      
}
