<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Surat_model extends CI_Model
{
  public function __construct()
  {
    parent::__construct();
  }

  public function insert_keterangan_domisili_usaha()
  {
    $data = [
      'flag'                => 1,
      'nama_surat'          => 'Keterangan Domisili Usaha',

      'nomer_surat'         => $this->input->post('no_surat'),
      'nama_pemohon'        => $this->input->post('nama'),
      'no_ktp'              => $this->input->post('no_ktp'),
      'ttl'                 => $this->input->post('ttl'),
      'jk'                  => $this->input->post('jk'),
      'kewarganegaraan'     => $this->input->post('kewarganegaraan'),
      'agama'               => $this->input->post('agama'),
      'alamat_pemohon'      => $this->input->post('alamat'),

      'nama_usaha'          => $this->input->post('nama_usaha'),
      'pj_usaha'            => $this->input->post('pimpinan'),
      'jenis_usaha'         => $this->input->post('jenis_usaha'),
      'barang_produksi'     => $this->input->post('barang_produksi'),
      'jml_karyawan'        => $this->input->post('jumlah_karyawan'),
      'sts_bangunan'        => $this->input->post('sts_bangunan'),
      'peruntukan_bangunan' => $this->input->post('peruntukan_bangunan'),
      'alamat_usaha'        => $this->input->post('alamat_usaha'),
      'tanggal'             => time()
    ];

    $this->db->insert('surat', $data);
  }

  public function cariPenduduk($key)
  {
    $this->db->select('*');
    $this->db->from('penduduk');
    $this->db->like('nama', $key);
    $this->db->order_by('nama', 'ASC');
    return $this->db->get();
  }

  public function cariPendudukById($key)
  {
    $this->db->select('*');
    $this->db->from('penduduk');
    $this->db->where('id_penduduk', $key);
    $this->db->join('dusun', 'id_dusun = dusun_id');
    $this->db->join('agama', 'id_agama = agama_id');
    $this->db->join('pendidikan', 'id_pendidikan = pendidikan_id');
    $this->db->order_by('nama', 'ASC');
    return $this->db->get();
  }
}
