<?php

class modelAjax extends CI_Model {

    function checkNombre($nombre){
        $query = $this->db->query("SELECT nombre FROM usuarios WHERE nombre = '$nombre';");
        
            if ($this->db->affected_rows() > 0) {
                $ok = 0;
            }
            else {
                $ok = 1;
            }
        return $ok;
    }
}

