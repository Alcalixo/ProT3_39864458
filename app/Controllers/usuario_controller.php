<?php

namespace App\Controllers;

use App\Models\usuario_model;
use CodeIgniter\Controller;

class usuario_controller extends Controller
{
    public function __construct()
    {
        helper(['form', 'url']);
    }

    public  function create()
    {
        $dato['titulo'] = 'Registro';
        echo view('front/head', $dato);
        echo view('front/navbar');
        echo view('back/usuarios/registro');
        echo view('front/footer');
    }

    public function formValidation()
    {
        $imput = $this->validate([
            'nombre' => 'required|min_length[3]',
            'apellido' => 'required|min_length[3]|max_length[25]',
            'usuario' => 'required|min_length[3]',
            'email' => 'required|min_length[4]|max_length[100]|valid_email|is_unique[usuarios.email]',
            'pass' => 'required|min_length[8]|max_length[20]',
        ],);

        $formModel = new usuario_model();
        if (!$imput) {
            $data['titulo'] = 'Registro';
            echo view('front/head', $data);
            echo view('front/navbar');
            echo view('back/usuarios/registro', ['validation' => $this->validator]);
            echo view('front/footer');
        } else {
            $formModel->save([
                'nombre' => $this->request->getVar('nombre'),
                'apellido' => $this->request->getVar('apellido'),
                'usuario' => $this->request->getVar('usuario'),
                'email' => $this->request->getVar('email'),
                'pass' => password_hash($this->request->getVar('pass'), PASSWORD_DEFAULT),
                //password_hash() crea un nuevo hash de contraseña usando un algoritmo hash de unico sentido
            ],);

            //flassdata solo funciona en redirigir la funcion en el controlador en vista de carga
            session()->setFlashdata('success', 'Usuario Registrado con Éxito');
            return $this->response->redirect('login');
        }
    }
}
