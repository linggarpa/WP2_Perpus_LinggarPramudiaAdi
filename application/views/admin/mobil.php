                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Data Mobil</h1>
                    <?= $this->session->flashdata('pesan') ?>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <a href="<?= base_url('admin/Datamobil/tambah_mobil') ?>" class="btn btn-primary"><i class="fas fa-plus"></i> | Tambah Mobil</a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Nomor</th>
                                            <th>Gambar</th>
                                            <th>No.plat</th>
                                            <th>Nama Mobil</th>
                                            <th>Jenis</th>
                                            <th>Merk</th>
                                            <th>Tarif</th>
                                            <th>Status</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php
                                        $no = 1;
                                        foreach ($mobil as $mb) : ?>
                                            <tr>
                                                <td><?= $no++ ?></td>
                                                <td>
                                                    <img width="90px;" src="<?= base_url() . 'assets/img/' . $mb->foto_mbl ?>" alt="">
                                                </td>
                                                <td><?= $mb->no_plat  ?></td>
                                                <td><?= $mb->nama_mobil  ?></td>
                                                <td><?= $mb->nama_jenis  ?></td>
                                                <td><?= $mb->nama_merk  ?></td>
                                                <td><?= $mb->tarif  ?></td>
                                                <td><?php
                                                    if ($mb->status_mbl == "Tidak Tersedia") {
                                                        echo "<span  class='badge badge-danger'>Tidak Tersedia</span>";
                                                    } else {
                                                        echo "<span  class='badge badge-info'>Tersedia</span>";
                                                    }  ?></td>
                                                <td>
                                                    <a href="<?= base_url('admin/Datamobil/update_mobil/') . $mb->id_mobil ?>" class="btn btn-sm btn-success"><i class="fas fa-edit"></i> Edit</a>
                                                    <a href="<?= base_url('admin/Datamobil/delete_mobil/') . $mb->id_mobil ?>" onclick="return confirm('Kamu yakin akan menghapus <?= $mb->nama_mobil ?>' );" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i> Delete</a>
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