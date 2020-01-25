<h2 class="text-center">Entry Data Obat</h2><p></p>
<form action="" method="post">
    <div class="form-group">
        <label for="kdobat">Kode Obat</label>
        <input type="text" class="form-control" id="kdobat" name="kdobat" required>
    </div>
    <div class="form-group">
        <label for="nmobat">Nama Obat</label>
        <input type="text" class="form-control" id="nmobat" name="nmobat" required>
    </div>
    <div class="form-group">
        <label for="jnsobat">Jenis Obat</label>
        <select class="form-control" id="jnsobat" name="jnsobat" required>
            <option value="">- Pilih Jenis Obat -</option>
            <option value="Obat Ringan">Obat Ringan</option>
            <option value="Obat Sedang">Obat Sedang</option>
            <option value="Obat Keras">Obat Keras</option>
        </select>
    </div>
    <div class="form-group">
        <label for="hrgobat">Harga Obat</label>
        <input type="text" class="form-control" id="hrgobat" name="hrgobat" required>
    </div>
    <div class="form-group">
        <label for="stokobat">Stok Obat</label>
        <input type="number" class="form-control" id="stokobat" name="stokobat" required>
    </div>
    <input type="submit" class="btn btn-primary" name="simpan" value="Simpan Data Obat">
</form><br>

<!-- Fungsi Untuk Membuat Format Rupiah Di Form -->
<script type="text/javascript">
    let rupiah = document.getElementById('hrgobat');
    rupiah.addEventListener('keyup', function () {
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

    $query = mysqli_query($connection, "INSERT INTO obat (kdobat, nmobat, jnsobat, hrgobat, stokobat) VALUES ('$_POST[kdobat]', '$_POST[nmobat]', '$_POST[jnsobat]', '$harga', '$_POST[stokobat]')");

    if ($query) {
        echo "Data Berhasil Disimpan";
        echo '<META HTTP-EQUIV="Refresh" Content="0; URL=?page=obat">';
        exit;
    } else {
        echo "Data Gagal Disimpan";
    }
}
