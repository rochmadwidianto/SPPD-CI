<?php
/**
* ================= doc ====================
* FILENAME     : BiayaSbu.php
* @package     : BiayaSbu
* scope        : PUBLIC
* @Created     : 2018-09-27
* @Modified    : 2018-09-27
* @Analysts    : Anggi Ayu Meidamara <meidamara@gmail.com>
* @Author      : Rochmad Widianto <widiantorochmad@gmail.com>
* @copyright   : Copyright (c) 2018
* ================= doc ====================
*/

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
        $biayaSbu = $this->MBiayaSbu->get_all_query();

        $data = array(
            'biayaSbu_data' => $biayaSbu
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
        'biayaSbuMakId' => $row->biayaSbuMakId,
        'biayaSbuSumberdanaId' => $row->biayaSbuSumberdanaId,
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
            'biayaSbuMakId' => set_value('biayaSbuMakId'),
            'biayaSbuSumberdanaId' => set_value('biayaSbuSumberdanaId'),
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
                'biayaSbuMakId' => $this->input->post('biayaSbuMakId',TRUE),
                'biayaSbuSumberdanaId' => $this->input->post('biayaSbuSumberdanaId',TRUE),
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
                'biayaSbuMakId' => set_value('biayaSbuMakId', $row->biayaSbuMakId),
                'biayaSbuSumberdanaId' => set_value('biayaSbuSumberdanaId', $row->biayaSbuSumberdanaId),
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
                'biayaSbuMakId' => $this->input->post('biayaSbuMakId',TRUE),
                'biayaSbuSumberdanaId' => $this->input->post('biayaSbuSumberdanaId',TRUE),
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
    $this->form_validation->set_rules('biayaSbuMakId', 'biayaSbuMakId', 'trim|required');
    $this->form_validation->set_rules('biayaSbuSumberdanaId', 'biayaSbuSumberdanaId', 'trim|required');

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
    	xlsWriteLabel($tablehead, $kolomhead++, "Kode");
    	xlsWriteLabel($tablehead, $kolomhead++, "Nama");
        xlsWriteLabel($tablehead, $kolomhead++, "MAK");
        xlsWriteLabel($tablehead, $kolomhead++, "Sumber Dana");

	foreach ($this->MBiayaSbu->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->biayaSbuKode);
	    xlsWriteLabel($tablebody, $kolombody++, $data->biayaSbuNama);
        xlsWriteLabel($tablebody, $kolombody++, $data->biayaSbuId);
        xlsWriteLabel($tablebody, $kolombody++, $data->biayaSbuSumberdanaId);

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