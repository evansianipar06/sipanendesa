<?php
class Penjualan extends CI_Controller{
	function __construct(){
		parent::__construct();
		if($this->session->userdata('masuk') !=TRUE){
            $url=base_url();
            redirect($url);
        };
		$this->load->model('m_kategori');
		$this->load->model('m_panen');
		$this->load->model('m_penduduk');
		$this->load->model('m_penjualan');
		$this->load->model('m_res_kades');
		$this->load->model('m_res_mas');
		$this->load->model('m_keluhan');
	}
	function index(){
	if($this->session->userdata('akses')=='1' || $this->session->userdata('akses')=='2' || $this->session->userdata('akses')=='3'){
		$data['data']=$this->m_panen->tampil_panen();
		$this->load->view('admin/v_penjualan',$data);
	}else{
        echo "Halaman tidak ditemukan";
    }
	}
	function get_panen(){
	if($this->session->userdata('akses')=='1' || $this->session->userdata('akses')=='2' || $this->session->userdata('akses')=='3'){
		$kobar=$this->input->post('kode_brg');
		$x['brg']=$this->m_panen->get_panen($kobar);
		$this->load->view('admin/v_detail_panen_jual',$x);
	}else{
        echo "Halaman tidak ditemukan";
    }
	}
	function add_to_cart(){
	if($this->session->userdata('akses')=='1' || $this->session->userdata('akses')=='2' || $this->session->userdata('akses')=='3'){
		$kobar=$this->input->post('kode_brg');
		$produk=$this->m_panen->get_panen($kobar);
		$i=$produk->row_array();
		$data = array(
               'id'       => $i['panen_id'],
               'name'     => $i['panen_nama'],
               'satuan'   => $i['panen_satuan'],
               'harpok'   => $i['panen_harpok'],
               'price'    => str_replace(",", "", $this->input->post('harjul'))-$this->input->post('diskon'),
               'disc'     => $this->input->post('diskon'),
               'qty'      => $this->input->post('qty'),
               'amount'	  => str_replace(",", "", $this->input->post('harjul'))
            );
	if(!empty($this->cart->total_items())){
		foreach ($this->cart->contents() as $items){
			$id=$items['id'];
			$qtylama=$items['qty'];
			$rowid=$items['rowid'];
			$kobar=$this->input->post('kode_brg');
			$qty=$this->input->post('qty');
			if($id==$kobar){
				$up=array(
					'rowid'=> $rowid,
					'qty'=>$qtylama+$qty
					);
				$this->cart->update($up);
			}else{
				$this->cart->insert($data);
			}
		}
	}else{
		$this->cart->insert($data);
	}

		redirect('admin/penjualan');
	}else{
        echo "Halaman tidak ditemukan";
    }
	}
	function remove(){
	if($this->session->userdata('akses')=='1' || $this->session->userdata('akses')=='2' || $this->session->userdata('akses')=='3'){
		$row_id=$this->uri->segment(4);
		$this->cart->update(array(
               'rowid'      => $row_id,
               'qty'     => 0
            ));
		redirect('admin/penjualan');
	}else{
        echo "Halaman tidak ditemukan";
    }
	}
	function simpan_penjualan(){
	if($this->session->userdata('akses')=='1' || $this->session->userdata('akses')=='2' || $this->session->userdata('akses')=='3'){
		$total=$this->input->post('total');
		$jml_uang=str_replace(",", "", $this->input->post('jml_uang'));
		$kembalian=$jml_uang-$total;
		if(!empty($total) && !empty($jml_uang)){
			if($jml_uang < $total){
				echo $this->session->set_flashdata('msg','<label class="label label-danger">Jumlah Uang yang anda masukan Kurang</label>');
				redirect('admin/penjualan');
			}else{
				$nofak=$this->m_penjualan->get_nofak();
				$this->session->set_userdata('nofak',$nofak);
				$order_proses=$this->m_penjualan->simpan_penjualan($nofak,$total,$jml_uang,$kembalian);
				if($order_proses){
					$this->cart->destroy();
					
					$this->session->unset_userdata('tglfak');
					$this->session->unset_userdata('penduduk');
					$this->load->view('admin/alert/alert_sukses');	
				}else{
					redirect('admin/penjualan');
				}
			}
			
		}else{
			echo $this->session->set_flashdata('msg','<label class="label label-success">Data Penjualan Panen berhasil ditambahkan!</label>');
			redirect('admin/penjualan');
		}

	}else{
        echo "Halaman tidak ditemukan";
    }
	}

	function cetak_faktur(){
		$x['data']=$this->m_penjualan->cetak_faktur();
		$this->load->view('admin/laporan/v_faktur',$x);
		//$this->session->unset_userdata('nofak');
	}


}