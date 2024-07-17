<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\usuario_model;

class login_controller extends BaseController
{
    public function index()
    {
        helper(['form', 'url']);

        $dato['titulo'] = 'Ingresar';
        echo view('front/head', $dato);
        echo view('back/usuarios/login');
        echo view('front/footer');
    }

    public function auth()
    {
        $session = session();
        $model = new usuario_model();

        //traer datos
        $email = $this->request->getVar('email');
        $password = $this->request->getVar('pass');
        $data = $model->where('email', $email)->first();

        if ($data) {
            $pass = $data['pass'];
            $ba = $data['baja'];
            if ($ba == 'SI') {
                $session->setFlashdata('msg', 'Usuario Inhabilitado');
                return redirect()->to('/login_controller');
            }
            $verify_pass = password_verify($password, $pass);
            if($verify_pass){
                $ses_data = [
                    'id_usuario' => $data['id_usuario'],
                    'nombre' => $data['nombre'],
                    'apellido' => $data['apellido'],
                    'email' => $data['email'],
                    'usuario' => $data['usuario'],
                    'perfil_id' => $data['perfil_id'],
                    'logged_in' => TRUE
                ];
            }
        }
    }
}
