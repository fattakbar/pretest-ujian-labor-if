<?php

$query = mysqli_query($connection, "DELETE FROM transaksi WHERE idtrans='$_GET[idtrans]'");

if ($query) {
    echo "Data Berhasil Dihapus";
} else {
    echo "Data Gagal Dihapus";
}

echo '<META HTTP-EQUIV="Refresh" Content="0; URL=?page=transaksi">';
exit;
