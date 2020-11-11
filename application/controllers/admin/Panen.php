<?php
class Panen extends CI_Controller{
	function __construct(){
		parent::__construct();
		if($this->session->userdata('masuk') !=TRUE){
            $url=base_url();
            redirect($url);
        };
		$this->load->model('m_kategori');
		$this->load->model('m_panen');
		$this->load->model('m_res_kades');
		$this->load->model('m_res_mas');
		$this->load->model('m_keluhan');
	}
	function index(){
	if($this->session->userdata('akses')=='1' || $this->session->userdata('akses')=='2' || $this->session->userdata('akses')=='3'){
		$data['data']=$this->m_panen->tampil_panen();
		$data['kat']=$this->m_kategori->tampil_kategori();
		$data['kat2']=$this->m_kategori->tampil_kategori();
		$this->load->view('admin/v_panen',$data);
	}else{
        echo "Anda tidak memiliki Hak Akses";
    }
	}
	function tambah_panen(){
	if($this->session->userdata('akses')=='1' || $this->session->userdata('akses')=='2' || $this->session->userdata('akses')=='3'){
		$kobar=$this->m_panen->get_kobar();
		$nabar=$this->input->post('nabar');
		$kat=$this->input->post('kategori');
		$satuan=$this->input->post('satuan');
		$harpok=str_replace(',', '', $this->input->post('harpok'));
		$harjul=str_replace(',', '', $this->input->post('harjul'));
		$harjul_grosir=str_replace(',', '', $this->input->post('harjul_grosir'));
		$stok=$this->input->post('stok');
		$min_stok=$this->input->post('min_stok');
		$this->m_panen->simpan_panen($kobar,$nabar,$kat,$satuan,$harpok,$harjul,$harjul_grosir,$stok,$min_stok);
		echo $this->session->set_flashdata('msg','<label class="label label-success">Data Panen berhasil ditambahkan</label>');
		redirect('admin/panen');
	}else{
		echo $this->session->set_flashdata('msg','<label class="label label-warning">Mohon maaf, anda tidak memiliki hak akses</label>');
    }
	}
	function edit_panen(){
	if($this->session->userdata('akses')=='1' || $this->session->userdata('akses')=='2'){
		$kobar=$this->input->post('kobar');
		$nabar=$this->input->post('nabar');
		$kat=$this->input->post('kategori');
		$satuan=$this->input->post('satuan');
		$harpok=str_replace(',', '', $this->input->post('harpok'));
		$harjul=str_replace(',', '', $this->input->post('harjul'));
		$harjul_grosir=str_replace(',', '', $this->input->post('harjul_grosir'));
		$stok=$this->input->post('stok');
		$min_stok=$this->input->post('min_stok');
		$this->m_panen->update_panen($kobar,$nabar,$kat,$satuan,$harpok,$harjul,$harjul_grosir,$stok,$min_stok);
		echo $this->session->set_flashdata('msg','<label class="label label-success">Data Panen berhasil diupdate</label>');
		redirect('admin/panen');
	}else{
		echo $this->session->set_flashdata('msg','<label class="label label-warning">Moho maaf, anda tidak memiliki hak akses</label>');
		redirect('admin/panen');
    }
	}
	function hapus_panen(){
	if($this->session->userdata('akses')=='1' || $this->session->userdata('akses')=='2'){
		$kode=$this->input->post('kode');
		$this->m_panen->hapus_panen($kode);
		echo $this->session->set_flashdata('msg','<label class="label label-success">Data Panen berhasil dihapus</label>');
		redirect('admin/panen');
	}else{
		echo $this->session->set_flashdata('msg','<label class="label label-warning">Mohon maaf, anda tidak memiliki hak akses</label>');
		redirect('admin/panen');
    }
	}

	public function Data_Penjualan_Hasil_Panen(){
		// Load plugin PHPExcel nya
		include APPPATH.'third_party/PHPExcel/PHPExcel.php';
		
		// Panggil class PHPExcel nya
		$excel = new PHPExcel();
		// Settingan awal fil excel
		$excel->getProperties()->setCreator('Smart Village')
					 ->setLastModifiedBy('Smart Village')
					 ->setTitle("Data Panen")
					 ->setSubject("Panen")
					 ->setDescription("Laporan Data Hasil Panen")
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
		$excel->setActiveSheetIndex(0)->setCellValue('A1', "DATA HASIL PENJUALAN PANEN"); // Set kolom A1 dengan tulisan "DATA SISWA"
		$excel->getActiveSheet()->mergeCells('A1:I1'); // Set Merge Cell pada kolom A1 sampai I1
		$excel->getActiveSheet()->getStyle('A1')->getFont()->setBold(TRUE); // Set bold kolom A1
		$excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(15); // Set font size 15 untuk kolom A1
		$excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); // Set text center untuk kolom A1

