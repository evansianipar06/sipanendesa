<?php
class Pengguna extends CI_Controller{
	function __construct(){
		parent::__construct();
		if($this->session->userdata('masuk') !=TRUE){
            $url=base_url();
            redirect($url);
        };
		$this->load->model('m_pengguna');
		$this->load->model('m_res_kades');
		$this->load->model('m_res_mas');
		$this->load->model('m_keluhan');
	}
	function index(){
	if($this->session->userdata('akses')=='1'){
		$data['data']=$this->m_pengguna->get_pengguna();
		$this->load->view('admin/v_pengguna',$data);
	}else{
        echo "Halaman tidak ditemukan";
    }
	}

	function tambah_pengguna(){
	if($this->session->userdata('akses')=='1'){
		$nama=$this->input->post('nama');
		$username=$this->input->post('username');
		$password=$this->input->post('password');
		$password2=$this->input->post('password2');
		$level=$this->input->post('level');
		if ($password2 <> $password) {
			echo $this->session->set_flashdata('msg','<label class="label label-danger">Password yang Anda Masukan Tidak Sama</label>');
			redirect('admin/pengguna');
		}else{
			$this->m_pengguna->simpan_pengguna($nama,$username,$password,$level);
			echo $this->session->set_flashdata('msg','<label class="label label-success">Pengguna Berhasil ditambahkan</label>');
			redirect('admin/pengguna');
		}
		
	}else{
        echo "Halaman tidak ditemukan";
    }
	}
	function edit_pengguna(){
	if($this->session->userdata('akses')=='1'){
		$kode=$this->input->post('kode');
		$nama=$this->input->post('nama');
		$username=$this->input->post('username');
		$password=$this->input->post('password');
		$password2=$this->input->post('password2');
		$level=$this->input->post('level');
		if (empty($password) && empty($password2)) {
			$this->m_pengguna->update_pengguna_nopass($kode,$nama,$username,$level);
			echo $this->session->set_flashdata('msg','<label class="label label-success">Pengguna Berhasil diupdate</label>');
			redirect('admin/pengguna');
		}elseif ($password2 <> $password) {
			echo $this->session->set_flashdata('msg','<label class="label label-danger">Password yang Anda Masukan Tidak Sama</label>');
			redirect('admin/pengguna');
		}else{
			$this->m_pengguna->update_pengguna($kode,$nama,$username,$password,$level);
			echo $this->session->set_flashdata('msg','<label class="label label-success">Pengguna Berhasil diupdate</label>');
			redirect('admin/pengguna');
		}
	}else{
        echo "Halaman tidak ditemukan";
    }
	}

	// function lupa_password() {
	// 	$username=$this->input->post('username')
	// }

	function nonaktifkan(){
	if($this->session->userdata('akses')=='1'){
		$kode=$this->input->post('kode');
		$this->m_pengguna->update_status($kode);
		echo $this->session->set_flashdata('msg','<label class="label label-danger">Pengguna dinon-aktifkan</label>');
		redirect('admin/pengguna');
	}else{
        echo "Halaman tidak ditemukan";
    }
	}
	function aktifkan(){
		if($this->session->userdata('akses')=='1'){
			$kode=$this->input->post('kode');
			$this->m_pengguna->update_status1($kode);
			echo $this->session->set_flashdata('msg','<label class="label label-success">Pengguna diaktifkan</label>');
			redirect('admin/pengguna');
		}else{
			echo "Halaman tidak ditemukan";
		}
		}
}