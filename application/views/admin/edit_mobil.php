<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Form edit Mobil</h1>

    <div class="card">
        <div class="card-body">
            <?php foreach ($mobil as $mb) : ?>
                <form method="POST" action="<?= base_url('admin/Datamobil/edit_mobil') ?>" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Nama Mobil</label>
                                <input type="text" name="nama_mbl" class="form-control" value="<?= $mb->nama_mobil ?>">
                                <?= form_error('nama_mbl', '<div class="text-small text-danger">', '</div>')  ?>
                            </div>
                            <div class="form-group">
                                <label>No.Plat</label>
                                <input type="text" name="no_plat" class="form-control" value="<?= $mb->no_plat ?>">
                            </div>
                            <div class=" form-group">
                                <label>Kapasitas</label>
                                <input type="int" name="kapasitas" class="form-control" value="<?= $mb->kapasitas ?>">
                            </div>
                            <div class=" form-group">
                                <label>Jenis Mobil</label>
                                <input type="hidden" name="id_mobil" value="<?= $mb->id_mobil ?>">
                                <select name="id_jenis" class="form-control">
                                    <option value="<?= $mb->id_jenis ?>"><?= $mb->nama_jenis ?></option>
                                    <?php foreach ($jenis as $jns) : ?>
                                        <option value="<?= $jns->id_jenis ?>"><?= $jns->nama_jenis ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Merk Mobil</label>
                                <input type="hidden" name="id_mobil" value="<?= $mb->id_mobil ?>">
                                <select name="id_merk" class="form-control">
                                    <option value="<?= $mb->id_merk ?>"><?= $mb->nama_merk ?></option>
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
                                <input type="text" name="transmisi" class="form-control" value="<?= $mb->transmisi ?>">
                            </div>
                            <div class=" form-group">
                                <label>Mesin</label>
                                <input type="text" name="mesin" class="form-control" value="<?= $mb->mesin ?>">
                            </div>
                            <div class="form-group">
                                <label>Warna</label>
                                <input type="text" name="warna" class="form-control" value="<?= $mb->warna ?>">
                            </div>

                            <div class="form-group">
                                <label>Gambar Mobil</label>
                                <input type="file" name="gambar_mbl" class="form-control">
                            </div>

                            <div class="form-group">
                                <label>Tarif</label>
                                <input type="int" name="tarif" class="form-control" value="<?= $mb->tarif ?>">
                            </div>
                        </div>
                    </div>
                </form>
            <?php endforeach; ?>
        </div>
    </div>
</div>