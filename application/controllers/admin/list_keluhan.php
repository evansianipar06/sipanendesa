<?php
class list_keluhan extends CI_Controller{
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
		$this->load->view('admin/v_list_keluhan',$data);
	}else{
        echo "Halaman tidak ditemukan";
    }
	}

	function tampil_keluhan(){
		if($this->session->userdata('akses')=='1' || $this->session->userdata('akses')=='2' || $this->session->userdata('akses')=='3'){
			$data['data']=$this->m_keluhan->tampil_keluhan();
			$this->load->view('admin/v_list_keluhan',$data);
			echo json_encode($data);
		}else{
			echo "Halaman tidak ditemukan";
		}
		}

		function tampil_keluhan2(){
			if($this->session->userdata('akses')=='1' || $this->session->userdata('akses')=='2' || $this->session->userdata('akses')=='3'){
				$data['data']=$this->m_keluhan->tampil_keluhan2();
				$this->load->view('admin/v_index',$data);
				echo json_encode($data);
			}else{
				echo "Halaman tidak ditemukan";
			}
			}
}