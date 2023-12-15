<?php

class Datacustomer extends CI_Controller
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
        $data['title'] = "Data Customer";
        $data['user'] = $this->db->query(
            "SELECT   user.*,
                                                role.role
                                                FROM user
                                                INNER JOIN role
                                                ON user.id_role = role.id_role where user.id_role = 2 order by user.id_user desc"
        )->result();
        $this->load->view('templates_admin/header', $data);
        $this->load->view('templates_admin/sidebar');
        $this->load->view('templates_admin/topbar', $data);
        $this->load->view('admin/customer', $data);
        $this->load->view('templates_admin/footer');
    }

    public function tambah_cust()
    {
        $data['user_session'] = $this->Rental_model->cekData(['email' => 
        $this->session->userdata('email')])->row_array();
        $data['title'] = "Tambah Customer";
        $this->load->view('templates_admin/header', $data);
        $this->load->view('templates_admin/sidebar');
        $this->load->view('templates_admin/topbar',$data);
        $this->load->view('admin/tambah_cust');
        $this->load->view('templates_admin/footer');
    }

    public function simpan_customer()
    {
        $this->form_validation->set_rules('nama', 'nama', 'required', ['required' => 'nama harus diisi']);
        $this->form_validation->set_rules('email', 'email', 'required|valid_email', ['required' => 'email harus diisi', 'valid_email'=> 'Harus berformarmat email']);
        $this->form_validation->set_rules('password', 'password', 'required|min_length[6]', ['required' => 'password wajib diisi', 'min_length' => 'password yang anda masukkan terlalu pendek']);
        $this->form_validation->set_rules('username', 'username', 'required', ['required' => 'username harus diisi']);
        $this->form_validation->set_rules('alamat', 'alamat', 'required', ['required' => 'alamat harus diisi']);
        $this->form_validation->set_rules('no_telp', 'nomor telpon', 'required|min_length[12]', ['required' => 'nomor telpon harus diisi', 'min_length' => 'Nomor telepon terlalu pendek']);
        $this->form_validation->set_rules('nik', 'nik', 'required|min_length[16]', ['required' => 'nik harus diisi', 'min_length' => 'Nomor NIK terlalu pendek']);
        if ($this->form_validation->run() == FALSE) {
            $this->tambah_cust();
        } else {
            $nama = $this->input->post('nama');
            $email = $this->input->post('email');
            $password = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
            $username = $this->input->post('username');
            $alamat = $this->input->post('alamat');
            $no_telp = $this->input->post('no_telp');
            $jk = $this->input->post('jk');
            $nik = $this->input->post('nik');
            $gambar_cust= $_FILES['gambar_cust']['name'];

            if ($gambar_cust = '') {
            } else {
                $config['upload_path'] = './assets/img';
                $config['allowed_types'] = 'jpg|jpeg|png';

                $this->load->library('upload', $config);

                if (!$this->upload->do_upload('gambar_cust')) {
                    echo "Gambar Customer Gagal Diupload";
                } else {
                    $gambar_cust = $this->upload->data('file_name');
                }
            }

            $data = array(
                'nama' =>   $nama,
                'email' => $email,
                'password' => $password,
                'alamat' => $alamat,
                'username' => $username,
                'no_telp' => $no_telp,
                'id_role' => 2,
                'password' => $password,
                'nik' => $nik,
                'jenis_kelamin' => $jk,
                'gambar_cust' => $gambar_cust

            );
            $this->Rental_model->insert_data($data, 'user');
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Data Mobil berhasil ditambahkan
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            </div>');
            redirect('admin/Datacustomer');
        }
    }

    public function detail_cust($id)
    {
        $data['user_session'] = $this->Rental_model->cekData(['email' => 
        $this->session->userdata('email')])->row_array();
        $data['title'] = "Detail Customer";
        $where = array('id_user' => $id);
        $data['user'] = $this->db->query(
            "SELECT   user.*,
            role.role
            FROM user
            INNER JOIN role
            ON user.id_role = role.id_role where user.id_user= $id"
        )->result();
        $this->load->view('templates_admin/header', $data);
        $this->load->view('templates_admin/sidebar');
        $this->load->view('templates_admin/topbar', $data);
        $this->load->view('admin/detail_cust', $data);
        $this->load->view('templates_admin/footer');
    }

    public function delete_cust($id)
    {
        $where = array('id_user' => $id);

        $this->Rental_model->delete_data($where, 'user');
        $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            Data Customer berhasil dihapus
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            </div>');
        redirect('admin/Datacustomer');
    }
}

