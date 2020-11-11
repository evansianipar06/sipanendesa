<?php
class Feedback_to_Masyarakat extends CI_Controller{
	function __construct(){
		parent::__construct();
		if($this->session->userdata('masuk') !=TRUE){
            $url=base_url();
            redirect($url);
        };
		$this->load->model('m_res_kades');
		$this->load->model('m_res_mas');
		$this->load->model('m_keluhan');
	}
	public function index(){
	if($this->session->userdata('akses')=='1' || $this->session->userdata('akses')=='2' || $this->session->userdata('akses')=='3'){
		$data['data']=$this->m_res_mas->tampil_feedback();
		$this->load->view('admin/v_res_masyarakat',$data);
	}else{
        echo "Halaman tidak ditemukan";
    }
	}
}