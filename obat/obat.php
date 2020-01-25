<h2 class="text-center">Daftar Obat Apotik XYZ</h2><p></p>
<a href="?page=obatadd" class="btn btn-success"> + Tambah Data</a><p></p>
<table class="table">
    <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">Kode Obat</th>
        <th scope="col">Nama Obat</th>
        <th scope="col">Jenis Obat</th>
        <th scope="col">Harga Obat</th>
        <th scope="col">Stok Obat</th>
        <th scope="col">Aksi</th>
    </tr>
    </thead>
    <tbody>
    <?php

    $query = mysqli_query($connection, "SELECT * FROM obat");
    $no = 1;

    while ($row = mysqli_fetch_array($query)) { ?>
        <tr>
            <th scope="row"><?php echo $no ?></th>
            <td><?php echo $row['kdobat'] ?></td>
            <td><?php echo $row['nmobat'] ?></td>
            <td><?php echo $row['jnsobat'] ?></td>
            <td><?php echo $row['hrgobat'] ?></td>
            <td><?php echo $row['stokobat'] ?></td>
            <td>
                <a href="?page=obatupdate&kdobat=<?php echo $row['kdobat'] ?>" class="btn btn-warning">Edit</a>
                <a href="?page=obatdelete&kdobat=<?php echo $row['kdobat'] ?>" class="btn btn-danger">Hapus</a>
            </td>
        </tr>
        <?php
        $no++;
    }
    ?>
    </tbody>
</table>