		$excel->setActiveSheetIndex(0)->setCellValue('A2', "DI SMART VILLAGE"); // Set kolom A1 dengan tulisan "DATA SISWA"
		$excel->getActiveSheet()->mergeCells('A2:I2'); // Set Merge Cell pada kolom A1 sampai I1
		$excel->getActiveSheet()->getStyle('A2')->getFont()->setBold(TRUE); // Set bold kolom A1
		$excel->getActiveSheet()->getStyle('A2')->getFont()->setSize(12); // Set font size 15 untuk kolom A1
		$excel->getActiveSheet()->getStyle('A2')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); // Set text center untuk kolom A1

		// Buat header tabel nya pada baris ke 3
		$excel->setActiveSheetIndex(0)->setCellValue('A3', "No."); // Set kolom A3 dengan tulisan "No."
		$excel->setActiveSheetIndex(0)->setCellValue('B3', "Kode Panen"); // Set kolom B3 dengan tulisan "Kode Panen"
		$excel->setActiveSheetIndex(0)->setCellValue('C3', "Nama Panen"); // Set kolom C3 dengan tulisan "Nama Panen"
		$excel->setActiveSheetIndex(0)->setCellValue('D3', "Satuan"); // Set kolom D3 dengan tulisan "Satuan"
		$excel->setActiveSheetIndex(0)->setCellValue('E3', "Harga Pokok"); // Set kolom E3 dengan tulisan "Harga Pokok"
		$excel->setActiveSheetIndex(0)->setCellValue('F3', "Harga Jual (Ecerean)"); // Set kolom F3 dengan tulisan "Harga Jual (Eceran)"
		$excel->setActiveSheetIndex(0)->setCellValue('G3', "Harga Jual (Grosir)"); // Set kolom G3 dengan tulisan "Harga Jual (Grosir)"
		$excel->setActiveSheetIndex(0)->setCellValue('H3', "Stok"); // Set kolom H3 dengan tulisan "ALAMAT"
		$excel->setActiveSheetIndex(0)->setCellValue('I3', "Stok Minimal"); // Set kolom I3 dengan tulisan "ALAMAT"
		// Apply style header yang telah kita buat tadi ke masing-masing kolom header
		$excel->getActiveSheet()->getStyle('A3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('B3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('C3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('D3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('E3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('F3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('G3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('H3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('I3')->applyFromArray($style_col);
		// Panggil function view yang ada di SiswaModel untuk menampilkan semua data siswanya
		$panen = $this->m_panen->view();
		$no = 1; // Untuk penomoran tabel, di awal set dengan 1
		$numrow = 4; // Set baris pertama untuk isi tabel adalah baris ke 4
		foreach($panen as $data){ // Lakukan looping pada variabel siswa
		  $excel->setActiveSheetIndex(0)->setCellValue('A'.$numrow, $no);
		  $excel->setActiveSheetIndex(0)->setCellValue('B'.$numrow, $data->panen_id);
		  $excel->setActiveSheetIndex(0)->setCellValue('C'.$numrow, $data->panen_nama);
		  $excel->setActiveSheetIndex(0)->setCellValue('D'.$numrow, $data->panen_satuan);
		  $excel->setActiveSheetIndex(0)->setCellValue('E'.$numrow, $data->panen_harpok);
		  $excel->setActiveSheetIndex(0)->setCellValue('F'.$numrow, $data->panen_harjul);
		  $excel->setActiveSheetIndex(0)->setCellValue('G'.$numrow, $data->panen_harjul_grosir);
		  $excel->setActiveSheetIndex(0)->setCellValue('H'.$numrow, $data->panen_stok);
		  $excel->setActiveSheetIndex(0)->setCellValue('I'.$numrow, $data->panen_min_stok);
		  
		  // Apply style row yang telah kita buat tadi ke masing-masing baris (isi tabel)
		  $excel->getActiveSheet()->getStyle('A'.$numrow)->applyFromArray($style_row);
		  $excel->getActiveSheet()->getStyle('B'.$numrow)->applyFromArray($style_row);
		  $excel->getActiveSheet()->getStyle('C'.$numrow)->applyFromArray($style_row);
		  $excel->getActiveSheet()->getStyle('D'.$numrow)->applyFromArray($style_row);
		  $excel->getActiveSheet()->getStyle('E'.$numrow)->applyFromArray($style_row);
		  $excel->getActiveSheet()->getStyle('F'.$numrow)->applyFromArray($style_row);
		  $excel->getActiveSheet()->getStyle('G'.$numrow)->applyFromArray($style_row);
		  $excel->getActiveSheet()->getStyle('H'.$numrow)->applyFromArray($style_row);
		  $excel->getActiveSheet()->getStyle('I'.$numrow)->applyFromArray($style_row);
		  
		  $no++; // Tambah 1 setiap kali looping
		  $numrow++; // Tambah 1 setiap kali looping
		}
		// Set width kolom
		$excel->getActiveSheet()->getColumnDimension('A')->setWidth(5); // Set width kolom A
		$excel->getActiveSheet()->getColumnDimension('B')->setWidth(15); // Set width kolom B
		$excel->getActiveSheet()->getColumnDimension('C')->setWidth(25); // Set width kolom C
		$excel->getActiveSheet()->getColumnDimension('D')->setWidth(20); // Set width kolom D
		$excel->getActiveSheet()->getColumnDimension('E')->setWidth(15); // Set width kolom E
		$excel->getActiveSheet()->getColumnDimension('F')->setWidth(18); // Set width kolom E
		$excel->getActiveSheet()->getColumnDimension('G')->setWidth(18); // Set width kolom E
		$excel->getActiveSheet()->getColumnDimension('H')->setWidth(10); // Set width kolom E
		$excel->getActiveSheet()->getColumnDimension('I')->setWidth(15); // Set width kolom E
		
		
		// Set height semua kolom menjadi auto (mengikuti height isi dari kolommnya, jadi otomatis)
		$excel->getActiveSheet()->getDefaultRowDimension()->setRowHeight(-1);
		// Set orientasi kertas jadi LANDSCAPE
		$excel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);
		// Set judul file excel nya
		$excel->getActiveSheet(0)->setTitle("Laporan Data Panen");
		$excel->setActiveSheetIndex(0);
		// Proses file excel
		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment; filename="Data Penjualan Panen.xlsx"'); // Set nama file excel nya
		header('Cache-Control: max-age=0');
		$write = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
		$write->save('php://output');
	  }

	  public function Data_Penjualan_Hasil_Panen2(){
		include_once APPPATH . '/third_party/fpdf/fpdf.php';

        $pdf = new FPDF('L','mm','Letter');
        // membuat halaman baru
        $pdf->AddPage();
        // setting jenis font yang akan digunakan
        $pdf->SetFont('Arial','B',16);
        // mencetak string 
		$pdf->Cell(247,7,'DATA HASIL PENJUALAN PANEN',0,1,'C');
		$pdf->SetFont('Arial','B',12);
		$pdf->Cell(247,7,'DI SMART VILLAGE',0,1,'C');
		$pdf->SetFont('Arial','B',18);

        // Memberikan space kebawah agar tidak terlalu rapat
        $pdf->Cell(10,7,'',0,1);

        $pdf->SetFont('Arial','B',10);
		$pdf->Cell(10,6,'No',1,0, 'C');
		$pdf->Cell(25,6,'Kode Panen',1,0, 'C');
        $pdf->Cell(40,6,'Nama Panen',1,0, 'C');
        $pdf->Cell(27,6,'Satuan',1,0, 'C');
		$pdf->Cell(25,6,'Harga Pokok',1,0, 'C');
		$pdf->Cell(35,6,'Harga Jual(Eceran)',1,0, 'C');
		$pdf->Cell(35,6,'Harga Jual(Grosir)',1,0, 'C');
		$pdf->Cell(25,6,'Stok',1,0, 'C');
		$pdf->Cell(25,6,'Stok Minimal',1,1, 'C');

        $pdf->SetFont('Arial','',10);

		$panen = $this->db->get('tbl_panen')->result();
		$no=1;
        foreach ($panen as $row){
            $pdf->Cell(10,6,$no,1,0, 'C');
            $pdf->Cell(25,6,$row->panen_id,1,0);
            $pdf->Cell(40,6,$row->panen_nama,1,0);
			$pdf->Cell(27,6,$row->panen_satuan,1,0); 
			$pdf->Cell(25,6,$row->panen_harpok,1,0);
			$pdf->Cell(35,6,$row->panen_harjul,1,0);  
			$pdf->Cell(35,6,$row->panen_harjul_grosir,1,0);
			$pdf->Cell(25,6,$row->panen_stok,1,0);  
			$pdf->Cell(25,6,$row->panen_min_stok,1,1); 
			
			$no++;
        }

        $pdf->Output();
    }
}