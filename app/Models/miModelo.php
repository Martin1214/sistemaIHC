<?php

namespace app\Models;

use CodeIgniter\Model;

class miModelo extends Model
{
    protected $db = null;
    public function __construct()
    {
        $this->db = \Config\DataBase::connect();
    }
    public function selectUsuarios()
    {

        $tab =  $this->db->table('tbl_usuarios u');
        $tab->select('u.USU_ID, u.USU_USUARIO, u.USU_ESTADO, u.DAP_ID, dp.DAP_NOMBRES, dp.DAP_CORREO');

        $tab->join('tbl_datosp dp', 'dp.DAP_ID= u.DAP_ID');

        $tab->where('u.USU_ESTADO', 1);

        $query = $tab->get();
        $user = $query->getResultArray();

        return $user;
    }

    public function selectUsusarioC($id)
    {
        $tab =  $this->db->table('tbl_usuarios u');
        $tab->select('u.USU_ID, u.DAP_ID, dp.DAP_CORREO');

        $tab->join('tbl_datosp dp', 'dp.DAP_ID= u.DAP_ID');

        $tab->where('u.USU_ID', $id);

        $query = $tab->get();

        $correo = $query->getResultArray();

        return $correo;
    }

    public function selectBuscarCed($ced)
    {
        $tab =  $this->db->table('tbl_datosp dp');
        $tab->select('dp.DAP_ID, dp.DAP_NOMBRES, dp.DAP_CEDULA');

        $tab->where('dp.DAP_CEDULA', $ced);

        $query = $tab->get();

        $cedula = $query->getResultArray();

        return $cedula;
    }

    public function insetUsuarios($u, $c, $m)
    {
        $tab =  $this->db->table('tbl_datosp');
        $datos = ['DAP_NOMBRES' => $u, 'DAP_CORREO' => $m, 'DAP_CEDULA' => $c];
        $tab->insert($datos);
    }

    public function agregarU($u, $c, $dp, $e)
    {
        $tab =  $this->db->table('tbl_usuarios');
        $datos = ['USU_USUARIO' => $u, 'USU_CLAVE' => $c, 'USU_ESTADO' => $e, 'DAP_ID' => $dp];
        $tab->insert($datos);
    }

    public function selectDatosP()
    {
        $tab =  $this->db->table('tbl_datosp dp');
        $tab->select('dp.DAP_ID, dp.DAP_NOMBRES');

        $query = $tab->get();

        $cedula = $query->getResultArray();
        return $cedula;
    }

    public function updateC($id, $pass)
    {
        # code...
        $sql =  $this->db->table('tbl_usuarios');
        $sql->where('USU_ID', $id);
        $sql->set('USU_CLAVE', $pass);
        $sql->update();
    }

    public function selectParcial()
    {
        $tab =  $this->db->table('tbl_usup u');
        $tab->select('u.us_id, u.us_nombre, u.us_cedula, u.us_telefono, u.us_direccion');

        $query = $tab->get();

        $user = $query->getResultArray();

        return $user;
    }

    public function insertParcial($n, $c, $t, $d)
    {
        $tab =  $this->db->table('tbl_usup');
        $datos = ['us_nombre' => $n, 'us_cedula' => $c, 'us_telefono' => $t, 'us_direccion' => $d];

        $tab->insert($datos);
    }
    public function cedulaParcial($ced)
    {
        $tab =  $this->db->table('tbl_usup dp');
        $tab->select('dp.us_nombre');

        $tab->where('dp.us_cedula', $ced);

        $query = $tab->get();

        $cedula = $query->getResultArray();

        return $cedula;
    }
    public function updateParcial($id, $nom, $ced, $tel, $dir)
    {
        # code...
        $sql =  $this->db->table('tbl_usup');

        $sql->where('us_id', $id); 
        $sql->set('us_nombre', $nom);
        $sql->set('us_cedula', $ced);
        $sql->set('us_telefono', $tel);
        $sql->set('us_direccion', $dir);
        $sql->update();
    }
}
