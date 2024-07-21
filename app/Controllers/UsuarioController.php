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
            return $this->response->redirect('registro');
        }
    }

    public function listar()
    {
        $session = session();
        $model = new UsuarioModel();
        $usuario = $model->getAllUsers();
        $data = [
            'titulo' => 'Lista de Usuarios',
            'usuario' => $usuario,
        ];


        echo view('front/head', $data);
        echo view('front/navbar');
        echo view('back/usuarios/lista_usuarios', compact('usuario'));
        echo view('front/footer');
    }

    public function edit($id)
{
    // Obtiene el modelo de usuario y el usuario a editar
    $model = new UsuarioModel();
    $usuario = $model->getUserById($id);

    // Si el usuario no existe, lanza una excepción
    if (!$usuario) {
        throw new \CodeIgniter\Exceptions\PageNotFoundException('Usuario no encontrado');
    }

    // Define las reglas de validación para los campos del formulario
    $rules = [
        'nombre' => 'required|min_length[3]', // Nombre requerido, mínimo 3 caracteres
        'apellido' => 'required|min_length[3]|max_length[25]', // Apellido requerido, mínimo 3 caracteres, máximo 25 caracteres
        'email' => 'required|min_length[4]|max_length[100]', //|valid_email|is_unique[usuarios.email]', // Email requerido, mínimo 4 caracteres, máximo 100 caracteres, formato válido de email, único en la base de datos (excluye el usuario actual), quitado por el momento, genera errores
        'usuario' => 'required|min_length[3]', // Usuario requerido, mínimo 3 caracteres
        'perfil_id' => 'required|numeric', // Perfil ID requerido, numérico
        'baja' => 'required|in_list[NO,SI]', // Estado (Baja) requerido, solo permite valores 'NO' o 'SI'
    ];

    // Valida los datos del formulario
    if (!$this->validate($rules)) {
        // Si la validación falla, establece los errores en la variable `$data` para mostrarlos en la vista
        $data['validation'] = $this->validator;
    } else {
        // Si la validación es exitosa, prepara los datos para actualizar el usuario
        $updateData = [
            'nombre' => $this->request->getPost('nombre'),
            'apellido' => $this->request->getPost('apellido'),
            'email' => $this->request->getPost('email'),
            'usuario' => $this->request->getPost('usuario'),
            'perfil_id' => $this->request->getPost('perfil_id'),
            'baja' => $this->request->getPost('baja'),
        ];

        // Intenta actualizar el usuario en la base de datos
        try {
            $model->update($id, $updateData);

            // Si la actualización es exitosa, muestra un mensaje de éxito y redirige a la lista de usuarios
            session()->setFlashdata('msg', 'Usuario actualizado correctamente');
            return redirect()->to('/usuarios');
        } catch (\Exception $e) {
            // Si la actualización falla debido a un error de base de datos, registra el error y opcionalmente establece los errores de validación para mostrarlos en la vista
            log_message('error', 'Error al actualizar usuario: ' . $e->getMessage());
            $data['validation'] = $this->validator; // Opcional: Mostrar errores de validación
        }
    }

    // Prepara los datos para la vista
    $data = [
        'titulo' => 'Editar Usuario', // Título de la página
        'usuario' => $usuario, // Datos del usuario a editar
    ];

    // Carga el helper de formularios
    helper(['form']);

    // Muestra las vistas correspondientes
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
