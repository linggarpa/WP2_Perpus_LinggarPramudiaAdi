<?php

class Datasewa extends CI_Controller
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
        $data['title'] = "Data Sewa";
        $data['penyewaan'] = $this->db->query(
            "SELECT mobil.nama_mobil, mobil.no_plat, mobil.tarif, user.nama,
            transaksi.id_transaksi, transaksi.lama_sewa, transaksi.tanggal_transaksi,
            transaksi.tanggal_sewa , transaksi.tanggal_kembali, transaksi.status_sewa
            FROM transaksi 
            JOIN mobil ON transaksi.id_mobil = mobil.id_mobil 
            JOIN user ON transaksi.id_user = user.id_user 
            WHERE transaksi.konfirmasi_pembayaran ='Sudah Dikonfirmasi' order by transaksi.id_transaksi asc"
        )->result();
        $this->load->view('templates_admin/header',$data);
        $this->load->view('templates_admin/sidebar');
        $this->load->view('templates_admin/topbar', $data);
        $this->load->view('admin/penyewaan', $data);
        $this->load->view('templates_admin/footer');
    }

    public function tambah_penyewaan()
    {
        $data['user_session'] = $this->Rental_model->cekData(['email' => 
        $this->session->userdata('email')])->row_array();
        $data['title'] = "Data Sewa";
        $where = array('id_role' => 2);
        $data['user'] = $this->Rental_model->get_where($where,'user')->result();
        $where = array('status_mbl' => 'Tersedia');
        $data['mobil'] = $this->Rental_model->get_where($where,'mobil')->result();
        $this->load->view('templates_admin/header',$data);
        $this->load->view('templates_admin/sidebar');
        $this->load->view('templates_admin/topbar', $data);
        $this->load->view('admin/tambah_sewa', $data);
        $this->load->view('templates_admin/footer');
    }

    public function simpan_sewa()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->tambah_penyewaan();
        } else {
            $id_user = $this->input->post('id_user');
            $id_mobil = $this->input->post('id_mobil');
            $tgl_sewa = $this->input->post('tgl_sewa');
            $tgl_kembali = $this->input->post('tgl_kembali');
            $lama_sewa = $this->input->post('lama_sewa');
            $stts_byr = "Belum Bayar";
            $konfirmasi ="Belum Dikonfirmasi";

            $data = array(
                'id_user' => $id_user,
                'id_mobil' => $id_mobil,
                'tanggal_transaksi' => date('y-m-d'),
                'tanggal_sewa' => $tgl_sewa,
                'tanggal_kembali' => $tgl_kembali,
                'lama_sewa' => $lama_sewa,
                'status_byr' => $stts_byr,
                'konfirmasi_pembayaran' => $konfirmasi
            );

            $this->Rental_model->insert_data($data, 'transaksi');
            $this->db->query(
                "UPDATE mobil SET status_mbl='Tidak Tersedia' where id_mobil = $id_mobil"
            );
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Data Sewa berhasil ditambahkan
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            </div>');
            redirect('admin/Datatransaksi/konfirmasi');
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('id_user', 'Id user', 'required');
        $this->form_validation->set_rules('id_mobil', 'Id Mobil', 'required');
        $this->form_validation->set_rules('tgl_sewa', 'Tanggal Sewa', 'required');
        $this->form_validation->set_rules('tgl_kembali', 'Tanggal Kembali', 'required');
    }

    public function cetak_sewa()
    {
        $data['title'] = "Laporan Sewa";
        $data['transaksi'] = $this->db->query("SELECT * FROM transaksi tr, mobil mb, user usr
        WHERE tr.id_mobil= mb.id_mobil AND tr.id_user=usr.id_user 
        And tr.konfirmasi_pembayaran='Sudah Dikonfirmasi' order by tr.id_transaksi asc "
        )->result();
        $this->load->view('templates_admin/header', $data);
        $this->load->view('admin/cetak_sewa',$data);
    }

    public function detail_sewa($id)
    {
        $data['user_session'] = $this->Rental_model->cekData(['email' => 
        $this->session->userdata('email')])->row_array();
        $data['title'] = "Detail Sewa";
        $where = array('id_transaksi' => $id);
        $data['transaksi'] = $this->db->query(
            "SELECT mobil.nama_mobil, mobil.no_plat, mobil.tarif, user.nama,
            transaksi.id_transaksi, transaksi.lama_sewa, transaksi.tanggal_transaksi, 
            transaksi.tanggal_sewa, transaksi.bukti_byr,transaksi.tanggal_kembali, transaksi.lama_sewa 
            FROM transaksi 
            JOIN mobil ON transaksi.id_mobil = mobil.id_mobil 
            JOIN user ON transaksi.id_user = user.id_user 
            WHERE transaksi.id_transaksi = '$id'"
        )->result();
        $this->load->view('templates_admin/header', $data);
        $this->load->view('templates_admin/sidebar');
        $this->load->view('templates_admin/topbar', $data);
        $this->load->view('admin/detail_sewa', $data);
        $this->load->view('templates_admin/footer');
    }

    public function delete_sewa($id)
    {
        $where = array('id_transaksi' => $id);
        $this->Rental_model->delete_data($where, 'transaksi');
        $where = array('id_transaksi' => $id);
        $this->Rental_model->delete_data($where, 'pengembalian');
        $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            Data Sewa berhasil dihapus
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            </div>');
        redirect('admin/Datasewa');
    }

}