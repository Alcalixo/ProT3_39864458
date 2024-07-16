<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        echo view('front/head.php');
        echo view('front/principal.php');
        echo view('front/footer.php');
    }

    public function login()
    {
        echo view('front/head.php');
        echo view('front/login.php');
        echo view('front/footer.php');
    }

    public function registro()
    {
        echo view('front/head.php');
        echo view('front/registro.php');
        echo view('front/footer.php');
    }

    public function quienes_somos()
    {
        echo view('front/head.php');
        echo view('front/quienes_somos.php');
        echo view('front/footer.php');
    }
}
