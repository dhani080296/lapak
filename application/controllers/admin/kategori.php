<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Kategori extends CI_Controller {
    public function __construct() {
        parent::__construct();
     if(!$this->session->userdata('status')){
            redirect('login_p');
        }
        $this->load->model('model_kategori');
    }

    public function index()
	{
        $data['kategoris']= $this->model_kategori->all();
		$this->load->view('admin/view_all_kategori',$data);
	}
        public function create(){
            
            $this->form_validation->set_rules('nama_kategori','Nama_kategori','required');
            if($this->form_validation->run()==FALSE){
            $this->load->view('admin/tambah_kategori');
        }else {
          
                   
                
                    $data_kategori= array(
                        
                    'nama_kategori' =>  set_value('nama_kategori'),
                    
                    );
                $this->model_kategori->create($data_kategori);
                redirect('admin/kategori', $this->session->set_flashdata('tambah','<div class="alert alert-success">
										<button type="button" class="close" data-dismiss="alert">
											<i class="icon-remove"></i>
										</button>
										Kategori Berhasil ditambah....!!
										<br />
									</div>'));  
                }
        }
        
       public function update($id){
            $this->form_validation->set_rules('id_kategori','Id_kategori','required');
            $this->form_validation->set_rules('nama_kategori','Nama_kategori','required');
            if($this->form_validation->run()==FALSE){
             $data['kategori']=  $this->model_kategori->find($id);
            $this->load->view('admin/edit_kategori',$data);
        }else {
             
             
                  $data_kategori= array(
                    'id_kategori' =>  set_value('id_kategori'),
                    'nama_kategori' =>  set_value('nama_kategori'),
                     
                );
                $this->model_kategori->update($id,$data_kategori);
                redirect('admin/kategori', $this->session->set_flashdata('tambah','<div class="alert alert-success">
										<button type="button" class="close" data-dismiss="alert">
											<i class="icon-remove"></i>
										</button>
										Kategori Berhasil diubah....!!
										<br />
									</div>'));      
                }
        
        }
        public function delete($id){
            $this->model_kategori->delete($id);
            redirect('admin/kategori', $this->session->set_flashdata('tambah','<div class="alert alert-success">
										<button type="button" class="close" data-dismiss="alert">
											<i class="icon-remove"></i>
										</button>
										Kategori Berhasil dihapus....!!
										<br />
									</div>'));
        }
    }