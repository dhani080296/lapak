<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_penjual extends CI_Model {
  
  
     public function all(){
         $this->db->select('penjual.id_penjual,penjual.nama,penjual.alamat,penjual.username,penjual.password,pertanyaan.nama_pertanyaan,penjual.jawaban,penjual.foto');
            $this->db->join('pertanyaan', 'pertanyaan.id_pertanyaan = penjual.id_pertanyaan');
     $sql= $this->db->order_by('id_penjual','Asc')->get('penjual');
      if($sql->num_rows()>0){
          return $sql->result();
      }else{
          return array();
      }
        
            
       
    }
   
    public function getAllData($table)
	{
		return $this->db->get($table);
	}
     public function find($id){
        $hasil= $this->db->where('id_penjual',$id)
            ->limit(1)->get('penjual');
        if($hasil->num_rows()>0){
            return $hasil->row();
        }else{
            return array();
        }
    }
    public function create($data_penjuals){
        $this->db->insert('penjual',$data_penjuals);
    }
    public function update($id,$data_penjuals){
         $this->db->where('id_penjual',$id)->update('penjual',$data_penjuals);
    }
   public function delete($id,$data_penjuals){
         $this->db->where('id_penjual',$id)->delete('penjual',$data_penjuals);
    }
   function updateDataMultiField($table,$data,$field_key)
	{
		$this->db->update($table,$data,$field_key);
	}
}

