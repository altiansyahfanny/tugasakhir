<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Surat extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->library('pdf_report');
    $this->load->model('Surat_model', 'surat');
    $this->load->library('rc4');
    is_logged_in();
  }

  public function index()
  {
    $data['title'] = 'Buat Surat';
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('templates/topbar', $data);
    $this->load->view('surat/index', $data);
    $this->load->view('templates/footer');
  }

  public function cariPenduduk()
  {
    $key = '';
    $hasil = '';

    if ($this->input->post('key')) {
      $key = $this->input->post('key');

      $data = $this->surat->cariPenduduk($key);

      $hasil .= '
          <table class="table">
          <thead>
            <tr>
              <th scope="col">NIK</th>
              <th scope="col">Nama</th>
              <th scope="col">Alamat</th>
              <th scope="col">Aksi</th>
            </tr>
          </thead>
      ';

      if ($data->num_rows() > 0) {

        foreach ($data->result() as $row) {
          $hasil .= '
            <tbody>
              <tr>
                <td>' . $row->nik . '</td>
                <td>' . $row->nama . '</td>
                <td>' . $row->alamat . '</td>
                <td>
                  <a href="" class="badge badge-primary tombolSubmit" data-id="' .  $row->id_penduduk . '">submit</a>
                </td>
              </tr>
            </tbody>
        ';
        }
      } else {
        $hasil .= '
            <tbody>
            <tr>
              <td colspan="4"><h3 class="text-center">Data tidak ditemukan</h3></td>
            </tr>
          </tbody>
        ';
      }
      $hasil .= '</table> <hr class="mb-5">';
      echo $hasil;
    }
    echo $hasil = '';
  }

  public function arsip()
  {
    $data['title'] = 'Arsip';
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    $data['surat'] = $this->db->get('surat')->result_array();

    $this->form_validation->set_rules('flag', 'Flag', 'required');

    if ($this->form_validation->run() == false) {
      $this->load->view('templates/header', $data);
      $this->load->view('templates/sidebar', $data);
      $this->load->view('templates/topbar', $data);
      $this->load->view('Surat/arsip', $data);
      $this->load->view('templates/footer');
    } else {
      $flag = $this->input->post('flag');
      $data['surat'] = $this->db->get_where('surat', ['flag' => $flag])->result_array();
      $this->load->view('templates/header', $data);
      $this->load->view('templates/sidebar', $data);
      $this->load->view('templates/topbar', $data);
      $this->load->view('Surat/arsip', $data);
      $this->load->view('templates/footer');
    }
  }

  public function hapusSurat($id)
  {
    $this->db->delete('surat', ['id' => $id]);
    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Surat telah dihapus!!</div>');
    redirect('surat/arsip');
  }

  public function keterangan_domisili_usaha()
  {
    $data['title'] = 'Buat Surat';
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

    $this->form_validation->set_rules('no_surat', 'Nomer Surat', 'required|trim|is_unique[surat.nomer_surat]');
    $this->form_validation->set_rules('nama', 'Nama Lengkap', 'required|trim');
    $this->form_validation->set_rules('no_ktp', 'Nomer KTP', 'required|trim');
    $this->form_validation->set_rules('ttl', 'Tempat/Tanggal lahir', 'required|trim');
    $this->form_validation->set_rules('jk', 'Jenis Kelamin', 'required|trim');
    $this->form_validation->set_rules('kewarganegaraan', 'Kewarganegaraan', 'required|trim');
    $this->form_validation->set_rules('agama', 'Agama', 'required|trim');
    $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim');

    $this->form_validation->set_rules('pejabat_kelurahan', 'Nama Penanggung Jawab Surat', 'required|trim');
    $this->form_validation->set_rules('nip', 'NIP Penanggung Jawab Surat', 'required|trim');
    $this->form_validation->set_rules('jabatan', 'Jabatan Penanggung Jawab Surat', 'required|trim');
    // $this->form_validation->set_rules('pejabat_kecamatan', 'Nama Pejabat Kecamatan', 'required|trim');
    // $this->form_validation->set_rules('nip_pj_kecamatan', 'NIP Pejabat Kecamatan', 'required|trim');

    $this->form_validation->set_rules('nama_usaha', 'Nama Usaha', 'required|trim');
    $this->form_validation->set_rules('pimpinan', 'Penaggung Jawab / Pimpinan Perusahaan', 'required|trim');
    $this->form_validation->set_rules('jenis_usaha', 'Jenis / Klasifikasi Usaha', 'required|trim');
    $this->form_validation->set_rules('barang_produksi', 'Produksi / Barang Dagangan', 'required|trim');
    $this->form_validation->set_rules('alamat_usaha', 'Alamat Usaha', 'required|trim');
    $this->form_validation->set_rules('jumlah_karyawan', 'Jumlah Karyawan', 'required|trim');
    $this->form_validation->set_rules('sts_bangunan', 'Status Bangunan', 'required|trim');
    $this->form_validation->set_rules('peruntukan_bangunan', 'Peruntukan Bangunan', 'required|trim');

    if ($this->form_validation->run() == false) {
      $this->load->view('templates/header', $data);
      $this->load->view('templates/sidebar', $data);
      $this->load->view('templates/topbar', $data);
      $this->load->view('surat/keterangan_domisili_usaha', $data);
      $this->load->view('templates/footer');
    } else {
      $this->surat->insert_keterangan_domisili_usaha();
      $this->cetak();
    }
  }

  public function Cetak()
  {
    $key = '1a2b3a4b5a6b7a8b';
    $x = $this->rc4->enkripsi($key, $this->input->post('no_surat'));

    $data['surat'] = [
      'nomer_surat'               => $this->input->post('no_surat'),
      'keperluan'                 => $this->input->post('keperluan'),

      'nama_pemohon'              => $this->input->post('nama'),
      'no_ktp'                    => $this->input->post('no_ktp'),
      'ttl'                       => $this->input->post('ttl'),
      'jk'                        => $this->input->post('jk'),
      'kewarganegaraan'           => $this->input->post('kewarganegaraan'),
      'pekerjaan'                 => $this->input->post('pekerjaan'),
      'agama'                     => $this->input->post('agama'),
      'alamat_pemohon'            => $this->input->post('alamat'),

      'pejabat_kelurahan'         => $this->input->post('pejabat_kelurahan'),
      'nip'                       => $this->input->post('nip'),
      'jabatan'                   => $this->input->post('jabatan'),
      'pejabat_kecamatan'         => $this->input->post('pejabat_kecamatan'),
      'nip_pj_kecamatan'          => $this->input->post('nip_pj_kecamatan'),
      'jabatan_pejabat_kecamatan' => strtoupper($this->input->post('jabatan_pejabat_kecamatan')),

      'nama_usaha'                => $this->input->post('nama_usaha'),
      'pimpinan'                  => $this->input->post('pimpinan'),
      'jenis_usaha'               => $this->input->post('jenis_usaha'),
      'barang_produksi'           => $this->input->post('barang_produksi'),
      'alamat_usaha'              => $this->input->post('alamat_usaha'),
      'jumlah_karyawan'           => $this->input->post('jumlah_karyawan'),
      'sts_bangunan'              => $this->input->post('sts_bangunan'),
      'peruntukan_bangunan'       => $this->input->post('peruntukan_bangunan'),
      'alamat_usaha'              => $this->input->post('alamat_usaha'),
      'key'                       => $x,
      'tanggal'                   => time()
    ];
    $this->load->view('print/keterangan_domisili_usaha', $data);
  }

  public function getPendudukById($id)
  {
    echo json_encode($this->surat->cariPendudukById($id)->row_array());
  }
}
