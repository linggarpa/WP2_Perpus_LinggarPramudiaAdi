<table class="table">
  <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">Nomor Sewa</th>
      <th scope="col">Nama Customer</th>
      <th scope="col">Mobil</th>
      <th scope="col">Nopol</th>
      <th scope="col">Tanggal Sewa</th>
      <th scope="col">Tanggal Kembali</th>
      <th scope="col">Lama Sewa</th>
      <th scope="col">Total Bayar</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $no = 1;
     foreach ($transaksi as $tr ) :?>
    <tr>
      <th scope="row"><?= $no++?></th>
      <td><?= "3271023".$tr->id_transaksi?></td>
      <td><?= $tr->nama?></td>
      <td><?= $tr->nama_mobil?></td>
      <td><?= $tr->no_plat?></td>
      <td><?= $tr->tanggal_sewa ?></td>
      <td><?= $tr->tanggal_kembali ?></td>
      <td><?= $tr->lama_sewa ?></td>
      <td><?= $tr->lama_sewa*$tr->tarif ?></td>
    </tr>
    <?php endforeach;?>
  </tbody>
  <script type="text/javascript">
    window.print();
</script>
</table>