<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Jabatan extends CI_Controller
{
    
        
    function __construct()
    {
        parent::__construct();
        $this->load->model('MJabatan');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $jabatan = $this->MJabatan->get_all();
// 
        $data = array(
            'jabatan_data' => $jabatan
        );

        $this->template->display('ref_jabatan/ref_jabatan_list', $data);
    }

    public function read($id) 
    {
        $row = $this->MJabatan->get_by_id($id);
        if ($row) {
            $data = array(
		'jabatanId' => $row->jabatanId,
		'jabatanKode' => $row->jabatanKode,
		'jabatanKode' => $row->jabatanNama,
        'jabatanKeterangan' => $row->jabatanKeterangan,
	    );
            $this->template->display('ref_jabatan/ref_jabatan_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('jabatan'));
        }
    }

    public function create() 
    {
        $data = array(
            'style_aksi' => 'success',
            'label_aksi' => 'Tambah',
            'action' => site_url('jabatan/create_action'),
	    'jabatanId' => set_value('jabatanId'),
	    'jabatanKode' => set_value('jabatanKode'),
	    'jabatanNama' => set_value('jabatanNama'),
        'jabatanKeterangan' => set_value('jabatanKeterangan'),
	);
        $this->template->display('ref_jabatan/ref_jabatan_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'jabatanKode' => $this->input->post('jabatanKode',TRUE),
		'jabatanNama' => $this->input->post('jabatanNama',TRUE),
        'jabatanKeterangan' => $this->input->post('jabatanKeterangan',TRUE),
	    );

            $this->MJabatan->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('jabatan'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->MJabatan->get_by_id($id);

        if ($row) {
            $data = array(
            'style_aksi' => 'warning',
            'label_aksi' => 'Ubah',
                'action' => site_url('jabatan/update_action'),
		'jabatanId' => set_value('jabatanId', $row->jabatanId),
		'jabatanKode' => set_value('jabatanKode', $row->jabatanKode),
		'jabatanNama' => set_value('jabatanNama', $row->jabatanNama),
        'jabatanKeterangan' => set_value('jabatanKeterangan', $row->jabatanKeterangan),
	    );
            $this->template->display('ref_jabatan/ref_jabatan_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('jabatan'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('jabatanId', TRUE));
        } else {
            $data = array(
		'jabatanKode' => $this->input->post('jabatanKode',TRUE),
		'jabatanNama' => $this->input->post('jabatanNama',TRUE),
        'jabatanKeterangan' => $this->input->post('jabatanKeterangan',TRUE),
	    );

            $this->MJabatan->update($this->input->post('jabatanId', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('jabatan'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->MJabatan->get_by_id($id);

        if ($row) {
            $this->MJabatan->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('jabatan'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('jabatan'));
        }
    }

    // _rules : untuk set mandatory (required), filter spasi (trim), menentukan panjang inputan, dll | yang dilakukan dr controller
    // bisa dinamis tergantung kebutuhan, pisahkan dgn tanda '|'
    public function _rules() 
    {
	$this->form_validation->set_rules('jabatanKode', 'jabatanKode', 'trim|required');
	$this->form_validation->set_rules('jabatanNama', 'jabatanNama', 'trim|required');

	$this->form_validation->set_rules('jabatanId', 'jabatanId', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "ref_jabatan.xls";
        $judul = "ref_jabatan";
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
    // ini untuk mendefinisikan label kolom di excel

        $kolomhead = 0;
        xlsWriteLabel($tablehead, $kolomhead++, "No");
	xlsWriteLabel($tablehead, $kolomhead++, "Kode");
	xlsWriteLabel($tablehead, $kolomhead++, "Nama");
    xlsWriteLabel($tablehead, $kolomhead++, "Keterangan");
	foreach ($this->MJabatan->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->jabatanKode);
	    xlsWriteLabel($tablebody, $kolombody++, $data->jabatanNama);
        xlsWriteLabel($tablebody, $kolombody++, $data->jabatanKeterangan);
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