<?php

require 'ceklogin.php';

if (isset($_GET['idp'])) {
    $idp = $_GET['idp'];
    $ambilnamapelanggan = mysqli_query($c, "select * from peminjaman p, pelanggan pl where p.idpelanggan=pl.idpelanggan and p.idpeminjaman='$idp'");
    $np = mysqli_fetch_array($ambilnamapelanggan);
    $namapel = $np['namapelanggan'];
} else {
    header('location:view.php');
}

?>
<html>

<head>
    <title>Stock Barang</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
    <link rel="stylesheet" type="text/css"
        href="https://cdn.datatables.net/buttons/1.6.5/css/buttons.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
    <script type="text/javascript" charset="utf8"
        src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
</head>

<body>
    <div class="container">
        <h2>Stock Bahan</h2>
        <h4>Data pelanggan:<?= $namapel; ?></h4>
        <h4>(Inventory)</h4>
        <div class="data-tables datatable-dark">

            <table id="mauexport">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Mobil</th>
                        <th>Harga Per Hari</th>
                        <th>Jumlah Hari Sewa</th>
                        <th>Tanggal Peminjaman</th>
                        <th>Tanggal Pengembalian</th>
                        <th>Sub-Total</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $get = mysqli_query($c, "select * from detailpeminjaman p, mobil pm where p.idmobil=pm.idmobil and idpeminjaman='$idp'");
                    $i = 1;

                    while ($p = mysqli_fetch_array($get)) {
                        $idmb = $p['idmobil'];
                        $iddp = $p['iddetailpeminjaman'];
                        $tanggalpeminjaman = $p['tanggalpeminjaman'];
                        $tanggalpengembalian = $p['tanggalpengembalian'];
                        $qty = $p['qty'];
                        $hargasewamobil = $p['hargasewamobil'];
                        $namamobil = $p['namamobil'];
                        $subtotal = $qty * $hargasewamobil;

                        ?>
                        <tr>
                            <td><?= $i++; ?></td>
                            <td><?php echo $namamobil; ?></td>
                            <td>Rp.<?php echo number_format($hargasewamobil); ?></td>
                            <td><?php echo $qty; ?> Hari</td>
                            <td><?php echo $tanggalpeminjaman; ?></td>
                            <td><?php echo $tanggalpengembalian; ?></td>
                            <td>Rp.<?php echo number_format($subtotal); ?></td>
                        </tr>
                        <?php
                    }
                    ;
                    ?>
                </tbody>
            </table>

        </div>
    </div>

    <script>
        $(document).ready(function () {
            $('#mauexport').DataTable({
                dom: 'Bfrtip',
                buttons: [
                    'copy', 'csv', 'excel', 'pdf', 'print'
                ]
            });
        });

    </script>

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.5/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.flash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.print.min.js"></script>



</body>

</html>