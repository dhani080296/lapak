<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Penjual extends CI_Controller {
    public function __construct() {
        parent::__construct();
      if(!$this->session->userdata('status')){
            redirect('login_p');
        }
        $this->load->model('model_penjual');
       
    }
         
    public function index()
	{
        $data['penjuals']= $this->model_penjual->all();
        
		$this->load->view('admin/view_all_penjual',$data);
	}
        public function create(){
            
          
           $bc['pertanyaan'] 		= $this->model_penjual->getAllData('pertanyaan');
          
            $this->form_validation->set_rules('nama','Nama','required');
            $this->form_validation->set_rules('alamat','Alamat','required');
            $this->form_validation->set_rules('username','Username','required');
            $this->form_validation->set_rules('password','Password','required');
            $this->form_validation->set_rules('id_pertanyaan','Id_pertanyaan','required');
            $this->form_validation->set_rules('jawaban','Jawaban','required');
            if($this->form_validation->run()==FALSE){
           
                 
            $this->load->view('admin/tambah_penjual',$bc);
        }else {
            $this->load->library('upload');
                $config['upload_path'] = 'gambar';
		$config['allowed_types'] = 'jpg|png';
		$config['max_size']	= '3000';
		$config['max_width']  = '2000';
		$config['max_height']  = '2000';

                $this->upload->initialize($config);
                
            if(! $this->upload->do_upload()){
                   $this->load->view('admin/tambah_penjual',$bc);
                }else{
                     $gambar=  $this->upload->data();
                    $data_penjual= array(
                        
                    'nama' =>  set_value('nama'),
                    'alamat'=>  set_value('alamat'),
                    'username'=>  set_value('username'),
                    'password'=>  set_value('password'),
                   
                    'jawaban'=>  set_value('jawaban'),
                      'foto'=> $gambar['file_name']
                    
                );
                     $data_penjual['id_pertanyaan'] =$this->input->post("id_pertanyaan");
                    $data_penjual['status']="penjual";
                $this->model_penjual->create($data_penjual);
                redirect('admin/penjual');
                }
                 
                    $data_penjual= array(
                        
                    'nama' =>  set_value('nama'),
                    'alamat'=>  set_value('alamat'),
                    'username'=>  set_value('username'),
                    'password'=>  set_value('password'),
                   
                    'jawaban'=>  set_value('jawaban'),
                      
                    
                );
                     $data_penjual['id_pertanyaan'] =$this->input->post("id_pertanyaan");
                    $data_penjual['status']="penjual";
                $this->model_penjual->create($data_penjual);
                redirect('admin/penjual',$this->session->set_flashdata('tambah','<div class="alert alert-success">
										<button type="button" class="close" data-dismiss="alert">
											<i class="icon-remove"></i>
										</button>
										Penjual Berhasil ditambah....!!
										<br />
									</div>'));
        }
        }
        public function update($id){
           $data['pertanyaan'] 		= $this->model_penjual->getAllData('pertanyaan');
           $this->form_validation->set_rules('id_penjual','Id_penjual','required');
           $this->form_validation->set_rules('nama','Nama','required');
            $this->form_validation->set_rules('alamat','Alamat','required');
            $this->form_validation->set_rules('username','Username','required');
            $this->form_validation->set_rules('password','Password','required');
            $this->form_validation->set_rules('id_pertanyaan','Id_pertanyaan','required');
            $this->form_validation->set_rules('jawaban','Jawaban','required');
            if($this->form_validation->run()==FALSE){
              
             $data['penjual']=  $this->model_penjual->find($id);
            $this->load->view('admin/edit_penjual',$data);
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
                 
                   $this->load->view('admin/edit_penjual',$data);
                }else{
                    $gambar=  $this->upload->data();
                    $data_penjual= array(
                    'id_penjual' =>  set_value('id_penjual'),  
                    'nama' =>  set_value('nama'),
                    'alamat'=>  set_value('alamat'),
                    'username'=>  set_value('username'),
                    'password'=>  set_value('password'),
                    'jawaban'=>  set_value('jawaban'),
                    'foto'=> $gambar['file_name']    
                    
                );
                   
               $data_penjual['id_pertanyaan'] =$this->input->post("id_pertanyaan");
                $this->model_penjual->update($id,$data_penjual);
                redirect('admin/penjual',$this->session->set_flashdata('tambah','<div class="alert alert-success">
										<button type="button" class="close" data-dismiss="alert">
											<i class="icon-remove"></i>
										</button>
										Penjual Berhasil diubah....!!
										<br />
									</div>'));
                }
                }else{
                     $data_penjual= array(
                    'id_penjual' =>  set_value('id_penjual'),  
                    'nama' =>  set_value('nama'),
                    'alamat'=>  set_value('alamat'),
                    'username'=>  set_value('username'),
                    'password'=>  set_value('password'),
                    'jawaban'=>  set_value('jawaban'),
                      
                    
                );
                   
               $data_penjual['id_pertanyaan'] =$this->input->post("id_pertanyaan");
                $this->model_penjual->update($id,$data_penjual);
                redirect('admin/penjual',$this->session->set_flashdata('tambah','<div class="alert alert-success">
										<button type="button" class="close" data-dismiss="alert">
											<i class="icon-remove"></i>
										</button>
										Penjual Berhasil diubah....!!
										<br />
									</div>'));
                }
        }
        }
         public function delete($id){
            $this->model_penjual->delete($id);
            redirect('admin/penjual',$this->session->set_flashdata('tambah','<div class="alert alert-success">
										<button type="button" class="close" data-dismiss="alert">
											<i class="icon-remove"></i>
										</button>
										Penjual Berhasil dihapus....!!
										<br />
									</div>'));
        }
        
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */