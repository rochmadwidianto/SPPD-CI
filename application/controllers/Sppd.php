<?php
/**
* ================= doc ====================
* FILENAME     : SPPD.php
* @package     : SPPD
* scope        : PUBLIC
* @Created     : 2018-10-02
* @Modified    : 2018-10-02
* @Analysts    : Anggi Ayu Meidamara <meidamara@gmail.com>
* @Author      : Rochmad Widianto <widiantorochmad@gmail.com>
* @copyright   : Copyright (c) 2018
* ================= doc ====================
*/

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Sppd extends CI_Controller
{
    
    function __construct()
    {
        parent::__construct();
        $this->load->model('MTransSppd');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $kotatujuan = $this->MTransSppd->get_all();

        $data = array(
            'kotatujuan_data' => $kotatujuan
        );

        $this->template->display('trans_sppd/trans_sppd_list', $data);
    }

    public function read($id) 
    {
        $row = $this->MTransSppd->get_by_id($id);
        if ($row) {
            $data = array(
        		'kotaTujuanId' => $row->kotaTujuanId,
        		'kotaTujuanNama' => $row->kotaTujuanNama,
	        );
            $this->template->display('trans_sppd/trans_sppd_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('kotatujuan'));
        }
    }

    public function create() 
    {
        $data = array(
            'style_aksi' => 'success',
            'label_aksi' => 'Tambah',
            'icon' => 'fa fa-plus-square-o',
            'action' => site_url('kotatujuan/create_action'),
    	    'kotaTujuanId' => set_value('kotaTujuanId'),
    	    'kotaTujuanNama' => set_value('kotaTujuanNama'),
	    );
        $this->template->display('trans_sppd/trans_sppd_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		      'kotaTujuanNama' => $this->input->post('kotaTujuanNama',TRUE),
	        );

            $this->MTransSppd->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('kotatujuan'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->MTransSppd->get_by_id($id);

        if ($row) {
            $data = array(
                'style_aksi' => 'warning',
                'label_aksi' => 'Ubah',
                'icon' => 'fa fa-pencil-square-o',
                'action' => site_url('kotatujuan/update_action'),
        		'kotaTujuanId' => set_value('kotaTujuanId', $row->kotaTujuanId),
        		'kotaTujuanNama' => set_value('kotaTujuanNama', $row->kotaTujuanNama),
	        );
            $this->template->display('trans_sppd/trans_sppd_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('kotatujuan'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('kotaTujuanId', TRUE));
        } else {
            $data = array(
		      'kotaTujuanNama' => $this->input->post('kotaTujuanNama',TRUE),
	        );

            $this->MTransSppd->update($this->input->post('kotaTujuanId', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('kotatujuan'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->MTransSppd->get_by_id($id);

        if ($row) {
            $this->MTransSppd->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('kotatujuan'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('kotatujuan'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('kotaTujuanNama', 'kotatujuannama', 'trim|required');

	$this->form_validation->set_rules('kotaTujuanId', 'kotaTujuanId', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "trans_sppd.xls";
        $judul = "trans_sppd";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Nama");

	foreach ($this->MTransSppd->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->kotaTujuanNama);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

}

/* End of file Sppd.php */
/* Location: ./application/controllers/Sppd.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2018-09-21 19:14:18 */
/* http://harviacode.com */