                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Data Customer</h1>
                    <?= $this->session->flashdata('pesan') ?>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <a href="<?= base_url('admin/Datacustomer/tambah_cust') ?>" class="btn btn-primary"><i class="fas fa-plus"></i> | Tambah Customer</a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>NIK</th>
                                            <th>email</th>
                                            <th>Alamat</th>
                                            <th>No_telp</th>
                                            <th>Jekel</th>
                                            <th>Aksi</th>
                                            
                                            
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php
                                        $no = 1;
                                        foreach ($user as $usr) : ?>
                                            <tr>
                                                <td><?= $no++ ?></td>
                                                <td><?= $usr->nama  ?></td>
                                                <td><?= $usr->nik  ?></td>
                                                <td><?= $usr->email ?></td>
                                                <td><?= $usr->alamat  ?></td>
                                                <td><?= $usr->no_telp  ?></td>
                                                <td><?= $usr->jenis_kelamin  ?></td>
                                                <td>
                                                    <a href="<?= base_url('admin/Datacustomer/detail_cust/') . $usr->id_user ?>" class="btn btn-sm btn-success mb-2"><i class="fas fa-edit"></i> Detail</a>
                                                    <a href="<?= base_url('admin/Datacustomer/delete_cust/') . $usr->id_user ?>" onclick="return confirm('Kamu yakin akan menghapus <?= $usr->nama ?>' );" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i> Delete</a>
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