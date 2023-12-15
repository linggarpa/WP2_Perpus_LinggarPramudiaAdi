<?php

class Datamerk extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        cek_login();
    }
    
    public function index()
    {
        $data['user_session'] = $this->Rental_model->cekData(['email' => 
        $this->session->userdata('email')])->row_array();
        $data['title'] = "Data Merk";
        $data['merk'] = $this->Rental_model->get_data('merk')->result();
        $this->load->view('templates_admin/header', $data);
        $this->load->view('templates_admin/sidebar');
        $this->load->view('templates_admin/topbar', $data);
        $this->load->view('admin/merk', $data);
        $this->load->view('templates_admin/footer');
    }

    public function tambah_merk()
    {
        $nama_jenis = $this->input->post('nama_merk');
        $data = array('nama_merk' => $nama_jenis);
        $this->Rental_model->insert_data($data, 'merk');
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Data Merk berhasil ditambahkan
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            </div>');
        redirect('admin/Datamerk');
    }

    public function edit_merk()
    {
        $id_merk = $this->input->post('id_merk');
        $nama_merk = $this->input->post('nama_merk');
        $data = array('nama_merk' => $nama_merk);
        $where =
            array(
                'id_merk' => $id_merk
            );
        $this->Rental_model->update_data('merk', $data, $where);
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Data Merk berhasil diEdit
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            </div>');
        redirect('admin/Datamerk');
    }

    public function delete_merk($id)
    {
        $where = array('id_merk' => $id);

        $this->Rental_model->delete_data($where, 'merk');
        $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            Data merk berhasil dihapus
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            </div>');
        redirect('admin/Datamerk');
    }
}
