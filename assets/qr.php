<?php

class qrcode
{
  public function __construct()
  {
    parent::__construct();
    $this->load->library('Ciqrcode');
  }

  public function index()
  {
    $data['title'] = 'Belajar QrCode';
    $this->load->view('Letter/contoh', $data);
  }

  public function cetak()
  {
    QRcode::png(
      $kodenya = 'http://akucintapadamu',
      $outfile = false,
      $level = QR_ECLEVEL_H,
      $size = 6,
      $margin = 2
    );
  }
}
