<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {
    public function __construct() {
        parent::__construct();
         $this->load->model('model_web');
         $this->load->model('model_penjual');
         $this->load->model('model_kategori');
          $this->load->model('model_barang_penjual');
    }

        public function index()
	{
            $data['barangs']= $this->model_web->all();
            $data['kategori']= $this->model_kategori->all();
		$this->load->view('bg_home',$data);
	}
         public function detail($id){
           $bc['barang']=  $this->model_barang_penjual->find($id);
          
           
           $this->load->view('detail_barang_penjual',$bc);
       
          
                    
       }
        public function kirim($id){
           $data=  $this->model_barang_penjual->find($id);
        $this->form_validation->set_rules('komentar','Deskripsi','required');
            if($this->form_validation->run()==FALSE){
                 $this->load->view('kirim',$data);
             }else {
                
                    $id=  $this->uri->segment(3);
                 
             
                    $kirim['komentar']=  set_value('komentar');
                    $kirim['date']=date("y-m-d");
                     $kirim['id_barang']=$id;
                     
                 
                $this->model_web->create($kirim);
                redirect('home',$this->session->set_flashdata('tambah','<div class="alert alert-success">
										<button type="button" class="close" data-dismiss="alert">
											<i class="icon-remove"></i>
										</button>
										Komentar Berhasil dikirim....!!
										<br />
									</div>'));   
        }   
       }
       public function kategori_barang($nama){
            $data['kategori']= $this->model_kategori->all();
           $data['kategori2']= $this->model_web->find2($nama);
           $data['barangs']= $this->model_web->all();
		$this->load->view('bg_kategori_barang',$data);
                
       }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */