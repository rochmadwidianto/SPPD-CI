<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class BiayaSbu extends CI_Controller
{
    
        
    function __construct()
    {
        parent::__construct();
        $this->load->model('MBiayaSbu');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $biayasbu = $this->MBiayaSbu->get_all();

        $data = array(
            'biayasbu_data' => $biayasbu
        );

        $this->template->display('ref_biaya_sbu/ref_biaya_sbu_list', $data);
    }

    public function read($id) 
    {
        $row = $this->MBiayaSbu->get_by_id($id);
        if ($row) {
            $data = array(
		'biayaSbuId' => $row->biayaSbuId,
		'biayaSbuKode' => $row->biayaSbuKode,
		'biayaSbuNama' => $row->biayaSbuNama,
	    );
            $this->template->display('ref_biaya_sbu/ref_biaya_sbu_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('biayasbu'));
        }
    }

    public function create() 
    {
        $data = array(
            'style_aksi' => 'success',
            'label_aksi' => 'Tambah',
            'action' => site_url('biayasbu/create_action'),
	    'biayaSbuId' => set_value('biayaSbuId'),
	    'biayaSbuKode' => set_value('biayaSbuKode'),
	    'biayaSbuNama' => set_value('biayaSbuNama'),
	);
        $this->template->display('ref_biaya_sbu/ref_biaya_sbu_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'biayaSbuKode' => $this->input->post('biayaSbuKode',TRUE),
		'biayaSbuNama' => $this->input->post('biayaSbuNama',TRUE),
	    );

            $this->MBiayaSbu->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('biayasbu'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->MBiayaSbu->get_by_id($id);

        if ($row) {
            $data = array(
            'style_aksi' => 'warning',
            'label_aksi' => 'Ubah',
                'action' => site_url('biayasbu/update_action'),
		'biayaSbuId' => set_value('biayaSbuId', $row->biayaSbuId),
		'biayaSbuKode' => set_value('biayaSbuKode', $row->biayaSbuKode),
		'biayaSbuNama' => set_value('biayaSbuNama', $row->biayaSbuNama),
	    );
            $this->template->display('ref_biaya_sbu/ref_biaya_sbu_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('biayasbu'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('biayaSbuId', TRUE));
        } else {
            $data = array(
		'biayaSbuKode' => $this->input->post('biayaSbuKode',TRUE),
		'biayaSbuNama' => $this->input->post('biayaSbuNama',TRUE),
	    );

            $this->MBiayaSbu->update($this->input->post('biayaSbuId', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('biayasbu'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->MBiayaSbu->get_by_id($id);

        if ($row) {
            $this->MBiayaSbu->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('biayasbu'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('biayasbu'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('biayaSbuKode', 'biayasbukode', 'trim|required');
	$this->form_validation->set_rules('biayaSbuNama', 'biayasbunama', 'trim|required');

	$this->form_validation->set_rules('biayaSbuId', 'biayaSbuId', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "ref_biaya_sbu.xls";
        $judul = "ref_biaya_sbu";
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
	xlsWriteLabel($tablehead, $kolomhead++, "BiayaSbuKode");
	xlsWriteLabel($tablehead, $kolomhead++, "BiayaSbuNama");

	foreach ($this->MBiayaSbu->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->biayaSbuKode);
	    xlsWriteLabel($tablebody, $kolombody++, $data->biayaSbuNama);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

}

/* End of file BiayaSbu.php */
/* Location: ./application/controllers/BiayaSbu.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2018-09-21 19:29:10 */
/* http://harviacode.com */