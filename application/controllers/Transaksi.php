<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Transaksi extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Transaksi_model');
        $this->load->library('form_validation');
        chek_session();
    }

    public function index() {    
        $this->template->display('transaksi/tb_transaksi_list');
    }

    public function lunas() {
        $this->template->display('transaksi/tb_transaksi_lunas');
    }

    public function hutang() {
        $this->template->display('transaksi/tb_transaksi_hutang');
    }

    function view_data(){ 
        $no=1;               
        $transaksi_data = $this->Transaksi_model->get_transaksi();
            foreach ($transaksi_data as $transaksi) {
                if ($transaksi->status == "LUNAS") {
                    $status = "<span class='label label-success'>" . $transaksi->status . "</span>";
                } elseif ($transaksi->status == "HUTANG") {
                    $status = "<span class='label label-danger'>" . $transaksi->status . "</span>";
                }            
               
            $query[] = array(
                'no'=>$no++,
                'kode_transaksi'=>'#'.$transaksi->kode_transaksi,
                'no_telp'=>$transaksi->no_telp, 
                'nama_pelanggan'=>$transaksi->nama_pelanggan, 
                'nominal'=>$transaksi->nominal,         
                'harga'=>rupiah($transaksi->harga),
                'tgl_transaksi'=>tgl_indo($transaksi->tgl_transaksi), 
                'status'=>$status, 
                'detail'=>anchor('transaksi/read/' . $transaksi->id_transaksi, '<i class="btn btn-info btn-sm fa fa-eye" data-toggle="tooltip" title="View Detail"></i>'),
                'edit'=>anchor('transaksi/update/' . $transaksi->id_transaksi, '<i class="btn-sm btn-info glyphicon glyphicon-edit" data-toggle="tooltip" title="edit"></i>'),                
            );
        }        
        $result=array('data'=>$query);
        echo  json_encode($result);
    }   

    function view_data_lunas(){ 
        $no=1;               
        $transaksi_data = $this->Transaksi_model->get_transaksi_lunas();
            foreach ($transaksi_data as $transaksi) {
                if ($transaksi->status == "LUNAS") {
                    $status = "<span class='label label-success'>" . $transaksi->status . "</span>";
                } elseif ($transaksi->status == "HUTANG") {
                    $status = "<span class='label label-danger'>" . $transaksi->status . "</span>";
                }            
               
            $query[] = array(
                'no'=>$no++,
                'kode_transaksi'=>'#'.$transaksi->kode_transaksi,
                'no_telp'=>$transaksi->no_telp, 
                'nama_pelanggan'=>$transaksi->nama_pelanggan, 
                'nominal'=>$transaksi->nominal,         
                'harga'=>rupiah($transaksi->harga),
                'tgl_transaksi'=>tgl_indo($transaksi->tgl_transaksi), 
                'status'=>$status, 
                'detail'=>anchor('transaksi/read/' . $transaksi->id_transaksi, '<i class="btn btn-info btn-sm fa fa-eye" data-toggle="tooltip" title="View Detail"></i>'),
                'edit'=>anchor('transaksi/update/' . $transaksi->id_transaksi, '<i class="btn-sm btn-info glyphicon glyphicon-edit" data-toggle="tooltip" title="edit"></i>'),                
            );
        }        
        $result=array('data'=>$query);
        echo  json_encode($result);
    }  

    function view_data_hutang(){ 
        $no=1;               
        $transaksi_data = $this->Transaksi_model->get_transaksi_hutang();
            foreach ($transaksi_data as $transaksi) {
                if ($transaksi->status == "LUNAS") {
                    $status = "<span class='label label-success'>" . $transaksi->status . "</span>";
                } elseif ($transaksi->status == "HUTANG") {
                    $status = "<span class='label label-danger'>" . $transaksi->status . "</span>";
                }            
               
            $query[] = array(
                'no'=>$no++,
                'kode_transaksi'=>'#'.$transaksi->kode_transaksi,
                'no_telp'=>$transaksi->no_telp, 
                'nama_pelanggan'=>$transaksi->nama_pelanggan, 
                'nominal'=>$transaksi->nominal,         
                'harga'=>rupiah($transaksi->harga),
                'tgl_transaksi'=>tgl_indo($transaksi->tgl_transaksi), 
                'status'=>$status, 
                'detail'=>anchor('transaksi/read/' . $transaksi->id_transaksi, '<i class="btn btn-info btn-sm fa fa-eye" data-toggle="tooltip" title="View Detail"></i>'),
                'edit'=>anchor('transaksi/update/' . $transaksi->id_transaksi, '<i class="btn-sm btn-info glyphicon glyphicon-edit" data-toggle="tooltip" title="edit"></i>'),                
            );
        }        
        $result=array('data'=>$query);
        echo  json_encode($result);
    }    

    public function read($id) {
        $row = $this->Transaksi_model->get_by_id($id);
        if ($row) {
            $data = array(
                'id_transaksi' => $row->id_transaksi,
                'kode_transaksi' => $row->kode_transaksi,
                'telp' => $row->no_telp,
                'id_pelanggan' => $row->id_pelanggan,
                'id_nominal' => $row->id_nominal,
                'id_harga' => $row->id_harga,
                'status' => $row->status,
                'tgl_transaksi' => $row->tgl_transaksi,
                'tgl_tempo' => $row->tgl_tempo,
                'tgl_bayar' => $row->tgl_bayar,
            );
            $data['pelanggan'] = $this->db->get_where('tb_pelanggan', array('id_pelanggan' => $row->id_pelanggan))->row_array();
            $data['nominal'] = $this->db->get_where('tb_nominal', array('id_nominal' => $row->id_nominal))->row_array();
            $data['harga'] = $this->db->get_where('tb_harga', array('id_harga' => $row->id_harga))->row_array();
            $this->template->display('transaksi/tb_transaksi_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('transaksi'));
        }
    }

    public function create() {
        $uid = $this->session->userdata('user_id');
        $data = array(
            'button' => 'Create',
            'action' => site_url('transaksi/create_action'),
            'id_transaksi' => set_value('id_transaksi'),
            'no_telp' => set_value('no_telp'),
            'id_pelanggan' => set_value('id_pelanggan'),
            'id_nominal' => set_value('id_nominal'),
            'id_harga' => set_value('id_harga'),
            'status' => set_value('status'),
            'tgl_transaksi' => set_value('tgl_transaksi'),
            'uid' => $uid,
        );
        $data['pelanggan'] = $this->db->get_where('tb_pelanggan', array('uid' => $uid))->result();
        $data['nominal'] = $this->db->get_where('tb_nominal', array('uid' => $uid))->result();
        $data['harga'] = $this->db->get_where('tb_harga', array('uid' => $uid))->result();
        $this->template->display('transaksi/tb_transaksi_form', $data);
    }

    public function create_action() {
        $this->_rules();
        $this->form_validation->set_rules('no_telp', 'no telp', 'required|regex_match[/^[0-9\-\+]+$/]');
        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $uid = $this->session->userdata('user_id');
            $status = $this->input->post('status', TRUE);
            if ($status == "LUNAS") {
                $tgl_bayar = $this->input->post('tgl_transaksi', TRUE);
            } else {
                $tgl_bayar = "";
            }
            $data = array(
                'kode_transaksi' => $this->Transaksi_model->kdotomatis($uid),
                'no_telp' => $this->input->post('no_telp', TRUE),
                'id_pelanggan' => $this->input->post('id_pelanggan', TRUE),
                'id_nominal' => $this->input->post('id_nominal', TRUE),
                'id_harga' => $this->input->post('id_harga', TRUE),
                'status' => $this->input->post('status', TRUE),
                'tgl_transaksi' => $this->input->post('tgl_transaksi', TRUE),
                'tgl_bayar' => $tgl_bayar,
                'uid' => $uid,
            );

            $this->Transaksi_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('transaksi'));
        }
    }

    public function update($id) {
        $row = $this->Transaksi_model->get_by_id($id);
        $uid = $this->session->userdata('user_id');
        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('transaksi/update_action'),
                'id_transaksi' => set_value('id_transaksi', $row->id_transaksi),
                'no_telp' => set_value('no_telp', $row->no_telp),
                'id_pelanggan' => set_value('id_pelanggan', $row->id_pelanggan),
                'id_nominal' => set_value('id_nominal', $row->id_nominal),
                'id_harga' => set_value('id_harga', $row->id_harga),
                'status' => set_value('status', $row->status),
                'tgl_transaksi' => set_value('tgl_transaksi', $row->tgl_transaksi),
                'tgl_bayar' => set_value('tgl_bayar', $row->tgl_bayar),
                'uid' => set_value('uid', $row->uid),
            );
            $data['pelanggan'] = $this->db->get_where('tb_pelanggan', array('uid' => $uid))->result();
            $data['nominal'] = $this->db->get_where('tb_nominal', array('uid' => $uid))->result();
            $data['harga'] = $this->db->get_where('tb_harga', array('uid' => $uid))->result();
            $this->template->display('transaksi/tb_transaksi_form_edit', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('transaksi'));
        }
    }

    public function update_action() {
        $this->form_validation->set_rules('tgl_bayar', 'tgl bayar', 'trim|required');
        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_transaksi', TRUE));
        } else {
            $data = array(
                'status' => $this->input->post('status', TRUE),
                'tgl_bayar' => $this->input->post('tgl_bayar', TRUE),
            );

            $this->Transaksi_model->update($this->input->post('id_transaksi', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('transaksi'));
        }
    }

    public function delete($id) {
        $row = $this->Transaksi_model->get_by_id($id);

        if ($row) {
            $this->Transaksi_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('transaksi'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('transaksi'));
        }
    }

    public function _rules() {

        $this->form_validation->set_rules('id_pelanggan', 'id pelanggan', 'trim|required');
        $this->form_validation->set_rules('id_nominal', 'id nominal', 'trim|required');
        $this->form_validation->set_rules('id_harga', 'id harga', 'trim|required');
        $this->form_validation->set_rules('status', 'status', 'trim|required');
        $this->form_validation->set_rules('tgl_transaksi', 'tgl transaksi', 'trim|required');
        $this->form_validation->set_rules('id_transaksi', 'id_transaksi', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel() {
        $this->load->helper('exportexcel');
        $namaFile = "transaksi.xls";
        $judul = "transaksi";
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
        xlsWriteLabel($tablehead, $kolomhead++, "No Transaksi");
        xlsWriteLabel($tablehead, $kolomhead++, "No Telp");
        xlsWriteLabel($tablehead, $kolomhead++, "Pelanggan");
        xlsWriteLabel($tablehead, $kolomhead++, "Nominal");
        xlsWriteLabel($tablehead, $kolomhead++, "Harga");
        xlsWriteLabel($tablehead, $kolomhead++, "Status");
        xlsWriteLabel($tablehead, $kolomhead++, "Tgl Transaksi");
        xlsWriteLabel($tablehead, $kolomhead++, "Tgl Bayar");        

        foreach ($this->Transaksi_model->get_transaksi() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
            xlsWriteNumber($tablebody, $kolombody++, $data->kode_transaksi);
            xlsWriteNumber($tablebody, $kolombody++, $data->no_telp);
            xlsWriteLabel ($tablebody, $kolombody++, $data->nama_pelanggan);
            xlsWriteNumber($tablebody, $kolombody++, $data->nominal);
            xlsWriteNumber($tablebody, $kolombody++, $data->harga);
            xlsWriteLabel($tablebody, $kolombody++, $data->status);
            xlsWriteLabel($tablebody, $kolombody++, $data->tgl_transaksi);
            xlsWriteLabel($tablebody, $kolombody++, $data->tgl_bayar);

            $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

}

/* End of file Transaksi.php */
/* Location: ./application/controllers/Transaksi.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2016-05-14 11:11:34 */
/* http://harviacode.com */