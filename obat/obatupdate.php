<?php

$queryGetObat = mysqli_query($connection, "SELECT * FROM obat WHERE kdobat='$_GET[kdobat]'");
$rowGetObat = mysqli_fetch_array($queryGetObat);

?>

    <h2 class="text-center">Edit Data Obat</h2><p></p>
    <form action="" method="post">
        <div class="form-group">
            <label for="kdobat">Kode Obat</label>
            <input type="text" class="form-control" id="kdobat" name="kdobat"
                   value="<?php echo $rowGetObat['kdobat'] ?>" readonly>
        </div>
        <div class="form-group">
            <label for="nmobat">Nama Obat</label>
            <input type="text" class="form-control" id="nmobat" name="nmobat"
                   value="<?php echo $rowGetObat['nmobat'] ?>" required>
        </div>
        <div class="form-group">
            <label for="jnsobat">Jenis Obat</label>
            <select class="form-control" id="jnsobat" name="jnsobat" required>
                <option <?php if ($rowGetObat['jnsobat'] == "" || null) {
                    echo "selected";
                } ?> value="">- Pilih Jenis Obat -
                </option>
                <option <?php if ($rowGetObat['jnsobat'] == "Obat Ringan") {
                    echo "selected";
                } ?> value="Obat Ringan">Obat Ringan
                </option>
                <option <?php if ($rowGetObat['jnsobat'] == "Obat Sedang") {
                    echo "selected";
                } ?> value="Obat Sedang">Obat Sedang
                </option>
                <option <?php if ($rowGetObat['jnsobat'] == "Obat Keras") {
                    echo "selected";
                } ?> value="Obat Keras">Obat Keras
                </option>
            </select>
        </div>
        <div class="form-group">
            <label for="hrgobat">Harga Obat</label>
            <input type="text" class="form-control" id="hrgobat" name="hrgobat"
                   value="<?php echo $rowGetObat['hrgobat'] ?>" required>
        </div>
        <div class="form-group">
            <label for="stokobat">Stok Obat</label>
            <input type="number" class="form-control" id="stokobat" name="stokobat"
                   value="<?php echo $rowGetObat['stokobat'] ?>" required>
        </div>
        <input type="submit" class="btn btn-primary" name="simpan" value="Edit Data Obat">
    </form><br>

    <!-- Fungsi Untuk Membuat Format Rupiah Di Form -->
    <script type="text/javascript">
        let rupiah = document.getElementById('hrgobat');
        rupiah.addEventListener('keyup', function () {
            rupiah.value = formatRupiah(this.value, 'Rp. ');
        });

        rupiah.addEventListener('mousemove', function () {
            rupiah.value = formatRupiah(this.value, 'Rp. ');
        });

        function formatRupiah(number, prefix) {
            let numberString = number.replace(/[^,\d]/g, '').toString(),
                split = numberString.split(','),
                residual = split[0].length % 3,
                rupiah = split[0].substr(0, residual),
                ribuan = split[0].substr(residual).match(/\d{3}/gi);

            let separator;
            if (ribuan) {
                separator = residual ? '.' : '';
                rupiah += separator + ribuan.join('.');
            }

            rupiah = split[1] !== undefined ? rupiah + ',' + split[1] : rupiah;
            return prefix === undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
        }
    </script>

<?php

if (isset($_POST['simpan'])) {

    // Ini digunakan karena pada form harga outputnya Rp.3.000, sedangkan output yg ingin kita simpan ke database harus 3000. Jadi harus di filter terlebih dahulu. Jika kalian menggunakan versi PHP 7 keatas, proses filter akan lebih simple lagi.
    $harga = filter_var($_POST['hrgobat'], FILTER_SANITIZE_NUMBER_INT);

    $query = mysqli_query($connection, "UPDATE obat SET nmobat='$_POST[nmobat]', jnsobat='$_POST[jnsobat]', hrgobat='$harga', stokobat='$_POST[stokobat]' WHERE kdobat='$_GET[kdobat]'");

    if ($query) {
        echo "Data Berhasil Diupdate";
        echo '<META HTTP-EQUIV="Refresh" Content="0; URL=?page=obat">';
        exit;
    } else {
        echo "Data Gagal Diupdate";
    }
}
