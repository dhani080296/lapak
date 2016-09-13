<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_pertanyaan extends CI_Model {
  
  
     public function all(){
        $hasil= $this->db->get('pertanyaan');
        if($hasil->num_rows()>0){
            return $hasil->result();
        }else{
            return array();
        }
    }
     public function cari_semua(){
        return $this->db->order_by('id_pertanyaan','Asc')
                ->get('pertanyaan')->result();
        
    }
     public function find($id){
        $hasil= $this->db->where('id_pertanyaan',$id)
            ->limit(1)->get('pertanyaan');
        if($hasil->num_rows()>0){
            return $hasil->row();
        }else{
            return array();
        }
    }
    public function create($data_pertanyaans){
        $this->db->insert('pertanyaan',$data_pertanyaans);
    }
    public function update($id,$data_pertanyaans){
         $this->db->where('id_pertanyaan',$id)->update('pertanyaan',$data_pertanyaans);
    }
   public function delete($id,$data_pertanyaans){
         $this->db->where('id_pertanyaan',$id)->delete('pertanyaan',$data_pertanyaans);
    }
}

