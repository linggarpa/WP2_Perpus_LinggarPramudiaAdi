                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Data Penyewaan</h1>
                    <?= $this->session->flashdata('pesan') ?>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <a href="<?= base_url('admin/Datasewa/tambah_penyewaan') ?>" class="btn btn-primary"><i class="fas fa-plus"></i> | Tambah Penyewaan</a>
                            <a href="<?= base_url('admin/Datasewa/cetak_sewa') ?>" class="btn btn-secondary"><i class="fas fa-print"></i> | Cetak Laporan</a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Nomor</th>
                                            <th>Nomor Sewa</th>
                                            <th>Nama Penyewa</th>
                                            <th>Nama Mobil</th>
                                            <th>No Plat</th>
                                            <th>tanggal sewa</th>
                                            <th>tanggal kembali</th>
                                            <th>Lama Sewa</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php
                                        $no = 1;
                                        foreach ($penyewaan as $sewa ) : ?>
                                            <tr>
                                                <td><?= $no++ ?></td>
                                                <td><?= "3271023".$sewa->id_transaksi ?></td>
                                                <td><?= $sewa->nama  ?></td>
                                                <td><?= $sewa->nama_mobil  ?></td>
                                                <td><?= $sewa->no_plat  ?></td>
                                                <td><?= $sewa->tanggal_sewa  ?></td>
                                                <td><?= $sewa->tanggal_kembali  ?></td>
                                                <td><?= $sewa->lama_sewa  ?></td>
                                                <td>
                                                    <a href="<?= base_url('admin/Datasewa/detail_sewa/') . $sewa->id_transaksi ?>" class="btn btn-sm btn-success mb-2"><i class="fas fa-edit"></i> Detail</a>
                                                    <?php if($sewa->status_sewa == "Belum Selesai") { ?>
                                                    <a href="<?= base_url('admin/Datapengembalian/tambahPengembalian/') . $sewa->id_transaksi ?>" onclick="return confirm('Kamu yakin transaksi 3271023<?= $sewa->id_transaksi ?> dikembalikan?' );" class="btn btn-sm btn-primary mb-2"><i class="fas fa-check"></i> Kembali</a>
                                                    <?php } ?>
                                                    <a href="<?= base_url('admin/Datasewa/delete_sewa/') . $sewa->id_transaksi ?>" onclick="return confirm('Kamu yakin akan menghapus 3271023<?= $sewa->id_transaksi ?>' );" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i> Delete</a>
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