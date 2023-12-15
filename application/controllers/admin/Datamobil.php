<?php

class Datamobil extends CI_Controller
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
        $data['title'] = "Data Mobil";
        $data['mobil'] = $this->db->query(
            "SELECT    mobil.id_mobil,
                                                mobil.nama_mobil,
                                                mobil.tarif,
                                                mobil.foto_mbl,
                                                mobil.no_plat,
                                                jenis.nama_jenis,
                                                merk.nama_merk,
                                                mobil.status_mbl
                                                FROM mobil
                                                INNER JOIN jenis
                                                ON mobil.id_jenis= jenis.id_jenis
                                                INNER JOIN merk
                                                ON mobil.id_merk=merk.id_merk order by mobil.id_mobil desc"
        )->result();
        $data['jenis'] = $this->Rental_model->get_data('jenis')->result();
        $data['merk'] = $this->Rental_model->get_data('merk')->result();
        $this->load->view('templates_admin/header', $data);
        $this->load->view('templates_admin/sidebar');
        $this->load->view('templates_admin/topbar', $data);
        $this->load->view('admin/mobil', $data);
        $this->load->view('templates_admin/footer');
    }

    public function tambah_mobil()
    {
        $data['user_session'] = $this->Rental_model->cekData(['email' => 
        $this->session->userdata('email')])->row_array();
        $data['title'] = "Tambah Mobil";
        $data['jenis'] = $this->Rental_model->get_data('jenis')->result();
        $data['merk'] = $this->Rental_model->get_data('merk')->result();
        $this->load->view('templates_admin/header', $data);
        $this->load->view('templates_admin/sidebar');
        $this->load->view('templates_admin/topbar', $data);
        $this->load->view('admin/tambah_mobil', $data);
        $this->load->view('templates_admin/footer');
    }

    public function simpan_mobil()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->tambah_mobil();
        } else {
            $nama_mbl = $this->input->post('nama_mbl');
            $no_plat = $this->input->post('no_plat');
            $kapasitas = $this->input->post('kapasitas');
            $id_jenis = $this->input->post('id_jenis');
            $id_merk = $this->input->post('id_merk');
            $transmisi = $this->input->post('transmisi');
            $mesin = $this->input->post('mesin');
            $warna = $this->input->post('warna');
            $gambar_mbl = $_FILES['gambar_mbl']['name'];
            $tarif = $this->input->post('tarif');

            if ($gambar_mbl = '') {
            } else {
                $config['upload_path'] = './assets/img';
                $config['allowed_types'] = 'jpg|jpeg|png';

                $this->load->library('upload', $config);

                if (!$this->upload->do_upload('gambar_mbl')) {
                    echo "Gambar Mobil Gagal Diupload";
                } else {
                    $gambar_mbl = $this->upload->data('file_name');
                }
            }

            $data = array(
                'nama_mobil' => $nama_mbl,
                'no_plat' => $no_plat,
                'kapasitas' => $kapasitas,
                'id_jenis' => $id_jenis,
                'id_merk' => $id_merk,
                'transmisi' => $transmisi,
                'mesin' => $mesin,
                'warna' => $warna,
                'foto_mbl' => $gambar_mbl,
                'tarif' => $tarif,
                'status_mbl' => 'Tersedia'
            );

            $this->Rental_model->insert_data($data, 'mobil');
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Data Mobil berhasil ditambahkan
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            </div>');
            redirect('admin/Datamobil');
        }
    }

    public function update_mobil($id)
    {
        $data['user_session'] = $this->Rental_model->cekData(['email' => 
        $this->session->userdata('email')])->row_array();
        $data['title'] = "Edit Data Mobil";
        $where = array('id_mobil' => $id);
        $data['mobil'] = $this->db->query(
            "SELECT * FROM mobil, jenis, merk
                WHERE 
                mobil.id_jenis = jenis.id_jenis
                and mobil.id_merk = merk.id_merk
                and mobil.id_mobil='$id'"
        )->result();
        $data['jenis'] = $this->Rental_model->get_data('jenis')->result();
        $data['merk'] = $this->Rental_model->get_data('merk')->result();

        $this->load->view('templates_admin/header', $data);
        $this->load->view('templates_admin/sidebar');
        $this->load->view('templates_admin/topbar', $data);
        $this->load->view('admin/edit_mobil', $data);
        $this->load->view('templates_admin/footer');
    }

    public function edit_mobil()
    {
        $this->_rules();
        if ($this->form_validation->run() == FALSE) {
            $this->update_mobil('id_mobil');
        } else {
            $id_mobil = $this->input->post('id_mobil');
            $nama_mbl = $this->input->post('nama_mbl');
            $no_plat = $this->input->post('no_plat');
            $kapasitas = $this->input->post('kapasitas');
            $id_jenis = $this->input->post('id_jenis');
            $id_merk = $this->input->post('id_merk');
            $transmisi = $this->input->post('transmisi');
            $mesin = $this->input->post('mesin');
            $warna = $this->input->post('warna');
            $gambar_mbl = $_FILES['gambar_mbl']['name'];
            $tarif = $this->input->post('tarif');

            if ($gambar_mbl) {
                $config['upload_path'] = './assets/img';
                $config['allowed_types'] = 'jpg|jpeg|png';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('gambar_mbl')) {
                    $gambar_mbl = $this->upload->data('file_name');
                    $this->db->set('foto_mbl', $gambar_mbl);
                } else {
                    echo $this->upload->display_errors();
                }
            }

            $data = array(
                'nama_mobil' => $nama_mbl,
                'no_plat' => $no_plat,
                'kapasitas' => $kapasitas,
                'id_jenis' => $id_jenis,
                'id_merk' => $id_merk,
                'transmisi' => $transmisi,
                'mesin' => $mesin,
                'warna' => $warna,
                'tarif' => $tarif,
            );

            $where = array(
                'id_mobil' => $id_mobil
            );

            $this->Rental_model->update_data('mobil', $data, $where);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Data Mobil berhasil diUpdate
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            </div>');
            redirect('admin/Datamobil');
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('nama_mbl', 'Nama Mobil', 'required');
        $this->form_validation->set_rules('no_plat', 'No Plat', 'required');
        $this->form_validation->set_rules('kapasitas', 'Kapasitas', 'required');
        $this->form_validation->set_rules('id_jenis', 'Id Jenis', 'required');
        $this->form_validation->set_rules('id_merk', 'Id Merk', 'required');
        $this->form_validation->set_rules('transmisi', 'Transmisi', 'required');
        $this->form_validation->set_rules('mesin', 'Mesin', 'required');
        $this->form_validation->set_rules('warna', 'Warna', 'required');
        $this->form_validation->set_rules('tarif', 'Tarif', 'required');
    }

    public function delete_mobil($id)
    {
        $where = array('id_mobil' => $id);

        $this->Rental_model->delete_data($where, 'mobil');
        $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            Data Mobil berhasil dihapus
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            </div>');
        redirect('admin/Datamobil');
    }
}
