<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_komentar extends CI_Model {
  
  
     public function all(){
        $this->db->select('penjual.nama,barang.nama_barang,pesan.id_pesan,pesan.date,pesan.komentar ');
               $this->db->join('barang', 'barang.id_barang = pesan.id_barang');
                $this->db->join('penjual', 'penjual.id_penjual = barang.id_penjual');
               $sql= $this->db->order_by('id_pesan','Asc')->get('pesan');
      if($sql->num_rows()>0){
          return $sql->result();
      }else{
          return array();
      }
    }
    
   public function delete($id,$data_komentars){
         $this->db->where('id_pesan',$id)->delete('pesan',$data_komentars);
    }
}

