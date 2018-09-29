<?php
/**
* ================= doc ====================
* FILENAME     : JenisTransportasi.php
* @package     : JenisTransportasi
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

class JenisTransportasi extends CI_Controller
{
    
        
    function __construct()
    {
        parent::__construct();
        $this->load->model('MJenisTransportasi');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $jenistransportasi = $this->MJenisTransportasi->get_all();

        $data = array(
            'jenistransportasi_data' => $jenistransportasi
        );

        $this->template->display('ref_jenis_transportasi/ref_jenis_transportasi_list', $data);
    }

    public function read($id) 
    {
        $row = $this->MJenisTransportasi->get_by_id($id);
        if ($row) {
            $data = array(
        		'jenisTransportId' => $row->jenisTransportId,
        		'jenisTransportNama' => $row->jenisTransportNama,
	        );
            $this->template->display('ref_jenis_transportasi/ref_jenis_transportasi_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('jenistransportasi'));
        }
    }

    public function create() 
    {
        $data = array(
            'style_aksi' => 'success',
            'label_aksi' => 'Tambah',
            'icon' => 'fa fa-plus-square-o',
            'action' => site_url('jenistransportasi/create_action'),
    	    'jenisTransportId' => set_value('jenisTransportId'),
    	    'jenisTransportNama' => set_value('jenisTransportNama'),
	    );
        $this->template->display('ref_jenis_transportasi/ref_jenis_transportasi_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'jenisTransportNama' => $this->input->post('jenisTransportNama',TRUE),
	    );

            $this->MJenisTransportasi->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('jenistransportasi'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->MJenisTransportasi->get_by_id($id);

        if ($row) {
            $data = array(
                'style_aksi' => 'warning',
                'label_aksi' => 'Ubah',
                'icon' => 'fa fa-pencil-square-o',
                'action' => site_url('jenistransportasi/update_action'),
        		'jenisTransportId' => set_value('jenisTransportId', $row->jenisTransportId),
        		'jenisTransportNama' => set_value('jenisTransportNama', $row->jenisTransportNama),
	        );
            $this->template->display('ref_jenis_transportasi/ref_jenis_transportasi_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('jenistransportasi'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('jenisTransportId', TRUE));
        } else {
            $data = array(
		      'jenisTransportNama' => $this->input->post('jenisTransportNama',TRUE),
	       );

            $this->MJenisTransportasi->update($this->input->post('jenisTransportId', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('jenistransportasi'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->MJenisTransportasi->get_by_id($id);

        if ($row) {
            $this->MJenisTransportasi->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('jenistransportasi'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('jenistransportasi'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('jenisTransportNama', 'jenistransportnama', 'trim|required');

	$this->form_validation->set_rules('jenisTransportId', 'jenisTransportId', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "ref_jenis_transportasi.xls";
        $judul = "ref_jenis_transportasi";
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

	foreach ($this->MJenisTransportasi->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->jenisTransportNama);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

}

/* End of file JenisTransportasi.php */
/* Location: ./application/controllers/JenisTransportasi.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2018-09-21 19:14:02 */
/* http://harviacode.com */