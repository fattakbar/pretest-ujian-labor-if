<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sample Program Ujian Labor Teknik Informatika</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/bootstrap.min.js"></script>
</head>
<body style="padding: 8px;">


<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="index.php">Apotik XYZ</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item active">
                <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="?page=obat">Menu Obat</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="?page=transaksi">Menu Transaksi</a>
            </li>
        </ul>
    </div>
</nav>
<br>

<?php

include "config/connection.php";
include "config/helper.php";

if (isset($_GET['page'])) {
    if ($_GET['page'] == "obat") {
        include "obat/obat.php";
    } else if ($_GET['page'] == "obatadd") {
        include "obat/obatadd.php";
    } else if ($_GET['page'] == "obatupdate") {
        include "obat/obatupdate.php";
    } else if ($_GET['page'] == "obatdelete") {
        include "obat/obatdelete.php";
    } else if ($_GET['page'] == "transaksi") {
        include "transaksi/transaksi.php";
    } else if ($_GET['page'] == "transaksiadd") {
        include "transaksi/transaksiadd.php";
    } else if ($_GET['page'] == "transaksidelete") {
        include "transaksi/transaksidelete.php";
    } else {
        include "home.php";
    }
} else {
    include "home.php";
}

?>

<footer class="card-footer">
    <div class="container">
        <span class="text-muted">&copy; <?php echo date('Y') ?> <a href="https://www.linkedin.com/in/fattahul-akbar/"
                                                                   target="_blank">Fattahul Akbar</a></span>
    </div>
</footer>

</body>
</html>
