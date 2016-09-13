<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_web extends CI_Model {
  
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
     public function find2($nama){
        $hasil= $this->db->where('nama_kategori',$nama)
            ->limit(1)->get('kategori');
        if($hasil->num_rows()>0){
            return $hasil->row();
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
    public function check_credential(){
        $username=  set_value('username');
        $password=  set_value('password');
        
        $hasil= $this->db->where('username',$username)
                         ->where('password',$password)
                        ->limit(1)->get('penjual');
        
        if($hasil->num_rows()>0){
            return $hasil->row();
        }else{
            return array();
        }
    }
    
        public function check_credential2(){
        $username=  set_value('username');
      
        
        $hasil= $this->db->where('username',$username)
                         
                        ->limit(1)->get('penjual');
        
        if($hasil->num_rows()>0){
            return $hasil->row();
        }else{
            return array();
        }
    }
     public function check_credential3(){
        $jawaban=  set_value('jawaban');
      
        
        $hasil= $this->db->where('jawaban',$jawaban)
                         
                        ->limit(1)->get('penjual');
        
        if($hasil->num_rows()>0){
            return $hasil->row();
        }else{
            return array();
        }
    }
     
   public function get_logged_id_admin(){
        $hasil=  $this->db
                ->select('id_penjual')
                ->where('username')
                ->limit(1)
                ->get('penjual');
         if($hasil->num_rows()>0){
             return $hasil->row()->id_penjual;  
         }else{
             return 0; 
         }
    }
     public function create($kirims){
        $this->db->insert('pesan',$kirims);
    }
    
    public function all2(){
        $hasil= $this->db->get('pesan');
        if($hasil->num_rows()>0){
            return $hasil->result();
        }else{
            return array();
        }
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
    
     public function update($id,$data_penjuals){
         $this->db->where('id_penjual',$id)->update('penjual',$data_penjuals);
    }
}

