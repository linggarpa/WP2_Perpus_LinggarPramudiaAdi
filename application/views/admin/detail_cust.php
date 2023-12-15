<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Detail Customer</h1>

    <div class="card">
        <div class="card-body">
                <div class="row">
                <?php foreach ($user as $usr) : ?>
                    <div class="col-md-6">
                        <div class="form-group ml-5">
                            <img width="250px;" height="250px;" src="<?= base_url() . 'assets/img/' . $usr->gambar_cust ?>" alt="">
                        </div>
                        <a class="btn btn-primary mt-5 ml-5" href="<?= base_url('admin/Datacustomer')?>">Kembali</a>
                    </div>
                    <div class="col-md-6 mt-4">
                        <div class="form-group text-dark">
                            <table>
                                <tbody>
                                    <tr>
                                        <td><h5>Nama</h5></td>
                                        <td><h5>:</h5></td>
                                        <td><h5><?= $usr->nama?></h5></td>
                                    </tr>
                                    <tr>
                                        <td><h5>NIK</h5></td>
                                        <td><h5>:</h5></td>
                                        <td><h5><?= $usr->nik?></h5></td>
                                    </tr>
                                    <tr>
                                        <td><h5>Username</h5></td>
                                        <td><h5>:</h5></td>
                                        <td><h5><?= $usr->username?></h5></td>
                                    </tr>
                                    <tr>
                                        <td><h5>Alamat</h5></td>
                                        <td><h5>:</h5></td>
                                        <td><h5><?= $usr->alamat?></h5></td>
                                    </tr>
                                    <tr>
                                        <td><h5>Nomor Telepon</h5></td>
                                        <td><h5>:</h5></td>
                                        <td><h5><?= $usr->no_telp?></h5></td>
                                    </tr>
                                    <tr>
                                        <td><h5>Email</h5></td>
                                        <td><h5>:</h5></td>
                                        <td><h5><?= $usr->email?></h5></td>
                                    </tr>                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>