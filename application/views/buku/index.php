<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <?php if (validation_errors()) { ?>
                <div class="alert alert-danger" role="alert"> <?= validation_errors(); ?> </div>
            <?php } ?>
            <?= $this->session->flashdata('pesan'); ?>
            <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#bukuBaruModal"><i class="fas fa-file-alt"></i> Buku Baru</a>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Judul</th>
                        <th scope="col">Pengarang</th>
                        <th scope="col">Penerbit</th>
                        <th scope="col">Tahun Terbit</th>
                        <th scope="col">ISBN</th>
                        <th scope="col">Stok</th>
                        <th scope="col">DiPinjam</th>
                        <th scope="col">DiBooking</th>
                        <th scope="col">Gambar</th>
                        <th scope="col">Pilihan</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $a = 1;
                    foreach ($buku as $b) { ?>
                        <tr>
                            <th scope="row"><?= $a++; ?></th>
                            <td><?= $b['judul_buku']; ?></td>
                            <td><?= $b['pengarang']; ?></td>
                            <td><?= $b['penerbit']; ?></td>
                            <td><?= $b['tahun_terbit']; ?></td>
                            <td><?= $b['isbn']; ?></td>
                            <td><?= $b['stok']; ?></td>
                            <td><?= $b['dipinjam']; ?></td>
                            <td><?= $b['dibooking']; ?></td>
                            <td>
                                <picture>
                                    <source srcset="" type="image/svg+xml"> <img src="<?= base_url('assets/img/upload/') . $b['image']; ?>" class="img-fluid img-thumbnail" alt="...">
                                </picture>
                            </td>
                            <td>
                                <a href="" data-toggle="modal" data-target="#bukuEditModal<?= $b['id'] ?>" class="badge badge-info"><i class="fas fa-edit"></i> Ubah</a>
                                <a href="<?= base_url('buku/hapusBuku/') . $b['id']; ?>" onclick="return confirm('Kamu yakin akan menghapus <?= $judul . ' ' . $b['judul_buku']; ?> ?');" class="badge badge-danger"><i class="fas fa-trash"></i> Hapus</a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->
<!-- Modal Tambah buku baru-->
<div class="modal fade" id="bukuBaruModal" tabindex="-1" role="dialog" aria-labelledby="bukuBaruModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="bukuBaruModalLabel">Tambah Buku</h5> <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
            </div>
            <form action="<?= base_url('buku'); ?>" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control form-control-user" id="judul_buku" name="judul_buku" placeholder="Masukkan Judul Buku">
                    </div>
                    <div class="form-group">
                        <select name="id_kategori" class="form-control form-control-user">
                            <option value="">Pilih Kategori</option>
                            <?php
                            foreach ($kategori as $k) { ?>
                                <option value="<?= $k['id_kategori']; ?>"><?= $k['nama_kategori']; ?></option> <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control form-control-user" id="pengarang" name="pengarang" placeholder="Masukkan nama pengarang">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control form-control-user" id="penerbit" name="penerbit" placeholder="Masukkan nama penerbit">
                    </div>
                    <div class="form-group">
                        <select name="tahun" class="form-control form-control-user">
                            <option value="">Pilih Tahun</option>
                            <?php
                            for ($i = date('Y'); $i > 1000; $i--) { ?>
                                <option value="<?= $i; ?>"><?= $i; ?></option> <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control form-control-user" id="isbn" name="isbn" placeholder="Masukkan ISBN">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control form-control-user" id="stok" name="stok" placeholder="Masukkan nominal stok">
                    </div>
                    <div class="form-group">
                        <input type="file" class="form-control form-control-user" id="image" name="image">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-ban"></i> Close</button>
                    <button type="submit" class="btn btn-primary"><i class="fas fa-plus-circle"></i> Tambah</button>
                </div>
            </form>
        </div>
    </div>
</div> <!-- End of Modal Tambah Mneu -->

<!-- modal edit -->
<?php $a = 0;
foreach ($buku as $b) : $a++ ?>
    <div class="modal fade" id="bukuEditModal<?= $b['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="bukuEditModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="bukuEditModalLabel">Edit Buku</h5> <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
                </div>
                <form action="<?= base_url('buku/ubahBuku'); ?>" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?= $b['id'] ?>">
                    <div class="modal-body">
                        <div class="form-group">
                            <label class="text-dark">Judul Buku</label>
                            <input type="text" class="form-control form-control-user" id="judul_buku" name="judul_buku" value="<?= $b['judul_buku'] ?>">
                        </div>
                        <div class="form-group">
                            <label class="text-dark">Kategori</label>
                            <select name="id_kategori" class="form-control form-control-user">
                                <option value="<?= $b['id_kategori'] ?>"> <?php if ($b['id_kategori'] == 1) {
                                                                                echo "Komputer";
                                                                            } elseif ($b['id_kategori'] == 2) {
                                                                                echo "Bahasa";
                                                                            } elseif ($b['id_kategori'] == 3) {
                                                                                echo "Sains";
                                                                            } elseif ($b['id_kategori'] == 4) {
                                                                                echo "Hobby";
                                                                            } elseif ($b['id_kategori'] == 5) {
                                                                                echo "Komunikasi";
                                                                            } elseif ($b['id_kategori'] == 6) {
                                                                                echo "Hukum";
                                                                            } elseif ($b['id_kategori'] == 7) {
                                                                                echo "Agama";
                                                                            } elseif ($b['id_kategori'] == 8) {
                                                                                echo "Populer";
                                                                            } elseif ($b['id_kategori'] == 9) {
                                                                                echo "Komik";
                                                                            };

                                                                            ?></option>
                                <?php foreach ($kategori as $k) : ?>
                                    <option value="<?= $k['id_kategori']; ?>"><?= $k['nama_kategori']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="text-dark">Pengarang</label>
                            <input type="text" class="form-control form-control-user" id="pengarang" name="pengarang" value="<?= $b['pengarang'] ?>">
                        </div>
                        <div class="form-group">
                            <label class="text-dark">Penerbit</label>
                            <input type="text" class="form-control form-control-user" id="penerbit" name="penerbit" value="<?= $b['penerbit'] ?>">
                        </div>
                        <div class="form-group">
                            <label class="text-dark">Tahun Terbit</label>
                            <select name="tahun" class="form-control form-control-user">
                                <option value="<?= $b['tahun_terbit'] ?>"><?= $b['tahun_terbit']  ?></option>
                                <?php
                                for ($i = date('Y'); $i > 1000; $i--) { ?>
                                    <option value="<?= $i; ?>"><?= $i; ?></option> <?php } ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="text-dark">ISBN</label>
                            <input type="text" class="form-control form-control-user" id="isbn" name="isbn" value="<?= $b['isbn'] ?>">
                        </div>
                        <div class="form-group">
                            <label class="text-dark">Stok</label>
                            <input type="text" class="form-control form-control-user" id="stok" name="stok" value="<?= $b['stok'] ?>">
                        </div>
                        <div class="form-group">
                            <label class="text-dark">Gambar</label>
                            <input type="file" class="form-control form-control-user" id="image" name="image">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-ban"></i> Close</button>
                        <button type="submit" class="btn btn-primary"><i class="fas fa-plus-circle"></i> Edit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php endforeach; ?>
<!-- end edit modal -->