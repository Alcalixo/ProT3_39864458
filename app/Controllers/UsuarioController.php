<?php

namespace App\Controllers;

use App\Models\UsuarioModel;
use CodeIgniter\Controller;

class UsuarioController extends Controller
{
    public function __construct()
    {
        helper(['form', 'url']);
    }

    public function create()
    {
        $dato['titulo'] = 'Registro';
        echo view('front/head', $dato);
        echo view('front/navbar');
        echo view('back/usuarios/registro');
        echo view('front/footer');
    }

    public function formValidation()
    {
        $input = $this->validate([
            'nombre' => 'required|min_length[3]',
            'apellido' => 'required|min_length[3]|max_length[25]',
            'usuario' => 'required|min_length[3]',
            'email' => 'required|min_length[4]|max_length[100]|valid_email|is_unique[usuarios.email]',
            'pass' => 'required|min_length[8]|max_length[20]',
        ]);

        $formModel = new UsuarioModel();
        if (!$input) {
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
            ]);

            session()->setFlashdata('success', 'Usuario Registrado con Éxito');
            return $this->response->redirect('login');
        }
    }

    public function edit($id)
{
    $session = session();
    $model = new UsuarioModel();
    $usuario = $model->find($id);

    if (!$usuario) {
        throw new \CodeIgniter\Exceptions\PageNotFoundException('Usuario no encontrado');
    }

    $data = [
        'titulo' => 'Editar Usuario',
        'usuario' => $usuario,
    ];

    // Solo el administrador puede editar cualquier usuario
    // Los usuarios normales solo pueden editar sus propios datos
    if ($session->get('perfil_id') != 1 && $session->get('id_usuario') != $id) {
        return redirect()->to('/usuarios');
    }

    helper(['form']);

    if ($this->request->getMethod() == 'post') {
        $updateData = [
            'nombre' => $this->request->getPost('nombre'),
            'apellido' => $this->request->getPost('apellido'),
            'email' => $this->request->getPost('email'),
            'usuario' => $this->request->getPost('usuario'),
        ];

        // Solo el administrador puede cambiar el perfil_id y el estado de activo o inactivo
        if ($session->get('perfil_id') == 1) {
            $updateData['perfil_id'] = $this->request->getPost('perfil_id');
            $updateData['baja'] = $this->request->getPost('baja');
        }

        if ($model->update($id, $updateData)) {
            $session->setFlashdata('msg', 'Usuario actualizado correctamente');
            return redirect()->to('/usuarios');
        } else {
            $data['validation'] = $this->validator;
        }
    }

    echo view('front/head', $data);
    echo view('front/navbar');
    echo view('back/usuarios/editar_usuario', $data);
    echo view('front/footer');
}

    public function delete($id)
    {
        $session = session();
        $model = new UsuarioModel();

        if ($session->get('perfil_id') != 1) {
            return redirect()->to('usuarios');
        }

        $model->delete($id);
        $session->setFlashdata('msg', 'Usuario eliminado correctamente');
        return redirect()->to('usuarios');
    }
}