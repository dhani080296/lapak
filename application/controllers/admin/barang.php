<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Barang extends CI_Controller {
    public function __construct() {
        parent::__construct();
     
        
        if(!$this->session->userdata('status')){
            redirect('login_p');
        }
        $this->load->model('model_barang');
        $this->load->model('model_kategori');
       
    }
         
    public function index()
	{
        $data['barangs']= $this->model_barang->all();
        
		$this->load->view('admin/view_all_barang',$data);
	}
        public function create(){
            
          
           $bc['kategori'] 		= $this->model_kategori->getAllData('kategori');
          
            $this->form_validation->set_rules('nama_barang','Nama_barang','required');
            $this->form_validation->set_rules('id_kategori','Id_kategori','required');
            $this->form_validation->set_rules('deskripsi','Deskripsi','required');
            $this->form_validation->set_rules('kontak','Kontak','required|max_length[12]|numeric');
            
            if($this->form_validation->run()==FALSE){
           
                 
            $this->load->view('admin/tambah_barang',$bc);
        }else {
          $this->load->library('upload');
                $config['upload_path'] = 'gambar';
		$config['allowed_types'] = 'jpg|png';
		$config['max_size']	= '3000';
		$config['max_width']  = '2000';
		$config['max_height']  = '2000';

                $this->upload->initialize($config);
                
            if(! $this->upload->do_upload()){
               $this->load->view('admin/tambah_barang');
                }else{
                     $gambar=  $this->upload->data();
                $data_barang= array(
                        
                    'nama_barang' =>  set_value('nama_barang'),
                    'deskripsi'=>  set_value('deskripsi'),
                    'kontak'=>  set_value('kontak'),
                    'gambar'=> $gambar['file_name']
                    
                );    
                     $data_barang['id_kategori'] =$this->input->post("id_kategori");
                     
                     $data_barang['status']="Nonactive";
                    $data_barang['date']= date("y-m-d");
                    $data_barang['id_penjual']=$this->model_barang->get_logged_id_admin();
                $this->model_barang->create($data_barang);
                redirect('admin/barang', $this->session->set_flashdata('tambah','<div class="alert alert-success">
										<button type="button" class="close" data-dismiss="alert">
											<i class="icon-remove"></i>
										</button>
										Barang Berhasil ditambah....!!
										<br />
									</div>'));
                
                }
        }
        }
        public function update($id,$id2){
           $data['barangs']= $this->model_barang->all();
            $data['kategori'] 		= $this->model_kategori->getAllData('kategori');
           $this->form_validation->set_rules('id_barang','Id_barang','required');
           $this->form_validation->set_rules('nama_barang','Nama Barang','required');
           $this->form_validation->set_rules('id_kategori','Id_kategori','required');
            $this->form_validation->set_rules('deskripsi','Deskripsi','required');
            $this->form_validation->set_rules('kontak','Kontak','required|max_length[12]|numeric');
            if($this->form_validation->run()==FALSE){
             $data['kategoris']=  $this->model_kategori->find($id2); 
             $data['barang']=  $this->model_barang->find($id);
            $this->load->view('admin/edit_barang',$data);
        }else {
             if($_FILES['userfile']['name'] !=''){
             $this->load->library('upload');
                $config['upload_path'] = 'gambar';
		$config['allowed_types'] = 'jpg|png';
		$config['max_size']	= '3000';
		$config['max_width']  = '2000';
		$config['max_height']  = '2000';

                $this->upload->initialize($config);
                
            if(! $this->upload->do_upload()){
                 
                   $this->load->view('admin/edit_barang');
                }else{
                     $gambar=  $this->upload->data();
            
                    $data_barang= array(
                    'id_barang' =>  set_value('id_barang'),  
                    'nama_barang' =>  set_value('nama_barang'),
                    'deskripsi'=>  set_value('deskripsi'),
                    'kontak'=>  set_value('kontak'),
                    'gambar'=> $gambar['file_name']
                    
                );
               $data_barang['id_kategori'] =$this->input->post("id_kategori");
                $this->model_barang->update($id,$data_barang);
                redirect('admin/barang', $this->session->set_flashdata('tambah','<div class="alert alert-success">
										<button type="button" class="close" data-dismiss="alert">
											<i class="icon-remove"></i>
										</button>
										Barang Berhasil diubah....!!
										<br />
									</div>')); 
                }
             }  else {
                  $data_barang= array(
                    'id_barang' =>  set_value('id_barang'),  
                    'nama_barang' =>  set_value('nama_barang'),
                    'deskripsi'=>  set_value('deskripsi'),
                    'kontak'=>  set_value('kontak'),
                      );
                   $data_barang['id_kategori'] =$this->input->post("id_kategori");
                      $this->model_barang->update($id,$data_barang);
                redirect('admin/barang', $this->session->set_flashdata('tambah','<div class="alert alert-success">
										<button type="button" class="close" data-dismiss="alert">
											<i class="icon-remove"></i>
										</button>
										Barang Berhasil diubah....!!
										<br />
									</div>')); 
             }
        }
        }
        public function active($id){
            
            
            
              
             $this->model_barang->find($id);
            
        
             
             
                   $data_barang['status'] ="Active";
                   $data_barang['date']= date("y-m-d");
                      $this->model_barang->update($id,$data_barang);
                redirect('admin/barang', $this->session->set_flashdata('tambah','<div class="alert alert-success">
										<button type="button" class="close" data-dismiss="alert">
											<i class="icon-remove"></i>
										</button>
										Barang Berhasil diaktifkan....!!
										<br />
									</div>')); 
             
        
        }
 public function nonactive($id){
            
            
            
              
             $this->model_barang->find($id);
            
        
             
             
                   $data_barang['status'] ="Nonactive";
                   $data_barang['date']= date("y-m-d");
                      $this->model_barang->update($id,$data_barang);
                redirect('admin/barang' ,$this->session->set_flashdata('tambah','<div class="alert alert-success">
										<button type="button" class="close" data-dismiss="alert">
											<i class="icon-remove"></i>
										</button>
										Barang Berhasil dinonaktifkan....!!
										<br />
									</div>')); 
             
        
        }
        public function delete($id){
            $this->model_barang->delete($id);
            redirect('admin/barang', $this->session->set_flashdata('tambah','<div class="alert alert-success">
										<button type="button" class="close" data-dismiss="alert">
											<i class="icon-remove"></i>
										</button>
										Barang Berhasil dihapus....!!
										<br />
									</div>'));
        }
        
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */