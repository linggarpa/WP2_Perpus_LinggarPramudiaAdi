<table class="table">
  <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">Nomor Pengembalian</th>
      <th scope="col">Mobil</th>
      <th scope="col">Nopol</th>
      <th scope="col">Tanggal Kembali</th>
      <th scope="col">Tanggal Pengembalian</th>
      <th scope="col">Telat</th>
      <th scope="col">Denda</th>
      <th scope="col">Keterangan</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $no = 1;
     foreach ($pengembalian as $pb ) :?>
    <tr>
      <th scope="row"><?= $no++?></th>
      <td><?= "3271023".$pb->id_pengembalian?></td>
      <td><?= $pb->nama_mobil?></td>
      <td><?= $pb->no_plat?></td>
      <td><?= $pb->tanggal_kembali ?></td>
      <td><?= $pb->tanggal_pengembalian ?></td>
      <td><?= $pb->hari_telat." Hari" ?></td>
      <td><?= rupiah($pb->denda) ?></td>
      <td><?= $pb->keterangan ?></td>
    </tr>
    <?php endforeach;?>
  </tbody>
  <script type="text/javascript">
    window.print();
</script>
</table>