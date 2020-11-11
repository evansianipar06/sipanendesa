<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class M_Panen extends CI_Model{

	function hapus_panen($kode){
		$hsl=$this->db->query("DELETE FROM tbl_panen where panen_id='$kode'");
		return $hsl;
	}

	function update_panen($kobar,$nabar,$kat,$satuan,$harpok,$harjul,$harjul_grosir,$stok,$min_stok){
		$user_id=$this->session->userdata('idadmin');
		$hsl=$this->db->query("UPDATE tbl_panen SET panen_nama='$nabar',panen_satuan='$satuan',panen_harpok='$harpok',panen_harjul='$harjul',panen_harjul_grosir='$harjul_grosir',panen_stok='$stok',panen_min_stok='$min_stok',panen_tgl_last_update=NOW(),panen_kategori_id='$kat',panen_user_id='$user_id' WHERE panen_id='$kobar'");
		return $hsl;
	}

	function tampil_panen(){
		$hsl=$this->db->query("SELECT panen_id,panen_nama,panen_satuan,panen_harpok,panen_harjul,panen_harjul_grosir,panen_stok,panen_min_stok,panen_kategori_id,kategori_nama FROM tbl_panen JOIN tbl_kategori ON panen_kategori_id=kategori_id");
		return $hsl;
	}

	function simpan_panen($kobar,$nabar,$kat,$satuan,$harpok,$harjul,$harjul_grosir,$stok,$min_stok){
		$user_id=$this->session->userdata('idadmin');
		$hsl=$this->db->query("INSERT INTO tbl_panen (panen_id,panen_nama,panen_satuan,panen_harpok,panen_harjul,panen_harjul_grosir,panen_stok,panen_min_stok,panen_kategori_id,panen_user_id) VALUES ('$kobar','$nabar','$satuan','$harpok','$harjul','$harjul_grosir','$stok','$min_stok','$kat','$user_id')");
		return $hsl;
	}


	function get_panen($kobar){
		$hsl=$this->db->query("SELECT * FROM tbl_panen where panen_id='$kobar'");
		return $hsl;
	}

	function get_kobar(){
		$q = $this->db->query("SELECT MAX(RIGHT(panen_id,6)) AS kd_max FROM tbl_panen");
        $kd = "";
        if($q->num_rows()>0){
            foreach($q->result() as $k){
                $tmp = ((int)$k->kd_max)+1;
                $kd = sprintf("%06s", $tmp);
            }
        }else{
            $kd = "000001";
        }
        return "BR".$kd;
	}

	public function view() {
		return $this->db->get('tbl_panen')->result();
	}

}