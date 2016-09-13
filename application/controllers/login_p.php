<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login_p extends CI_Controller {
public function __construct() {
    parent::__construct();
    session_start();
    $this->load->model('model_web');
     $this->load->model('model_penjual');
     $this->load->model('model_pertanyaan');
}

	public function index()
	{
		 $this->form_validation->set_rules('username','Username','required|alpha_numeric');
          $this->form_validation->set_rules('password','Password','required|alpha_numeric');
           if($this->form_validation->run()==FALSE){
        $this->load->view('login_admin');
           }  else {
               
               $valid_user=  $this->model_web->check_credential();
               
               if($valid_user==FALSE){
                   $this->session->set_flashdata('error','<div class="alert alert-danger">
										<button type="button" class="close" data-dismiss="alert">
											<i class="icon-remove"></i>
										</button>
										Username atau Password salah....!!
										<br />
									</div>');
                   redirect('login_p');
               }  else {
                    $this->session->set_userdata('id_penjual',$valid_user->id_penjual);
                   $this->session->set_userdata('username',$valid_user->username);
                    $this->session->set_userdata('status',$valid_user->status);    
                   
                    if($valid_user->status=='admin'){
                        redirect('admin/pertanyaan', $this->session->set_flashdata('admin','<div class="alert alert-info">
										<button type="button" class="close" data-dismiss="alert">
											<i class="icon-remove"></i>
										</button>
										Login berhasil & selamat datang admin....!!
										<br />
									</div>'));
                        
                    }elseif ($valid_user->status=='penjual') {
                    redirect('barang_penjual',$this->session->set_flashdata('penjual','<div class="alert alert-info">
										<button type="button" class="close" data-dismiss="alert">
											<i class="icon-remove"></i>
										</button>
										Login berhasil & selamat datang penjual....!!
										<br />
									</div>'));
                }
               }
           }
	}
        
        public function logout()
	{$this->session->sess_destroy();
        redirect('home');
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
           
                 
            $this->load->view('tambah_penjual',$bc);
        }else {
            $this->load->library('upload');
                $config['upload_path'] = 'gambar';
		$config['allowed_types'] = 'jpg|png';
		$config['max_size']	= '3000';
		$config['max_width']  = '2000';
		$config['max_height']  = '2000';

                $this->upload->initialize($config);
                
            if(! $this->upload->do_upload()){
                   $this->load->view('tambah_penjual',$bc);
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
                redirect('login_p');
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
                redirect('login_p');
        }
        }
        public function lupa()
	{
		 $this->form_validation->set_rules('username','Username','required|alpha_numeric');
         
           if($this->form_validation->run()==FALSE){
        $this->load->view('lupa_password');
           }  else {
               
               $valid_user=  $this->model_web->check_credential2();
               
               if($valid_user==FALSE){
                   $this->session->set_flashdata('error','<div class="alert alert-danger">
										<button type="button" class="close" data-dismiss="alert">
											<i class="icon-remove"></i>
										</button>
										Username salah....!!
										<br />
									</div>');
                   redirect('login_p/lupa');
               }  else {
                    $this->session->set_userdata('id_penjual',$valid_user->id_penjual);
                   $this->session->set_userdata('username',$valid_user->username);
                    $this->session->set_userdata('status',$valid_user->status);    
                   
                  if ($valid_user->status=="admin") {
                    redirect('login_p/pertanyaan');
                }else  if ($valid_user->status=="penjual") {
                    redirect('login_p/pertanyaan');
                }
               }
           }
	}
        public function pertanyaan()
	{
		 
          $this->load->model('model_penjual');
    
        
         $bc['penjual'] 		= $this->model_penjual->all();
          $this->form_validation->set_rules('jawaban','Jawaban','required');
           if($this->form_validation->run()==FALSE){
        $this->load->view('form_pertanyaan',$bc);
           }  else {
               
               $valid_user=  $this->model_web->check_credential3();
               
               if($valid_user==FALSE){
                   $this->session->set_flashdata('error','<div class="alert alert-danger">
										<button type="button" class="close" data-dismiss="alert">
											<i class="icon-remove"></i>
										</button>
										Jawaban salah....!!
										<br />
									</div>');
                   redirect('login_p/pertanyaan');
               }  else {
                     $this->session->set_userdata('id_penjual',$valid_user->id_penjual);
                   $this->session->set_userdata('username',$valid_user->username);
                    $this->session->set_userdata('status',$valid_user->status);    
                   
                    if ($valid_user->status=="admin") {
                    redirect('login_p/update_password/'.$this->session->userdata('id_penjual'));
                }else if ($valid_user->status=="penjual") {
                    redirect('login_p/update_password/'.$this->session->userdata('id_penjual'));
                }
               }
           }
	}
        public function update_password($id){
            if(!$this->session->userdata('status')){
            redirect('login_p/lupa');
        }
            $data['pertanyaan'] 		= $this->model_penjual->getAllData('pertanyaan');
          
            $this->form_validation->set_rules('password','Password','required');
           
            if($this->form_validation->run()==FALSE){
              
             $data['penjual']=  $this->model_web->find($id);
            $this->load->view('ubah_password',$data);
        }else {
            
                   
                    $data_penjual= array(
                   
                    'password'=>  set_value('password'),
                   
                );
                   
               
                $this->model_web->update($id,$data_penjual);
                redirect('login_p');
                }
                
        
        } 
        
}