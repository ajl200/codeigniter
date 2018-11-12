<?php 
class Security extends CI_Controller {
    public function compruebaLogin($operacion){
        $check = false;
        if (!isset($this->session->idUsr)){
            $data['error'] = 'No tienes permiso para hacer eso';
            $this->load->view('formLogin');
        } else {
            $check =  true;
        }
        return $check;
    }
}