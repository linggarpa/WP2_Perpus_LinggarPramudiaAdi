                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Data Konfirmasi Transaksi</h1>
                    <?= $this->session->flashdata('pesan') ?>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Nomor</th>
                                            <th>Nomor Transaksi</th>
                                            <th>Bank</th>
                                            <th>Total Bayar</th>
                                            <th>Bukti Bayar</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php
                                        $no = 1;
                                        foreach ($konfirmasi as $confirm) : ?>
                                            <tr>
                                                <td><?= $no++ ?></td>
                                                <td><?= "3271023".$confirm->id_transaksi  ?></td>
                                                <td><?= $confirm->bank?></td>
                                                <td><?= rupiah($confirm->tarif*$confirm->lama_sewa)?></td>
                                                <?php if($confirm->bukti_byr == null):?>
                                                    <td><a href="">-</a></td>
                                                <?php else:?>                                                                                                                            
                                                    <td> <a href="<?= base_url('assets/img/').$confirm->bukti_byr?>" target="$_blank"> lihat file </a></td>
                                                <?php endif;?>
                                                <td>
                                                    <a href="<?= base_url('admin/Datatransaksi/konfirmasiTransaksi/') . $confirm->id_transaksi ?>" onclick="return confirm('Kamu yakin akan mengkonfirmasi pembayaran ini  3271023<?=  $confirm->id_transaksi ?> ?' );" class="btn btn-sm btn-primary"><i class="fas fa-check fa-sm mr-2"></i>Konfirmasi</a>
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