<?php

class modelLugares extends CI_Model {

   // SELECT TODAS LAS PELICULAS
    public function getAll (){
        $query = $this->db->query("SELECT * FROM lugares;");
        
        if ($query->num_rows() > 0){
           foreach ($query->result_array() as $row){
            $data[] = $row;
         }
        }
    return $data;
    
    }

    public function insert($nombre,$descripcion,$longitud,$latitud){
         $query = $this->db->query("INSERT INTO lugares VALUES (null,'$nombre','$descripcion','$longitud','$latitud');");

         return $this->db->affected_rows();
    }

    function get($id){
        $query = $this->db->query("SELECT * from lugares where id = $id");
        
    return $query->result_array()[0];
    }


    public function checkImg(){
        $config['upload_path'] = './assets/img';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size']     = 1000000;
        $config['max_width'] = 1024000;
        $config['max_height'] = 768000;

        $this->load->library('upload', $config);

        if(!$this->upload->do_upload('imagen')){
            echo $this->upload->display_errors();
            return false;
        }else{
            
            $img_name = $this->upload->data('file_name'); 
            return $img_name;
        }
    }

    public function update($id,$nombre,$descripcion,$longitud,$latitud){
        $query  = $this->db->query("UPDATE lugares SET nombre = '$nombre', 
                                                        descripcion = '$descripcion', 
                                                        longitud = $longitud, 
                                                        latitud = $latitud
                                                        WHERE
                                                        id = $id;");
        return $this->db->affected_rows();
    }
    
    public function delete($id){
        $query  = $this->db->query("DELETE from lugares WHERE id = $id;");
        return $this->db->affected_rows();
    }
}