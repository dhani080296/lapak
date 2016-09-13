<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_kategori extends CI_Model {
  
  
     public function all(){
        $hasil= $this->db->get('kategori');
        if($hasil->num_rows()>0){
            return $hasil->result();
        }else{
            return array();
        }
    }
     public function getAllData($table)
	{
		return $this->db->get($table);
	}
     public function cari_semua(){
        return $this->db->order_by('id_kategori','Asc')
                ->get('kategori')->result();
        
    }
     public function find($id){
        $hasil= $this->db->where('id_kategori',$id)
            ->limit(1)->get('kategori');
        if($hasil->num_rows()>0){
            return $hasil->row();
        }else{
            return array();
        }
    }
    public function create($data_kategoris){
        $this->db->insert('kategori',$data_kategoris);
    }
    public function update($id,$data_kategoris){
         $this->db->where('id_kategori',$id)->update('kategori',$data_kategoris);
    }
   public function delete($id,$data_kategoris){
         $this->db->where('id_kategori',$id)->delete('kategori',$data_kategoris);
    }
}

