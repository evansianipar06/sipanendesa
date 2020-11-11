<?php
class M_keluhan extends CI_Model{

	function tampil_keluhan(){
		$hsl=$this->db->query("select * from tbl_keluhan order by keluhan_id desc");
		return $hsl;
	}
	function tampil_keluhan2(){
		$hsl=$this->db->query("select * from tbl_keluhan order by keluhan_id desc");
		return $hsl;
	}

	function simpan_keluhan($nama, $email, $kel){
		$hsl=$this->db->query("INSERT INTO tbl_keluhan(nama, email, keluhan) VALUES ('$nama','$email','$kel')");
		return $hsl;
	}

	function total_rows(){
		$hsl=$this->db->query("SELECT Count(*) From tbl_keluhan");
		return $this->db->count_all_results('tbl_keluhan');
	}

	// function total_rows(){
	// 	$hsl=$this->db->query("SELECT Count(*) FROM tbl_res_masyarakat JOIN tbl_res_kades ON respon_id_kades=respon_id");
	// 	return $hsl;
	// }

}