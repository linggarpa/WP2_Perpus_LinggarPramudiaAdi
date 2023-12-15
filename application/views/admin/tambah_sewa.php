<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Form Tambah Customer</h1>

    <div class="card">
        <div class="card-body">
            <form method="POST" action="<?= base_url('admin/Datasewa/simpan_sewa') ?>" enctype="multipart/form-data">  
            <div class="row">
                    <div class="container-fluid">
                        <div class="form-group">
                            <label>Nama</label>
                            <select name="id_user" class="form-control">
                                <option value="">---User Yang Dipilih---</option>
                                <?php foreach ($user as $usr) : ?>  
                                <option value="<?= $usr->id_user?>"><?= $usr->nama?></option>
                                <?php endforeach; ?>
                            </select>
                            <?= form_error('nama', '<div class="text-small text-danger">', '</div>')  ?>
                        </div>
                        <div class="form-group">
                            <label>Mobil</label>
                            <select name="id_mobil" class="form-control">
                                <option value="">---Mobil Yang Dipilih---</option>
                                <?php foreach ($mobil as $mbl) : ?>  
                                <option value="<?= $mbl->id_mobil?>"><?= $mbl->nama_mobil?></option>
                                <?php endforeach; ?>
                            </select>
                            <?= form_error('mobil', '<div class="text-small text-danger">', '</div>')  ?>
                        </div>
                        <div class="form-group">
                            <label>Tanggal Sewa</label>
                            <input type="date" id="tgl_sewa" name="tgl_sewa" class="form-control">
                            <?= form_error('tgl_sewa', '<div class="text-small text-danger">', '</div>')  ?>
                        </div>
                        <div class="form-group">
                            <label>Tanggal Kembali</label>
                            <input type="date" id="tgl_kembali" name="tgl_kembali" class="form-control">
                            <?= form_error('tgl_kembali', '<div class="text-small text-danger">', '</div>')  ?>
                        </div>
                        <div class="form-group">
                            <label>Lama Sewa</label>
                            <input type="text" name="lama_sewa" class="form-control" id="lama_sewa" readonly>
                            <?= form_error('lama_sewa', '<div class="text-small text-danger">', '</div>')  ?>
                        </div>
                        <button type="submit" class="btn btn-primary mt-3">Simpan</button>
                        <button type="submit" class="btn btn-danger mt-3">Reset</button>
                    </div>
                </div>
            </form>
            <script>            
            document.getElementById("tgl_sewa").addEventListener("change", dateDiff);
            document.getElementById("tgl_kembali").addEventListener("change", dateDiff);
           
            
            function dateDiff(){
                const startDate = new Date(document.getElementById('tgl_sewa').value);
                const endDate = new Date(document.getElementById('tgl_kembali').value);

                startDate.setHours(0, 0, 0, 0);
                endDate.setHours(0, 0, 0, 0);

                const oneDay = 24 * 60 * 60 * 1000;
                const diff = Math.abs(startDate - endDate);
                const day = Math.round(diff / oneDay);

                document.getElementById('lama_sewa').value = day;
            }

        </script>
        </div>
    </div>
</div>