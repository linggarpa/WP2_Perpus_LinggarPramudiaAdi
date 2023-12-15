<?php

class Datapengembalian extends CI_Controller
{
    public function index()
    {
        $data['user_session'] = $this->Rental_model->cekData(['email' => 
        $this->session->userdata('email')])->row_array();
        $data['title'] = "Data Pengembalian";
        $data['pengembalian'] = $this->db->query(
            "SELECT pengembalian.id_pengembalian, mobil.nama_mobil, mobil.tarif,mobil.no_plat,
            transaksi.id_transaksi, pengembalian.tanggal_pengembalian, pengembalian.denda, 
            pengembalian.keterangan, pengembalian.hari_telat
            FROM pengembalian JOIN transaksi on pengembalian.id_transaksi = transaksi.id_transaksi
            JOIN mobil on transaksi.id_mobil = mobil.id_mobil"
        )->result();
        $this->load->view('templates_admin/header',$data);
        $this->load->view('templates_admin/sidebar');
        $this->load->view('templates_admin/topbar', $data);
        $this->load->view('admin/pengembalian', $data);
        $this->load->view('templates_admin/footer');
    }

    public function tambahPengembalian($id)
    {
        $data['user_session'] = $this->Rental_model->cekData(['email' => 
        $this->session->userdata('email')])->row_array();
        $data['title'] = "Data Tambah Pengembalian";
        $where = array('id_transaksi' => $id);
        $tgl_pengembalian = date('y-m-d');
        $data = array(
            'id_transaksi' => $id,
            'tanggal_pengembalian'=> $tgl_pengembalian);
        $this->Rental_model->insert_data($data, 'pengembalian');
        $where = array('id_transaksi' => $id);
        $data = array(
            'status_sewa' => 'sudah dikembalian');
        $this->Rental_model->update_data('transaksi', $data, $where);
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
        Data Pengembalian berhasil ditambahkan
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
        </div>');
        redirect('admin/Datapengembalian');
    }

    public function v_edit_pengembalian($id)
    {
        $data['user_session'] = $this->Rental_model->cekData(['email' => 
        $this->session->userdata('email')])->row_array();
        $data['title'] = "Edit Data Pengembalian";
        $where = array('id_pengembalian' => $id);
        $data['pengembalian'] = $this->db->query(
            "SELECT * FROM pengembalian, transaksi, mobil
                WHERE 
                pengembalian.id_transaksi = transaksi.id_transaksi
                and transaksi.id_mobil = mobil.id_mobil
                and pengembalian.id_pengembalian='$id'"
        )->result();
        $this->load->view('templates_admin/header', $data);
        $this->load->view('templates_admin/sidebar');
        $this->load->view('templates_admin/topbar', $data);
        $this->load->view('admin/edit_pengembalian', $data);
        $this->load->view('templates_admin/footer');
    }

    public function edit_pengembalian()
    {
        $id_pengembalian = $this->input->post('id_pengembalian');
        $telat = $this->input->post('telat');
        $denda = $this->input->post('denda');
        $keterangan = $this->input->post('keterangan');
        
        $data = array(
           'hari_telat' => $telat,
           'denda' => $denda,
           'keterangan' => $keterangan
        );

        $where = array(
            'id_pengembalian' => $id_pengembalian
        );

        $this->Rental_model->update_data('pengembalian', $data, $where);
        $id_transaksi = $this->input->post('id_transaksi');
        $data = array(
            'status_sewa' => "Sudah Selesai"
         );
 
        $where = array(
            'id_transaksi' => $id_transaksi
        );
        $this->Rental_model->update_data('transaksi', $data, $where);
        $id_mobil = $this->input->post('id_mobil');
        $data = array(
            'status_mbl' => "Tersedia"
         );
 
        $where = array(
            'id_mobil' => $id_mobil
        );
        $this->Rental_model->update_data('mobil', $data, $where);
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
        Data Pengembalian berhasil diUpdate
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
        </div>');
        redirect('admin/Datapengembalian');

    }

    public function cetak_pengembalian()
    {
        $data['title'] = "Laporan Pengembalian";
        $data['pengembalian'] = $this->db->query("SELECT * FROM transaksi tr, mobil mb, pengembalian pb
        WHERE pb.id_transaksi= tr.id_transaksi AND tr.id_mobil=mb.id_mobil order by pb.id_pengembalian asc "
        )->result();
        $this->load->view('templates_admin/header', $data);
        $this->load->view('admin/cetak_pengembalian',$data);
    }

    public function delete_pengembalian($id)
    {
        $where = array('id_pengembalian' => $id);
        $this->Rental_model->delete_data($where, 'pengembalian');
        $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            Data pengembalian berhasil dihapus
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            </div>');
        redirect('admin/Datapengembalian');
    }
}