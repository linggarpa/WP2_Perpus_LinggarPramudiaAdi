                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Data Cusstomer</h1>
                    <?= $this->session->flashdata('pesan') ?>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <a href="<?= base_url('admin/Datamobil/tambah_mobil') ?>" class="btn btn-primary"><i class="fas fa-plus"></i> | Jenis Baru</a>
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
                                                    <a href="<?= base_url('admin/Datamobil/update_mobil/') . $jns->id_jenis ?>" class="btn btn-sm btn-success"><i class="fas fa-edit"></i> Edit</a>
                                                    <a href="<?= base_url('admin/Datamobil/delete_mobil/') . $jns->id_jenis ?>" onclick="return confirm('Kamu yakin akan menghapus <?= $jns->nama_jenis ?>' );" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i> Delete</a>
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