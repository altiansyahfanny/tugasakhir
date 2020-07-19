<?php


// create new PDF document
// $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
$width = 210;
$height = 320;
$pageLayout = array($width, $height);
$pdf = $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, $pageLayout, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Pemerintah Desa Tanjung Selayar');
$pdf->SetTitle('Surat Keteranga Domisili Usaha');
// $pdf->SetSubject('TCPDF Tutorial');
// $pdf->SetKeywords('TCPDF, PDF, example, test, guide');

// remove default header/footer
$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_RIGHT);

// set auto page breaks
$pdf->SetAutoPageBreak(false, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__) . '/lang/eng.php')) {
      require_once(dirname(__FILE__) . '/lang/eng.php');
      $pdf->setLanguageArray($l);
}

// ---------------------------------------------------------

// add a page
$pdf->AddPage();

//kop surat
//Cell($w, $h=0, $txt='', $border=0, $ln=0, $align='', $fill=0, $link='', $stretch=0, $ignore_min_height=false, $calign='T', $valign='M')

$gambar = base_url('/assets/img/download3.png');
$pdf->Image($gambar, 15, 13, 20, 25);
$pdf->Cell(5);
$pdf->SetFont('Times', 'B', 12);
$pdf->Cell(0, 5, 'PEMERINTAH KABUPATEN KOTABARU', 0, 1, 'C');
$pdf->Cell(5);
$pdf->Cell(0, 5, 'KECAMATAN KELUMPANG TENGAH', 0, 1, 'C');
$pdf->Cell(5);
$pdf->SetFont('Times', 'B', 16);
$pdf->Cell(0, 5, 'DESA TANJUNG SELAYAR', 0, 1, 'C');
$pdf->Cell(5);
$pdf->SetFont('Times', '', 8);
$pdf->Cell(0, 5, 'Jl. A. Yani No. 1 RT. 003 Desa Tanjung Selayar Kode Pos 72164 Tlp. 02174702889', 0, 1, 'C');
$pdf->SetLineWidth(1);
$pdf->Line(5, 40, 205, 40);
$pdf->SetLineWidth(0);
$pdf->Line(5, 41, 205, 41);

//-------------------------------------------------------------------------------

//isi surat
$pdf->SetFont('Times', 'BU', 15);
$text2 = 'SURAT KETERANGAN DOMISILI USAHA';
$pdf->MultiCell(210, 100, $text2, 0, 'C', 0, 0, 0, 50, true);


$pdf->SetFont('Times', '', 12);
$text4 = 'Demikian Surat Keterangan ini dibuat untuk digunakan sebagai mana mestinya';
$text5 = date('d F Y', $surat['tanggal']);
$text6 = $surat['jabatan'] . ' Tanjung Selayar';
$text1 = 'Yang bertanda tangan di bawah ini, ' . $text6 . ' Tanjung Selayar Kecamatan Kelumpang Tengah Kabupaten Kotabaru, menerangkan bahwa : ';
$tgl = $surat['tanggal'] + 31539600;
$text10 = date('d F Y', $tgl);
$text7 = 
'Demikian SKDU ini dibuat untuk dilanjutkan dengan proses pembuatan Izin Operasional sesuai dengan jenis usaha yang dilakukan. SKDU ini berlaku sampai dengan tanggal : ' . $text10 . ' ( satu tahun sejak dikeluarkannya surat ini ). Apabila melanggar aturan dan perundang-undangan yang berlaku atau tidak sesuai peruntukannya maka SKDU ini akan dinyatakan tidak berlaku lagi ( tidak valid ).';

$text9 = 'Pengusaha / Pedagangang Tidak Menyediakan / Tidak memperjual belikan minuman beralkohol, narkoba, barang-barang ilegal dan barang-barang terlarang lainnya.';



// MultiCell($w, $h, $txt, $border=0, $align='J', $fill=0, $ln=1, $x='', $y='', $reseth=true, $stretch=0, $ishtml=false, $autopadding=true, $maxh=0)

$pdf->MultiCell(210, 55, 'Nomor', 0, 'L', 0, 0, 77, 56, true);
$pdf->MultiCell(210, 55, ':', 0, 'L', 0, 0, 92, '', true);
$pdf->MultiCell(210, 55, $surat['nomer_surat'], 0, 'L', 0, 0, 97, '', true);
// -------------------------------------------------------------


$pdf->MultiCell(185, 55, $text1, 0, 'L', 0, 0, 15, 70, true);
// -------------------------------------------------------------
$pdf->MultiCell(55, 55, 'Nama Lengkap', 0, 'L', 0, 0, 30, 85, true);
$pdf->MultiCell(55, 55, ':', 0, 'L', 0, 0, 90, '', true);
$pdf->MultiCell(120, 55, $surat["nama_pemohon"], 0, 'L', 0, 0, 100, '', true);
// -------------------------------------------------------------
$pdf->MultiCell(55, 55, 'Tempat/Tanggal Lahir', 0, 'L', 0, 0, 30, 90, true);
$pdf->MultiCell(55, 55, ':', 0, 'L', 0, 0, 90, '', true);
$pdf->MultiCell(120, 55, $surat["ttl"], 0, 'L', 0, 0, 100, '', true);
// -------------------------------------------------------------
$pdf->MultiCell(55, 55, 'Jenis kelamin', 0, 'L', 0, 0, 30, 95, true);
$pdf->MultiCell(55, 55, ':', 0, 'L', 0, 0, 90, '', true);
$pdf->MultiCell(120, 55, $surat["jk"], 0, 'L', 0, 0, 100, '', true);
// -------------------------------------------------------------
$pdf->MultiCell(55, 55, 'Agama', 0, 'L', 0, 0, 30, 100, true);
$pdf->MultiCell(55, 55, ':', 0, 'L', 0, 0, 90, '', true);
$pdf->MultiCell(120, 55, $surat["agama"], 0, 'L', 0, 0, 100, '', true);
// -------------------------------------------------------------
$pdf->MultiCell(55, 55, 'Kewarganegaraan', 0, 'L', 0, 0, 30, 105, true);
$pdf->MultiCell(55, 55, ':', 0, 'L', 0, 0, 90, '', true);
$pdf->MultiCell(120, 55, $surat["kewarganegaraan"], 0, 'L', 0, 0, 100, '', true);
// -------------------------------------------------------------
$pdf->MultiCell(55, 55, 'Nomor KTP', 0, 'L', 0, 0, 30, 110, true);
$pdf->MultiCell(55, 55, ':', 0, 'L', 0, 0, 90, '', true);
$pdf->MultiCell(120, 55, $surat["no_ktp"], 0, 'L', 0, 0, 100, '', true);
// -------------------------------------------------------------
$pdf->MultiCell(55, 55, 'Alamat', 0, 'L', 0, 0, 30, 115, true);
$pdf->MultiCell(55, 55, ':', 0, 'L', 0, 0, 90, '', true);
$pdf->MultiCell(120, 55, $surat["alamat_pemohon"], 0, 'L', 0, 0, 100, '', true);
// -------------------------------------------------------------


$pdf->MultiCell(185, 55, 'Bahwa nama diatas merupakan pemilik dari perusahaan / usaha dibawah ini : ', 0, 'L', 0, 0, 15, 125, true);
// -------------------------------------------------------------
$pdf->MultiCell(55, 55, 'Nama Usaha / Perusahaan', 0, 'L', 0, 0, 30, 135, true);
$pdf->MultiCell(55, 55, ':', 0, 'L', 0, 0, 90, '', true);
$pdf->MultiCell(120, 55, $surat["nama_usaha"], 0, 'L', 0, 0, 100, '', true);
// -------------------------------------------------------------
$pdf->MultiCell(55, 55, 'Penanggung Jawab / Pimpinan Perusahaan', 0, 'L', 0, 0, 30, 140, true);
$pdf->MultiCell(55, 55, ':', 0, 'L', 0, 0, 90, 145, true);
$pdf->MultiCell(120, 55, $surat["pimpinan"], 0, 'L', 0, 0, 100, 145, true);
// -------------------------------------------------------------
$pdf->MultiCell(55, 55, 'Jenis / Klasifikasi Usaha', 0, 'L', 0, 0, 30, 150, true);
$pdf->MultiCell(55, 55, ':', 0, 'L', 0, 0, 90, '', true);
$pdf->MultiCell(120, 55, $surat["jenis_usaha"], 0, 'L', 0, 0, 100, '', true);
// -------------------------------------------------------------
$pdf->MultiCell(55, 55, 'Produksi / Barang Dagangan', 0, 'L', 0, 0, 30, 155, true);
$pdf->MultiCell(55, 55, ':', 0, 'L', 0, 0, 90, '', true);
$pdf->MultiCell(120, 55, $surat["barang_produksi"], 0, 'L', 0, 0, 100, '', true);
// -------------------------------------------------------------
$pdf->MultiCell(55, 55, 'Alamat Usaha', 0, 'L', 0, 0, 30, 160, true);
$pdf->MultiCell(55, 55, ':', 0, 'L', 0, 0, 90, '', true);
$pdf->MultiCell(120, 55, $surat["alamat_usaha"], 0, 'L', 0, 0, 100, '', true);
// -------------------------------------------------------------
$pdf->MultiCell(55, 55, 'Jumlah Karyawan', 0, 'L', 0, 0, 30, 165, true);
$pdf->MultiCell(55, 55, ':', 0, 'L', 0, 0, 90, '', true);
$pdf->MultiCell(120, 55, $surat["jumlah_karyawan"], 0, 'L', 0, 0, 100, '', true);
// -------------------------------------------------------------
$pdf->MultiCell(55, 55, 'Status Bangunan', 0, 'L', 0, 0, 30, 170, true);
$pdf->MultiCell(55, 55, ':', 0, 'L', 0, 0, 90, '', true);
$pdf->MultiCell(120, 55, $surat["sts_bangunan"], 0, 'L', 0, 0, 100, '', true);
// -------------------------------------------------------------
$pdf->MultiCell(55, 55, 'Peruntukan Bangunan', 0, 'L', 0, 0, 30, 175, true);
$pdf->MultiCell(55, 55, ':', 0, 'L', 0, 0, 90, '', true);
$pdf->MultiCell(120, 55, $surat["peruntukan_bangunan"], 0, 'L', 0, 0, 100, '', true);
// -------------------------------------------------------------

