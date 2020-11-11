<?php
class M_change extends CI_Model{


	function update_penduduk($kode,$nik,$nama,$tgl_lahir,$golda,$alamat,$notelp){
		$hsl=$this->db->query("UPDATE tbl_penduduk set penduduk_nik='$nik',penduduk_nama='$nama',penduduk_tgl_lahir='$tgl_lahir',penduduk_golda='$golda',penduduk_alamat='$alamat',penduduk_notelp='$notelp' where penduduk_id='$kode'");
		return $hsl;
	}

	function tampil_penduduk(){
		$hsl=$this->db->query("select * from tbl_penduduk order by penduduk_id desc");
		return $hsl;
	}

	function simpan_penduduk($nik,$nama,$tgl_lahir,$golda,$alamat,$notelp){
		$hsl=$this->db->query("INSERT INTO tbl_penduduk(penduduk_nik,penduduk_nama,penduduk_tgl_lahir,penduduk_golda,penduduk_alamat,penduduk_notelp) VALUES ('$nik','$nama','$tgl_lahir','$golda','$alamat','$notelp')");
		return $hsl;
	}

	public function view() {
		return $this->db->get('tbl_penduduk')->result();
	}
}
?>

