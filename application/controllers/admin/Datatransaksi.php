<?php

class Datatransaksi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        cek_login();
    }

    public function konfirmasi()
    {
    $data['user_session'] = $this->Rental_model->cekData(['email' => 
        $this->session->userdata('email')])->row_array();
        $data['title'] = "Data Konfirmasi Transaksi";
        $data['konfirmasi'] = $this->db->query(
            "SELECT mobil.nama_mobil, mobil.no_plat, mobil.tarif, user.nama,
            transaksi.id_transaksi, transaksi.lama_sewa,transaksi.bank,
            transaksi.tanggal_sewa , transaksi.tanggal_kembali, transaksi.bukti_byr 
            FROM transaksi 
            JOIN mobil ON transaksi.id_mobil = mobil.id_mobil 
            JOIN user ON transaksi.id_user = user.id_user 
            WHERE transaksi.konfirmasi_pembayaran ='Belum Dikonfirmasi' order by transaksi.id_transaksi asc"
        )->result();
        $this->load->view('templates_admin/header',$data);
        $this->load->view('templates_admin/sidebar');
        $this->load->view('templates_admin/topbar', $data);
        $this->load->view('admin/konfirmasi', $data);
        $this->load->view('templates_admin/footer');
    }

    public function konfirmasiTransaksi($id)
    {
        $where = array('id_transaksi' => $id);
        $konfirmasi = "Sudah Dikonfirmasi";
        $status_sewa = "Belum Selesai";
        $data = array(
            'konfirmasi_pembayaran' => $konfirmasi, 
            'status_sewa' => $status_sewa
        );
        $this->Rental_model->update_data('transaksi', $data, $where);
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Konfirmasi Pembayaran berhasil
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            </div>');
        redirect('admin/Datatransaksi/konfirmasi');
    }
}