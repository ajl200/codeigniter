
<?php
class modelPeliculas extends CI_Model {

    // SELECT TODAS LAS PELICULAS
     function getAll (){
        $query = $this->db->query("SELECT * FROM peliculas;");
        
        if ($query->num_rows() > 0){
           foreach ($query->result_array() as $row){
            $data[] = $row;
        }
    }
    
    return $data;
}
     function insert ($nombre, $anyo, $pais, $cartel){
        $query = $this->db->query("INSERT INTO peliculas VALUES (null,'$nombre','$anyo','$pais','$cartel');");
     return $this->db->affected_rows();
    }

    function get($id){
        $query = $this->db->query("SELECT * from peliculas where id = $id");
        
    return $query->result_array()[0];
    }

    function update($id,$titulo, $anyo, $pais, $cartel){

        $query = $this->db->query("DELETE from peliculas where id = $id");

        $query = $this->db->query("INSERT INTO peliculas VALUES ($id,'$titulo','$anyo','$pais','$cartel');");

     return $this->db->affected_rows();
    }

    function delete($id){
        $query = $this->db->query("DELETE from peliculas WHERE id = $id;");
        return $this->db->affected_rows();
    }

    public function checkImg(){
        $config['upload_path'] = './assets/img';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size']     = 1000000;
        $config['max_width'] = 1024000;
        $config['max_height'] = 768000;

        $img_name = false;

        $this->load->library('upload', $config);

        if(!$this->upload->do_upload('cartel')){
            echo $this->upload->display_errors();
        }else{
            $img_name = $this->upload->data('file_name'); 
        }
        return $img_name;
    }

    public function checkImgDefault(){
        $config['upload_path'] = './assets/img';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size']     = 1000000;
        $config['max_width'] = 1024000;
        $config['max_height'] = 768000;

        $img_name = false;

        $this->load->library('upload', $config);

        if(!$this->upload->do_upload('defaultImage')){
            echo $this->upload->display_errors();
        }else{
            $img_name = $this->upload->data('file_name'); 
        }
        return $img_name;
    }
    
}
/* en autoload helper 
config bas url http localhost/codeigniter 
enlaces : site url (enlace absoluto)
y luego en los form action= site_url("controlador/modelo")'
*/

