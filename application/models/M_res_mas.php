<?php
class M_res_mas extends CI_Model{

	function tampil_feedback(){
		$hsl=$this->db->query("select * from tbl_res_masyarakat order by respon_id desc");
		return $hsl;
	}

	function simpan_feedback($nama, $email, $res){
		$hsl=$this->db->query("INSERT INTO tbl_res_masyarakat(nama, email, respon) VALUES ('$nama','$email','$res')");
		return $hsl;
	}

	public function total_rows(){
		$hsl=$this->db->query("SELECT Count(*) From tbl_res_masyarakat");
		return $this->db->count_all_results('tbl_res_masyarakat');
	}

}