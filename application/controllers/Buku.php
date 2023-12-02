<?php
class Buku extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        cek_login();
    }

    public function index()
    {
        $data['judul'] = 'Data Buku';
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
        $data['buku'] = $this->ModelBuku->getBuku()->result_array();
        $data['kategori'] = $this->ModelBuku->getKategori()->result_array();

        $this->form_validation->set_rules('judul_buku', 'Judul Buku', 'required|min_length[3]', [
            'required' => 'Judul Buku harus diisi',
            'min_length' => 'Judul buku terlalu pendek'
        ]);
        $this->form_validation->set_rules('id_kategori', 'Kategori', 'required', [
            'required' => 'Nama pengarang harus diisi',
        ]);
        $this->form_validation->set_rules('pengarang', 'Nama Pengarang', 'required|min_length[3]', [
            'required' => 'Nama pengarang harus diisi',
            'min_length' => 'Nama pengarang terlalu pendek'
        ]);
        $this->form_validation->set_rules('penerbit', 'Nama Penerbit', 'required|min_length[3]', [
            'required' => 'Nama penerbit harus diisi',
            'min_length' => 'Nama penerbit terlalu pendek'
        ]);
        $this->form_validation->set_rules('tahun', 'Tahun Terbit', 'required|min_length[3]|max_length[4]|numeric', [
            'required' => 'Tahun terbit harus diisi',
            'min_length' => 'Tahun terbit terlalu pendek',
            'max_length' => 'Tahun terbit terlalu panjang',
            'numeric' => 'Hanya boleh diisi angka'
        ]);
        $this->form_validation->set_rules('isbn', 'Nomor ISBN', 'required|min_length[3]|numeric', [
            'required' => 'Nama ISBN harus diisi',
            'min_length' => 'Nama ISBN terlalu pendek',
            'numeric' => 'Yang anda masukan bukan angka'
        ]);
        $this->form_validation->set_rules('stok', 'Stok', 'required|numeric', [
            'required' => 'Stok harus diisi',
            'numeric' => 'Yang anda masukan bukan angka'
        ]);
        //konfigurasi sebelum gambar diupload 
        $config['upload_path'] = './assets/img/upload/';
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['max_size'] = '3000';
        $config['max_width'] = '1024';
        $config['max_height'] = '1000';
        // $config['file_name'] = 'img' . time();

        $this->load->library('upload', $config);
        if ($this->form_validation->run() == false) {
            $this->load->view('admin/header', $data);
            $this->load->view('admin/sidebar', $data);
            $this->load->view('admin/topbar', $data);
            $this->load->view('buku/index', $data);
            $this->load->view('admin/footer');
        } else {
            if ($this->upload->do_upload('image')) {
                $image = $this->upload->data();
                $gambar = $image['file_name'];
            } else {
                $gambar = '';
            }

            $data = [
                'judul_buku' => $this->input->post('judul_buku', true),
                'id_kategori' => $this->input->post('id_kategori', true),
                'pengarang' => $this->input->post('pengarang', true),
                'penerbit' => $this->input->post('penerbit', true),
                'tahun_terbit' => $this->input->post('tahun', true),
                'isbn' => $this->input->post('isbn', true),
                'stok' => $this->input->post('stok', true),
                'dipinjam' => 0,
                'dibooking' => 0,
                'image' => $gambar
            ];
            $this->ModelBuku->simpanBuku($data);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-message" role="alert">Data Buku Berhasil ditambahkan</div>');
            redirect('buku');
        }
    }

    public function hapusBuku()
    {
        $where = ['id' => $this->uri->segment(3)];
        $this->ModelBuku->hapusBuku($where);
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-message" role="alert">Data Buku Berhasil dihapus</div>');
        redirect('buku');
    }

    public function kategori()
    {
        $data['judul'] = 'Kategori Buku';
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
        $data['kategori'] = $this->ModelBuku->getKategori()->result_array();
        $this->form_validation->set_rules('kategori', 'Kategori', 'required', ['required' => 'Judul Buku harus diisi']);
        if ($this->form_validation->run() == false) {
            $this->load->view('admin/header', $data);
            $this->load->view('admin/sidebar', $data);
            $this->load->view('admin/topbar', $data);
            $this->load->view('buku/kategori', $data);
            $this->load->view('admin/footer');
        } else {
            $data = [
                'nama_kategori' => $this->input->post('kategori')
            ];
            $this->ModelBuku->simpanKategori($data);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-message" role="alert">Berhasil Tambah Kategori</div>');
            redirect('buku/kategori');
        }
    }

    public function hapusKategori()
    {
        $where = ['id_kategori' => $this->uri->segment(3)];
        $this->ModelBuku->hapusKategori($where);
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-message" role="alert">Berhasil hapus kategori</div>');
        redirect('buku/kategori');
    }

    public function ubahBuku()
    {
        $data['judul'] = 'Ubah Data Buku';
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
        $data['buku'] = $this->ModelBuku->bukuWhere(['id' => $this->uri->segment(3)])->result_array();
        $kategori = $this->ModelBuku->joinKategoriBuku(['buku.id' => $this->uri->segment(3)])->result_array();
        foreach ($kategori as $k) {
            $data['id'] = $k['id_kategori'];
            $data['k'] = $k['id_kategori'];
        }
        $data['kategori'] = $this->ModelBuku->getKategori()->result_array();
        $gambar = $_FILES['image']['name'];
        //konfigurasi sebelum gambar diupload
        $config['upload_path'] = './assets/img/upload/';
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['max_size'] = '3000';
        $config['max_width'] = '1024';
        $config['max_height'] = '1000';
        $config['file_name'] = 'img' . time();

        //memuat atau memanggil library upload
        $this->load->library('upload', $config);

        if ($gambar) {
            $config['upload_path'] = './assets/img';
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
            'judul_buku' => $this->input->post('judul_buku'),
            'id_kategori' => $this->input->post('id_kategori'),
            'pengarang' => $this->input->post('pengarang'),
            'penerbit' => $this->input->post('penerbit'),
            'tahun_terbit' => $this->input->post('tahun'),
            'isbn' => $this->input->post('isbn'),
            'stok' => $this->input->post('stok')
            ];
            $this->ModelBuku->updateBuku($data, ['id' => $this->input->post('id')]);
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-message" role="alert">Data Buku Berhasil Diubah</div>');
        redirect('buku');
    }
    public function ubahKategori()
    {
        $data['judul'] = 'Kategori Buku';
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
        $data['kategori'] = $this->ModelBuku->kategoriWhere(['id_kategori' => $this->uri->segment(3)])->result_array();
        $data = [
            'nama_kategori' => $this->input->post('nama_kategori')
        ];
        $this->ModelBuku->updateKategori($data, ['id_kategori' => $this->input->post('id_kategori')]);
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-message" role="alert">Kategori Berhasil Diubah</div>');
        redirect('buku/kategori');
    }
}
