<?php

class modelAjax extends CI_Model {

    public function checkUsername($email) {
            $this->load->database();
            $this->db->where("email", $email);
            $this->db->get("users");
            
            
            if ($this->db->affected_rows() > 0) {
                $ok = 0;
            }
            else {
                $ok = 1;
            }
            return $ok;
        }

}

