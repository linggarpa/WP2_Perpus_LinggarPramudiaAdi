<?php
defined('BASEPATH') or exit('No direct script access allowed');
class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        cek_login();
    }
    public function index()
    {
        $data['judul'] = 'Profil Saya';
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('admin/header', $data);
        $this->load->view('admin/sidebar', $data);
        $this->load->view('admin/topbar', $data);
        $this->load->view('user/index', $data);
        $this->load->view('admin/footer');
    }
    public function anggota()
    {
        $data['judul'] = 'Data Anggota';
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
        $this->db->where('role_id', 2);
        $data['anggota'] = $this->db->get('user')->result_array();
        $this->load->view('admin/header', $data);
        $this->load->view('admin/sidebar', $data);
        $this->load->view('admin/topbar', $data);
        $this->load->view('user/anggota', $data);
        $this->load->view('admin/footer');
    }
    public function ubahProfil()
    {
        $data['judul'] = 'Ubah Profil';
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
        $this->form_validation->set_rules(
            'nama',
            'Nama Lengkap',
            'required|trim',
            ['required' => 'Nama tidak Boleh Kosong']
        );
        if ($this->form_validation->run() == false) {
            $this->load->view('admin/header', $data);
            $this->load->view('admin/sidebar', $data);
            $this->load->view('admin/topbar', $data);
            $this->load->view('user/ubah-profile', $data);
            $this->load->view('admin/footer');
        } else {
            $nama = $this->input->post('nama', true);
            $email = $this->input->post('email', true);
            //jika ada gambar yang akan diupload 
            $upload_image = $_FILES['image']['name'];

            if ($upload_image) {
                $config['upload_path'] = './assets/img/profile/';
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size'] = '3000';
                $config['max_width'] = '1024';
                $config['max_height'] = '1000';
                $config['file_name'] = 'pro' . time();

                $this->load->library('upload', $config);
                if ($this->upload->do_upload('image')) {
                    $gambar_lama = $data['user']['image'];
                    if ($gambar_lama != 'default.png') {
                        unlink(FCPATH . 'assets/img/profile/' . $gambar_lama);
                    }
                    $gambar_baru = $this->upload->data('file_name');
                    $this->db->set('image', $gambar_baru);
                } else {
                }
            }
            $this->db->set('nama', $nama);
            $this->db->where('email', $email);
            $this->db->update('user');
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-message" role="alert">Profil Berhasil diubah </div>');
            redirect('user');
        }
    }

    public function tambahAnggota()
    {
        $data['judul'] = 'Anggota';
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
        $this->form_validation->set_rules('email', 'email', 'required', ['required' => 'email harus diisi']);
        if ($this->form_validation->run() == false) {
            $this->load->view('admin/header', $data);
            $this->load->view('admin/sidebar', $data);
            $this->load->view('admin/topbar', $data);
            $this->load->view('buku/kategori', $data);
            $this->load->view('admin/footer');
        } else {
            $data = [
                'nama' => $this->input->post('nama'),
                'email' => $this->input->post('email'),
                'image' => 'default.png',
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'role_id' => 2,
                'is_active' => 1,
                'tanggal_input' => time()
            ];
            $this->ModelUser->simpanData($data);
            redirect('user/anggota');
        }
    }
    public function ubahAnggota()
    {
        $data['judul'] = 'Ubah Profil';
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
        $data['user'] = $this->ModelBuku->bukuWhere(['id' => $this->uri->segment(3)])->result_array();
        $this->form_validation->set_rules(
            'nama',
            'Nama Lengkap',
            'required|trim',
            ['required' => 'Nama tidak Boleh Kosong']
        );
        $nama = $this->input->post('nama', true);
        $email = $this->input->post('email', true);
        //jika ada gambar yang akan diupload 
        $gambar = $_FILES['image']['name'];
        //konfigurasi sebelum gambar diupload
        $config['upload_path'] = './assets/img/profile/';
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['max_size'] = '3000';
        $config['max_width'] = '1024';
        $config['max_height'] = '1000';
        $config['file_name'] = 'pro' . time();

        //memuat atau memanggil library upload
        $this->load->library('upload', $config);

        if ($gambar) {
            $config['upload_path'] = './assets/img/profile/';
            $config['allowed_types'] = 'jpg|jpeg|png';

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('image')) {
                $gambar = $this->upload->data('file_name');
                $this->db->set('image', $gambar);
            } else {
                echo $this->upload->display_errors();
            }
        }
        $data = [
            'nama' => $nama,
            'email' => $email
        ];
        $this->ModelUser->updateAnggota($data, ['id' => $this->input->post('id')]);
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-message" role="alert">Edit Anggota Berhasil</div>');
        redirect('user/anggota');
    }

    public function hapusAnggota()
    {
        $where = ['id' => $this->uri->segment(3)];
        $this->ModelUser->hapusUser($where);
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-message" role="alert">Data Anggota Berhasil dihapus</div>');
        redirect('user/anggota');
    }


}
