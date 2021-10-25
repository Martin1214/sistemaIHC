<?php

namespace App\Controllers;

use App\Models\miModelo;

class Home extends BaseController
{
    protected $db = null;

    public function __construct()
    {
        $this->db = new miModelo();
        helper('validador_helper');
    }

    public function index()
    {
        return view('layouts/aside') . view('layouts/header') . view('body') . view('layouts/footer');
    }

    public function usuarios()
    {
        $us = $this->db->selectUsuarios();
        $user['usuarios'] = $us;
        return   view('layouts/aside') . view('layouts/header') . view('vistas/usuarios', $user) . view('layouts/footer');
    }

    public function buscarC()
    {
        if (isset($_POST['uId'])) {

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
    public function cedula()
    {
        if (isset($_POST['cedula'])) {

            $cedula = $this->db->selectBuscarCed($_POST['cedula']);
            if ($cedula != null) {
                $ecuatoriano =   cedulaV($_POST['cedula']);
                $r['msm'] = $ecuatoriano;
                return view('layouts/header') . view('layouts/aside') . view('vistas/cedula', $r) . view('layouts/footer');
            } else {
                $r['msm'] = "NO REGISTROS";
                return view('layouts/header') . view('layouts/aside') . view('vistas/cedula', $r) . view('layouts/footer');
            }
        } else {
            $r['msm'] = "";
            return view('layouts/header') . view('layouts/aside') . view('vistas/cedula', $r) . view('layouts/footer');
        }
    }

    public function nuevoU() //insertar dp
    {
        if (isset($_POST['nombre'])) {

            $n = $_POST['nombre'];
            $c = $_POST['cedula'];
            $co = $_POST['correo'];

            $this->db->insetUsuarios($n, $c, $co);

            $datos = $this->db->selectDatosP();
            $d['dato'] = $datos;

            return view('layouts/header') . view('layouts/aside') . view('vistas/nuevoU', $d) . view('layouts/footer');
        } else {

            $d['dato'] = "";
            return view('layouts/header') . view('layouts/aside') . view('vistas/nuevoU', $d) . view('layouts/footer');
        }
    }

    public function agregarU() //insertU
    {
        if (isset($_POST['usuario'])) {

            $u = $_POST['usuario'];
            $c = $_POST['cedula'];
            $dp = $_POST['uId'];
            $e = 1;

            $this->db->agregarU($u, $c, $dp, $e);

            $us = $this->db->selectUsuarios();

            $user['usuarios'] = $us;

            return view('layouts/header') . view('layouts/aside') . view('vistas/usuarios', $user) . view('layouts/footer');
        } else {
            $user['users'] = '';
            return view('layouts/header') . view('layouts/aside') . view('saludo') . view('layouts/footer');
        }
    }

    public function updatePass()
    {
        if (isset($_POST['pass'])) {

            $id = $_POST['id'];
            $pass = $_POST['pass'];

            $this->db->updateC($id, $pass);
            $u = $this->db->selectUsuarios();

            $user['usuarios'] = $u;

            return view('layouts/header') . view('layouts/aside') . view('vistas/usuarios', $user) . view('layouts/footer');
        }
    }
}
