                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Data Merk</h1>
                    <?= $this->session->flashdata('pesan') ?>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <a href="" data-toggle="modal" data-target="#merkBaruModal" class="btn btn-primary"><i class="fas fa-plus"></i> | Tambah Merk</a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Nomor</th>
                                            <th>Nama Merk</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php
                                        $no = 1;
                                        foreach ($merk as $mrk) : ?>
                                            <tr>
                                                <td><?= $no++ ?></td>
                                                <td><?= $mrk->nama_merk  ?></td>
                                                <td>
                                                    <a href="" data-toggle="modal" data-target="#merkEditModal<?= $mrk->id_merk ?>" class="btn btn-sm btn-success"><i class="fas fa-edit"></i> Edit</a>
                                                    <a href="<?= base_url('admin/Datamerk/delete_merk/') . $mrk->id_merk ?>" onclick="return confirm('Kamu yakin akan menghapus <?= $mrk->nama_merk ?>' );" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i> Delete</a>
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
                <div class="modal fade" id="merkBaruModal" tabindex="-1" role="dialog" aria-labelledby="merkBaruModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="merkBaruModalLabel">Tambah Merk</h5> <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
                            </div>
                            <form action="<?= base_url('admin/Datamerk/tambah_merk'); ?>" method="post">
                                <div class="modal-body">
                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-user" id="nama_merk" name="nama_merk" placeholder="Masukkan nama jenis">
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
                foreach ($merk as $mrk) : $no++; ?>
                    <div class="modal fade" id="merkEditModal<?= $mrk->id_merk ?>" tabindex="-1" role="dialog" aria-labelledby="merkEditModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="merkEditModalLabel">Edit Merk</h5> <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
                                </div>
                                <form action="<?= base_url('admin/Datamerk/edit_merks'); ?>" method="post">
                                    <input type="hidden" name="id_merk" value="<?= $mrk->id_merk ?>">
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user" id="nama_merk" name="nama_merk" value="<?= $mrk->nama_merk ?>">
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