<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Lap_buku extends CI_Controller {
  
  public function __construct(){
    parent::__construct();
    
    $this->load->model('buku_model');
    $this->load->model('m_upload');
  }
  
  public function index(){
    $data['buku'] = $this->buku_model->showAllBuku();
    $data['gbr']=$this->m_upload->cari()->result();
    $this->load->view("nav/header", $data);
    $this->load->view('lap_data_buku', $data);
    $this->load->view('nav/footer');
  }
  
  public function export(){
    // Load plugin PHPExcel nya
    include APPPATH.'third_party/PHPExcel/Classes/PHPExcel.php';
    
    // Panggil class PHPExcel nya
    $excel = new PHPExcel();

    // Settingan awal fil excel
    $excel->getProperties()->setCreator('My Notes Code')
                 ->setLastModifiedBy('My Notes Code')
                 ->setTitle("Data Buku")
                 ->setSubject("tb_buku")
                 ->setDescription("Laporan Semua Data Buku")
                 ->setKeywords("Data Buku");

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

    $excel->setActiveSheetIndex(0)->setCellValue('A1', "RELASI INTI MEDIA ( FAMILIA, ISTANA MEDIA, QUDSI MEDIA DAN FORUM )"); // Set kolom A1 dengan tulisan "DATA SISWA"
    $excel->setActiveSheetIndex(0)->setCellValue('A2', "Jl. Permadi Nyutran RT/RW. 61/19 MJ II No. 1606 C, Wirogunan, Mergangsan, Yogyakarta 55151"); // Set kolom A1 dengan tulisan "DATA SISWA"
    $excel->setActiveSheetIndex(0)->setCellValue('A3', "Email: relasidistribusi@gmail.com   Telp: (0274) 2870300"); // Set kolom A1 dengan tulisan "DATA SISWA"
    $excel->setActiveSheetIndex(0)->setCellValue('A5', "DATA BUKU");
    $excel->getActiveSheet()->mergeCells('A1:N1'); // Set Merge Cell pada kolom A1 sampai E1
    $excel->getActiveSheet()->mergeCells('A2:N2'); // Set Merge Cell pada kolom A1 sampai E1
    $excel->getActiveSheet()->mergeCells('A3:N3'); // Set Merge Cell pada kolom A1 sampai E1
    $excel->getActiveSheet()->mergeCells('A5:N5'); // Set Merge Cell pada kolom A1 sampai E1
    $excel->getActiveSheet()->getStyle('A1')->getFont()->setBold(TRUE); // Set bold kolom A1
    $excel->getActiveSheet()->getStyle('A5')->getFont()->setBold(TRUE); // Set bold kolom A1
    $excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(15); // Set font size 15 untuk kolom A1
    $excel->getActiveSheet()->getStyle('A5')->getFont()->setSize(15);
    $excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
    $excel->getActiveSheet()->getStyle('A2')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
    $excel->getActiveSheet()->getStyle('A3')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
    $excel->getActiveSheet()->getStyle('A5')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); // Set text center untuk kolom A1

    // Buat header tabel nya pada baris ke 3
    $excel->setActiveSheetIndex(0)->setCellValue('A7', "NO"); // Set kolom A3 dengan tulisan "NO"
    $excel->setActiveSheetIndex(0)->setCellValue('B7', "KODE BUKU"); // Set kolom A3 dengan tulisan "NO"
    $excel->setActiveSheetIndex(0)->setCellValue('C7', "JUDUL"); // Set kolom B3 dengan tulisan "NIS"
    $excel->setActiveSheetIndex(0)->setCellValue('D7', "KATEGORI"); // Set kolom C3 dengan tulisan "NAMA"
    $excel->setActiveSheetIndex(0)->setCellValue('E7', "PENULIS"); // Set kolom D3 dengan tulisan "JENIS KELAMIN"
    $excel->setActiveSheetIndex(0)->setCellValue('F7', "PENERBIT");
    $excel->setActiveSheetIndex(0)->setCellValue('G7', "UKURAN");
    $excel->setActiveSheetIndex(0)->setCellValue('H7', "JUMLAH HALAMAN");
    $excel->setActiveSheetIndex(0)->setCellValue('I7', "ISBN");
    $excel->setActiveSheetIndex(0)->setCellValue('J7', "TAHUN TERBIT");
    $excel->setActiveSheetIndex(0)->setCellValue('K7', "HARGA (Rp)");
    $excel->setActiveSheetIndex(0)->setCellValue('L7', "STOK");
    $excel->setActiveSheetIndex(0)->setCellValue('M7', "KETERANGAN");
    $excel->setActiveSheetIndex(0)->setCellValue('N7', "STATUS");

    // Apply style header yang telah kita buat tadi ke masing-masing kolom header
    $excel->getActiveSheet()->getStyle('A7')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('B7')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('C7')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('D7')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('E7')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('F7')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('G7')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('H7')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('I7')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('J7')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('K7')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('L7')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('M7')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('N7')->applyFromArray($style_col);


    // Panggil function view yang ada di SiswaModel untuk menampilkan semua data siswanya
    $buku = $this->buku_model->showAllBuku();

    $no = 1; // Untuk penomoran tabel, di awal set dengan 1
    $numrow = 8; // Set baris pertama untuk isi tabel adalah baris ke 4
    foreach($buku as $data){ // Lakukan looping pada variabel siswa
      $excel->setActiveSheetIndex(0)->setCellValue('A'.$numrow, $no);
      $excel->setActiveSheetIndex(0)->setCellValue('B'.$numrow, $data->kd_buku);
      $excel->setActiveSheetIndex(0)->setCellValue('C'.$numrow, $data->judul);
      $excel->setActiveSheetIndex(0)->setCellValue('D'.$numrow, $data->nama_kategori);
      $excel->setActiveSheetIndex(0)->setCellValue('E'.$numrow, $data->nama_penulis);
      $excel->setActiveSheetIndex(0)->setCellValue('F'.$numrow, $data->nama_penerbit);
      $excel->setActiveSheetIndex(0)->setCellValue('G'.$numrow, $data->ukuran);
      $excel->setActiveSheetIndex(0)->setCellValue('H'.$numrow, $data->jml_halaman);
      $excel->setActiveSheetIndex(0)->setCellValue('I'.$numrow, $data->isbn);
      $excel->setActiveSheetIndex(0)->setCellValue('J'.$numrow, $data->thn_terbit);
      $excel->setActiveSheetIndex(0)->setCellValue('K'.$numrow, $data->harga);
      $excel->setActiveSheetIndex(0)->setCellValue('L'.$numrow, $data->stok);
      $excel->setActiveSheetIndex(0)->setCellValue('M'.$numrow, $data->keterangan);
      $excel->setActiveSheetIndex(0)->setCellValue('N'.$numrow, $data->status);
      
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
      $excel->getActiveSheet()->getStyle('J'.$numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('K'.$numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('L'.$numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('M'.$numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('N'.$numrow)->applyFromArray($style_row);
      
      $no++; // Tambah 1 setiap kali looping
      $numrow++; // Tambah 1 setiap kali looping
    }

    // Set width kolom
    $excel->getActiveSheet()->getColumnDimension('A')->setWidth(5); // Set width kolom A
    $excel->getActiveSheet()->getColumnDimension('B')->setWidth(13); // Set width kolom B
    $excel->getActiveSheet()->getColumnDimension('C')->setWidth(60); // Set width kolom C
    $excel->getActiveSheet()->getColumnDimension('D')->setWidth(25); // Set width kolom D
    $excel->getActiveSheet()->getColumnDimension('E')->setWidth(40); // Set width kolom E
    $excel->getActiveSheet()->getColumnDimension('F')->setWidth(15); // Set width kolom E
    $excel->getActiveSheet()->getColumnDimension('G')->setWidth(13); // Set width kolom E
    $excel->getActiveSheet()->getColumnDimension('H')->setWidth(20); // Set width kolom E
    $excel->getActiveSheet()->getColumnDimension('I')->setWidth(20); // Set width kolom E
    $excel->getActiveSheet()->getColumnDimension('J')->setWidth(15); // Set width kolom E
    $excel->getActiveSheet()->getColumnDimension('K')->setWidth(18); // Set width kolom E
    $excel->getActiveSheet()->getColumnDimension('L')->setWidth(10); // Set width kolom E
    $excel->getActiveSheet()->getColumnDimension('M')->setWidth(40); // Set width kolom E
    $excel->getActiveSheet()->getColumnDimension('N')->setWidth(15); // Set width kolom E
    
    // Set height semua kolom menjadi auto (mengikuti height isi dari kolommnya, jadi otomatis)
    $excel->getActiveSheet()->getDefaultRowDimension()->setRowHeight(-1);

    // Set orientasi kertas jadi LANDSCAPE
    $excel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);

    // Set judul file excel nya
    $excel->getActiveSheet(0)->setTitle("Laporan Data Buku");
    $excel->setActiveSheetIndex(0);

    // Proses file excel
    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment; filename="Data Buku.xlsx"'); // Set nama file excel nya
    header('Cache-Control: max-age=0');

    $write = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
    $write->save('php://output');
  }
}