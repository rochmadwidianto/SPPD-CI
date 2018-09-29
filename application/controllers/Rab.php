<?php
/**
* ================= doc ====================
* FILENAME     : Rab.php
* @package     : Rab
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

class Rab extends CI_Controller
{
    
        
    function __construct()
    {
        parent::__construct();
        $this->load->model('MRab');
        $this->load->library('form_validation');
        $this->user_id = $this->session->userdata('user_id');
    }

    public function index()
    {
        $rab = $this->MRab->get_all();

        $data = array(
            'rab_data' => $rab
        );

        $this->template->display('fin_rab/fin_rab_list', $data);
    }

    public function read($id) 
    {
        $row = $this->MRab->get_by_id($id);
        if ($row) {
            $data = array(
        		'rabId' => $row->rabId,
        		'rabThnAnggId' => $row->rabThnAnggId,
        		'rabKode' => $row->rabKode,
        		'rabNama' => $row->rabNama,
        		'rabKeterangan' => $row->rabKeterangan,
        		'rabNominalTotal' => $row->rabNominalTotal,
                'rabTglInput' => $row->rabTglInput,
                'rabUserId' => $row->rabUserId,
	        );
            $this->template->display('fin_rab/fin_rab_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('rab'));
        }
    }

    public function create() 
    {
        $data = array(
            'style_aksi' => 'success',
            'label_aksi' => 'Tambah',
            'icon' => 'fa fa-plus-square-o',
            'action' => site_url('rab/create_action'),
    	    'rabId' => set_value('rabId'),
    	    'rabThnAnggId' => set_value('rabThnAnggId'),
    	    'rabKode' => set_value('rabKode'),
    	    'rabNama' => set_value('rabNama'),
    	    'rabKeterangan' => set_value('rabKeterangan'),
    	    'rabNominalTotal' => set_value('rabNominalTotal'),
            // 'rabTglInput' => set_value('rabTglInput'),
            // 'rabUserId' => set_value('rabUserId'),
	    );
        $this->template->display('fin_rab/fin_rab_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
                'rabThnAnggId' => $this->input->post('rabThnAnggId',TRUE),
        		'rabKode' => $this->input->post('rabKode',TRUE),
        		'rabNama' => $this->input->post('rabNama',TRUE),
        		'rabKeterangan' => $this->input->post('rabKeterangan',TRUE),
        		'rabNominalTotal' => $this->input->post('rabNominalTotal',TRUE),
        		'rabTglInput' => date('Y-m-d'),
                'rabUserId' => $this->user_id,
	        );

            $this->MRab->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('rab'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->MRab->get_by_id($id);

        if ($row) {
            $data = array(
                'style_aksi' => 'warning',
                'label_aksi' => 'Ubah',
                'icon' => 'fa fa-pencil-square-o',
                'action' => site_url('rab/update_action'),
        		'rabId' => set_value('rabId', $row->rabId),
        		'rabThnAnggId' => set_value('rabThnAnggId', $row->rabThnAnggId),
        		'rabKode' => set_value('rabKode', $row->rabKode),
        		'rabNama' => set_value('rabNama', $row->rabNama),
        		'rabKeterangan' => set_value('rabKeterangan', $row->rabKeterangan),
                'rabNominalTotal' => set_value('rabNominalTotal', $row->rabNominalTotal),
        		'rabUserId' => set_value('rabUserId', $row->rabUserId),
	       );
            $this->template->display('fin_rab/fin_rab_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('rab'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('rabId', TRUE));
        } else {
            $data = array(
                'rabThnAnggId' => $this->input->post('rabThnAnggId',TRUE),
                'rabKode' => $this->input->post('rabKode',TRUE),
                'rabNama' => $this->input->post('rabNama',TRUE),
                'rabKeterangan' => $this->input->post('rabKeterangan',TRUE),
                'rabNominalTotal' => $this->input->post('rabNominalTotal',TRUE),
                // 'rabTglInput' => $this->input->post('rabTglInput',TRUE),
                'rabUserId' => $this->user_id,
	        );

            $this->MRab->update($this->input->post('rabId', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('rab'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->MRab->get_by_id($id);

        if ($row) {
            $this->MRab->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('rab'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('rab'));
        }
    }

    public function _rules() 
    {
    $this->form_validation->set_rules('rabThnAnggId', 'rabThnAnggId', 'trim|required');
	$this->form_validation->set_rules('rabKode', 'rabKode', 'trim|required');
	$this->form_validation->set_rules('rabNama', 'rabNama', 'trim|required');
	$this->form_validation->set_rules('rabKeterangan', 'rabKeterangan', 'trim|required');
	$this->form_validation->set_rules('rabNominalTotal', 'rabNominalTotal', 'trim|required');
	// $this->form_validation->set_rules('rabUserId', 'rabUserId', 'trim|required');

	$this->form_validation->set_rules('rabId', 'rabId', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "ref_rab.xls";
        $judul = "ref_rab";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Tahun Anggaran");
	xlsWriteLabel($tablehead, $kolomhead++, "Kode");
	xlsWriteLabel($tablehead, $kolomhead++, "Nama");
	xlsWriteLabel($tablehead, $kolomhead++, "Keterangan");
	xlsWriteLabel($tablehead, $kolomhead++, "Nominal");

	foreach ($this->MRab->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->rabThnAnggId);
	    xlsWriteLabel($tablebody, $kolombody++, $data->rabKode);
	    xlsWriteLabel($tablebody, $kolombody++, $data->rabNama);
	    xlsWriteLabel($tablebody, $kolombody++, $data->rabKeterangan);
	    xlsWriteNumber($tablebody, $kolombody++, $data->rabNominalTotal);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

}

/* End of file Ref.php */
/* Location: ./application/controllers/Ref.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2018-09-21 19:18:13 */
/* http://harviacode.com */