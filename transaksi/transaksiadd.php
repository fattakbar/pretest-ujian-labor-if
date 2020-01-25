<h2 class="text-center">Entry Data Transaksi</h2><p></p>
<form action="" method="post">
    <div class="form-group">
        <label for="idtrans">Id Transaksi</label>
        <input type="text" class="form-control" id="idtrans" name="idtrans" required>
    </div>
    <div class="form-group">
        <label for="tgltrans">Tanggal Transaksi</label>
        <input type="date" class="form-control" id="tgltrans" name="tgltrans" required>
    </div>
    <div class="form-group">
        <label for="kdobat">Kode Obat</label>
        <select class="form-control" name="kdobat" id="kdobat" required>
            <option value="">- Pilih Kode Obat -</option>
            <!-- Kode ini berfungsi untuk mengambil data obat  -->
            <?php

            $queryGetObat = mysqli_query($connection, "SELECT * FROM obat");

            // Buat array untuk menampung data obat
            $kodeArray = "let kodeObat = new Array();\n";

            while ($rowGetObat = mysqli_fetch_array($queryGetObat)) {
                echo "<option name='kdobat' id='kdobat' value='$rowGetObat[kdobat]'>$rowGetObat[kdobat] - $rowGetObat[nmobat]</option>";
                $kodeArray .= "kodeObat['" . $rowGetObat['kdobat'] . "'] = {nmobat:'" . addslashes($rowGetObat['nmobat']) . "', jnsobat:'" . addslashes($rowGetObat['jnsobat']) . "', hrgobat:'" . addslashes($rowGetObat['hrgobat']) . "', stokobat:'" . addslashes($rowGetObat['stokobat']) . "'};\n";
            }

            ?>
        </select>
    </div>
    <div class="form-group">
        <label for="nmobat">Nama Obat</label>
        <input type="text" class="form-control" id="nmobat" name="nmobat" readonly>
    </div>
    <div class="form-group">
        <label for="jnsobat">Jenis Obat</label>
        <select class="form-control" id="jnsobat" name="jnsobat" disabled>
            <option value="">Jenis Obat</option>
            <option value="Obat Ringan">Obat Ringan</option>
            <option value="Obat Sedang">Obat Sedang</option>
            <option value="Obat Keras">Obat Keras</option>
        </select>
    </div>
    <div class="form-group">
        <label for="hrgobat">Harga Obat</label>
        <input type="text" class="form-control" id="hrgobat" name="hrgobat" readonly>
    </div>
    <div class="form-group">
        <label for="stokobat">Stok Obat</label>
        <input type="text" class="form-control" id="stokobat" name="stokobat" readonly>
    </div>
    <div class="form-group">
        <label for="jmlbeli">Jumlah Beli</label>
        <input type="text" class="form-control" id="jmlbeli" name="jmlbeli">
    </div>
    <div class="form-group">
        <label for="total">Total</label>
        <input type="text" class="form-control" id="total" name="total" readonly>
    </div>
    <div class="form-group">
        <label for="diskon">Diskon</label>
        <input type="text" class="form-control" id="diskon" name="diskon" readonly>
    </div>
    <div class="form-group">
        <label for="totalbayar">Total Bayar</label>
        <input type="text" class="form-control" id="totalbayar" name="totalbayar" readonly>
    </div>
    <input type="submit" class="btn btn-primary" name="simpan" value="Simpan Transaksi">
</form><br>

<script type="text/javascript">

    // Fungsi Untuk Mendapatkan Data Obat dan Meletakkannya di Form
    <?php echo $kodeArray; ?>

    let codeObat = document.getElementById('kdobat');
    codeObat.addEventListener('change', function () {
        showObat(this.value);
    });

    function showObat(id) {
        document.getElementById('nmobat').value = kodeObat[id].nmobat;
        document.getElementById('jnsobat').value = kodeObat[id].jnsobat;
        document.getElementById('hrgobat').value = kodeObat[id].hrgobat;
        document.getElementById('stokobat').value = kodeObat[id].stokobat;
    }

    // Fungsi Untuk Melakukan Penjulmalah, Diskon, TotalBayar
    let jumlahBeli = document.getElementById('jmlbeli');
    jumlahBeli.addEventListener('keyup', function () {
        hitung();
    });

    function hitung() {
        let kodeObats = document.getElementById('kdobat').value;
        let hargaObats = document.getElementById('hrgobat').value;
        let jumlahBelis = document.getElementById('jmlbeli').value;

        let diskons;

        if (kodeObats === "OBT001") {
            diskons = ((10 * hargaObats / 100) * jumlahBelis);
        } else if (kodeObats === "OBT002") {
            diskons = ((15 * hargaObats / 100) * jumlahBelis);
        } else if (kodeObats === "OBT003") {
            diskons = ((20 * hargaObats / 100) * jumlahBelis);
        }

        let totals = hargaObats * jumlahBelis;
        let totalBayars = (hargaObats * jumlahBelis) - diskons;

        document.getElementById('diskon').value = diskons;
        document.getElementById('total').value = totals;
        document.getElementById('totalbayar').value = totalBayars;
    }
</script>

<?php

if (isset($_POST['simpan'])) {

    $query = mysqli_query($connection, "INSERT INTO transaksi (idtrans, tgltrans, kdobat, jmlbeli, total, diskon, totalbayar) VALUES ('$_POST[idtrans]', '$_POST[tgltrans]', '$_POST[kdobat]', '$_POST[jmlbeli]', '$_POST[total]', '$_POST[diskon]', '$_POST[totalbayar]')");

    if ($query) {
        echo "Data Berhasil Disimpan";
        echo '<META HTTP-EQUIV="Refresh" Content="0; URL=?page=transaksi">';
        exit;
    } else {
        echo "Data Gagal Disimpan";
    }
}
