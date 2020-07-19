<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Penduduk extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('Penduduk_model', 'penduduk');
    is_logged_in();
  }

  public function index()
  {
    $data['title'] = 'Daftar Penduduk';
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

    $data['penduduk'] = $this->penduduk->getPendudukById();
    $data['agama'] = $this->penduduk->getAgama();
    $data['pendidikan'] = $this->penduduk->getPendidikan();
    $data['dusun'] = $this->penduduk->getDusun();

    $this->form_validation->set_rules('nik', 'NIK', 'required|trim');
    $this->form_validation->set_rules('no_ktp', 'Nomer KTP', 'required|trim');
    $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
    $this->form_validation->set_rules('tmpt_tgl_lahir', 'Tempat Tanggal Lahir', 'required|trim');
    $this->form_validation->set_rules('agama', 'Agama', 'required|trim');
    $this->form_validation->set_rules('pekerjaan', 'Pekerjaan', 'required|trim');
    $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim');
    $this->form_validation->set_rules('dusun', 'Dusun', 'required|trim');
    $this->form_validation->set_rules('rt', 'RT', 'required|trim');
    $this->form_validation->set_rules('rw', 'RW', 'required|trim');
    $this->form_validation->set_rules('jk', 'Jenis Kelamin', 'required|trim');
    $this->form_validation->set_rules('kewarganegaraan', 'Kewarganegaraan', 'required|trim');
    $this->form_validation->set_rules('sts_kawin', 'Status Kawin', 'required|trim');
    $this->form_validation->set_rules('pendidikan', 'Pendidikan', 'required|trim');
    $this->form_validation->set_rules('suku', 'Suku', 'required|trim');

    $key = $this->input->post('keyword');
    if (isset($_POST['keyword'])) {
      $data['penduduk'] = $this->db->get_where('penduduk', ['nama' => $key])->result_array();
    }

    if ($this->form_validation->run() == false) {
      $this->load->view('templates/header', $data);
      $this->load->view('templates/sidebar', $data);
      $this->load->view('templates/topbar', $data);
      $this->load->view('penduduk/index', $data);
      $this->load->view('templates/footer');
    } else {
      $data = [
        'nik'             => htmlspecialchars($this->input->post('nik', true)),
        'no_ktp'          => htmlspecialchars($this->input->post('no_ktp', true)),
        'nama'            => htmlspecialchars($this->input->post('nama', true)),
        'agama_id'        => htmlspecialchars($this->input->post('agama', true)),
        'pekerjaan'       => htmlspecialchars($this->input->post('pekerjaan', true)),
        'alamat'          => htmlspecialchars($this->input->post('alamat', true)),
        'dusun_id'        => htmlspecialchars($this->input->post('dusun', true)),
        'rt'              => htmlspecialchars($this->input->post('rt', true)),
        'rw'              => htmlspecialchars($this->input->post('rw', true)),
        'jk'              => htmlspecialchars($this->input->post('jk', true)),
        'kewarganegaraan' => htmlspecialchars($this->input->post('kewarganegaraan', true)),
        'sts_kawin'       => htmlspecialchars($this->input->post('sts_kawin', true)),
        'pendidikan_id'   => htmlspecialchars($this->input->post('pendidikan', true)),
        'suku'            => htmlspecialchars($this->input->post('suku', true)),
        'tmpt_tgl_lahir'  => htmlspecialchars($this->input->post('tmpt_tgl_lahir', true)),
      ];

      $this->db->insert('penduduk', $data);
      $this->session->set_flashdata('message', '
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          Data penduduk baru berhasil ditambahkan
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      ');
      redirect('penduduk');
    }
  }

  public function getEditPenduduk($id)
  {
    echo json_encode($this->db->get_where('penduduk', ['id_penduduk' => $id])->row_array());
  }

  public function ubahPenduduk()
  {
    $data['title'] = 'Daftar Penduduk';
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

    $data['penduduk'] = $this->penduduk->getPendudukById();
    $data['agama'] = $this->penduduk->getAgama();
    $data['pendidikan'] = $this->penduduk->getPendidikan();
    $data['dusun'] = $this->penduduk->getDusun();

    $this->form_validation->set_rules('nik', 'NIK', 'required|trim');
    $this->form_validation->set_rules('no_ktp', 'Nomer KTP', 'required|trim');
    $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
    $this->form_validation->set_rules('tmpt_tgl_lahir', 'Tempat Tanggal Lahir', 'required|trim');
    $this->form_validation->set_rules('agama', 'Agama', 'required|trim');
    $this->form_validation->set_rules('pekerjaan', 'Pekerjaan', 'required|trim');
    $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim');
    $this->form_validation->set_rules('dusun', 'Dusun', 'required|trim');
    $this->form_validation->set_rules('rt', 'RT', 'required|trim');
    $this->form_validation->set_rules('rw', 'RW', 'required|trim');
    $this->form_validation->set_rules('jk', 'Jenis Kelamin', 'required|trim');
    $this->form_validation->set_rules('kewarganegaraan', 'Kewarganegaraan', 'required|trim');
    $this->form_validation->set_rules('sts_kawin', 'Status Kawin', 'required|trim');
    $this->form_validation->set_rules('pendidikan', 'Pendidikan', 'required|trim');
    $this->form_validation->set_rules('suku', 'Suku', 'required|trim');

    $key = $this->input->post('keyword');
    if (isset($_POST['keyword'])) {
      $data['penduduk'] = $this->db->get_where('penduduk', ['nama' => $key])->result_array();
    }

    if ($this->form_validation->run() == false) {
      $this->load->view('templates/header', $data);
      $this->load->view('templates/sidebar', $data);
      $this->load->view('templates/topbar', $data);
      $this->load->view('penduduk/index', $data);
      $this->load->view('templates/footer');
    } else {
      $data = [
        'nik'             => htmlspecialchars($this->input->post('nik', true)),
        'no_ktp'          => htmlspecialchars($this->input->post('no_ktp', true)),
        'nama'            => htmlspecialchars($this->input->post('nama', true)),
        'agama_id'        => htmlspecialchars($this->input->post('agama', true)),
        'pekerjaan'       => htmlspecialchars($this->input->post('pekerjaan', true)),
        'alamat'          => htmlspecialchars($this->input->post('alamat', true)),
        'dusun_id'        => htmlspecialchars($this->input->post('dusun', true)),
        'rt'              => htmlspecialchars($this->input->post('rt', true)),
        'rw'              => htmlspecialchars($this->input->post('rw', true)),
        'jk'              => htmlspecialchars($this->input->post('jk', true)),
        'kewarganegaraan' => htmlspecialchars($this->input->post('kewarganegaraan', true)),
        'sts_kawin'       => htmlspecialchars($this->input->post('sts_kawin', true)),
        'pendidikan_id'   => htmlspecialchars($this->input->post('pendidikan', true)),
        'suku'            => htmlspecialchars($this->input->post('suku', true)),
        'tmpt_tgl_lahir'  => htmlspecialchars($this->input->post('tmpt_tgl_lahir', true)),
      ];

      $id = $this->input->post('id');
      $this->db->where('id_penduduk', $id);
      $this->db->update('penduduk', $data);

      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data penduduk berhasil diubah!!</div>');
      redirect('penduduk');
    }
  }

  public function hapusPenduduk($id)
  {
    $this->db->delete('penduduk', ['id_penduduk' => $id]);
    redirect('penduduk');
  }

  public function cari()
  {
    $data['title'] = 'Daftar Penduduk';
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    $data['agama'] = $this->penduduk->getAgama();
    $data['pendidikan'] = $this->penduduk->getPendidikan();
    $data['dusun'] = $this->penduduk->getDusun();

    $key = $this->input->post('keyword');
    $data['penduduk'] = $this->penduduk->cariPenduduk($key);

    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('templates/topbar', $data);
    $this->load->view('penduduk/index', $data);
    $this->load->view('templates/footer');
  }
}
