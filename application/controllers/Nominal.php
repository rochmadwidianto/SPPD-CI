<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Nominal extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Nominal_model');
        $this->load->library('form_validation');
        chek_session();
    }

    public function index() {
        $nominal = $this->Nominal_model->get_all();

        $data = array(
            'nominal_data' => $nominal
        );

        $this->template->display('nominal/tb_nominal_list', $data);
    }

    public function read($id) {
        $row = $this->Nominal_model->get_by_id($id);
        if ($row) {
            $data = array(
                'id_nominal' => $row->id_nominal,
                'nominal' => $row->nominal,
            );
            $this->template->display('nominal/tb_nominal_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('nominal'));
        }
    }

    public function create() {
        $data = array(
            'button' => 'Create',
            'action' => site_url('nominal/create_action'),
            'id_nominal' => set_value('id_nominal'),
            'nominal' => set_value('nominal'),
            'uid' => $this->session->userdata('user_id'),
        );
        $this->template->display('nominal/tb_nominal_form', $data);
    }

    public function create_action() {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
                'nominal' => $this->input->post('nominal', TRUE),
                'uid' => $this->session->userdata('user_id'),
            );

            $this->Nominal_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('nominal'));
        }
    }

    public function update($id) {
        $row = $this->Nominal_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('nominal/update_action'),
                'id_nominal' => set_value('id_nominal', $row->id_nominal),
                'nominal' => set_value('nominal', $row->nominal),
            );
            $this->template->display('nominal/tb_nominal_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('nominal'));
        }
    }

    public function update_action() {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_nominal', TRUE));
        } else {
            $data = array(
                'nominal' => $this->input->post('nominal', TRUE),
            );

            $this->Nominal_model->update($this->input->post('id_nominal', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('nominal'));
        }
    }

    public function delete($id) {
        $row = $this->Nominal_model->get_by_id($id);

        if ($row) {
            $this->Nominal_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('nominal'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('nominal'));
        }
    }

    public function _rules() {
        $this->form_validation->set_rules('nominal', 'nominal', 'trim|required|max_length[12]');
        $this->form_validation->set_rules('id_nominal', 'id_nominal', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel() {
        $this->load->helper('exportexcel');
        $namaFile = "tb_nominal.xls";
        $judul = "tb_nominal";
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
        xlsWriteLabel($tablehead, $kolomhead++, "Nominal");
        xlsWriteLabel($tablehead, $kolomhead++, "Uid");

        foreach ($this->Nominal_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
            xlsWriteNumber($tablebody, $kolombody++, $data->nominal);
            xlsWriteNumber($tablebody, $kolombody++, $data->uid);

            $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

}

/* End of file Nominal.php */
/* Location: ./application/controllers/Nominal.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2016-05-14 11:06:57 */
/* http://harviacode.com */