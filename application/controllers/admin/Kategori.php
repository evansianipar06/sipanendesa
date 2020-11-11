<?php
class Kategori extends CI_Controller{
	function __construct(){
		parent::__construct();
		if($this->session->userdata('masuk') !=TRUE){
            $url=base_url();
            redirect($url);
        };
		$this->load->model('m_kategori');
		$this->load->model('m_res_kades');
		$this->load->model('m_res_mas');
		$this->load->model('m_keluhan');
	}
	function index(){
	if($this->session->userdata('akses')=='1'){
		$data['data']=$this->m_kategori->tampil_kategori();
		$this->load->view('admin/v_kategori',$data);
	}else{
        echo "Halaman tidak ditemukan";
    }
	}
	function tambah_kategori(){
	if($this->session->userdata('akses')=='1'){
		$kat=$this->input->post('kategori');
		$this->m_kategori->simpan_kategori($kat);
		echo $this->session->set_flashdata('msg','<label class="label label-success">Data Kategori berhasil ditambahkan</label>');
		redirect('admin/kategori');
	}else{
		echo $this->session->set_flashdata('msg','<label class="label label-warning">Mohon maaf, anda tidak memiliki hak akses</label>');
    }
	}
	function edit_kategori(){
	if($this->session->userdata('akses')=='1'){
		$kode=$this->input->post('kode');
		$kat=$this->input->post('kategori');
		$this->m_kategori->update_kategori($kode,$kat);
		echo $this->session->set_flashdata('msg','<label class="label label-success">Data Panen berhasil diupdate</label>');
		redirect('admin/kategori');
	}else{
		echo $this->session->set_flashdata('msg','<label class="label label-warning">Mohon maaf, anda tidak memiliki hak akses</label>');
    }
	}
	function hapus_kategori(){
	if($this->session->userdata('akses')=='1'){
		$kode=$this->input->post('kode');
		$this->m_kategori->hapus_kategori($kode);
		echo $this->session->set_flashdata('msg','<label class="label label-success">Data Kategori berhasil dihapus</label>');
		redirect('admin/kategori');
	}else{
		echo $this->session->set_flashdata('msg','<label class="label label-warning">Mohon maaf, anda tidak memiliki hak akses</label>');
    }
	}
}