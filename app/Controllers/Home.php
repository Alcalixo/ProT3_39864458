<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        $data['titulo']='Página Principal'; 
        echo view('front/head',$data);
        echo view('front/navbar');
        echo view('front/principal');
        echo view('front/footer');
    }

    public function login()
    {
        $data['titulo']='Ingresar'; 
        echo view('front/head',$data);
        echo view('front/navbar');
        echo view('back/usuarios/login');
        echo view('front/footer');
    }

    public function registro()
    {
        $data['titulo']='Registro'; 
        echo view('front/head',$data);
        echo view('front/navbar');
        echo view('back/usuarios/registro');
        echo view('front/footer');
    }

    public function quienes_somos()
    {
        $data['titulo']='Quienes Somos'; 
        echo view('front/head',$data);
        echo view('front/navbar');
        echo view('front/quienes_somos');
        echo view('front/footer');
    }

    public function lista_usuarios()
    {
        $data['titulo']='Lista de Usuarios'; 
        echo view('front/head',$data);
        echo view('front/navbar');
        echo view('back/usuarios/lista_usuarios');
        echo view('front/footer');
    }
    public function editar_usuario()
    {
        $data['titulo']='Quines Somos'; 
        echo view('front/head',$data);
        echo view('front/navbar');
        echo view('back/usuarios/editar_usuario');
        echo view('front/footer');
    }
}