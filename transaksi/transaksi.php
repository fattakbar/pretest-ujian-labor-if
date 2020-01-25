<h2 class="text-center">Daftar Transaksi Apotik XYZ</h2><p></p>
<a href="?page=transaksiadd" class="btn btn-success"> + Tambah Transaksi</a><p></p>
<table class="table">
    <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">Id Transaksi</th>
        <th scope="col">Tanggal Transaksi</th>
        <th scope="col">Kode Obat</th>
        <th scope="col">Nama Obat</th>
        <th scope="col">Jenis Obat</th>
        <th scope="col">Harga Obat</th>
        <th scope="col">Stok Obat</th>
        <th scope="col">Jumlah Beli</th>
        <th scope="col">Total</th>
        <th scope="col">Diskon</th>
        <th scope="col">Total Bayar</th>
        <th scope="col">Aksi</th>
    </tr>
    </thead>
    <tbody>
    <?php

    // Lakukan Join Table Untuk Mendapatkan Data Yang Ada Di Tabel Obat
    $query = mysqli_query($connection, "SELECT transaksi.*, obat.* FROM transaksi JOIN obat ON transaksi.kdobat=obat.kdobat");
    $no = 1;

    while ($row = mysqli_fetch_array($query)) { ?>
        <tr>
            <th scope="row"><?php echo $no ?></th>
            <td><?php echo $row['idtrans'] ?></td>
            <td><?php echo date('d F Y', strtotime($row['tgltrans'])) ?></td>
            <td><?php echo $row['kdobat'] ?></td>
            <td><?php echo $row['nmobat'] ?></td>
            <td><?php echo $row['jnsobat'] ?></td>
            <td><?php echo rupiah($row['hrgobat']) ?></td>
            <td><?php echo $row['stokobat'] ?></td>
            <td><?php echo $row['jmlbeli'] ?></td>
            <td><?php echo rupiah($row['total']) ?></td>
            <td><?php echo rupiah($row['diskon']) ?></td>
            <td><?php echo rupiah($row['totalbayar']) ?></td>
            <td>
                <a href="?page=transaksidelete&idtrans=<?php echo $row['idtrans'] ?>" class="btn btn-danger">Hapus</a>
            </td>
        </tr>
        <?php
        $no++;
    }
    ?>
    </tbody>
</table>
