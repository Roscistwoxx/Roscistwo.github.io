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
        <title>Stock Mobil</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
            integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
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
                        <h1 class="mt-4">Data Pelanggan</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Welcome <?= $username; ?></li>
                        </ol>
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-info mb-3" data-toggle="modal" data-target="#exampleModal">
                            Tambah Pelanggan Baru
                        </button>
                        <a href="export2.php" class="btn btn-info mb-3">export data</a>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Data Pelanggan
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Pelanggan</th>
                                            <th>No Handphone</th>
                                            <th>Alamat</th>
                                            <th>Email</th>
                                            <th>Aksi</th>
                                        </tr>

                                    </thead>
                                    <tbody>
                                        <?php
                                        $get = mysqli_query($c, "select * from pelanggan");
                                        $i = 1;

                                        while ($p = mysqli_fetch_array($get)) {
                                            $namapelanggan = $p['namapelanggan'];
                                            $nohp = $p['nohp'];
                                            $alamat = $p['alamat'];
                                            $email = $p['email'];
                                            $idpl = $p['idpelanggan'];

                                            ?>
                                            <tr>
                                                <td><?= $i++; ?></td>
                                                <td><?= $namapelanggan; ?></td>
                                                <td><?= $nohp; ?></td>
                                                <td><?= $alamat; ?></td>
                                                <td><?= $email; ?></td>
                                                <td>
                                                    <button type="button" class="btn btn-warning" data-toggle="modal"
                                                        data-target="#edit<?= $idpl; ?>">
                                                        edit
                                                    </button>

                                                    <button type="button" class="btn btn-danger" data-toggle="modal"
                                                        data-target="#delete<?= $idpl; ?>">
                                                        Delete
                                                    </button>
                                                </td>
                                            </tr>

                                            <!-- Modal Edit-->
                                            <div class="modal fade" id="edit<?= $idpl; ?>" tabindex="-1"
                                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Ubah
                                                                <?= $namapelanggan; ?>
                                                            </h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <form method="post">
                                                            <div class="modal-body">
                                                                <input type="text" name="namapelanggan" class="form-control"
                                                                    placeholder="Nama pelanggan" value="<?= $namapelanggan; ?>">
                                                                <input type="text" name="nohp" class="form-control mt-2"
                                                                    placeholder="No Handphone" value="<?= $nohp; ?>">
                                                                <input type="text" name="alamat" class="form-control mt-2"
                                                                    placeholder="Alamat" value="<?= $alamat; ?>">
                                                                <input type="text" name="email" class="form-control mt-2"
                                                                    placeholder="Email" value="<?= $email; ?>">
                                                                <input type="hidden" name="idpl" value="<?= $idpl; ?>">
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-danger"
                                                                    data-dismiss="modal"
                                                                    onclick="swal.fire('Canceled', 'File Kamu tidak ada perubahan', 'error')">Cancel</button>
                                                                <button type="submit" class="btn btn-success"
                                                                    name="editpelanggan">Save changes</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>


                                            <!-- Modal Delete-->
                                            <div class="modal fade" id="delete<?= $idpl; ?>" tabindex="-1"
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
                                                                Apakah Anda Yakin Untuk Menghapus Data Pelanggan Ini??
                                                                <input type="hidden" name="idpl" value="<?= $idpl; ?>">
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-danger"
                                                                    data-dismiss="modal"
                                                                    onclick="swal.fire('Canceled', 'Data Pelanggan tidak jadi di hapus', 'error')">Cancel</button>
                                                                <button type="submit" class="btn btn-success"
                                                                    name="hapuspelanggan">Save changes</button>
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
        // edit data pelanggan
        if (isset($_POST['editpelanggan'])) {
            $np = $_POST['namapelanggan'];
            $nt = $_POST['nohp'];
            $alamat = $_POST['alamat'];
            $email = $_POST['email'];
            $idpl = $_POST['idpl'];

            $query = mysqli_query($c, "update pelanggan set namapelanggan='$np', nohp='$nt', alamat='$alamat', email='$email' where idpelanggan='$idpl'");

            if ($query) {
                ?>
                <script>
                    swal.fire({
                        title: 'success',
                        text: 'Berhasil Mengedit Pelanggan <?= $np; ?>',
                        icon: 'success',
                    }).then((result) => {
                        if (result.value) {
                            window.location.href = 'pelanggan.php';
                        }
                    });
                </script>
                <?php
            } else {
                ?>
                <script>
                    swal.fire({
                        title: 'Gagal',
                        text: 'Gagal Mengedit Pelanggan <?= $np; ?>',
                        icon: 'error',
                    }).then((result) => {
                        if (result.value) {
                            window.location.href = 'pelanggan.php';
                        }
                    });
                </script>
                <?php
            }
        }
        ?>

        <?php
        // hapus pelanggan
        if (isset($_POST['hapuspelanggan'])) {
            $idpl = $_POST['idpl'];

            $query = mysqli_query($c, "delete from pelanggan where idpelanggan='$idpl'");
            if ($query) {
                ?>
                <script>
                    swal.fire({
                        title: 'success',
                        text: 'Berhasil Menghapus Data pelanggan<?= $namapelanggan; ?>',
                        icon: 'success',
                    }).then((result) => {
                        if (result.value) {
                            window.location.href = 'pelanggan.php';
                        }
                    });
                </script>
                <?php
            } else {
                ?>
                <script>
                    swal.fire({
                        title: 'Gagal',
                        text: 'Gagal Menghapus Data pelanggan<?= $namapelanggan; ?>',
                        icon: 'error',
                    }).then((result) => {
                        if (result.value) {
                            window.location.href = 'pelanggan.php';
                        }
                    });
                </script>
                <?php
            }
        }
        ?>

        <?php
        // tambah pelanggan baru
        if (isset($_POST['tambahpelanggan'])) {
            $namapelanggan = $_POST['namapelanggan'];
            $nohp = $_POST['nohp'];
            $alamat = $_POST['alamat'];
            $email = $_POST['email'];

            $insert = mysqli_query($c, "insert into pelanggan (namapelanggan,nohp,alamat,email) values ('$namapelanggan','$nohp','$alamat','$email')");

            if ($insert) {
                ?>
                <script>
                    swal.fire({
                        title: 'success',
                        text: 'Berhasil Menambah Pelanggan <?= $namapelanggan; ?>',
                        icon: 'success',
                    }).then((result) => {
                        if (result.value) {
                            window.location.href = 'pelanggan.php';
                        }
                    });
                </script>
                <?php
            } else {
                ?>
                <script>
                    swal.fire({
                        title: 'Gagal',
                        text: 'Gagal Menambah Pelanggan <?= $namapelanggan; ?>',
                        icon: 'error',
                    }).then((result) => {
                        if (result.value) {
                            window.location.href = 'pelanggan.php';
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
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Data Pelanggan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="post">
                    <div class="modal-body">
                        <input type="text" name="namapelanggan" class="form-control" placeholder="Nama Pelanggan">
                        <input type="text" name="nohp" class="form-control mt-2" placeholder="No Handphone">
                        <input type="text" name="alamat" class="form-control mt-2" placeholder="Alamat">
                        <input type="text" name="email" class="form-control mt-2" placeholder="Email">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal"
                            onclick="swal.fire('Canceled', 'tidak jadi menambah data pelanggan', 'error')">Cancel</button>
                        <button type="submit" class="btn btn-success" name="tambahpelanggan">Save changes</button>
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