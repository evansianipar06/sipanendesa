<?php
class Keluhan extends CI_Controller{
	function __construct(){
		parent::__construct();
		if($this->session->userdata('masuk') !=TRUE){
            $url=base_url();
            redirect($url);
        };
		$this->load->model('m_keluhan');
		$this->load->model('m_res_kades');
		$this->load->model('m_res_mas');
	}
	function index(){
	if($this->session->userdata('akses')=='1' || $this->session->userdata('akses')=='2' || $this->session->userdata('akses')=='3'){
		$data['data']=$this->m_keluhan->tampil_keluhan();
		$this->load->view('admin/v_keluhan',$data);
	}else{
        echo "Halaman tidak ditemukan";
    }
	}
	function tambah_keluhan(){
	if($this->session->userdata('akses')=='1' || $this->session->userdata('akses')=='2' || $this->session->userdata('akses')=='3'){
		$nama=$this->input->post('nama');
		$email=$this->input->post('email');
		$kel=$this->input->post('keluhan');
		$this->m_keluhan->simpan_keluhan($nama, $email, $kel);
		echo $this->session->set_flashdata('msg','<label class="label label-success">Keluhan terkirim !</label>');
		redirect('admin/keluhan');
	}else{
		echo $this->session->set_flashdata('msg','<label class="label label-warning">Mohon maaf, keluhan anda belum terkirim</label>');
    }
	}
}