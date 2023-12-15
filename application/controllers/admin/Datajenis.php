<?php

class Datajenis extends CI_Controller
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
        $data['title'] = "Data Jenis";
        $data['jenis'] = $this->Rental_model->get_data('jenis')->result();
        $this->load->view('templates_admin/header',$data);
        $this->load->view('templates_admin/sidebar');
        $this->load->view('templates_admin/topbar', $data);
        $this->load->view('admin/jenis', $data);
        $this->load->view('templates_admin/footer');
    }

    public function tambah_jenis()
    {
        $nama_jenis = $this->input->post('nama_jenis');
        $data = array('nama_jenis' => $nama_jenis);
        $this->Rental_model->insert_data($data, 'jenis');
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Data Jenis berhasil ditambahkan
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            </div>');
        redirect('admin/Datajenis');
    }

    public function edit_jenis()
    {
        $id_jenis = $this->input->post('id_jenis');
        $nama_jenis = $this->input->post('nama_jenis');
        $data = array('nama_jenis' => $nama_jenis);
        $where =
            array(
                'id_jenis' => $id_jenis
            );
        $this->Rental_model->update_data('jenis', $data, $where);
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Data Jenis berhasil diEdit
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            </div>');
        redirect('admin/Datajenis');
    }

    public function delete_jenis($id)
    {
        $where = array('id_jenis' => $id);

        $this->Rental_model->delete_data($where, 'jenis');
        $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            Data Jenis berhasil dihapus
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            </div>');
        redirect('admin/Datajenis');
    }
}
