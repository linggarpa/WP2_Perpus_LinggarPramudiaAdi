                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Data Pengembalian</h1>
                    <?= $this->session->flashdata('pesan') ?>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <a href="<?= base_url('admin/Datapengembalian/cetak_pengembalian') ?>" class="btn btn-secondary"><i class="fas fa-print"></i> | Cetak Laporan</a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Nomor</th>
                                            <th>Nomor Sewa</th>
                                            <th>Nama Mobil</th>
                                            <th>No Plat</th>
                                            <th>Tanggal Pengembalian</th>
                                            <th>Denda</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php
                                        $no = 1;
                                        foreach ($pengembalian as $kembali ) : ?>
                                            <tr>
                                                <td><?= $no++ ?></td>
                                                <td><?= "3271023".$kembali->id_pengembalian  ?></td>
                                                <td><?= $kembali->nama_mobil  ?></td>
                                                <td><?= $kembali->no_plat  ?></td>
                                                <td><?= $kembali->tanggal_pengembalian  ?></td>
                                                <?php if($kembali->keterangan == null ):?> 
                                                    <td><?= "Belum Input Data" ?></td>
                                                <?php else:?>   
                                                    <td><?= $kembali->denda  ?></td>
                                                <?php endif;?>
                                                <td>
                                                <?php if($kembali->keterangan == null):?>    
                                                    <a href="<?= base_url('admin/Datapengembalian/v_edit_pengembalian/') . $kembali->id_pengembalian ?>" class="btn btn-sm btn-success"><i class="fas fa-edit"></i> Edit</a>
                                                <?php endif;?>
                                                <a href="<?= base_url('admin/Datapengembalian/delete_pengembalian/') . $kembali->id_pengembalian ?>" onclick="return confirm('Kamu yakin akan menghapus 3271023<?= $kembali->id_pengembalian ?> ?' );" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i> Delete</a>
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