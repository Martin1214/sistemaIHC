<?php

namespace App\Controllers;

use CodeIgniter\HTTP\Request;
use CodeIgniter\RESTful\ResourceController;

class restUser extends ResourceController
{
    protected $modelName = 'App\Models\miModelo';
    protected $format    = 'json';

    public function __construct()
    {
        helper('sumar_helper');
    }

    public function index()
    {
        return $this->genericResponse($this->model->selectUsuarios(), "", 500);
    }

    public function sumar()
    {
        $n1 = $_REQUEST['n1'];
        $n2 = $_REQUEST['n2'];

        $arr = sumarNum($n1, $n2);
        echo json_encode($arr);
    }

    public function genericResponse($data, $msj, $code)
    {
        if ($code = 500) {
            return $this->respond(array("data" => $data, "code" => $code));
        } else {
            return $this->respond(array("msj" => $msj, "code" => $code));
        }
    }
}
