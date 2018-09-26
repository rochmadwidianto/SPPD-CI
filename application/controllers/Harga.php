<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Harga extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Harga_model');
        $this->load->library('form_validation');
        chek_session();
    }

    public function index() {
        $harga = $this->Harga_model->get_all();

        $data = array(
            'harga_data' => $harga
        );

        $this->template->display('harga/tb_harga_list', $data);
    }

    public function read($id) {
        $row = $this->Harga_model->get_by_id($id);
        if ($row) {
            $data = array(
                'id_harga' => $row->id_harga,
                'harga' => $row->harga,
            );
            $this->template->display('harga/tb_harga_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('harga'));
        }
    }

    public function create() {
        $data = array(
            'button' => 'Create',
            'action' => site_url('harga/create_action'),
            'id_harga' => set_value('id_harga'),
            'harga' => set_value('harga'),
            'uid' => $this->session->userdata('user_id'),
        );
        $this->template->display('harga/tb_harga_form', $data);
    }

    public function create_action() {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
                'harga' => $this->input->post('harga', TRUE),
                'uid' => $this->session->userdata('user_id'),
            );

            $this->Harga_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('harga'));
        }
    }

    public function update($id) {
        $row = $this->Harga_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('harga/update_action'),
                'id_harga' => set_value('id_harga', $row->id_harga),
                'harga' => set_value('harga', $row->harga),
            );
            $this->template->display('harga/tb_harga_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('harga'));
        }
    }

    public function update_action() {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_harga', TRUE));
        } else {
            $data = array(
                'harga' => $this->input->post('harga', TRUE),
            );

            $this->Harga_model->update($this->input->post('id_harga', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('harga'));
        }
    }

    public function delete($id) {
        $row = $this->Harga_model->get_by_id($id);

        if ($row) {
            $this->Harga_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('harga'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('harga'));
        }
    }

    public function _rules() {
        $this->form_validation->set_rules('harga', 'harga', 'trim|required|numeric|max_length[7]');
        $this->form_validation->set_rules('id_harga', 'id_harga', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-red">', '</span>');
    }

    public function excel() {
        $this->load->helper('exportexcel');
        $namaFile = "tb_harga.xls";
        $judul = "tb_harga";
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
        xlsWriteLabel($tablehead, $kolomhead++, "Harga");

        foreach ($this->Harga_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
            xlsWriteNumber($tablebody, $kolombody++, $data->harga);

            $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

}

/* End of file Harga.php */
/* Location: ./application/controllers/Harga.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2016-05-14 11:04:07 */
/* http://harviacode.com */