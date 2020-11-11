<?php
class Change extends CI_Controller{
	function __construct(){
		parent::__construct();
		if($this->session->userdata('masuk') !=TRUE){
            $url=base_url();
            redirect($url);
        };
		$this->load->model('m_penduduk');
		$this->load->model('m_res_kades');
		$this->load->model('m_res_mas');
		$this->load->model('m_keluhan');
	}
	function index2(){
	if($this->session->userdata('akses')=='1' || $this->session->userdata('akses')=='2' || $this->session->userdata('akses')=='3'){
		$data['data']=$this->m_penduduk->tampil_penduduk();
		$this->load->view('admin/v_change',$data);
	}else{
        echo "Halaman tidak ditemukan";
    }
	}
	
	function edit_penduduk(){
	if($this->session->userdata('akses')=='1' || $this->session->userdata('akses')=='3'){
		$kode=$this->input->post('kode');
		$username=$this->input->post('username');
		$nik=$this->input->post('nik');
		$nama=$this->input->post('nama');
		$tgl_lahir=$this->input->post('tgl_lahir');
		$golda=$this->input->post('golda');
		$alamat=$this->input->post('alamat');
		$notelp=$this->input->post('notelp');
		$this->m_penduduk->update_penduduk($kode,$username,$nik,$nama,$tgl_lahir,$golda,$alamat,$notelp);
		echo $this->session->set_flashdata('msg','<label class="label label-success">Data Penduduk berhasil diupdate</label>');
		redirect('change');
	}else{
		echo $this->session->set_flashdata('msg','<label class="label label-warning">WARNING !  Mohon maaf, anda tidak memiliki hak akses !!!</label>');
		redirect('change');
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
}