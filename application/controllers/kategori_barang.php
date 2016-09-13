<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Kategori extends CI_Controller {
    public function __construct() {
        parent::__construct();
   
        $this->load->model('model_kategori');
    }

    public function index()
	{
        $data['kategoris']= $this->model_kategori->all();
		$this->load->view('menu',$data);
	}
        
    }