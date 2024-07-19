<?php

namespace App\Models;

use CodeIgniter\Model;

class usuario_model extends Model
{
    protected $table = 'usuarios';
    protected $primaryKey = 'id_usuario';
    protected $allowedFields = ['nombre', 'apellido', ' usuario', 'email', 'pass', 'perfil_id', 'baja', 'created_at'];


    public function getAllUsers()
    {
        return $this->findAll();
    }

    public function getUserById($id)
    {
        return $this->find($id);
    }

    //Generado en el registro, pendiente de verificacion de uso
    /*public function createUser($data)
    {
        return $this->insert($data);
    }
    */
    public function updateUser($id, $data)
    {
        return $this->update($id, $data);
    }

    public function deleteUser($id)
    {
        return $this->delete($id);
    }
}
