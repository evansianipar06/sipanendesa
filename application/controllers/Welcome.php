<?php
class Welcome extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('m_res_mas');
		$this->load->model('m_res_kades');
		$this->load->model('m_keluhan');
		$this->load->model('m_penjualan');

		if($this->session->userdata('masuk') !=TRUE){
            $url=base_url();
            redirect($url);
        };
	}
	
	function index(){
		$this->load->view('admin/v_index');
	}
}