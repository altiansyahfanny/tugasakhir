<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('User_model', 'user');
    $this->load->library('pdf_report');
    $this->load->library('aes_');
    is_logged_in();
  }

  public function index()
  {
    $data['title'] = 'Dashboard';
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('templates/topbar', $data);
    $this->load->view('admin/index', $data);
    $this->load->view('templates/footer');
  }

  public function tambahUser()
  {
    $data['title'] = 'Tambah User';
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    $data['member'] = $this->user->getUser();
    $data['role'] = $this->db->get('user_role')->result_array();

    $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
    $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]', [
      'is_unique' => 'This email has already register!'
    ]);
    $this->form_validation->set_rules('password', 'Password', 'required|trim');
    $this->form_validation->set_rules('level_id', 'Level', 'required|trim');

    if ($this->form_validation->run() == false) {
      $this->load->view('templates/header', $data);
      $this->load->view('templates/sidebar', $data);
      $this->load->view('templates/topbar', $data);
      $this->load->view('admin/tambah-user', $data);
      $this->load->view('templates/footer');
    } else {
      $this->user->tambahUser();
      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">User baru telah ditambahkan!!</div>');
      redirect('admin/tambahUser');
    }
  }

  public function hapusUser($id)
  {
    $this->db->delete('user', ['id' => $id]);
    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">User telah dihapus!!</div>');
    redirect('admin/tambahuser');
  }

  public function level()
  {
    $data['title'] = 'Level';
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

    $data['role'] = $this->db->get('user_role')->result_array();

    $this->form_validation->set_rules('level', 'Level', 'required');

    if ($this->form_validation->run() == false) {
      $this->load->view('templates/header', $data);
      $this->load->view('templates/sidebar', $data);
      $this->load->view('templates/topbar', $data);
      $this->load->view('admin/level', $data);
      $this->load->view('templates/footer');
    } else {
      $data = [
        'role'     => $this->input->post('level')
      ];
      $this->db->insert('user_role', $data);
      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Level baru telah ditambahkan!!</div>');
      redirect('admin/level');
    }
  }

  public function editUser($id)
  {
    echo json_encode($this->db->get_where('user', ['id' => $id])->row_array());
  }

  public function editUserLevel()
  {
    $data['title'] = 'Tambah User';
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    $data['member'] = $this->user->getUser();
    $data['role'] = $this->db->get('user_role')->result_array();

    $this->form_validation->set_rules('edit-nama', 'Nama', 'required|trim');
    $this->form_validation->set_rules('edit-level_id', 'Level', 'required|trim');

    if ($this->form_validation->run() == false) {
      $this->load->view('templates/header', $data);
      $this->load->view('templates/sidebar', $data);
      $this->load->view('templates/topbar', $data);
      $this->load->view('admin/tambah-user', $data);
      $this->load->view('templates/footer');
    } else {
      $id = $this->input->post('edit-id');
      $data = [
        'role_id' => htmlspecialchars($this->input->post('edit-level_id'))
      ];
      $this->db->where('id', $id);
      $this->db->update('user', $data);

      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">User Level berhasil diubah!!</div>');
      redirect('admin/tambahUser');
    }
  }

  public function hapusLevel($level_id)
  {
    $this->db->delete('user_role', ['id' => $level_id]);
    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Level telah dihapus!!</div>');
    redirect('admin/level');
  }

  public function aksesLevel($role_id)
  {
    $data['title'] = 'Level';
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

    $data['role'] = $this->db->get_where('user_role', ['id' => $role_id])->row_array();

    $this->db->where('id !=', 1);
    $data['menu'] = $this->db->get('user_menu')->result_array();

    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('templates/topbar', $data);
    $this->load->view('admin/akses-level', $data);
    $this->load->view('templates/footer');
  }

  public function changeAccess()
  {
    $menu_id = $this->input->post('menuId');
    $role_id = $this->input->post('roleId');

    $data = [
      'role_id' => $role_id,
      'menu_id' => $menu_id
    ];

    $result = $this->db->get_where('user_access_menu', $data);

    if ($result->num_rows() < 1) {
      $this->db->insert('user_access_menu', $data);
    } else {
      $this->db->delete('user_access_menu', $data);
    }

    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Access changed!</div>');
  }
}
