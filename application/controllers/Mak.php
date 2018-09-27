<?php
/**
* ================= doc ====================
* FILENAME     : Mak.php
* @package     : Mak
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

class Mak extends CI_Controller
{
    
        
    function __construct()
    {
        parent::__construct();
        $this->load->model('MMak');
        $this->load->library('form_validation');
    }

    public function index()
    {
        // $mak = $this->MMak->get_all_query();
        $mak = $this->MMak->get_all();

        $data = array(
            'mak_data' => $mak
        );

        $this->template->display('ref_mak/ref_mak_list', $data);
    }

    public function read($id) 
    {
        $row = $this->MMak->get_by_id($id);
        if ($row) {
            $data = array(
		'makId' => $row->makId,
		'makKode' => $row->makKode,
		'makNama' => $row->makNama,
		
	    );
            $this->template->display('ref_mak/ref_mak_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('mak'));
        }
    }

    public function create() 
    {
        $data = array(
            'style_aksi' => 'success',
            'label_aksi' => 'Tambah',
            'action' => site_url('mak/create_action'),
	    'makId' => set_value('makId'),
	    'makKode' => set_value('makKode'),
	    'makNama' => set_value('makNama'),
	);
        $this->template->display('ref_mak/ref_mak_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'makKode' => $this->input->post('makKode',TRUE),
		'makNama' => $this->input->post('makNama',TRUE),
	    );

            $this->MMak->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('mak'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->MMak->get_by_id($id);

        if ($row) {
            $data = array(
            'style_aksi' => 'warning',
            'label_aksi' => 'Ubah',
                'action' => site_url('mak/update_action'),
		'makId' => set_value('makId', $row->makId),
		'makKode' => set_value('makKode', $row->makKode),
		'makNama' => set_value('makNama', $row->makNama),
		
	    );
            $this->template->display('ref_mak/ref_mak_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('mak'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('makId', TRUE));
        } else {
            $data = array(
		'makKode' => $this->input->post('makKode',TRUE),
		'makNama' => $this->input->post('makNama',TRUE),
	    );

            $this->MMak->update($this->input->post('makId', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('mak'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->MMak->get_by_id($id);

        if ($row) {
            $this->MMak->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('mak'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('mak'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('makKode', 'makkode', 'trim|required');
	$this->form_validation->set_rules('makNama', 'maknama', 'trim|required');
	$this->form_validation->set_rules('makId', 'makId', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "ref_mak.xls";
        $judul = "ref_mak";
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
	xlsWriteLabel($tablehead, $kolomhead++, "MakKode");
	xlsWriteLabel($tablehead, $kolomhead++, "MakNama");

	foreach ($this->MMak->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->makKode);
	    xlsWriteLabel($tablebody, $kolombody++, $data->makNama);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

}

/* End of file Mak.php */
/* Location: ./application/controllers/Mak.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2018-09-21 20:11:01 */
/* http://harviacode.com */