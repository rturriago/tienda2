<?php

namespace App\Models;

use CodeIgniter\Model;
use Exception;


class producto_model extends Model
{
    protected $table = 'producto';
    protected $primaryKey       = 'id';
    protected $allowedFields = ['idcategoria', 'idmarca', 'descripcion', 'precio', 'pvp', 'impuesto', 'foto'];
    
    public function execQuery($Query){
        $query = $this->db->query($Query);
        return $query->getNumRows() > 0?$query:false;
     }
  
   
    public function getListado()
    {
        $query = $this->db->query("SELECT Concat('r_',id) as dt_rowid, c.nombre_categoria as idcategoria, m.nombre_marca as idmarca, p.id, p.descripcion, precio, pvp, impuesto, foto 
         FROM producto p, categorias c, marcas m where p.idcategoria = c.id_categoria and p.idmarca = m.id_marca  order by id;");
        return $query->getResultArray();
    }

    public function findById($id)
    {
        $query = $this->db->query("SELECT c.nombre_categoria as categoria, m.nombre_marca as marca, p.descripcion, precio, pvp, impuesto, foto 
         FROM producto p, categorias c, marcas m where p.idcategoria = c.id_categoria and p.idmarca = m.id_marca and p.id=".$id." order by id;");
        return $query->getResultArray();
    }

    /*public function findById()
    {
       return $this->asArray()->where(['id' => $id])->first();
    }*/


    public function getListadoGrid($IDCat, $IDMarca) {
        $sql = "SELECT c.id_categoria as categoria_id, c.nombre_categoria as categoria, m.nombre_marca as marca, p.*
        FROM producto p, marcas m, categorias  c
        WHERE m.id_marca = p.idmarca and c.id_categoria = p.idcategoria ";
        if ($IDCat>0)  $sql = $sql. " and c.id_categoria=$IDCat ";
        if ($IDMarca>0) $sql = $sql. " and m.id_marca=$IDMarca ";

        $sql = $sql. " order by c.nombre_categoria, m.nombre_marca, p.descripcion";
        $query = $this->execQuery($sql);
        if($query)
             return ['data' => $query->getResultArray()];
        else
            return false;
    }

    
    
   
}