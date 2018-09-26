<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Transaksi_model extends CI_Model {

    public $table = 'tb_transaksi';
    public $id = 'id_transaksi';
    public $order = 'DESC';

    function __construct() {
        parent::__construct();
    }

    // get all
    function get_all() {
        $this->db->order_by($this->id, $this->order);
        return $this->db->get_where($this->table, array('uid' => $this->session->userdata('user_id')))->result();
    }

    function get_transaksi() {
        $uid=$this->session->userdata('user_id');
        return $this->db->query("SELECT tb_transaksi.id_transaksi,tb_transaksi.kode_transaksi,tb_transaksi.no_telp,tb_pelanggan.nama_pelanggan,tb_pelanggan.alamat,tb_pelanggan.no_telpn,tb_nominal.nominal,tb_harga.harga,
            tb_transaksi.status,tb_transaksi.tgl_transaksi,tb_transaksi.tgl_tempo,tb_transaksi.tgl_bayar,tb_transaksi.uid
            FROM tb_transaksi INNER JOIN tb_pelanggan ON tb_transaksi.id_pelanggan = tb_pelanggan.id_pelanggan INNER JOIN tb_nominal ON tb_transaksi.id_nominal = tb_nominal.id_nominal 
            INNER JOIN tb_harga ON tb_transaksi.id_harga = tb_harga.id_harga WHERE tb_transaksi.uid=$uid ORDER BY tb_transaksi.id_transaksi DESC")->result();
    }
    function get_last_transaksi() {
        $uid=$this->session->userdata('user_id');
        return $this->db->query("SELECT tb_transaksi.id_transaksi,tb_transaksi.kode_transaksi,tb_transaksi.no_telp,tb_pelanggan.nama_pelanggan,tb_transaksi.status,tb_transaksi.tgl_transaksi,tb_transaksi.uid
            FROM tb_transaksi INNER JOIN tb_pelanggan ON tb_transaksi.id_pelanggan = tb_pelanggan.id_pelanggan 
            WHERE tb_transaksi.uid=$uid ORDER BY tb_transaksi.id_transaksi DESC LIMIT 10")->result();
    }
    function get_transaksi_lunas() {
        $uid=$this->session->userdata('user_id');
        return $this->db->query("SELECT tb_transaksi.id_transaksi,tb_transaksi.kode_transaksi,tb_transaksi.no_telp,tb_pelanggan.nama_pelanggan,tb_pelanggan.alamat,tb_pelanggan.no_telpn,tb_nominal.nominal,tb_harga.harga,
            tb_transaksi.status,tb_transaksi.tgl_transaksi,tb_transaksi.tgl_tempo,tb_transaksi.tgl_bayar,tb_transaksi.uid
            FROM tb_transaksi INNER JOIN tb_pelanggan ON tb_transaksi.id_pelanggan = tb_pelanggan.id_pelanggan INNER JOIN tb_nominal ON tb_transaksi.id_nominal = tb_nominal.id_nominal 
            INNER JOIN tb_harga ON tb_transaksi.id_harga = tb_harga.id_harga WHERE tb_transaksi.uid=$uid AND tb_transaksi.status='LUNAS' ORDER BY tb_transaksi.id_transaksi DESC")->result();
    }
    function get_transaksi_hutang() {
        $uid=$this->session->userdata('user_id');
        return $this->db->query("SELECT tb_transaksi.id_transaksi,tb_transaksi.kode_transaksi,tb_transaksi.no_telp,tb_pelanggan.nama_pelanggan,tb_pelanggan.alamat,tb_pelanggan.no_telpn,tb_nominal.nominal,tb_harga.harga,
            tb_transaksi.status,tb_transaksi.tgl_transaksi,tb_transaksi.tgl_tempo,tb_transaksi.tgl_bayar,tb_transaksi.uid
            FROM tb_transaksi INNER JOIN tb_pelanggan ON tb_transaksi.id_pelanggan = tb_pelanggan.id_pelanggan INNER JOIN tb_nominal ON tb_transaksi.id_nominal = tb_nominal.id_nominal 
            INNER JOIN tb_harga ON tb_transaksi.id_harga = tb_harga.id_harga WHERE tb_transaksi.uid=$uid AND tb_transaksi.status='HUTANG' ORDER BY tb_transaksi.id_transaksi DESC")->result();
    }

    function kdotomatis($uid) {
        $jenis = $uid.date('ym');
        $query = $this->db->query("SELECT max(kode_transaksi) as maxID FROM tb_transaksi WHERE kode_transaksi LIKE '$jenis%'");
        $data = $query->row_array();
        $idMax = $data['maxID'];
        $noUrut = (int) substr($idMax, 6, 3);
        $noUrut++;
        $newID = $jenis . sprintf("%03s", $noUrut);
        return $newID;
    }

    // get data by id
    function get_by_id($id) {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }

    // get total rows
    function total_rows($q = NULL) {
        $this->db->like('id_transaksi', $q);
        $this->db->or_like('no_telp', $q);
        $this->db->or_like('id_pelanggan', $q);
        $this->db->or_like('id_nominal', $q);
        $this->db->or_like('id_harga', $q);
        $this->db->or_like('status', $q);
        $this->db->or_like('tgl_transaksi', $q);
        $this->db->or_like('tgl_bayar', $q);
        $this->db->or_like('uid', $q);
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id_transaksi', $q);
        $this->db->or_like('no_telp', $q);
        $this->db->or_like('id_pelanggan', $q);
        $this->db->or_like('id_nominal', $q);
        $this->db->or_like('id_harga', $q);
        $this->db->or_like('status', $q);
        $this->db->or_like('tgl_transaksi', $q);
        $this->db->or_like('tgl_bayar', $q);
        $this->db->or_like('uid', $q);
        $this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }

    // insert data
    function insert($data) {
        $this->db->insert($this->table, $data);
    }

    // update data
    function update($id, $data) {
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
    }

    // delete data
    function delete($id) {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }

}

/* End of file Transaksi_model.php */
/* Location: ./application/models/Transaksi_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2016-05-14 11:11:34 */
/* http://harviacode.com */