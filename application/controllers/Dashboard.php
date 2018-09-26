<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model(array('Transaksi_model', 'Pelanggan_model'));
        chek_session();
    }

    function index() {
        $data['title'] = "Home";
        $uid = $this->session->userdata('user_id');
        if ($this->ion_auth->is_admin()) {
            $data['harga'] = $this->db->query("SELECT SUM(tb_harga.harga) AS harga FROM tb_transaksi,tb_harga WHERE tb_transaksi.id_harga=tb_harga.id_harga AND tb_transaksi.uid=$uid ")->result();
            $data['hutang'] = $this->db->query("SELECT SUM(tb_harga.harga) AS harga FROM tb_transaksi,tb_harga WHERE tb_transaksi.id_harga=tb_harga.id_harga AND tb_transaksi.status='HUTANG' AND tb_transaksi.uid=$uid ")->result();
            $data['lunas'] = $this->db->query("SELECT SUM(tb_harga.harga) AS harga FROM tb_transaksi,tb_harga WHERE tb_transaksi.id_harga=tb_harga.id_harga AND tb_transaksi.status='LUNAS' AND tb_transaksi.uid=$uid ")->result();
            $data['user'] = $this->db->get('tb_users')->num_rows();
            $data['transaksi'] = $this->Transaksi_model->get_last_transaksi();
            $this->template->display('dashboard/admin', $data);
        } else {
            $data['harga'] = $this->db->query("SELECT SUM(tb_harga.harga) AS harga FROM tb_transaksi,tb_harga WHERE tb_transaksi.id_harga=tb_harga.id_harga AND tb_transaksi.uid=$uid ")->result();
            $data['hutang'] = $this->db->query("SELECT SUM(tb_harga.harga) AS harga FROM tb_transaksi,tb_harga WHERE tb_transaksi.id_harga=tb_harga.id_harga AND tb_transaksi.status='HUTANG' AND tb_transaksi.uid=$uid ")->result();
            $data['lunas'] = $this->db->query("SELECT SUM(tb_harga.harga) AS harga FROM tb_transaksi,tb_harga WHERE tb_transaksi.id_harga=tb_harga.id_harga AND tb_transaksi.status='LUNAS' AND tb_transaksi.uid=$uid ")->result();
            $data['pelanggan'] = $this->Pelanggan_model->get_rows();
            $data['transaksi'] = $this->Transaksi_model->get_last_transaksi();
            $this->template->display('dashboard/member', $data);
        }
    }

}
