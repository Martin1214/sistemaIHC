<?php

namespace App\Controllers;

use App\Models\miModelo;

class Home extends BaseController
{
    protected $db = null;

    public function __construct()
    {
        $this->db = new miModelo();
    }

    public function index()
    {
        return view('layouts/aside') . view('layouts/header') . view('body') . view('layouts/footer');
    }

    public function usuarios()
    {
        $us = $this->db->selectUsuarios();
        $user['users'] = $us;
        return   view('layouts/aside') . view('layouts/header') . view('vistas/usuarios', $user) . view('layouts/footer');
    }

    public function buscarC()
    {
        if (isset($_POST['uId'])) {
            # code...
            $id = $_POST['uId'];

            $c = $this->db->selectUsusarioC($id);
            $us = $this->db->selectUsuarios();


            $datos['usuarios'] = $us;
            $datos['correo'] = $c;

            return   view('layouts/aside') . view('layouts/header') . view('vistas/buscarU', $datos) . view('layouts/footer');
        } else {
            $us = $this->db->selectUsuarios();

            $user['usuarios'] = $us;
            $user['correo'] = "";

            return   view('layouts/aside') . view('layouts/header') . view('vistas/buscarU', $user) . view('layouts/footer');
        }
    }
}
