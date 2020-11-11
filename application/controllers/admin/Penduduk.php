<?php
class Penduduk extends CI_Controller{
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
	function index(){
	if($this->session->userdata('akses')=='1' || $this->session->userdata('akses')=='2' || $this->session->userdata('akses')=='3'){
		$data['data']=$this->m_penduduk->tampil_penduduk();
		$this->load->view('admin/v_penduduk',$data);
	}else{
        echo "Halaman tidak ditemukan";
    }
	}
	function tambah_penduduk(){
	if($this->session->userdata('akses')=='1' || $this->session->userdata('akses')=='2'){
		$nik=$this->input->post('nik');
		$nama=$this->input->post('nama');
		$jenis_kelamin=$this->input->post('jenis_kelamin');
		$tgl_lahir=$this->input->post('tgl_lahir');
		$golda=$this->input->post('golda');
		$alamat=$this->input->post('alamat');
		$notelp=$this->input->post('notelp');
		$this->m_penduduk->simpan_penduduk($nik,$nama,$jenis_kelamin,$tgl_lahir,$golda,$alamat,$notelp);
		echo $this->session->set_flashdata('msg','<label class="label label-success">Data Penduduk berhasil ditambahkan</label>');
		redirect('admin/penduduk');
	}else{
		echo $this->session->set_flashdata('msg','<label class="label label-warning">WARNING !  Mohon maaf, anda tidak memiliki hak akses !!!</label>');
		redirect('admin/penduduk');
    }
	}
	function edit_penduduk(){
	if($this->session->userdata('akses')=='1' || $this->session->userdata('akses')=='2'){
		$kode=$this->input->post('kode');
		$nik=$this->input->post('nik');
		$nama=$this->input->post('nama');
		$jenis_kelamin=$this->input->post('jenis_kelamin');
		$tgl_lahir=$this->input->post('tgl_lahir');
		$golda=$this->input->post('golda');
		$alamat=$this->input->post('alamat');
		$notelp=$this->input->post('notelp');
		$this->m_penduduk->update_penduduk($kode,$nik,$nama,$jenis_kelamin,$tgl_lahir,$golda,$alamat,$notelp);
		echo $this->session->set_flashdata('msg','<label class="label label-success">Data Penduduk berhasil diupdate</label>');
		redirect('admin/penduduk');
	}else{
		echo $this->session->set_flashdata('msg','<label class="label label-warning">WARNING !  Mohon maaf, anda tidak memiliki hak akses !!!</label>');
		redirect('admin/penduduk');
    }
	}
	function hapus_penduduk(){
	if($this->session->userdata('akses')=='1' || $this->session->userdata('akses')=='2'){
		$kode=$this->input->post('kode');
		$this->m_penduduk->hapus_penduduk($kode);
		echo $this->session->set_flashdata('msg','<label class="label label-danger">Penduduk berhasil dihapus</label>');
		redirect('admin/penduduk');
	}else{
		echo $this->session->set_flashdata('msg','<label class="label label-warning">WARNING !  Mohon maaf, anda tidak memiliki hak akses !!!</label>');
		redirect('admin/penduduk');
    }
	}

	public function Data_Penduduk(){
		// Load plugin PHPExcel nya
		include APPPATH.'third_party/PHPExcel/PHPExcel.php';
		
		// Panggil class PHPExcel nya
		$excel = new PHPExcel();
		// Settingan awal fil excel
		$excel->getProperties()->setCreator('Smart Village')
					 ->setLastModifiedBy('Smart Village')
					 ->setTitle("Data Penduduk")
					 ->setSubject("Panen")
					 ->setDescription("Laporan Data Penduduk")
					 ->setKeywords("Data Panen");
		// Buat sebuah variabel untuk menampung pengaturan style dari header tabel
		$style_col = array(
		  'font' => array('bold' => true), // Set font nya jadi bold
		  'alignment' => array(
			'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER, // Set text jadi ditengah secara horizontal (center)
			'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
		  ),
		  'borders' => array(
			'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border top dengan garis tipis
			'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  // Set border right dengan garis tipis
			'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border bottom dengan garis tipis
			'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) // Set border left dengan garis tipis
		  )
		);
		// Buat sebuah variabel untuk menampung pengaturan style dari isi tabel
		$style_row = array(
		  'alignment' => array(
			'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
		  ),
		  'borders' => array(
			'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border top dengan garis tipis
			'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  // Set border right dengan garis tipis
			'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border bottom dengan garis tipis
			'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) // Set border left dengan garis tipis
		  )
		);
		$excel->setActiveSheetIndex(0)->setCellValue('A1', "DATA PENDUDUK"); // Set kolom A1 dengan tulisan "DATA SISWA"
		$excel->getActiveSheet()->mergeCells('A1:H1'); // Set Merge Cell pada kolom A1 sampai I1
		$excel->getActiveSheet()->getStyle('A1')->getFont()->setBold(TRUE); // Set bold kolom A1
		$excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(15); // Set font size 15 untuk kolom A1
		$excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); // Set text center untuk kolom A1

