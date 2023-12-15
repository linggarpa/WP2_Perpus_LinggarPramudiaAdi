                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Data Jenis</h1>
                    <?= $this->session->flashdata('pesan') ?>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <a href="" data-toggle="modal" data-target="#jenisBaruModal" class="btn btn-primary"><i class="fas fa-plus"></i> | Tambah Jenis</a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Nomor</th>
                                            <th>Nama Jenis</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php
                                        $no = 1;
                                        foreach ($jenis as $jns) : ?>
                                            <tr>
                                                <td><?= $no++ ?></td>
                                                <td><?= $jns->nama_jenis  ?></td>
                                                <td>
                                                    <a href="" data-toggle="modal" data-target="#jenisEditModal<?= $jns->id_jenis ?>" class="btn btn-sm btn-success"><i class="fas fa-edit"></i> Edit</a>
                                                    <a href="<?= base_url('admin/Datajenis/delete_jenis/') . $jns->id_jenis ?>" onclick="return confirm('Kamu yakin akan menghapus <?= $jns->nama_jenis ?>' );" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i> Delete</a>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

                </div>
                <!-- End of Main Content -->
                <div class="modal fade" id="jenisBaruModal" tabindex="-1" role="dialog" aria-labelledby="jenisBaruModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="jenisBaruModalLabel">Tambah Jenis</h5> <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
                            </div>
                            <form action="<?= base_url('admin/Datajenis/tambah_jenis'); ?>" method="post">
                                <div class="modal-body">
                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-user" id="nama_jenis" name="nama_jenis" placeholder="Masukkan nama jenis">
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
                <!-- End of Modal Tambah Mneu -->
                <?php $no = 0;
                foreach ($jenis as $jns) : $no++; ?>
                    <div class="modal fade" id="jenisEditModal<?= $jns->id_jenis ?>" tabindex="-1" role="dialog" aria-labelledby="jenisEditModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="jenisEditModalLabel">Edit Jenis</h5> <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
                                </div>
                                <form action="<?= base_url('admin/Datajenis/edit_jenis'); ?>" method="post">
                                    <input type="hidden" name="id_jenis" value="<?= $jns->id_jenis ?>">
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user" id="nama_jenis" name="nama_jenis" value="<?= $jns->nama_jenis ?>">
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
                <!-- End of Modal Edit Jenis -->