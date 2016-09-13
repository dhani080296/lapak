<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Barang_penjual extends CI_Controller {
    public function __construct() {
        parent::__construct();
     
        
        if(!$this->session->userdata('status')){
            redirect('login_p');
        }
        $this->load->model('model_barang');
        $this->load->model('model_web');
         $this->load->model('model_penjual');
         $this->load->model('model_pertanyaan');
        $this->load->model('model_kategori');
        $this->load->model('model_barang_penjual');
       
    }
         
    public function index()
	{
         $data['barangs']= $this->model_barang->all();
         $data['kategori']= $this->model_kategori->all();
		$this->load->view('bg_home_penjual',$data);
	}
        public function create(){
            
          
           $bc['kategori'] 		= $this->model_kategori->getAllData('kategori');
          
            $this->form_validation->set_rules('nama_barang','Nama_barang','required');
            $this->form_validation->set_rules('id_kategori','Id_kategori','required');
            $this->form_validation->set_rules('deskripsi','Deskripsi','required');
            $this->form_validation->set_rules('kontak','Kontak','required|max_length[12]|numeric');
            
            if($this->form_validation->run()==FALSE){
           
                 
            $this->load->view('tambah_barang',$bc);
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
                redirect('barang_penjual', $this->session->set_flashdata('tambah','<div class="alert alert-success">
										<button type="button" class="close" data-dismiss="alert">
											<i class="icon-remove"></i>
										</button>
										Barang Berhasil ditambah....!!
										<br />
									</div>')); 
                }
        }
        }
        public function update($id){
           $bc['kategori'] 		= $this->model_kategori->getAllData('kategori');
          
           $this->form_validation->set_rules('nama_barang','Nama Barang','required');
           $this->form_validation->set_rules('id_kategori','Id_kategori','required');
            $this->form_validation->set_rules('deskripsi','Deskripsi','required');
            $this->form_validation->set_rules('kontak','Kontak','required|max_length[12]|numeric');
            if($this->form_validation->run()==FALSE){
              
             $bc['barang']=  $this->model_barang->find($id);
            $this->load->view('edit_barang',$bc);
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
                 $data['kategori']=  $this->model_kategori->find($id);
                   $this->load->view('edit_barang');
                }else{
                     $gambar=  $this->upload->data();
            
                    $data_barang= array(
                   
                    'nama_barang' =>  set_value('nama_barang'),
                    'deskripsi'=>  set_value('deskripsi'),
                    'kontak'=>  set_value('kontak'),
                    'gambar'=> $gambar['file_name']
                    
                );
               $data_barang['id_kategori'] =$this->input->post("id_kategori");
                $this->model_barang->update($id,$data_barang);
                redirect('barang_penjual', $this->session->set_flashdata('tambah','<div class="alert alert-success">
										<button type="button" class="close" data-dismiss="alert">
											<i class="icon-remove"></i>
										</button>
										Barang Berhasil diubah....!!
										<br />
									</div>')); 
                }
             }  else {
                  $data_barang= array(
                   
                    'nama_barang' =>  set_value('nama_barang'),
                    'deskripsi'=>  set_value('deskripsi'),
                    'kontak'=>  set_value('kontak'),
                      );
                   $data_barang['id_kategori'] =$this->input->post("id_kategori");
                      $this->model_barang->update($id,$data_barang);
                redirect('barang_penjual', $this->session->set_flashdata('tambah','<div class="alert alert-success">
										<button type="button" class="close" data-dismiss="alert">
											<i class="icon-remove"></i>
										</button>
										Barang Berhasil diubah....!!
										<br />
									</div>')); 
             }
        }
        }
       public function detail($id){
           $bc['barang']=  $this->model_barang_penjual->find($id);
            $bc['pesan']=  $this->model_web->all2();
           $this->load->view('detail_barang_penjual',$bc);
           
       }


      
        public function update_penjual($id){
            $data['pertanyaan'] 		= $this->model_penjual->getAllData('pertanyaan');
          
           $this->form_validation->set_rules('nama','Nama','required');
            $this->form_validation->set_rules('alamat','Alamat','required');
            $this->form_validation->set_rules('username','Username','required');
            $this->form_validation->set_rules('password','Password','required');
            $this->form_validation->set_rules('kontak','kontak','required');
            $this->form_validation->set_rules('id_pertanyaan','Id_pertanyaan','required');
            $this->form_validation->set_rules('jawaban','Jawaban','required');
            if($this->form_validation->run()==FALSE){
              
             $data['penjual']=  $this->model_penjual->find($id);
            $this->load->view('edit_penjual',$data);
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
                 
                   $this->load->view('edit_penjual');
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
                $this->model_penjual->update($id,$data_penjual);
                redirect('barang_penjual', $this->session->set_flashdata('tambah','<div class="alert alert-success">
										<button type="button" class="close" data-dismiss="alert">
											<i class="icon-remove"></i>
										</button>
										Profile Berhasil diubah....!!
										<br />
									</div>'));
                }
                }else{
                     $data_penjual= array(
                 
                    'nama' =>  set_value('nama'),
                    'alamat'=>  set_value('alamat'),
                    'username'=>  set_value('username'),
                    'password'=>  set_value('password'),
                    'jawaban'=>  set_value('jawaban'),
                    
                      
                    
                );
                   
               $data_penjual['id_pertanyaan'] =$this->input->post("id_pertanyaan");
                $this->model_penjual->update($id,$data_penjual);
                redirect('barang_penjual', $this->session->set_flashdata('tambah','<div class="alert alert-success">
										<button type="button" class="close" data-dismiss="alert">
											<i class="icon-remove"></i>
										</button>
										Profile Berhasil dihapus....!!
										<br />
									</div>'));
                }
        }
        }
        public function kategori_barang($nama){
            $data['kategori']= $this->model_kategori->all();
           $data['kategori2']= $this->model_web->find2($nama);
           $data['barangs']= $this->model_web->all();
		$this->load->view('bg_kategori_barang_penjual',$data);
                
       } 
        
        
         
        
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */