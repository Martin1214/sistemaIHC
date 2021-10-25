<?php

namespace app\Models;

use CodeIgniter\Model;

class miModelo extends Model
{
    protected $db = null;
    public function __construct()
    {
        $this->db = \Config\DataBase::connect(); //establecer coneccion;
    }
    public function selectUsuarios()
    {

        $tab =  $this->db->table('tbl_usuarios u'); //confirmamos tabla
        $tab->select('u.USU_ID, u.USU_USUARIO, u.USU_ESTADO, u.DAP_ID, dp.DAP_NOMBRES, dp.DAP_CORREO'); //select a la tabla

        $tab->join('tbl_datosp dp', 'dp.DAP_ID= u.DAP_ID');

        $tab->where('u.USU_ESTADO', 1);

        $query = $tab->get(); //hacemos la peticion

        $user = $query->getResultArray(); //metemos la informacion a un arreglo

        return $user;
    }

    public function selectUsusarioC($id)
    {
        $tab =  $this->db->table('tbl_usuarios u'); //confirmamos tabla
        $tab->select('u.USU_ID, u.DAP_ID, dp.DAP_CORREO'); //select a la tabla

        $tab->join('tbl_datosp dp', 'dp.DAP_ID= u.DAP_ID');

        $tab->where('u.USU_ID', $id);

        $query = $tab->get(); //hacemos la peticion

        $correo = $query->getResultArray(); //metemos la informacion a un arreglo

        return $correo;
    }

    public function selectBuscarCed($ced)
    {
        $tab =  $this->db->table('tbl_datosp dp'); //confirmamos tabla
        $tab->select('dp.DAP_ID, dp.DAP_NOMBRES, dp.DAP_CEDULA'); //select a la tabla

        $tab->where('dp.DAP_CEDULA', $ced);

        $query = $tab->get(); //hacemos la peticion

        $cedula = $query->getResultArray(); //metemos la informacion a un arreglo

        return $cedula;
    }

    public function insetUsuarios($u, $c, $m)
    {
        $tab =  $this->db->table('tbl_datosp'); //confirmamos tabla
        $datos = ['DAP_NOMBRES' => $u, 'DAP_CORREO' => $m, 'DAP_CEDULA' => $c];
        $tab->insert($datos);
    }

    public function agregarU($u, $c, $dp, $e)
    {
        $tab =  $this->db->table('tbl_usuarios'); //confirmamos tabla
        $datos = ['USU_USUARIO' => $u, 'USU_CLAVE' => $c, 'USU_ESTADO' => $e, 'DAP_ID' => $dp];
        $tab->insert($datos);
    }

    public function selectDatosP()
    {
        $tab =  $this->db->table('tbl_datosp dp'); //confirmamos tabla
        $tab->select('dp.DAP_ID, dp.DAP_NOMBRES'); //select a la tabla

        $query = $tab->get(); //hacemos la peticion

        $cedula = $query->getResultArray(); //metemos la informacion a un arreglo
        return $cedula;
    }

    public function updateC($id, $pass)
    {
        # code...
        $sql =  $this->db->table('tbl_usuarios'); //confirmamos tabla
        $sql->where('USU_ID', $id);
        $sql->set('USU_CLAVE', $pass);
        $sql->update();
    }
}
