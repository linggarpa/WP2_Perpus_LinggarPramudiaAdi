<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Form Pengembalian</h1>

    <div class="card">
        <div class="card-body">
        <?php foreach ($pengembalian as $kembali) : ?>
            <form method="POST" action="<?= base_url('admin/Datapengembalian/edit_pengembalian') ?>" enctype="multipart/form-data">  
            <div class="row">
                    <div class="container-fluid">
                        <input type="hidden" name="id_mobil" class="form-control" value="<?= $kembali->id_mobil ?>">
                        <input type="hidden" name="id_transaksi" value="<?= $kembali->id_transaksi ?>" class="form-control">
                        <input type="hidden" name="id_pengembalian" value="<?=$kembali->id_pengembalian?>">    
                        <div class="form-group">
                            <label>Tanggal Kembali</label>
                            <input type="text" value="<?= date('d F Y', strtotime($kembali->tanggal_kembali))?>" class="form-control" readonly>
                        </div>
                        <div class="form-group">
                            <label>Tanggal Pengembalian</label>
                            <input type="text" value="<?= date('d F Y', strtotime($kembali->tanggal_pengembalian))?>" class="form-control" readonly>
                        </div>
                        <div class="form-group">
                            <label>Tarif Denda Mobil/Hari</label>
                            <input type="text" class="form-control" value="<?= $kembali->tarif?>" readonly>
                        </div>
                        <div class="form-group">
                            <label>Telat</label>
                            <input type="text" name="telat" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Denda</label>
                            <input type="text" name="denda" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Keterangan</label>
                            <input type="text" name="keterangan" class="form-control" required>
                        </div>
                        <button type="submit" class="btn btn-primary mt-3">Simpan</button>
                        <button type="submit" class="btn btn-danger mt-3">Reset</button>
                    </div>
                </div>
            </form>
            <?php endforeach; ?>
        </div>
    </div>
</div>