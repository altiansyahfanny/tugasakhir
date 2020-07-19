<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menu extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    is_logged_in();
  }

  public function index()
  {
    $data['title'] = 'Menu Management';
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

    $data['menu'] = $this->db->get('user_menu')->result_array();

    $this->form_validation->set_rules('menu', 'Menu', 'required');

    if ($this->form_validation->run() == false) {
      $this->load->view('templates/header', $data);
      $this->load->view('templates/sidebar', $data);
      $this->load->view('templates/topbar', $data);
      $this->load->view('menu/index', $data);
      $this->load->view('templates/footer');
    } else {
      $this->db->insert('user_menu', ['menu' => $this->input->post('menu')]);
      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Menu baru telah ditambahkan!</div>');
      redirect('menu');
    }
  }

  public function getEditMenu($id)
  {
    echo json_encode($this->db->get_where('user_menu', ['id' => $id])->row_array());
  }

  public function editMenu()
  {
    $data['title'] = 'Menu Management';
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

    $data['menu'] = $this->db->get('user_menu')->result_array();

    $this->form_validation->set_rules('menu', 'Menu', 'required');

    if ($this->form_validation->run() == false) {
      $this->load->view('templates/header', $data);
      $this->load->view('templates/sidebar', $data);
      $this->load->view('templates/topbar', $data);
      $this->load->view('menu/index', $data);
      $this->load->view('templates/footer');
    } else {
      $id = $this->input->post('id');
      $data = [
        'menu' => htmlspecialchars($this->input->post('menu'))
      ];
      $this->db->where('id', $id);
      $this->db->update('user_menu', $data);

      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Menu berhasil diubah!!</div>');
      redirect('menu');
    }
  }

  public function hapusMenu($id)
  {
    $this->db->delete('user_menu', ['id' => $id]);
    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Menu telah dihapus!!</div>');
    redirect('menu');
  }

  public function subMenu()
  {
    $data['title'] = 'Submenu Management';
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    $this->load->model('Menu_model', 'menu');

    $data['submenu'] = $this->menu->getSubMenu();
    $data['menu'] = $this->db->get('user_menu')->result_array();

    $this->form_validation->set_rules('judul', 'Judul', 'required');
    $this->form_validation->set_rules('menu_id', 'Menu', 'required');
    $this->form_validation->set_rules('url', 'URL', 'required');
    $this->form_validation->set_rules('ikon', 'Ikon', 'required');

    if ($this->form_validation->run() == false) {
      $this->load->view('templates/header', $data);
      $this->load->view('templates/sidebar', $data);
      $this->load->view('templates/topbar', $data);
      $this->load->view('menu/submenu', $data);
      $this->load->view('templates/footer');
    } else {
      $data = [
        'title'     => $this->input->post('judul'),
        'menu_id'   => $this->input->post('menu_id'),
        'url'       => $this->input->post('url'),
        'icon'      => $this->input->post('ikon'),
        'is_active' => $this->input->post('is_active')
      ];

      $this->db->insert('user_sub_menu', $data);
      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Submenu baru telah ditambahkan!</div>');
      redirect('menu/submenu');
    }
  }

  public function getEditSubMenu($id)
  {
    echo json_encode($this->db->get_where('user_sub_menu', ['id' => $id])->row_array());
  }

  public function editSubmenu()
  {
    $data['title'] = 'Submenu Management';
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    $this->load->model('Menu_model', 'menu');

    $data['submenu'] = $this->menu->getSubMenu();
    $data['menu'] = $this->db->get('user_menu')->result_array();

    $this->form_validation->set_rules('judul', 'Judul', 'required');
    $this->form_validation->set_rules('menu_id', 'Menu', 'required');
    $this->form_validation->set_rules('url', 'URL', 'required');
    $this->form_validation->set_rules('ikon', 'Ikon', 'required');

    if ($this->form_validation->run() == false) {
      $this->load->view('templates/header', $data);
      $this->load->view('templates/sidebar', $data);
      $this->load->view('templates/topbar', $data);
      $this->load->view('menu/submenu', $data);
      $this->load->view('templates/footer');
    } else {
      $data = [
        'title'     => htmlspecialchars($this->input->post('judul')),
        'menu_id'   => htmlspecialchars($this->input->post('menu_id')),
        'url'       => htmlspecialchars($this->input->post('url')),
        'icon'      => htmlspecialchars($this->input->post('ikon')),
        'is_active' => htmlspecialchars($this->input->post('is_active'))
      ];
      $id = $this->input->post('id');
      $this->db->where('id', $id);
      $this->db->update('user_sub_menu', $data);
      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Submenu berhasil diubah!</div>');
      redirect('menu/submenu');
    }
  }

  public function hapusSubMenu($id)
  {
    $this->db->delete('user_sub_menu', ['id' => $id]);
    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Submenu telah dihapus!!</div>');
    redirect('menu/submenu');
  }
}
