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
        return  view('layouts/header') . view('vistas/usuarios', $user) . view('layouts/footer');
    }
}