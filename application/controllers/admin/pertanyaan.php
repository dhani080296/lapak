<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pertanyaan extends CI_Controller {
    public function __construct() {
        parent::__construct();
    if($this->session->userdata('status')!='admin'){
            $this->session->set_flashdata('error','Sorry you are not Logged in!!....');
            redirect('login_admin');
        }
        $this->load->model('model_pertanyaan');
    }

    public function index()
	{
       
        $data['pertanyaans']= $this->model_pertanyaan->all();
		$this->load->view('admin/view_all_pertanyaan',$data);
	
                
                }
        public function create(){
             
                    
            $this->form_validation->set_rules('nama_pertanyaan','Nama_Pertanyaan','required');
            if($this->form_validation->run()==FALSE){
            $this->load->view('admin/tambah_pertanyaan');
        }else {
          
                    $data_pertanyaan= array(
                       
                    'nama_pertanyaan' =>  set_value('nama_pertanyaan'),
                    );
                $this->model_pertanyaan->create($data_pertanyaan);
                redirect('admin/pertanyaan',$this->session->set_flashdata('tambah','<div class="alert alert-success">
										<button type="button" class="close" data-dismiss="alert">
											<i class="icon-remove"></i>
										</button>
										Pertanyaan Berhasil ditambah....!!
										<br />
									</div>'));   
        }
        
       
        }
       public function update($id){
           
          
            $this->form_validation->set_rules('id_pertanyaan','Id_Pertanyaan','required');
           $this->form_validation->set_rules('nama_pertanyaan','Nama_Pertanyaan','required');
            if($this->form_validation->run()==FALSE){
             $data['pertanyaan']=  $this->model_pertanyaan->find($id);
            $this->load->view('admin/edit_pertanyaan',$data);
        }else {
            
                    $data_pertanyaan= array(
                    'id_pertanyaan' =>  set_value('id_pertanyaan'),
                    'nama_pertanyaan' =>  set_value('nama_pertanyaan'),
                );
                $this->model_pertanyaan->update($id,$data_pertanyaan);
                redirect('admin/pertanyaan',$this->session->set_flashdata('tambah','<div class="alert alert-success">
										<button type="button" class="close" data-dismiss="alert">
											<i class="icon-remove"></i>
										</button>
										Pertanyaan Berhasil diubah....!!
										<br />
									</div>'));   
        }
        
        
        }
        public function delete($id){
            $this->model_pertanyaan->delete($id);
            redirect('admin/pertanyaan',$this->session->set_flashdata('tambah','<div class="alert alert-success">
										<button type="button" class="close" data-dismiss="alert">
											<i class="icon-remove"></i>
										</button>
										Pertanyaan Berhasil dihapus....!!
										<br />
									</div>'));
        }
    }