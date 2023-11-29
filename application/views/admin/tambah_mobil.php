<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Form Tambah Mobil</h1>

    <div class="card">
        <div class="card-body">
            <form method="POST" action="<?= base_url('admin/Datamobil/simpan_mobil') ?>" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Nama Mobil</label>
                            <input type="text" name="nama_mbl" class="form-control" placeholder="Masukkan nama mobil">
                            <?= form_error('nama_mbl', '<div class="text-small text-danger">', '</div>')  ?>
                        </div>
                        <div class="form-group">
                            <label>No.Plat</label>
                            <input type="text" name="no_plat" class="form-control" placeholder="Masukkan no.Plat mobil">
                        </div>
                        <div class="form-group">
                            <label>Kapasitas</label>
                            <input type="int" name="kapasitas" class="form-control" placeholder="Masukkan kapaitas mobil">
                        </div>
                        <div class="form-group">
                            <label>Jenis Mobil</label>
                            <select name="id_jenis" class="form-control">
                                <option value="">---pilih Jenis Mobil</option>
                                <?php foreach ($jenis as $jns) : ?>
                                    <option value="<?= $jns->id_jenis ?>"><?= $jns->nama_jenis ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Merk Mobil</label>
                            <select name="id_merk" class="form-control">
                                <option value="">---pilih Merk Mobil</option>
                                <?php foreach ($merk as $mrk) : ?>
                                    <option value="<?= $mrk->id_merk ?>"><?= $mrk->nama_merk ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary mt-3">Simpan</button>
                        <button type="submit" class="btn btn-danger mt-3">Reset</button>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Transmisi</label>
                            <input type="text" name="transmisi" class="form-control" placeholder="Masukkan transmisi mobil">
                        </div>
                        <div class="form-group">
                            <label>Mesin</label>
                            <input type="text" name="mesin" class="form-control" placeholder="Masukkan Mesin mobil">
                        </div>
                        <div class="form-group">
                            <label>Warna</label>
                            <input type="text" name="warna" class="form-control" placeholder="Masukkan warna mobil">
                        </div>

                        <div class="form-group">
                            <label>Gambar Mobil</label>
                            <input type="file" name="gambar_mbl" class="form-control">
                        </div>

                        <div class="form-group">
                            <label>Tarif</label>
                            <input type="int" name="tarif" class="form-control" placeholder="Masukkan Tarif mobil">
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>