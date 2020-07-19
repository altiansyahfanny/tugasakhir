<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    is_logged_in();
  }

  public function index()
  {
    $data['title'] = 'My Profile';
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('templates/topbar', $data);
    $this->load->view('user/index', $data);
    $this->load->view('templates/footer');
  }

  public function edit()
  {
    $data['title'] = 'Edit Profile';
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

    $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
    if ($this->form_validation->run() == false) {
      $this->load->view('templates/header', $data);
      $this->load->view('templates/sidebar', $data);
      $this->load->view('templates/topbar', $data);
      $this->load->view('user/edit', $data);
      $this->load->view('templates/footer');
    } else {
      $nama = $this->input->post('nama');

      //cek gambar
      $upload_gambar = $_FILES['gambar']['name'];
      if ($upload_gambar) {
        $config['allowed_types']  = 'jpg|png';
        $config['max_size']       = '2048';
        $config['upload_path']    = './assets/img/profile';

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('gambar')) {

          $gambar_lama = $data['user']['image'];

          if ($gambar_lama != 'default.jpg') {
            unlink(FCPATH . 'assets/img/profile/' . $gambar_lama);
          }

          $gambar_baru = $this->upload->data('file_name');
          $this->db->set('image', $gambar_baru);
        } else {
          echo $this->upload->display_errors();
        }
      }

      $this->db->set('name', $nama);
      $this->db->where('email', $this->input->post('email'));
      $this->db->update('user');

      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Profile berhasil diubah</div>');
      redirect('user');
    }
  }
}
