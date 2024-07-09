<?php

require 'ceklogin.php';

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
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.11.0/dist/sweetalert2.min.css">
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
        <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.11.0/dist/sweetalert2.min.css" rel="stylesheet">
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
                        <h1 class="mt-4">Data Peminjaman</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Welcome <?= $username; ?></li>
                        </ol>
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-info mb-3" data-toggle="modal" data-target="#exampleModal">
                            Tambah Peminjaman Baru
                        </button>
                        <a href="export3.php" class="btn btn-info mb-3">export data</a>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Data Peminjaman
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>ID Peminjaman</th>
                                            <th>Nama Pelanggan & Alamat</th>
                                            <th>Jumlah Sewa Mobil</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $get = mysqli_query($c, "select * from peminjaman p, pelanggan pl where p.idpelanggan=pl.idpelanggan");

                                        while ($p = mysqli_fetch_array($get)) {
                                            $idpeminjaman = $p['idpeminjaman'];
                                            $namapelanggan = $p['namapelanggan'];
                                            $alamat = $p['alamat'];

                                            $hitungjumlahsewamobil = mysqli_query($c, "select * from detailpeminjaman where idpeminjaman='$idpeminjaman'");
                                            $Jumlah = mysqli_num_rows($hitungjumlahsewamobil);
                                            ?>
                                            <tr>
                                                <td><?= $idpeminjaman; ?></td>
                                                <td><?= $namapelanggan; ?> - <?= $alamat; ?></td>
                                                <td><?= $Jumlah; ?></td>
                                                <td><a href="view.php?idp=<?= $idpeminjaman; ?>" class="btn btn-primary"
                                                        target="blank">Tampilkan</a>
                                                    <button type="button" class="btn btn-danger" data-toggle="modal"
                                                        data-target="#delete<?= $idpeminjaman; ?>">
                                                        Delete
                                                    </button>
                                                </td>
                                            </tr>

                                            <!-- Modal Delete-->
                                            <div class="modal fade" id="delete<?= $idpeminjaman; ?>" tabindex="-1"
                                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Delete
                                                                <?= $namapelanggan; ?>
                                                            </h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <form method="post">
                                                            <div class="modal-body">
                                                                Apakah Anda Yakin Untuk Menghapus Data Penyewa Ini??
                                                                <input type="hidden" name="idpmm" value="<?= $idpeminjaman; ?>">
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-danger"
                                                                    data-dismiss="modal"
                                                                    onclick="swal.fire('Canceled', 'Data Peminjaman Kamu tidak ada perubahan', 'error')">Cancel</button>
                                                                <button type="submit" class="btn btn-success"
                                                                    name="hapuspeminjam">Hapus
                                                                </button>
                                                            </div>
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
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.11.0/dist/sweetalert2.all.min.js"></script>
        <script src="dist/sweetalert2.all.min.js"></script>
        <script src="dist/sweetalert2.min.js"></script>
        <?php
        // Hapus Peminjam
        if (isset($_POST['hapuspeminjam'])) {
            $idpmm = $_POST['idpmm'];

            $cekdata = mysqli_query($c, "select * from detailpeminjaman dp where idpeminjaman='$idpmm'");

            while ($ok = mysqli_fetch_array($cekdata)) {
                $querydelete = mysqli_query($c, "delete from detailpeminjaman where iddetailpeminjaman='$iddp'");
            }

            $query = mysqli_query($c, "delete from peminjaman where idpeminjaman='$idpmm'");
            if ($query) {
                ?>
                <script>
                    swal.fire({
                        title: 'success',
                        text: 'Berhasil Menghapus Peminjam <?= $namapelanggan; ?>',
                        icon: 'success',
                    }).then((result) => {
                        if (result.value) {
                            window.location.href = 'index.php';
                        }
                    });
                </script>
                <?php
            } else {
                ?>
                <script>
                    swal.fire({
                        title: 'Gagal',
                        text: 'Gagal Menghapus Peminjam <?= $namapelanggan; ?>',
                        icon: 'error',
                    }).then((result) => {
                        if (result.value) {
                            window.location.href = 'index.php';
                        }
                    });
                </script>
                <?php
            }
        }
        ?>

        <?php
        // tambah peminjam baru
        if (isset($_POST['tambahpeminjam'])) {
            $idpelanggan = $_POST['idpelanggan'];

            $insert = mysqli_query($c, "insert into peminjaman (idpelanggan) values ($idpelanggan)");

            if ($insert) {
                ?>
                <script>
                    swal.fire({
                        title: 'success',
                        text: 'Berhasil Menambah Peminjam <?= $namapelanggan; ?>',
                        icon: 'success',
                    }).then((result) => {
                        if (result.value) {
                            window.location.href = 'index.php';
                        }
                    });
                </script>
                <?php
            } else {
                ?>
                <script>
                    swal.fire({
                        title: 'Gagal',
                        text: 'Gagal Menghapus Peminjam <?= $namapelanggan; ?>',
                        icon: 'error',
                    }).then((result) => {
                        if (result.value) {
                            window.location.href = 'index.php';
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
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Peminjaman Baru</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="post">
                    <div class="modal-body">
                        Pilih Pelanggan
                        <select name="idpelanggan" class="form-control">

                            <?php
                            $getpelanggan = mysqli_query($c, "select * from pelanggan");

                            while ($pl = mysqli_fetch_array($getpelanggan)) {
                                $namapelanggan = $pl['namapelanggan'];
                                $idpelanggan = $pl['idpelanggan'];
                                $alamat = $pl['alamat'];

                                ?>

                                <option value="<?= $idpelanggan; ?>"><?= $namapelanggan; ?> - <?= $alamat; ?></option>

                                <?php
                            }
                            ;
                            ?>
                        </select>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal" id="cancel"
                            onclick="swal.fire('Canceled', 'tidak jadi menambah peminjam baru', 'error')">Cancel</button>
                        <button type="submit" class="btn btn-success" name="tambahpeminjam">Save changes</button>
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