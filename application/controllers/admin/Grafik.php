<?php
class Grafik extends CI_Controller{
	function __construct(){
		parent::__construct();
		if($this->session->userdata('masuk') !=TRUE){
            $url=base_url();
            redirect($url);
        };
		$this->load->model('m_kategori');
		$this->load->model('m_panen');
		$this->load->model('m_penduduk');
		$this->load->model('m_pembelian');
		$this->load->model('m_penjualan');
		$this->load->model('m_laporan');
		$this->load->model('m_grafik');
		$this->load->model('m_res_kades');
		$this->load->model('m_res_mas');
		$this->load->model('m_keluhan');
	}
	function index(){
	if($this->session->userdata('akses')=='1' || $this->session->userdata('akses')=='2'){
		$data['data']=$this->m_panen->tampil_panen();
		$data['kat']=$this->m_kategori->tampil_kategori();
		$data['jual_bln']=$this->m_laporan->get_bulan_jual();
		$data['jual_thn']=$this->m_laporan->get_tahun_jual();
		$this->load->view('admin/v_grafik',$data);
	}else{
        echo "Halaman tidak ditemukan";
    }
	}
	function graf_stok_panen(){
		$x['report']=$this->m_grafik->statistik_stok();
		$this->load->view('admin/grafik/v_graf_stok_panen',$x);
	}
	
	
	function graf_penjualan_perbulan(){
		$bulan=$this->input->post('bln');
		$x['report']=$this->m_grafik->graf_penjualan_perbulan($bulan);
		$x['bln']=$bulan;
		$this->load->view('admin/grafik/v_graf_penjualan_perbulan',$x);
	}
	function graf_penjualan_pertahun(){
		$tahun=$this->input->post('thn');
		$x['report']=$this->m_grafik->graf_penjualan_pertahun($tahun);
		$x['thn']=$tahun;
		$this->load->view('admin/grafik/v_graf_penjualan_pertahun',$x);
	}
	
}