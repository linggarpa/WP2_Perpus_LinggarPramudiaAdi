<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <?php if (validation_errors()) { ?>
                <div class="alert alert-danger" role="alert"> <?= validation_errors(); ?> </div>
            <?php } ?>
            <?= $this->session->flashdata('pesan'); ?>
            <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#anggotaBaruModal"><i class="fas fa-file-alt"></i> Tambah Anggota</a>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Email</th>
                        <th scope="col">Image</th>
                        <th scope="col">Pilihan</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $a = 1;
                    foreach ($anggota  as $b) { ?>
                        <tr>
                            <th scope="row"><?= $a++; ?></th>
                            <td><?= $b['nama']; ?></td>
                            <td><?= $b['email']; ?></td>
                            <td>
                                <picture>
                                    <source srcset="" type="image/svg+xml"> <img width="60px" src="<?= base_url('assets/img/profile/') . $b['image']; ?>" class="img-fluid img-thumbnail" alt="...">
                                </picture>
                            </td>
                            <td>
                                <a href="" data-toggle="modal" data-target="#anggotaEditModal<?= $b['id'] ?>" class="badge badge-info"><i class="fas fa-edit"></i> Ubah</a>
                                <a href="<?= base_url('user/hapusAnggota/') . $b['id']; ?>" onclick="return confirm('Kamu yakin akan menghapus <?= $judul . ' ' . $b['nama']; ?> ?');" class="badge badge-danger"><i class="fas fa-trash"></i> Hapus</a>
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
<div class="modal fade" id="anggotaBaruModal" tabindex="-1" role="dialog" aria-labelledby="anggotaBaruModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="anggotaBaruModalLabel">Tambah Anggota</h5> <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
            </div>
            <form action="<?= base_url('user/tambahAnggota'); ?>" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control form-control-user" id="nama" name="nama" placeholder="Masukkan Nama Anda">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control form-control-user" id="email" name="email" placeholder="Masukkan Email Anda">
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control form-control-user" id="password" name="password1" placeholder="Masukkan password Anda">
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
<?php $a = 0;
foreach ($anggota  as $b) : $a++ ?>
    <div class="modal fade" id="anggotaEditModal<?= $b['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="anggotaEditModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="anggotaEditModalLabel">Edit Anggota</h5> <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
                </div>
                <form action="<?= base_url('user/ubahAnggota'); ?>" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?= $b['id'] ?>">
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="text" class="form-control form-control-user" id="nama" name="nama" value="<?= $b['nama'] ?>">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control form-control-user" id="email" name="email" value="<?= $b['email'] ?>">
                        </div>
                        <div class="form-group">
                            <input type="file" class="form-control form-control-user" id="image" name="image" placeholder="Masukkan password Anda">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-ban"></i> Close</button>
                        <button type="submit" class="btn btn-primary"><i class="fas fa-plus-circle"></i> Tambah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php endforeach; ?>