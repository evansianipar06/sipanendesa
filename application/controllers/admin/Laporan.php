<?php
class Laporan extends CI_Controller{
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
		$this->load->model('m_res_kades');
		$this->load->model('m_res_mas');
		$this->load->model('m_keluhan');
	}
	function index(){
	if($this->session->userdata('akses')=='1'|| $this->session->userdata('akses')=='2'){
		$data['data']=$this->m_panen->tampil_panen();
		$data['kat']=$this->m_kategori->tampil_kategori();
		$data['jual_bln']=$this->m_laporan->get_bulan_jual();
		$data['jual_thn']=$this->m_laporan->get_tahun_jual();
		$this->load->view('admin/v_laporan',$data);
		
	}else{
        echo "Halaman tidak ditemukan";
    }
	}
	function lap_stok_panen(){
		$x['data']=$this->m_laporan->get_stok_panen();
		$this->load->view('admin/laporan/v_lap_stok_panen',$x);
	}
	function lap_data_panen(){
		$x['data']=$this->m_laporan->get_data_panen();
		$this->load->view('admin/laporan/v_lap_panen',$x);
	}
	function lap_data_penjualan(){
		$x['data']=$this->m_laporan->get_data_penjualan();
		$x['jml']=$this->m_laporan->get_total_penjualan();
		$this->load->view('admin/laporan/v_lap_penjualan',$x);
	}
	function lap_data_pembelian(){
		$x['data']=$this->m_laporan->get_data_pembelian();
		$x['jml']=$this->m_laporan->get_total_pembelian();
		$this->load->view('admin/laporan/v_lap_pembelian',$x);
	}
	function lap_pembelian_pertanggal(){
		$tanggal=$this->input->post('tgl');
		$x['jml']=$this->m_laporan->get_data__total_beli_pertanggal($tanggal);
		$x['data']=$this->m_laporan->get_data_beli_pertanggal($tanggal);
		$this->load->view('admin/laporan/v_lap_beli_pertanggal',$x);
	}
	function lap_penjualan_pertanggal(){
		$tanggal=$this->input->post('tgl');
		$x['jml']=$this->m_laporan->get_data__total_jual_pertanggal($tanggal);
		$x['data']=$this->m_laporan->get_data_jual_pertanggal($tanggal);
		$this->load->view('admin/laporan/v_lap_jual_pertanggal',$x);
	}
	function lap_penjualan_perbulan(){
		$bulan=$this->input->post('bln');
		$x['jml']=$this->m_laporan->get_total_jual_perbulan($bulan);
		$x['data']=$this->m_laporan->get_jual_perbulan($bulan);
		$this->load->view('admin/laporan/v_lap_jual_perbulan',$x);
	}
	function lap_penjualan_pertahun(){
		$tahun=$this->input->post('thn');
		$x['jml']=$this->m_laporan->get_total_jual_pertahun($tahun);
		$x['data']=$this->m_laporan->get_jual_pertahun($tahun);
		$this->load->view('admin/laporan/v_lap_jual_pertahun',$x);
	}
	function lap_laba_rugi(){
		$bulan=$this->input->post('bln');
		$x['jml']=$this->m_laporan->get_total_lap_laba_rugi($bulan);
		$x['data']=$this->m_laporan->get_lap_laba_rugi($bulan);
		$this->load->view('admin/laporan/v_lap_laba_rugi',$x);
	}
}