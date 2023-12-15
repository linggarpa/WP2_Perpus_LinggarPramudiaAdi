<div class="container-fluid">
    <!-- row ux-->
    <div class="row">
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-danger shadow h-100 py-2 bg-primary">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-md font-weight-bold text-white text-uppercase mb-1">
                                Customer
                            </div>
                            <div class="h1 mb-0 font-weight-bold text-white">
                                <?php $where = 'id_role = 2';
                                 $totaluser = $this->Rental_model->get_where($where,'user')->num_rows();
                                 echo $totaluser;
                                 ?>
                            </div>
                        </div>
                        <div class="col-auto">
                            <a href="<?= base_url('admin/Datacustomer')?>">
                                <i class="fas fa-users fa-3x text-light"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2 bg-warning">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-md font-weight-bold text-white text-uppercase mb-1">
                                Mobil
                            </div>
                            <div class="h1 mb-0 font-weight-bold text-white">
                            <?= $this->Rental_model->get_data('mobil')->num_rows();?>
                            </div>
                        </div>
                        <div class="col-auto">
                            <a href="<?= base_url('admin/Datamobil')?>">
                                <i class="fas fa-car fa-3x text-light"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2 bg-danger">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-md font-weight-bold text-white text-uppercase mb-1">
                                Penyewaan
                            </div>
                            <div class="h1 mb-0 font-weight-bold text-white">
                            <?php 
                                $where = ['konfirmasi_pembayaran = Sudah Dikonfirmasi'] ;
                                 $totalsewa = $this->Rental_model->get_where($where,'transaksi')->num_rows();
                                 echo $totalsewa;
                            ?>
                            </div>
                        </div>
                        <div class="col-auto">
                            <a href="<?= base_url('admin/Datasewa')?>">
                                <i class="fas fa-cart-plus fa-3x text-light"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2 bg-success">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-md font-weight-bold text-white text-uppercase mb-1">
                                Pengembalian
                            </div>
                            <div class="h1 mb-0 font-weight-bold text-white">
                            <?= $this->Rental_model->get_data('pengembalian')->num_rows();?>
                            </div>
                        </div>
                        <div class="col-auto">
                            <a href="<?= base_url('admin/Datapengembalian')?>">
                                <i class="fas fa-undo-alt fa-3x text-light"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end row ux-->

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- row table-->
    <div class="row">
        <div class="table-responsive table-bordered ml-auto mr-auto mt-2">
            <div class="page-header">
                <span class="fas fa-users text-primary mt-2 ml-2 "> Transaksi yang belum dikonfirmasi</span>
            </div>
            <table class="table mt-3 ml-2 mr-2">
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
                        <td> <a href="<?= base_url('assets/img/').$confirm->bukti_byr?>" target="$_blank"> lihat file </a></td>
                        <td>
                            <a href="<?= base_url('admin/Datatransaksi/konfirmasiTransaksi/') . $confirm->id_transaksi ?>" onclick="return confirm('Kamu yakin akan mengkonfirmasi pembayaran ini  3271023<?=  $confirm->id_transaksi ?> ?' );" class="btn btn-sm btn-primary"><i class="fas fa-check fa-sm mr-2"></i>Konfirmasi</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>

    </div>
    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->