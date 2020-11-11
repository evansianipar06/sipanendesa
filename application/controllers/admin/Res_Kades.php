<?php
class Res_Kades extends CI_Controller{
	function __construct(){
		parent::__construct();
		if($this->session->userdata('masuk') !=TRUE){
            $url=base_url();
            redirect($url);
		};
		$data['data'] = $this->m_res_kades->total_rows();
		$this->load->model('m_res_kades');
		$this->load->model('m_res_mas');
		$this->load->model('m_keluhan');
	}
	
	function index(){
	if($this->session->userdata('akses')=='1' || $this->session->userdata('akses')=='2' || $this->session->userdata('akses')=='3'){
		$data['data']=$this->m_res_kades->tampil_feedback();
		$this->load->view('admin/v_respon_kades',$data);
	}else{
        echo "Halaman tidak ditemukan";
    }
	}
	function tambah_feedback(){
	if($this->session->userdata('akses')=='1' || $this->session->userdata('akses')=='2' || $this->session->userdata('akses')=='3'){
		$nama=$this->input->post('nama');
		$email=$this->input->post('email');
		$res=$this->input->post('respon');
		$this->m_res_kades->simpan_feedback($nama, $email, $res);
		echo $this->session->set_flashdata('msg','<label class="label label-success">Feedback terkirim !</label>');
		redirect('admin/res_kades');
	}else{
		echo $this->session->set_flashdata('msg','<label class="label label-warning">Mohon maaf, Feedback anda belum terkirim</label>');
    }
	}
}