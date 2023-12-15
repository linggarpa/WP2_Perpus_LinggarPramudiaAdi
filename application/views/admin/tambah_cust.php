<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Form Tambah Customer</h1>

    <div class="card">
        <div class="card-body">
            <form method="POST" action="<?= base_url('admin/Datacustomer/simpan_customer') ?>" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Nama</label>
                            <input type="text" name="nama" class="form-control" placeholder="Masukkan nama anda">
                            <?= form_error('nama', '<div class="text-small text-danger">', '</div>')  ?>
                        </div>
                        <div class="form-group">
                            <label>Username</label>
                            <input type="text" name="username" class="form-control" placeholder="Masukkan nama anda">
                            <?= form_error('username', '<div class="text-small text-danger">', '</div>')  ?>
                        </div>
                        <div class="form-group">
                            <label>Nik</label>
                            <input type="text" name="nik" class="form-control" placeholder="Masukkan nik anda">
                            <?= form_error('nik', '<div class="text-small text-danger">', '</div>')  ?>
                        </div>
                        <div class="form-group">
                            <label>Nomor Telepon</label>
                            <input type="text" name="no_telp" class="form-control" placeholder="Masukkan kapaitas mobil">
                            <?= form_error('no_telp', '<div class="text-small text-danger">', '</div>')  ?>
                        </div>
                        <div class="form-group">
                            <label>Alamat</label>
                            <input type="text" name="alamat" class="form-control" placeholder="Masukkan kapaitas mobil">
                            <?= form_error('alamat', '<div class="text-small text-danger">', '</div>')  ?>
                        </div>
                        <button type="submit" class="btn btn-primary mt-3">Simpan</button>
                        <button type="submit" class="btn btn-danger mt-3">Reset</button>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Jenis Kelamin</label>
                            <select name="jk" class="form-control">
                                <option value="">---pilih Jenis Kelaminl</option>
                                <option value="Laki-Laki">Laki-Laki</option>
                                <option value="Perempuan">Perempuan</option>
                            </select>
                            <?= form_error('jenis_kelamin', '<div class="text-small text-danger">', '</div>')  ?>
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" name="email" class="form-control" placeholder="Masukkan transmisi mobil">
                            <?= form_error('email', '<div class="text-small text-danger">', '</div>')  ?>
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="text" name="password" class="form-control" placeholder="Masukkan Mesin mobil">
                            <?= form_error('password', '<div class="text-small text-danger">', '</div>')  ?>
                        </div>
                        <div class="form-group">
                            <label>Foto Customer</label>
                            <input type="file" name="gambar_cust" class="form-control">
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>