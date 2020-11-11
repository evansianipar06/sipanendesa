<?php
class M_res_kades extends CI_Model{

	function tampil_feedback(){
		$hsl=$this->db->query("select * from tbl_res_kades order by respon_id desc");
		return $hsl;
	}

	function simpan_feedback($nama, $email, $res){
		$hsl=$this->db->query("INSERT INTO tbl_res_kades(nama, email, respon) VALUES ('$nama','$email','$res')");
		return $hsl;
	}

	function total_rows(){
		$hsl=$this->db->query("SELECT Count(*) From tbl_res_kades");
		return $this->db->count_all_results('tbl_res_kades');
	}

}