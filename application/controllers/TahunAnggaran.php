<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class TahunAnggaran extends CI_Controller
{
    
        
    function __construct()
    {
        parent::__construct();
        $this->load->model('MTahunAnggaran');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $tahunanggaran = $this->MTahunAnggaran->get_all();

        $data = array(
            'tahunanggaran_data' => $tahunanggaran
        );

        $this->template->display('ref_tahun_anggaran/ref_tahun_anggaran_list', $data);
    }

    public function read($id) 
    {
        $row = $this->MTahunAnggaran->get_by_id($id);
        if ($row) {
            $data = array(
		'thAnggaranId' => $row->thAnggaranId,
		'thAnggaranNama' => $row->thAnggaranNama,
		'thAnggaranIsAktif' => $row->thAnggaranIsAktif,
		'thAnggaranIsOpen' => $row->thAnggaranIsOpen,
		'thAnggaranBuka' => $row->thAnggaranBuka,
		'thAnggaranTutup' => $row->thAnggaranTutup,
	    );
            $this->template->display('ref_tahun_anggaran/ref_tahun_anggaran_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('tahunanggaran'));
        }
    }

    public function create() 
    {
        $data = array(
            'style_aksi' => 'success',
            'label_aksi' => 'Tambah',
            'action' => site_url('tahunanggaran/create_action'),
	    'thAnggaranId' => set_value('thAnggaranId'),
	    'thAnggaranNama' => set_value('thAnggaranNama'),
	    'thAnggaranIsAktif' => set_value('thAnggaranIsAktif'),
	    'thAnggaranIsOpen' => set_value('thAnggaranIsOpen'),
	    'thAnggaranBuka' => set_value('thAnggaranBuka'),
	    'thAnggaranTutup' => set_value('thAnggaranTutup'),
	);
        $this->template->display('ref_tahun_anggaran/ref_tahun_anggaran_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'thAnggaranNama' => $this->input->post('thAnggaranNama',TRUE),
		'thAnggaranIsAktif' => $this->input->post('thAnggaranIsAktif',TRUE),
		'thAnggaranIsOpen' => $this->input->post('thAnggaranIsOpen',TRUE),
		'thAnggaranBuka' => $this->input->post('thAnggaranBuka',TRUE),
		'thAnggaranTutup' => $this->input->post('thAnggaranTutup',TRUE),
	    );

            $this->MTahunAnggaran->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('tahunanggaran'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->MTahunAnggaran->get_by_id($id);

        if ($row) {
            $data = array(
            'style_aksi' => 'warning',
            'label_aksi' => 'Ubah',
                'action' => site_url('tahunanggaran/update_action'),
		'thAnggaranId' => set_value('thAnggaranId', $row->thAnggaranId),
		'thAnggaranNama' => set_value('thAnggaranNama', $row->thAnggaranNama),
		'thAnggaranIsAktif' => set_value('thAnggaranIsAktif', $row->thAnggaranIsAktif),
		'thAnggaranIsOpen' => set_value('thAnggaranIsOpen', $row->thAnggaranIsOpen),
		'thAnggaranBuka' => set_value('thAnggaranBuka', $row->thAnggaranBuka),
		'thAnggaranTutup' => set_value('thAnggaranTutup', $row->thAnggaranTutup),
	    );
            $this->template->display('ref_tahun_anggaran/ref_tahun_anggaran_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('tahunanggaran'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('thAnggaranId', TRUE));
        } else {
            $data = array(
		'thAnggaranNama' => $this->input->post('thAnggaranNama',TRUE),
		'thAnggaranIsAktif' => $this->input->post('thAnggaranIsAktif',TRUE),
		'thAnggaranIsOpen' => $this->input->post('thAnggaranIsOpen',TRUE),
		'thAnggaranBuka' => $this->input->post('thAnggaranBuka',TRUE),
		'thAnggaranTutup' => $this->input->post('thAnggaranTutup',TRUE),
	    );

            $this->MTahunAnggaran->update($this->input->post('thAnggaranId', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('tahunanggaran'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->MTahunAnggaran->get_by_id($id);

        if ($row) {
            $this->MTahunAnggaran->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('tahunanggaran'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('tahunanggaran'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('thAnggaranNama', 'thanggarannama', 'trim|required');
	$this->form_validation->set_rules('thAnggaranIsAktif', 'thanggaranisaktif', 'trim|required');
	$this->form_validation->set_rules('thAnggaranIsOpen', 'thanggaranisopen', 'trim|required');
	$this->form_validation->set_rules('thAnggaranBuka', 'thanggaranbuka', 'trim|required');
	$this->form_validation->set_rules('thAnggaranTutup', 'thanggarantutup', 'trim|required');

	$this->form_validation->set_rules('thAnggaranId', 'thAnggaranId', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "ref_tahun_anggaran.xls";
        $judul = "ref_tahun_anggaran";
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
	xlsWriteLabel($tablehead, $kolomhead++, "ThAnggaranNama");
	xlsWriteLabel($tablehead, $kolomhead++, "ThAnggaranIsAktif");
	xlsWriteLabel($tablehead, $kolomhead++, "ThAnggaranIsOpen");
	xlsWriteLabel($tablehead, $kolomhead++, "ThAnggaranBuka");
	xlsWriteLabel($tablehead, $kolomhead++, "ThAnggaranTutup");

	foreach ($this->MTahunAnggaran->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->thAnggaranNama);
	    xlsWriteLabel($tablebody, $kolombody++, $data->thAnggaranIsAktif);
	    xlsWriteLabel($tablebody, $kolombody++, $data->thAnggaranIsOpen);
	    xlsWriteLabel($tablebody, $kolombody++, $data->thAnggaranBuka);
	    xlsWriteLabel($tablebody, $kolombody++, $data->thAnggaranTutup);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

}

/* End of file TahunAnggaran.php */
/* Location: ./application/controllers/TahunAnggaran.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2018-09-21 20:00:37 */
/* http://harviacode.com */