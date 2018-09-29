<?php
/**
* ================= doc ====================
* FILENAME     : Pegawai.php
* @package     : Pegawai
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

class Pegawai extends CI_Controller
{
    
        
    function __construct()
    {
        parent::__construct();
        $this->load->model('MPegawai');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $pegawai = $this->MPegawai->get_all_query();

        $data = array(
            'pegawai_data' => $pegawai
        );

        $this->template->display('ref_pegawai/ref_pegawai_list', $data);
    }

    public function read($id) 
    {
        $row = $this->MPegawai->get_by_id($id);
        if ($row) {
            $data = array(
        		'pegawaiId' => $row->pegawaiId,
        		'pegawaiNip' => $row->pegawaiNip,
        		'pegawaiNama' => $row->pegawaiNama,
        		'pegawaiPangkat' => $row->pegawaiPangkat,
        		'pegawaiJabatanId' => $row->pegawaiJabatanId,
        		'pegawaiGolonganId' => $row->pegawaiGolonganId,
	        );
            $this->template->display('ref_pegawai/ref_pegawai_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('pegawai'));
        }
    }

    //iki kan function tambah kan?
    public function create() 
    {
        $data = array(
            'style_aksi' => 'success',
            'label_aksi' => 'Tambah',
            'icon' => 'fa fa-plus-square-o',
            'action' => site_url('pegawai/create_action'),
    	    'pegawaiId' => set_value('pegawaiId'),
    	    'pegawaiNip' => set_value('pegawaiNip'),
    	    'pegawaiNama' => set_value('pegawaiNama'),
    	    'pegawaiPangkat' => set_value('pegawaiPangkat'),
    	    'pegawaiJabatanId' => set_value('pegawaiJabatanId'),
    	    'pegawaiGolonganId' => set_value('pegawaiGolonganId'),
	    );
        $this->template->display('ref_pegawai/ref_pegawai_form', $data);
    }
    
    //bedanya sama ini?
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
        		'pegawaiNip' => $this->input->post('pegawaiNip',TRUE),
        		'pegawaiNama' => $this->input->post('pegawaiNama',TRUE),
        		'pegawaiPangkat' => $this->input->post('pegawaiPangkat',TRUE),
        		'pegawaiJabatanId' => $this->input->post('pegawaiJabatanId',TRUE),
        		'pegawaiGolonganId' => $this->input->post('pegawaiGolonganId',TRUE),
	        );

            $this->MPegawai->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('pegawai'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->MPegawai->get_by_id($id);

        if ($row) {
            $data = array(
                'style_aksi' => 'warning',
                'label_aksi' => 'Ubah',
                'icon' => 'fa fa-pencil-square-o',
                'action' => site_url('pegawai/update_action'),
        		'pegawaiId' => set_value('pegawaiId', $row->pegawaiId),
        		'pegawaiNip' => set_value('pegawaiNip', $row->pegawaiNip),
        		'pegawaiNama' => set_value('pegawaiNama', $row->pegawaiNama),
        		'pegawaiPangkat' => set_value('pegawaiPangkat', $row->pegawaiPangkat),
        		'pegawaiJabatanId' => set_value('pegawaiJabatanId', $row->pegawaiJabatanId),
        		'pegawaiGolonganId' => set_value('pegawaiGolonganId', $row->pegawaiGolonganId),
	        );
            $this->template->display('ref_pegawai/ref_pegawai_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('pegawai'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('pegawaiId', TRUE));
        } else {
            $data = array(
        		'pegawaiNip' => $this->input->post('pegawaiNip',TRUE),
        		'pegawaiNama' => $this->input->post('pegawaiNama',TRUE),
        		'pegawaiPangkat' => $this->input->post('pegawaiPangkat',TRUE),
        		'pegawaiJabatanId' => $this->input->post('pegawaiJabatanId',TRUE),
        		'pegawaiGolonganId' => $this->input->post('pegawaiGolonganId',TRUE),
	        );

            $this->MPegawai->update($this->input->post('pegawaiId', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('pegawai'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->MPegawai->get_by_id($id);

        if ($row) {
            $this->MPegawai->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('pegawai'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('pegawai'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('pegawaiNip', 'pegawainip', 'trim|required');
	$this->form_validation->set_rules('pegawaiNama', 'pegawainama', 'trim|required');
	$this->form_validation->set_rules('pegawaiPangkat', 'pegawaipangkat', 'trim|required');
	$this->form_validation->set_rules('pegawaiJabatanId', 'pegawaijabatanid', 'trim|required');
	$this->form_validation->set_rules('pegawaiGolonganId', 'pegawaigolonganid', 'trim|required');

	$this->form_validation->set_rules('pegawaiId', 'pegawaiId', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "ref_pegawai.xls";
        $judul = "ref_pegawai";
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
	xlsWriteLabel($tablehead, $kolomhead++, "NIP");
	xlsWriteLabel($tablehead, $kolomhead++, "Nama");
	xlsWriteLabel($tablehead, $kolomhead++, "Pangkat");
	xlsWriteLabel($tablehead, $kolomhead++, "Jabatan");
	xlsWriteLabel($tablehead, $kolomhead++, "Golongan");

	foreach ($this->MPegawai->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->pegawaiNip);
	    xlsWriteLabel($tablebody, $kolombody++, $data->pegawaiNama);
	    xlsWriteLabel($tablebody, $kolombody++, $data->pegawaiPangkat);
	    xlsWriteLabel($tablebody, $kolombody++, $data->pegawaiJabatan);
	    xlsWriteNumber($tablebody, $kolombody++, $data->pegawaiGolonganId);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

}

/* End of file Pegawai.php */
/* Location: ./application/controllers/Pegawai.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2018-09-21 19:18:13 */
/* http://harviacode.com */