		$excel->setActiveSheetIndex(0)->setCellValue('A2', "DI SMART VILLAGE"); 
		$excel->getActiveSheet()->mergeCells('A2:H2'); 
		$excel->getActiveSheet()->getStyle('A2')->getFont()->setBold(TRUE); 
		$excel->getActiveSheet()->getStyle('A2')->getFont()->setSize(12); 
		$excel->getActiveSheet()->getStyle('A2')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); 

		// Buat header tabel nya pada baris ke 3
		$excel->setActiveSheetIndex(0)->setCellValue('A3', "No."); 
		$excel->setActiveSheetIndex(0)->setCellValue('B3', "NIK");
		$excel->setActiveSheetIndex(0)->setCellValue('C3', "Nama Penduduk"); 
		$excel->setActiveSheetIndex(0)->setCellValue('D3', "Jenis Kelamin");
		$excel->setActiveSheetIndex(0)->setCellValue('E3', "Tanggal Lahir");
		$excel->setActiveSheetIndex(0)->setCellValue('F3', "Golongan Darah");
		$excel->setActiveSheetIndex(0)->setCellValue('G3', "Alamat"); 
		$excel->setActiveSheetIndex(0)->setCellValue('H3', "No. Telp/ Hp"); 
		
		// Apply style header yang telah kita buat tadi ke masing-masing kolom header
		$excel->getActiveSheet()->getStyle('A3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('B3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('C3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('D3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('E3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('F3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('G3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('H3')->applyFromArray($style_col);

		// Panggil function view yang ada di SiswaModel untuk menampilkan semua data siswanya
		$penduduk = $this->m_penduduk->view();
		$no = 1;
		$numrow = 4; 
		foreach($penduduk as $data){ 
		  $excel->setActiveSheetIndex(0)->setCellValue('A'.$numrow, $no);
		  $excel->setActiveSheetIndex(0)->setCellValue('B'.$numrow, $data->penduduk_nik);
		  $excel->setActiveSheetIndex(0)->setCellValue('C'.$numrow, $data->penduduk_nama);
		  $excel->setActiveSheetIndex(0)->setCellValue('D'.$numrow, $data->jenis_kelamin);
		  $excel->setActiveSheetIndex(0)->setCellValue('E'.$numrow, $data->penduduk_tgl_lahir);
		  $excel->setActiveSheetIndex(0)->setCellValue('F'.$numrow, $data->penduduk_golda);
		  $excel->setActiveSheetIndex(0)->setCellValue('G'.$numrow, $data->penduduk_alamat);
		  $excel->setActiveSheetIndex(0)->setCellValue('H'.$numrow, $data->penduduk_notelp);

		  
		  // Apply style row yang telah kita buat tadi ke masing-masing baris (isi tabel)
		  $excel->getActiveSheet()->getStyle('A'.$numrow)->applyFromArray($style_row);
		  $excel->getActiveSheet()->getStyle('B'.$numrow)->applyFromArray($style_row);
		  $excel->getActiveSheet()->getStyle('C'.$numrow)->applyFromArray($style_row);
		  $excel->getActiveSheet()->getStyle('D'.$numrow)->applyFromArray($style_row);
		  $excel->getActiveSheet()->getStyle('E'.$numrow)->applyFromArray($style_row);
		  $excel->getActiveSheet()->getStyle('F'.$numrow)->applyFromArray($style_row);
		  $excel->getActiveSheet()->getStyle('G'.$numrow)->applyFromArray($style_row);
		  $excel->getActiveSheet()->getStyle('H'.$numrow)->applyFromArray($style_row);
		  
		  
		  $no++; // Tambah 1 setiap kali looping
		  $numrow++; // Tambah 1 setiap kali looping
		}
		// Set width kolom
		$excel->getActiveSheet()->getColumnDimension('A')->setWidth(5); 
		$excel->getActiveSheet()->getColumnDimension('B')->setWidth(25); 
		$excel->getActiveSheet()->getColumnDimension('C')->setWidth(25); 
		$excel->getActiveSheet()->getColumnDimension('D')->setWidth(20); 
		$excel->getActiveSheet()->getColumnDimension('E')->setWidth(20); 
		$excel->getActiveSheet()->getColumnDimension('F')->setWidth(20); 
		$excel->getActiveSheet()->getColumnDimension('G')->setWidth(20); 
		$excel->getActiveSheet()->getColumnDimension('H')->setWidth(20); 

		
		
		// Set height semua kolom menjadi auto (mengikuti height isi dari kolommnya, jadi otomatis)
		$excel->getActiveSheet()->getDefaultRowDimension()->setRowHeight(-1);
		// Set orientasi kertas jadi LANDSCAPE
		$excel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);
		// Set judul file excel nya
		$excel->getActiveSheet(0)->setTitle("Laporan Data Penduduk");
		$excel->setActiveSheetIndex(0);
		// Proses file excel
		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment; filename="Laporan Data Penduduk.xlsx"'); // Set nama file excel nya
		header('Cache-Control: max-age=0');
		$write = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
		$write->save('php://output');
	  }

	  public function Data_Penduduk2(){
		include_once APPPATH . '/third_party/fpdf/fpdf.php';

        $pdf = new FPDF('L','mm',array(300,137.16));
        // membuat halaman baru
        $pdf->AddPage();
        // setting jenis font yang akan digunakan
        $pdf->SetFont('Arial','B',16);
        // mencetak string 
		$pdf->Cell(280,7,'DATA PENDUDUK',0,1,'C');
		$pdf->SetFont('Arial','B',12);
		$pdf->Cell(280,7,'DI SMART VILLAGE',0,1,'C');
		$pdf->SetFont('Arial','B',18);

        // Memberikan space kebawah agar tidak terlalu rapat
        $pdf->Cell(10,7,'',0,1);

        $pdf->SetFont('Arial','B',10);
		$pdf->Cell(10,6,'No',1,0, 'C');
		$pdf->Cell(40,6,'NIK',1,0, 'C');
		$pdf->Cell(40,6,'Nama Penduduk',1,0, 'C');
		$pdf->Cell(40,6,'Jenis Kelamin',1,0, 'C');
		$pdf->Cell(40,6,'Tanggal Lahir',1,0, 'C');
		$pdf->Cell(40,6,'Golongan Darah',1,0, 'C');
        $pdf->Cell(40,6,'Alamat',1,0, 'C');
		$pdf->Cell(30,6,'No. Telp/ Hp',1,1, 'C');

        $pdf->SetFont('Arial','',10);

		$penduduk = $this->db->get('tbl_penduduk')->result();
		$no=1;
        foreach ($penduduk as $row){
			$pdf->Cell(10,6,$no,1,0, 'C');
			$pdf->Cell(40,6,$row->penduduk_nik,1,0);
			$pdf->Cell(40,6,$row->penduduk_nama,1,0);
			$pdf->Cell(40,6,$row->jenis_kelamin,1,0);
			$pdf->Cell(40,6,$row->penduduk_tgl_lahir,1,0);
			$pdf->Cell(40,6,$row->penduduk_golda,1,0);
			$pdf->Cell(40,6,$row->penduduk_alamat,1,0); 
			$pdf->Cell(30,6,$row->penduduk_notelp,1,1); 
			
			$no++;
        }

        $pdf->Output();
    }
}