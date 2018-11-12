<?php

class modelLocalizaciones extends CI_Model {

    public function getAll(){
        $query = $this->db->query("SELECT localizaciones.id, localizaciones.descripcion, localizaciones.fotografia, localizaciones.id_lugar, localizaciones.id_pelicula, peliculas.titulo, lugares.nombre  from localizaciones INNER JOIN peliculas ON peliculas.id = localizaciones.id_pelicula INNER JOIN lugares ON lugares.id = localizaciones.id_lugar;");
        
        if ($query->num_rows() > 0){
           foreach ($query->result_array() as $row){
            $data[] = $row;
         }
        }
    return $data;
    }

     public function insert($descripcion, $img, $id_lugar, $id_pelicula){
         $query = $this->db->query("INSERT INTO localizaciones VALUES (null,'$descripcion','$img','$id_lugar','$id_pelicula');");

         return $this->db->affected_rows();
    }

    public function checkImg(){
        $config['upload_path'] = './assets/img';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size']     = 1000000;
        $config['max_width'] = 1024000;
        $config['max_height'] = 768000;

        $this->load->library('upload', $config);
// EL INPUT NAME VA AQUI:
        if(!$this->upload->do_upload('fotografia')){
            echo $this->upload->display_errors();
            return false;
        }else{
            
            $img_name = $this->upload->data('file_name'); 
            return $img_name;
        }
    }

    public function checkImgDefault(){
        $config['upload_path'] = './assets/img';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size']     = 1000000;
        $config['max_width'] = 1024000;
        $config['max_height'] = 768000;

        $img_name = false;

        $this->load->library('upload', $config);

        if(!$this->upload->do_upload('fotografiaDefault')){
            echo $this->upload->display_errors();
        }else{
            $img_name = $this->upload->data('file_name'); 
        }
        return $img_name;
    }


    function get($id){
        $query = $this->db->query("SELECT * from localizaciones where id = $id");
        
    return $query->result_array()[0];
    }

        function update($id, $descripcion, $imagen, $id_lugar, $id_pelicula){

        $query = $this->db->query("DELETE from localizaciones where id = $id");
            
        $query = $this->db->query("INSERT INTO localizaciones VALUES ($id, '$descripcion', '$imagen', $id_lugar, $id_pelicula);");

     return $this->db->affected_rows();
    }

    public function delete($id){
        $query  = $this->db->query("DELETE from localizaciones WHERE id = $id;");
        return $this->db->affected_rows();
    }
    

}