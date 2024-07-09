<?php

require 'ceklogin.php';


if (isset($_GET['idp'])) {
    $idp = $_GET['idp'];
    $ambilnamapelanggan = mysqli_query($c, "select * from peminjaman p, pelanggan pl where p.idpelanggan=pl.idpelanggan and p.idpeminjaman='$idp'");
    $np = mysqli_fetch_array($ambilnamapelanggan);
    $namapel = $np['namapelanggan'];
} else {
    header('location:index.php');
}

$get = mysqli_query($c, "select * from peminjaman p, pelanggan pl where p.idpelanggan=pl.idpelanggan");

while ($p = mysqli_fetch_array($get)) {
    $idpeminjaman = $p['idpeminjaman'];
    $namapelanggan = $p['namapelanggan'];
    $alamat = $p['alamat'];

    $hitungjumlahsewamobil = mysqli_query($c, "select * from detailpeminjaman where idpeminjaman='$idpeminjaman'");
    $Jumlah = mysqli_num_rows($hitungjumlahsewamobil);

    $get = mysqli_query($c, "select * from user");

    while ($p = mysqli_fetch_array($get)) {
        $username = $p['username'];

        ?>

        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="utf-8" />
            <meta http-equiv="X-UA-Compatible" content="IE=edge" />
            <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
            <meta name="description" content="" />
            <meta name="author" content="" />
            <title>Data Peminjaman</title>
            <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
            <!-- Bootstrap CSS -->
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
                integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
            <link href="css/styles.css" rel="stylesheet" />
            <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.11.0/dist/sweetalert2.min.css" rel="stylesheet">
            <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
            <style>
                .zoomable {
                    width: 100px;
                    transition: .5s;
                }

                .zoomable:hover {
                    scale: 2.0;
                }
            </style>
        </head>

        <body class="sb-nav-fixed">
            <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
                <!-- Navbar Brand-->
                <a class="navbar-brand ps-3" href="index.php">Rental Mobil</a>
                <!-- Sidebar Toggle-->
                <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i
                        class="fas fa-bars"></i></button>
                <!-- Navbar Search-->
                <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                    <div class="input-group">
                        <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..."
                            aria-describedby="btnNavbarSearch" />
                        <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i
                                class="fas fa-search"></i></button>
                    </div>
                </form>
                <!-- Navbar-->
                <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="#!">Settings</a></li>
                            <li><a class="dropdown-item" href="#!">Activity Log</a></li>
                            <li>
                                <hr class="dropdown-divider" />
                            </li>
                            <li><a class="dropdown-item" href="#!">Logout</a></li>
                        </ul>
                    </li>
                </ul>
            </nav>
            <div id="layoutSidenav">
                <div id="layoutSidenav_nav">
                    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                        <div class="sb-sidenav-menu">
                            <div class="nav">
                                <div class="sb-sidenav-menu-heading">Menu</div>
                                <a class="nav-link" href="mobil.php">
                                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                    Data Mobil
                                </a>
                                <a class="nav-link" href="index.php">
                                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                    Peminjaman
                                </a>
                                <a class="nav-link" href="pelanggan.php">
                                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                    Data Pelanggan
                                </a>
                                <a class="nav-link" href="login.php">
                                    Logout
                                </a>
                            </div>
                        </div>
                        <div class="sb-sidenav-footer">
                            <div class="small">Logged in as:</div>
                            Start Bootstrap
                        </div>
                    </nav>
                </div>
                <div id="layoutSidenav_content">
                    <main>
                        <div class="container-fluid px-4">
                            <h2 class="mt-4">Data Peminjaman:<?= $idp; ?></h2>
                            <h4 class="mt-4">Data pelanggan:<?= $namapel; ?></h4>
                            <ol class="breadcrumb mb-4">
                                <li class="breadcrumb-item active">Welcome <?= $username; ?></li>
                            </ol>
                            <?php
    }
    ;
    ?>
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-info mb-3" data-toggle="modal" data-target="#exampleModal">
                            Tambah Mobil Baru
                        </button>
                        <a href="export1.php?idp=<?= $idp; ?>" class="btn btn-info mb-3" target="blank">export
                            data</a>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Data Mobil
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Gambar</th>
                                            <th>Nama Mobil</th>
                                            <th>Harga Per Hari</th>
                                            <th>Jumlah Hari Sewa</th>
                                            <th>Tanggal Peminjaman</th>
                                            <th>Tanggal Pengembalian</th>
                                            <th>Sub-Total</th>
                                            <th>Aksi</th>
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

                                            //cek ada gambar atau tidak
                                            $gambar = $p['image']; //ambil gambar
                                            if ($gambar == null) {
                                                //jika tidak ada gambar
                                                $img = 'No Photo';
                                            } else {
                                                //jika ada gambar
                                                $img = '<img src="images/' . $gambar . '" class="zoomable">';
                                            }

                                            ?>
                                            <tr>
                                                <td><?= $i++; ?></td>
                                                <td><?= $img ?></td>
                                                <td><?= $namamobil; ?></td>
                                                <td>Rp.<?= number_format($hargasewamobil); ?></td>
                                                <td><?= $qty; ?> Hari</td>
                                                <td><?= $tanggalpeminjaman; ?></td>
                                                <td><?= $tanggalpengembalian; ?></td>
                                                <td>Rp.<?= number_format($subtotal); ?></td>
                                                <td>
                                                    <button type="button" class="btn btn-warning" data-toggle="modal"
                                                        data-target="#edit<?= $iddp; ?>">
                                                        edit
                                                    </button>

                                                    <button type="button" class="btn btn-danger" data-toggle="modal"
                                                        data-target="#delete<?= $iddp; ?>">
                                                        Delete
                                                    </button>
                                                </td>
                                            </tr>

                                            <!-- Modal Edit-->
                                            <div class="modal fade" id="edit<?= $iddp; ?>" tabindex="-1"
                                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Ubah Data Detail
                                                                Penyewaan
                                                            </h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <form method="post">
                                                            <div class="modal-body">
                                                                <input type="text" name="namamobil" class="form-control"
                                                                    placeholder="Nama Mobil" value="<?= $namamobil; ?>"
                                                                    disabled>
                                                                <input type="date" name="tanggalpeminjaman" class="form-control"
                                                                    placeholder="Tanggal Peminjaman"
                                                                    value="<?= $tanggalpeminjaman; ?>">
                                                                <input type="date" name="tanggalpengembalian"
                                                                    class="form-control" placeholder="Tanggal Pengembalian"
                                                                    value="<?= $tanggalpengembalian; ?>">
                                                                <input type="num" name="qty" class="form-control mt-2"
                                                                    placeholder="Hari Sewa Mobil" value="<?= $qty; ?>">
                                                                <input type="hidden" name="iddp" value="<?= $iddp; ?>">
                                                                <input type="hidden" name="idp" value="<?= $idp; ?>">
                                                                <input type="hidden" name="idmb" value="<?= $idmb; ?>">
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-danger"
                                                                    data-dismiss="modal"
                                                                    onclick="swal.fire('Canceled', 'tidak jadi menambah barang baru', 'error')">Cancel</button>
                                                                <button type="submit" class="btn btn-success"
                                                                    name="editdetailpeminjaman">Save changes</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>


                                            <!-- Modal Delete-->
                                            <div class="modal fade" id="delete<?= $iddp; ?>" tabindex="-1"
                                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Delete
                                                                <?= $namamobil; ?>
                                                            </h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <form method="post">
                                                            <div class="modal-body">
                                                                Apakah Anda Yakin Untuk Menghapus Data Mobil Ini??
                                                                <input type="hidden" name="idmb" value="<?= $idmb; ?>">
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-danger"
                                                                    data-dismiss="modal"
                                                                    onclick="swal.fire('Canceled', 'tidak jadi menghapus Data Peminjam', 'error')">Cancel</button>
                                                                <button type="submit" class="btn btn-success"
                                                                    name="hapusdetailpeminjaman">Save changes</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>

                                            <?php
                                        }
                                        ;
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Your Website 2023</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
            crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
            integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
            crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct"
            crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js"
            crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
        <script src="dist/sweetalert2.all.min.js"></script>
        <script src="dist/sweetalert2.min.js"></script>

        <?php
        // EDIT DETAIL PEMINJAMAN
        if (isset($_POST['editdetailpeminjaman'])) {
            $qty = $_POST['qty'];
            $iddp = $_POST['iddp'];
            $idp = $_POST['idp'];
            $tanggalpeminjaman = $_POST['tanggalpeminjaman'];
            $tanggalpengembalian = $_POST['tanggalpengembalian'];

            // cari tahu berapa hari disewa
            $caritahu = mysqli_query($c, "select * from detailpeminjaman where iddetailpeminjaman='$iddp'");
            $caritahu2 = mysqli_fetch_array($caritahu);
            $qtysekarang = $caritahu2['qty'];

            if ($qty >= $qtysekarang) {
                // kalau inputan lebih besar daripada qty yg tercatat
                // hitung selisih
                $selisih = $qty - $qtysekarang;

                $query = mysqli_query($c, "update detailpeminjaman set qty='$qty' where iddetailpeminjaman='$iddp'");
                $query2 = mysqli_query($c, "update detailpeminjaman set tanggalpeminjaman='$tanggalpeminjaman', tanggalpengembalian='$tanggalpengembalian' where iddetailpeminjaman='$iddp'");

                if ($query && $query2) {
                    ?>
                    <script>
                        swal.fire({
                            title: 'success',
                            text: 'Berhasil Mengedit Data Mobil',
                            icon: 'success',
                        }).then((result) => {
                            if (result.value) {
                                window.location.href = 'view.php';
                            }
                        });
                    </script>
                    <?php
                } else {
                    ?>
                    <script>
                        swal.fire({
                            title: 'Gagal',
                            text: 'Gagal Mengedit Data Mobil',
                            icon: 'error',
                        }).then((result) => {
                            if (result.value) {
                                window.location.href = 'view.php';
                            }
                        });
                    </script>
                    <?php
                }
            } else {
                // kalau lebih kecil
                // hitung selisih
                $selisih = $qtysekarang - $qty;

                $query = mysqli_query($c, "update detailpeminjaman set qty='$qty' where iddetailpeminjaman='$iddp'");
                $query2 = mysqli_query($c, "update detailpeminjaman set tanggalpeminjaman='$tanggalpeminjaman', tanggalpengembalian='$tanggalpengembalian' where iddetailpeminjaman='$iddp'");

                if ($query && $query2) {
                    ?>
                    <script>
                        swal.fire({
                            title: 'success',
                            text: 'Berhasil Mengedit Data Mobil',
                            icon: 'success',
                        }).then((result) => {
                            if (result.value) {
                                window.location.href = 'view.php';
                            }
                        });
                    </script>
                    <?php
                } else {
                    ?>
                    <script>
                        swal.fire({
                            title: 'Gagal',
                            text: 'Gagal Mengedit Data Mobil',
                            icon: 'error',
                        }).then((result) => {
                            if (result.value) {
                                window.location.href = 'view.php';
                            }
                        });
                    </script>
                    <?php
                }
            }
        }
        ?>

        <?php
        // hapus detail peminjaman
        if (isset($_POST['hapusdetailpeminjaman'])) {
            $idmb = $_POST['idmb'];

            $query = mysqli_query($c, "delete from detailpeminjaman where idmobil='$idmb'");
            if ($query) {
                ?>
                <script>
                    swal.fire({
                        title: 'success',
                        text: 'Berhasil Menghapus Detail Peminjaman Mobil',
                        icon: 'success',
                    }).then((result) => {
                        if (result.value) {
                            window.location.href = 'view.php';
                        }
                    });
                </script>
                <?php
            } else {
                ?>
                <script>
                    swal.fire({
                        title: 'Gagal',
                        text: 'Gagal Menghapus Detail Peminjaman Mobil',
                        icon: 'error',
                    }).then((result) => {
                        if (result.value) {
                            window.location.href = 'view.php';
                        }
                    });
                </script>
                <?php
            }
        }
        ?>

        <?php
        // tambah data mobil
        if (isset($_POST['addmobil'])) {
            $idmobil = $_POST['idmobil'];
            $idp = $_POST['idp'];
            $qty = $_POST['qty']; //qty artinya Jumlah
            $tanggalpeminjaman = $_POST['tanggalpeminjaman'];
            $tanggalpengembalian = $_POST['tanggalpengembalian'];

            $insert = mysqli_query($c, "insert into detailpeminjaman (idpeminjaman,idmobil,qty,tanggalpeminjaman,tanggalpengembalian) values ('$idp','$idmobil','$qty','$tanggalpeminjaman','$tanggalpengembalian')");

            if ($insert) {
                ?>
                <script>
                    swal.fire({
                        title: 'success',
                        text: 'Berhasil Menambah Data Peminjaman Mobil',
                        icon: 'success',
                    }).then((result) => {
                        if (result.value) {
                            window.location.href = 'view.php';
                        }
                    });
                </script>
                <?php
            } else {
                ?>
                <script>
                    swal.fire({
                        title: 'Gagal',
                        text: 'Gagal Menambah Data Peminjaman Mobil',
                        icon: 'error',
                    }).then((result) => {
                        if (result.value) {
                            window.location.href = 'view.php';
                        }
                    });
                </script>
                <?php
            }
        }
        ?>
    </body>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Mobil</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="post">
                    <div class="modal-body">
                        Pilih Mobil
                        <select name="idmobil" class="form-control">

                            <?php
                            $getmobil = mysqli_query($c, "select * from mobil where idmobil not in (select idmobil from detailpeminjaman where idpeminjaman='$idp')");

                            while ($pl = mysqli_fetch_array($getmobil)) {
                                $namamobil = $pl['namamobil'];
                                $platmobil = $pl['platmobil'];
                                $idmobil = $pl['idmobil'];

                                ?>

                                <option value="<?= $idmobil; ?>"><?= $namamobil; ?> - <?= $platmobil; ?>
                                </option>

                                <?php
                            }
                            ;
                            ?>
                        </select>
                        Jumlah Hari Sewa
                        <input type="number" name="qty" class="form-control" placeholder="Jumlah" min="1" required>
                        Tanggal Mulai Sewa
                        <input type="date" name="tanggalpeminjaman" class="form-control" placeholder="">
                        Tanggal Akhir Sewa
                        <input type="date" name="tanggalpengembalian" class="form-control" placeholder="">
                        <input type="hidden" name="idp" value="<?= $idp; ?>">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal"
                            onclick="swal.fire('Canceled', 'tidak jadi menambah barang baru', 'error')">Cancel</button>
                        <button type="submit" class="btn btn-success" name="addmobil">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <?php
}
;
?>


</html>