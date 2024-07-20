<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\UsuarioModel;

class LoginController extends BaseController
{
    public function index()
    {
        helper(['form', 'url']);

        $dato['titulo'] = 'Ingresar';
        echo view('front/head', $dato);
        echo view('front/navbar');
        echo view('back/usuarios/login');
        echo view('front/footer');
    }

    public function auth()
    {
        $session = session();
        $model = new UsuarioModel();

        //traer datos del formulario login
        $email = $this->request->getVar('email');
        $password = $this->request->getVar('pass');
        $data = $model->where('email', $email)->first();

        if ($data) {
            $pass = $data['pass'];
            $ba = $data['baja'];
            if ($ba == 'SI') {
                $session->setFlashdata('msg', 'Usuario Inhabilitado');
                return redirect()->to('/LoginController');
            }
            //Verificación de datos de ingreso
            $verify_pass = password_verify($password, $pass);
            if ($verify_pass) {
                $ses_data = [
                    'id_usuario' => $data['id_usuario'],
                    'nombre' => $data['nombre'],
                    'apellido' => $data['apellido'],
                    'email' => $data['email'],
                    'usuario' => $data['usuario'],
                    'perfil_id' => $data['perfil_id'],
                    'logged_in' => TRUE
                ];

                //Iniciar la sesion en caso de validación exitosa
                $session->set($ses_data);
                session()->setFlashdata('msg', 'Bienvenido');
                return redirect()->to('/panel');

                //si no pasa la validacion de contraseña
            } else {
                $session->setFlashdata('msg', 'Contraseña incorrecta');
                return redirect()->to('/LoginController');
            }

            //si no pasa la validacion del email
        } else {
            $session->setFlashdata('msg', 'Email incorrecto o inexistente');
            return redirect()->to('/LoginController');
        }
    }

    //Cerrar Sesion
    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to('/');
    }
}
