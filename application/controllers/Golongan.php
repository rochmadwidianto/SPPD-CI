<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Golongan extends CI_Controller
{
    
        
    function __construct()
    {
        parent::__construct();
        $this->load->model('MGolongan');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $golongan = $this->MGolongan->get_all();

        $data = array(
            'golongan_data' => $golongan
        );

        $this->template->display('ref_golongan/ref_golongan_list', $data);
    }

    public function read($id) 
    {
        $row = $this->MGolongan->get_by_id($id);
        if ($row) {
            $data = array(
		'golonganId' => $row->golonganId,
		'golonganKode' => $row->golonganKode,
		'golonganNama' => $row->golonganNama,
	    );
            $this->template->display('ref_golongan/ref_golongan_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('golongan'));
        }
    }

    public function create() 
    {
        $data = array(
            'style_aksi' => 'success',
            'label_aksi' => 'Tambah',
            'action' => site_url('golongan/create_action'),
	    'golonganId' => set_value('golonganId'),
	    'golonganKode' => set_value('golonganKode'),
	    'golonganNama' => set_value('golonganNama'),
	);
        $this->template->display('ref_golongan/ref_golongan_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'golonganKode' => $this->input->post('golonganKode',TRUE),
		'golonganNama' => $this->input->post('golonganNama',TRUE),
	    );

            $this->MGolongan->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('golongan'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->MGolongan->get_by_id($id);

        if ($row) {
            $data = array(
                'style_aksi' => 'warning',
                'label_aksi' => 'Ubah',
                'action' => site_url('golongan/update_action'),
		'golonganId' => set_value('golonganId', $row->golonganId),
		'golonganKode' => set_value('golonganKode', $row->golonganKode),
		'golonganNama' => set_value('golonganNama', $row->golonganNama),
	    );
            $this->template->display('ref_golongan/ref_golongan_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('golongan'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('golonganId', TRUE));
        } else {
            $data = array(
		'golonganKode' => $this->input->post('golonganKode',TRUE),
		'golonganNama' => $this->input->post('golonganNama',TRUE),
	    );

            $this->MGolongan->update($this->input->post('golonganId', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('golongan'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->MGolongan->get_by_id($id);

        if ($row) {
            $this->MGolongan->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('golongan'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('golongan'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('golonganKode', 'golongankode', 'trim|required');
	$this->form_validation->set_rules('golonganNama', 'golongannama', 'trim|required');

	$this->form_validation->set_rules('golonganId', 'golonganId', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "ref_golongan.xls";
        $judul = "ref_golongan";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Kode");
	xlsWriteLabel($tablehead, $kolomhead++, "Nama");

	foreach ($this->MGolongan->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->golonganKode);
	    xlsWriteLabel($tablebody, $kolombody++, $data->golonganNama);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

}

/* End of file Golongan.php */
/* Location: ./application/controllers/Golongan.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2018-09-21 19:10:14 */
/* http://harviacode.com */