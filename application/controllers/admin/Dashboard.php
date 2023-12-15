<?php

class Dashboard extends CI_Controller
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
        $data['title'] = "Dashboard";
        $data['konfirmasi'] = $this->db->query(
            "SELECT mobil.nama_mobil, mobil.no_plat, mobil.tarif, user.nama,
            transaksi.id_transaksi, transaksi.lama_sewa,transaksi.bank,
            transaksi.tanggal_sewa , transaksi.tanggal_kembali, transaksi.bukti_byr 
            FROM transaksi 
            JOIN mobil ON transaksi.id_mobil = mobil.id_mobil 
            JOIN user ON transaksi.id_user = user.id_user 
            WHERE transaksi.konfirmasi_pembayaran ='Belum Dikonfirmasi' order by transaksi.id_transaksi asc"
        )->result(); 
        $this->load->view('templates_admin/header', $data);
        $this->load->view('templates_admin/sidebar');
        $this->load->view('templates_admin/topbar',$data);
        $this->load->view('admin/dashboard');
        $this->load->view('templates_admin/footer');
    }
}
