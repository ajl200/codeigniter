<?php

class modelUser extends CI_Model {

    //CHECK NOMBRE Y USUARIO DE TABLA USUARIO PARA EL LOGIN

    /* function check ($nombre, $pass){
        $query = $this->db->query("SELECT nombre, passwd FROM usuarios where nombre = '$nombre' and passwd = '$pass';");
        return $query->num_rows();
    } */
    
    function getId($nombre, $pass){
        $query = $this->db->query("SELECT id FROM usuarios where nombre = '$nombre' and passwd = '$pass';");
        $id = -1;
        if ($query->num_rows() > 0) {
           $row = $query->result_array();
           $id = $row[0]['id'];
        }
        return $id;
    }
}
 
/* en autoload helper 
config bas url http localhost/codeigniter 
enlaces : site url (enlace absoluto)
y luego en los form action= site_url("controlador/modelo")'
*/
