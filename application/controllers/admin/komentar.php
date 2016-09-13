<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Komentar extends CI_Controller {
    public function __construct() {
        parent::__construct();
     if(!$this->session->userdata('status')){
            redirect('login_p');
        }
        $this->load->model('model_komentar');
    }

    public function index()
	{
        $data['komentars']= $this->model_komentar->all();
		$this->load->view('admin/view_all_komentar',$data);
	}
       
        
        public function delete($id){
            $this->model_komentar->delete($id);
            redirect('admin/komentar',$this->session->set_flashdata('tambah','<div class="alert alert-success">
										<button type="button" class="close" data-dismiss="alert">
											<i class="icon-remove"></i>
										</button>
										Komentar Berhasil dihapus....!!
										<br />
									</div>'));
        }
    }