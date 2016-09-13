<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_barang extends CI_Model {
  
  
     public function all(){
         $this->db->select('barang.id_barang,barang.nama_barang,kategori.id_kategori,kategori.nama_kategori,barang.gambar,barang.deskripsi,barang.kontak,barang.date,barang.status,barang.id_penjual');
            $this->db->join('kategori', 'kategori.id_kategori = barang.id_kategori');
     $sql= $this->db->order_by('id_barang','Asc')->get('barang');
      if($sql->num_rows()>0){
          return $sql->result();
      }else{
          return array();
      }
        
            
       
    }
    public function get_logged_id_admin(){
        $hasil=  $this->db
                ->select('id_penjual')
                ->where('username',  $this->session->userdata('username'))
                ->limit(1)
                ->get('penjual');
         if($hasil->num_rows()>0){
             return $hasil->row()->id_penjual;  
         }else{
             return 0; 
         }
    }

    public function find2($id2){
        $hasil= $this->db->where('id_kategori',$id2)
            ->limit(1)->get('barang');
        if($hasil->num_rows()>0){
            return $hasil->row();
        }else{
            return array();
        }
    }

    public function find($id){
        $hasil= $this->db->where('id_barang',$id)
            ->limit(1)->get('barang');
        if($hasil->num_rows()>0){
            return $hasil->row();
        }else{
            return array();
        }
    }
    public function create($data_barangs){
        $this->db->insert('barang',$data_barangs);
    }
    public function update($id,$data_barangs){
         $this->db->where('id_barang',$id)->update('barang',$data_barangs);
    }
   public function delete($id,$data_barangs){
         $this->db->where('id_barang',$id)->delete('barang',$data_barangs);
    }
   
}

