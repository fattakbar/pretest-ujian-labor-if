<?php

$query = mysqli_query($connection, "DELETE FROM obat WHERE kdobat='$_GET[kdobat]'");

if ($query) {
    echo "Data Berhasil Dihapus";
} else {
    echo "Data Gagal Dihapus";
}

echo '<META HTTP-EQUIV="Refresh" Content="0; URL=?page=obat">';
exit;
