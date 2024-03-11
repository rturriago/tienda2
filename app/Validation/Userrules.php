<?php
namespace App\Validation;
use App\Models\usuario_model;

class Userrules{

  public function validateUser(string $str, string $fields, array $data){
    
    $model = new usuario_model();
    $user = $model->where('usuario', $data['usuario'])
                  ->first();

    if(!$user)
      return false;

    return password_verify($data['clave'], $user['clave']);
    
  }

  public function existsUser(string $str, string $fields, array $data){
    
    $model = new usuario_model();
    $user = $model->where('usuario', $data['usuario'])
                  ->first();

    if($user)   return true;   else    return false;

  }

}
