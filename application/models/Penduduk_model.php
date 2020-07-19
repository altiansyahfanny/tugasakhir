<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Penduduk_model extends CI_Model
{
  public function getPendudukById()
  {
    $this->db->select('*');
    $this->db->from('penduduk');
    $this->db->join('dusun', 'id_dusun = dusun_id');
    $this->db->join('agama', 'id_agama = agama_id');
    $this->db->join('pendidikan', 'id_pendidikan = pendidikan_id');
    $this->db->order_by('nama', 'ASC');
    return $this->db->get()->result_array();
  }

  public function getAgama()
  {
    $this->db->select('*');
    $this->db->from('agama');
    return $this->db->get()->result_array();
  }

  public function getPendidikan()
  {
    $this->db->select('*');
    $this->db->from('pendidikan');
    return $this->db->get()->result_array();
  }

  public function getDusun()
  {
    $this->db->select('*');
    $this->db->from('dusun');
    return $this->db->get()->result_array();
  }

  public function cariPenduduk($key)
  {
    $this->db->select('*');
    $this->db->from('penduduk');
    $this->db->like('nama', $key);
    $this->db->join('dusun', 'id_dusun = dusun_id');
    $this->db->join('agama', 'id_agama = agama_id');
    $this->db->join('pendidikan', 'id_pendidikan = pendidikan_id');
    $this->db->order_by('nama', 'ASC');
    return $this->db->get()->result_array();
  }
}