$pdf->MultiCell(185, 55, $text7, 0, 'J', 0, 0, 15, 185, true);
// -------------------------------------------------------------

// -------------------------------------------------------------
// $pdf->MultiCell(210, 55, 'Nomer', 0, 'L', 0, 0, 25, 210, true);
// // -------------------------------------------------------------
// $pdf->MultiCell(65, 55, ':  ' . $surat['nomer_surat'], 0, 'L', 0, 0, 40, 210, true);
// // -------------------------------------------------------------
// $pdf->MultiCell(210, 55, 'Tanggal : ....................................', 0, 'L', 0, 0, 25, 215, true);
// // -------------------------------------------------------------
// $pdf->MultiCell(210, 55, 'Mengetahui', 0, 'L', 0, 0, 43, 225, true);
// // -------------------------------------------------------------
// $pdf->MultiCell(210, 55, $surat["jabatan_pejabat_kecamatan"] . ' KELUMPANG TENGAH', 0, 'L', 0, 0, 25, 230, true);
// // -------------------------------------------------------------
// $pdf->SetFont('Times', 'BU', 12);
// $text8 = $surat['pejabat_kecamatan'];
// $pdf->MultiCell(210, 55, $text8, 0, 'L', 0, 0, 25, 255, true);
// // -------------------------------------------------------------
// $pdf->SetFont('Times', '', 12);
// $pdf->MultiCell(210, 55, 'Nip : ' . $surat["nip_pj_kecamatan"], 0, 'L', 0, 0, 25, 260, true);
// -------------------------------------------------------------


$pdf->MultiCell(155, 55, 'Tanjung Selayar, ' . $text5, 0, 'L', 0, 0, 135, 210, true);
// -------------------------------------------------------------
$pdf->MultiCell(155, 55, $text6, 0, 'L', 0, 0, 135, 215, true);
// -------------------------------------------------------------
$pdf->SetFont('Times', 'BU', 12);
$pdf->MultiCell(155, 55, $surat["pejabat_kelurahan"], 0, 'L', 0, 0, 135, 240, true);
// -------------------------------------------------------------
$pdf->SetFont('Times', '', 12);
$pdf->MultiCell(210, 55, 'Nip : ' . $surat["nip"], 0, 'L', 0, 0, 135, 245, true);
// -------------------------------------------------------------

$style = array(
      'border' => 0,
      'padding' => 'auto',
      'fgcolor' => array(0, 0, 0),
      'bgcolor' => array(255, 255, 255),

);

$pdf->SetFont('Times', '', 12);
$pdf->MultiCell(25, 55, 'Keterangan : ', 0, 'R', 0, 0, 15, 260, true);
$pdf->MultiCell(110, 55, $text9, 0, 'J', 0, 0, 45, 260, true);

$pdf->write2DBarcode(base_url('/validasi/keterangan_domisili_usaha/') . $surat['key'], 'QRCODE,H', 170, 270, 30, 260, $style, 'N');
// -------------------------------------------------------------
$pdf->SetFont('Times', '', 8);
$pdf->MultiCell(20, 5, 'Scan untuk memastikan keaslian surat', 0, 'L', 0, 0, 170, 260, true);
// -------------------------------------------------------------

$pdf->lastPage();
$pdf->Output('Surat Keterangan Izin Usaha.pdf', 'I');
