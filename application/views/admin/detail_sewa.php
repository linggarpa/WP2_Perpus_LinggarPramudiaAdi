<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Detail Sewa</h1>

    <div class="card">
        <div class="card-body">
                <div class="row">
                <?php foreach ($transaksi as $tr) : ?>
                    <div class="col-md-6 mt-4">
                        <div class="form-group text-dark">
                            <table>
                                <tbody>
                                    <tr>
                                        <td><h5>Nomor Sewa</h5></td>
                                        <td><h5>:</h5></td>
                                        <td><h5><?= $tr->id_transaksi?></h5></td>
                                    </tr>
                                    <tr>
                                        <td><h5>Nama Customer</h5></td>
                                        <td><h5>:</h5></td>
                                        <td><h5><?= $tr->nama?></h5></td>
                                    </tr>
                                    <tr>
                                        <td><h5>Mobil</h5></td>
                                        <td><h5>:</h5></td>
                                        <td><h5><?= $tr->nama_mobil?></h5></td>
                                    </tr>
                                    <tr>
                                        <td><h5>Nopol</h5></td>
                                        <td><h5>:</h5></td>
                                        <td><h5><?= $tr->no_plat?></h5></td>
                                    </tr>
                                    <tr>
                                        <td><h5>Tanggal Sewa</h5></td>
                                        <td><h5>:</h5></td>
                                        <td><h5><?= $tr->tanggal_sewa?></h5></td>
                                    </tr>
                                    <tr>
                                        <td><h5>Tanggal Kembali</h5></td>
                                        <td><h5>:</h5></td>
                                        <td><h5><?= $tr->tanggal_kembali?></h5></td>
                                    </tr>
                                    <tr>
                                        <td><h5>Lama Sewa</h5></td>
                                        <td><h5>:</h5></td>
                                        <td><h5><?= $tr->lama_sewa?></h5></td>
                                    </tr>
                                    <tr>
                                        <td><h5>Total Bayar</h5></td>
                                        <td><h5>:</h5></td>
                                        <td><h5><?= $tr->lama_sewa*$tr->tarif?></h5></td>
                                    </tr>
                                    <tr>
                                    <?php if($tr->bukti_byr == null) :?>
                                        <td><h5>Bukti Bayar</h5></td>
                                        <td><h5>:</h5></td>
                                        <td><h5><a href=""> - </a></h5></td>
                                    <?php else : ?>
                                        <td><h5>Bukti Bayar</h5></td>
                                        <td><h5>:</h5></td>
                                        <td><h5><a href="<?= base_url('assets/img/').$tr->bukti_byr?>" target="$_blank"> lihat file </a></h5></td>
                                    <?php endif; ?>
                                    </tr>
                                </tbody>
                            </table>
                            <a class="btn btn-primary" href="<?= base_url('admin/Datasewa')?>">Kembali</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>