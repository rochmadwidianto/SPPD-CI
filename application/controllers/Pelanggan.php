<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Pelanggan extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Pelanggan_model');
        $this->load->library('form_validation');
        chek_session();
    }

    public function index() {
        $pelanggan = $this->Pelanggan_model->get_all();

        $data = array(
            'pelanggan_data' => $pelanggan
        );

        $this->template->display('pelanggan/tb_pelanggan_list', $data);
    }

    public function read($id) {
        $row = $this->Pelanggan_model->get_by_id($id);
        if ($row) {
            $data = array(
                'id_pelanggan' => $row->id_pelanggan,
                'nama_pelanggan' => $row->nama_pelanggan,
                'alamat' => $row->alamat,
                'no_telpn' => $row->no_telpnn,
            );
            $this->template->display('pelanggan/tb_pelanggan_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('pelanggan'));
        }
    }

    public function create() {
        $data = array(
            'button' => 'Create',
            'action' => site_url('pelanggan/create_action'),
            'id_pelanggan' => set_value('id_pelanggan'),
            'nama_pelanggan' => set_value('nama_pelanggan'),
            'alamat' => set_value('alamat'),
            'no_telpn' => set_value('no_telpn'),
            'uid' => $this->session->userdata('user_id'),
        );
        $this->template->display('pelanggan/tb_pelanggan_form', $data);
    }

    public function create_action() {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
                'nama_pelanggan' => $this->input->post('nama_pelanggan', TRUE),
                'alamat' => $this->input->post('alamat', TRUE),
                'no_telpn' => $this->input->post('no_telpn', TRUE),
                'uid' => $this->session->userdata('user_id'),
            );

            $this->Pelanggan_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('pelanggan'));
        }
    }

    public function update($id) {
        $row = $this->Pelanggan_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('pelanggan/update_action'),
                'id_pelanggan' => set_value('id_pelanggan', $row->id_pelanggan),
                'nama_pelanggan' => set_value('nama_pelanggan', $row->nama_pelanggan),
                'alamat' => set_value('alamat', $row->alamat),
                'no_telpn' => set_value('no_telpn', $row->no_telpn),
            );
            $this->template->display('pelanggan/tb_pelanggan_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('pelanggan'));
        }
    }

    public function update_action() {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_pelanggan', TRUE));
        } else {
            $data = array(
                'nama_pelanggan' => $this->input->post('nama_pelanggan', TRUE),
                'alamat' => $this->input->post('alamat', TRUE),
                'no_telpn' => $this->input->post('no_telpn', TRUE),
            );

            $this->Pelanggan_model->update($this->input->post('id_pelanggan', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('pelanggan'));
        }
    }

    public function delete($id) {
        $row = $this->Pelanggan_model->get_by_id($id);

        if ($row) {
            $this->Pelanggan_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('pelanggan'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('pelanggan'));
        }
    }

    public function _rules() {
        $this->form_validation->set_rules('nama_pelanggan', 'nama pelanggan', 'trim|required');
        $this->form_validation->set_rules('alamat', 'alamat', 'trim|required');
        $this->form_validation->set_rules('no_telpn', 'no telp', 'trim|required|regex_match[/^[0-9\-\+]+$/]|max_length[15]');
        $this->form_validation->set_rules('id_pelanggan', 'id_pelanggan', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-red">', '</span>');
    }

    public function excel() {
        $this->load->helper('exportexcel');
        $namaFile = "tb_pelanggan.xls";
        $judul = "tb_pelanggan";
        $tablehead = 0;
        $tablebody = 1;
        $nourut = 1;
        //penulisan header
        header("Pragma: public");
        header("Expires: 0");
        header("Cache-Control: must-revalidate, post-check=0,pre-check=0");
        header("Content-Type: application/force-download");
        header("Content-Type: application/octet-stream");
        header("Content-Type: application/download");
        header("Content-Disposition: attachment;filename=" . $namaFile . "");
        header("Content-Transfer-Encoding: binary ");

        xlsBOF();

        $kolomhead = 0;
        xlsWriteLabel($tablehead, $kolomhead++, "No");
        xlsWriteLabel($tablehead, $kolomhead++, "Nama Pelanggan");
        xlsWriteLabel($tablehead, $kolomhead++, "Alamat");
        xlsWriteLabel($tablehead, $kolomhead++, "No Telp");

        foreach ($this->Pelanggan_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
            xlsWriteLabel($tablebody, $kolombody++, $data->nama_pelanggan);
            xlsWriteLabel($tablebody, $kolombody++, $data->alamat);
            xlsWriteNumber($tablebody, $kolombody++, $data->no_telpn);


            $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

}

/* End of file Pelanggan.php */
/* Location: ./application/controllers/Pelanggan.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2016-05-14 11:09:25 */
/* http://harviacode.com */