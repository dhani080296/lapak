<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_barang_penjual extends CI_Model {
  
  
    

        public function all(){
         $this->db->select('barang.id_barang,barang.nama_barang,kategori.nama_kategori,barang.gambar,barang.deskripsi,barang.kontak,barang.date,barang.status,barang.id_penjual');
            $this->db->join('kategori', 'kategori.id_kategori = barang.id_kategori');
     $sql= $this->db->order_by('id_barang','Asc')->get('barang');
      if($sql->num_rows()>0){
          return $sql->result();
      }else{
          return array();
      }
        
            
       
    }
     public function find3($id){
        $hasil= $this->db->where('id_kategori',$id)
            ->limit(1)->get('barang');
        if($hasil->num_rows()>0){
            return $hasil->row();
        }else{
            return array();
        }
    }
    
   
 
    public function find($id){
        $this->db->select('kategori.id_kategori,kategori.nama_kategori,penjual.id_penjual,penjual.nama,penjual.alamat,penjual.foto,barang.id_barang,barang.nama_barang,barang.gambar,barang.deskripsi,
            barang.kontak,barang.date,barang.status ');
               $this->db->join('kategori', 'kategori.id_kategori = barang.id_kategori');
                $this->db->join('penjual', 'penjual.id_penjual = barang.id_penjual');
           $hasil=$this->db->where('id_barang',$id)
            ->limit(1)->get('barang');
        if($hasil->num_rows()>0){
            return $hasil->result();
        }else{
            return array();
        }
    }
    
   
}

