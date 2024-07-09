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
        <title>Data Mobil</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
            integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
        <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.11.0/dist/sweetalert2.min.css" rel="stylesheet">
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
                        <h1 class="mt-4">Data Mobil</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Welcome <?= $username; ?></li>
                        </ol>
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-info mb-3" data-toggle="modal" data-target="#exampleModal">
                            Tambah Barang Baru
                        </button>
                        <a href="export.php" class="btn btn-info mb-3">export data</a>
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
                                            <th>Plat Mobil</th>
                                            <th>Warna Mobil</th>
                                            <th>Harga Sewa/Hari</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $get = mysqli_query($c, "select * from mobil");
                                        $i = 1;

                                        while ($p = mysqli_fetch_array($get)) {
                                            $namamobil = $p['namamobil'];
                                            $platmobil = $p['platmobil'];
                                            $warnamobil = $p['warnamobil'];
                                            $hargasewamobil = $p['hargasewamobil'];
                                            $idmobil = $p['idmobil'];

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
                                                <td><?= $img; ?></td>
                                                <td><a href="detail.php?id=<? $idmobil; ?>"><?= $namamobil; ?></a></td>
                                                <td><?= $platmobil; ?></td>
                                                <td><?= $warnamobil; ?></td>
                                                <td>Rp.<?= number_format($hargasewamobil); ?></td>
                                                <td>
                                                    <button type="button" class="btn btn-warning" data-toggle="modal"
                                                        data-target="#edit<?= $idmobil; ?>">
                                                        edit
                                                    </button>

                                                    <button type="button" class="btn btn-danger" data-toggle="modal"
                                                        data-target="#delete<?= $idmobil; ?>">
                                                        Delete
                                                    </button>
                                                </td>
                                            </tr>

                                            <!-- Modal Edit-->
                                            <div class="modal fade" id="edit<?= $idmobil; ?>" tabindex="-1"
                                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Ubah
                                                                <?= $namamobil; ?>
                                                            </h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <form method="post" enctype="multipart/form-data">
                                                            <div class="modal-body">
                                                                <input type="text" name="namamobil" class="form-control"
                                                                    placeholder="Nama Mobil" value="<?= $namamobil; ?>"
                                                                    required>
                                                                <input type="text" name="platmobil" class="form-control mt-2"
                                                                    placeholder="Plat Mobil" value="<?= $platmobil; ?>"
                                                                    required>
                                                                <input type="text" name="warnamobil" class="form-control mt-2"
                                                                    placeholder="Warna Mobil" value="<?= $warnamobil; ?>"
                                                                    required>
                                                                <input type="num" name="hargasewamobil"
                                                                    class="form-control mt-2" placeholder="Harga Sewa Mobil"
                                                                    value="<?= $hargasewamobil; ?>" required>
                                                                <input type="file" name="file" class="form-control mt-2">
                                                                <input type="hidden" name="idm" value="<?= $idmobil; ?>">
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-danger"
                                                                    data-dismiss="modal" id="cancel"
                                                                    onclick="swal.fire('Canceled', 'File Kamu tidak ada perubahan', 'error')">Cancel</button>
                                                                <button type="submit" class="btn btn-success"
                                                                    name="editmobil">Save changes</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>


                                            <!-- Modal Delete-->
                                            <div class="modal fade" id="delete<?= $idmobil; ?>" tabindex="-1"
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
                                                                Apakah Anda Yakin Untuk Menghapus Data Mobil
                                                                <?= $namamobil; ?>??
                                                                <input type="hidden" name="idm" value="<?= $idmobil; ?>">
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-danger"
                                                                    data-dismiss="modal" id="cancel"
                                                                    onclick="swal.fire('Canceled', 'File Kamu Aman', 'error')">Cancel</button>
                                                                <button type="submit" class="btn btn-success"
                                                                    name="hapusmobil">Save changes</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>

                                            <?php
                                        }
                                        ;
                                        ?>

                                        <!-- Modal Tambah Barang Baru -->
                                        <div class="modal fade" id="exampleModal" tabindex="-1"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Tambah Barang Baru
                                                        </h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <form method="post" enctype="multipart/form-data">
                                                        <div class="modal-body">
                                                            <input type="text" name="namamobil" class="form-control"
                                                                placeholder="Nama Mobil" required>
                                                            <input type="text" name="platmobil" class="form-control mt-2"
                                                                placeholder="Plat Mobil" required>
                                                            <input type="text" name="warnamobil" class="form-control mt-2"
                                                                placeholder="Warna Mobil" required>
                                                            <input type="num" name="hargasewamobil"
                                                                class="form-control mt-2" placeholder="Harga Sewa Mobil"
                                                                required>
                                                            <input type="file" name="file" class="form-control mt-2"
                                                                required>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-danger"
                                                                data-dismiss="modal"
                                                                onclick="swal.fire('Canceled', 'tidak jadi menambah barang baru', 'error')">Cancel</button>
                                                            <button type="submit" class="btn btn-success"
                                                                name="tambahbarang">Save changes</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>

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

        // tambah barang baru
        if (isset($_POST['tambahbarang'])) {
            $namamobil = $_POST['namamobil'];
            $platmobil = $_POST['platmobil'];
            $warnamobil = $_POST['warnamobil'];
            $hargasewamobil = $_POST['hargasewamobil'];

            $allowed_extension = array('png', 'jpg');
            $nama = $_FILES['file']['name'];
            $dot = explode('.', $nama);
            $ekstensi = strtolower(end($dot));
            $ukuran = $_FILES['file']['size'];
            $file_tmp = $_FILES['file']['tmp_name'];

            $image = md5(uniqid($nama, true) . time()) . '.' . $ekstensi;

            $insert = mysqli_query($c, "insert into mobil (namamobil,platmobil,warnamobil,hargasewamobil,image) values ('$namamobil','$platmobil','$warnamobil','$hargasewamobil','$image')");

            if ($insert) {
                if (in_array($ekstensi, $allowed_extension) === true) {
                    //validasi ukuran filenya
                    if ($ukuran < 15000000) {
                        move_uploaded_file($file_tmp, 'images/' . $image);
                        ?>
                        <script>
                            swal.fire({
                                title: 'success',
                                text: 'Berhasil Menambah Mobil <?= $namamobil; ?>',
                                icon: 'success',
                            }).then((result) => {
                                if (result.value) {
                                    window.location.href = 'mobil.php';
                                }
                            });
                        </script>
                        <?php
                    } else {
                        //kalau filenya lebih besar dari 15mb
                        ?>
                        <script>
                            swal.fire({
                                title: 'Gagal',
                                text: 'file lebih besar dari 15mb',
                                icon: 'error',
                            }).then((result) => {
                                if (result.value) {
                                    window.location.href = 'mobil.php';
                                }
                            });
                        </script>
                        <?php
                    }
                } else {
                    // kalau filenya tidak jpg/png
                    ?>
                    <script>
                        swal.fire({
                            title: 'Gagal',
                            text: 'file harus jpg/png',
                            icon: 'error',
                        }).then((result) => {
                            if (result.value) {
                                window.location.href = 'mobil.php';
                            }
                        });
                    </script>
                    <?php
                }
                ?>
                <?php
            } else {
                ?>
                <script>
                    swal.fire({
                        title: 'Gagal',
                        text: 'Gagal Menambah Mobil <?= $namamobil; ?>',
                        icon: 'error',
                    }).then((result) => {
                        if (result.value) {
                            window.location.href = 'mobil.php';
                        }
                    });
                </script>
                <?php
            }
        }
        ?>

        <?php

        // edit mobil
        if (isset($_POST['editmobil'])) {
            $nm = $_POST['namamobil'];
            $platm = $_POST['platmobil'];
            $wm = $_POST['warnamobil'];
            $hargasewamobil = $_POST['hargasewamobil'];
            $idm = $_POST['idm'];

            $allowed_extension = array('png', 'jpg');
            $nama = $_FILES['file']['name'];
            $dot = explode('.', $nama);
            $ekstensi = strtolower(end($dot));
            $ukuran = $_FILES['file']['size'];
            $file_tmp = $_FILES['file']['tmp_name'];

            $image = md5(uniqid($nama, true) . time()) . '.' . $ekstensi;

            if ($ukuran == 0) {
                //jika tidak ingin upload
                $query = mysqli_query($c, "update mobil set namamobil='$nm', platmobil='$platm', warnamobil='$wm', hargasewamobil='$hargasewamobil' where idmobil='$idm'");

                if ($query) {
                    ?>
                    <script>
                        swal.fire({
                            title: 'success',
                            text: 'Berhasil Mengedit Mobil <?= $nm; ?>',
                            icon: 'success',
                        }).then((result) => {
                            if (result.value) {
                                window.location.href = 'mobil.php';
                            }
                        });
                    </script>
                    <?php
                } else {
                    ?>
                    <script>
                        swal.fire({
                            title: 'Gagal',
                            text: 'Gagal Mengedit Mobil <?= $nm; ?>',
                            icon: 'error',
                        }).then((result) => {
                            if (result.value) {
                                window.location.href = 'mobil.php';
                            }
                        });
                    </script>
                    <?php
                }
            } else {
                //jika ingin
                move_uploaded_file($file_tmp, 'images/' . $image);
                $query = mysqli_query($c, "update mobil set namamobil='$nm', platmobil='$platm', warnamobil='$wm', hargasewamobil='$hargasewamobil', image='$image' where idmobil='$idm'");

                if ($query) {
                    ?>
                    <script>
                        swal.fire({
                            title: 'success',
                            text: 'Berhasil Mengedit Mobil <?= $nm; ?>',
                            icon: 'success',
                        }).then((result) => {
                            if (result.value) {
                                window.location.href = 'mobil.php';
                            }
                        });
                    </script>
                    <?php
                } else {
                    ?>
                    <script>
                        swal.fire({
                            title: 'Gagal',
                            text: 'Gagal Mengedit Mobil <?= $nm; ?>',
                            icon: 'error',
                        }).then((result) => {
                            if (result.value) {
                                window.location.href = 'mobil.php';
                            }
                        });
                    </script>
                    <?php
                }
            }
        }
        ?>

        <?php
        // Hapus Mobil
        if (isset($_POST['hapusmobil'])) {
            $idm = $_POST['idm'];

            $gambar = mysqli_query($c, "select * from mobil where idmobil='$idm'");
            $get = mysqli_fetch_array($gambar);
            $img = 'images/' . $get['image'];
            unlink($img);

            $query = mysqli_query($c, "delete from mobil where idmobil='$idm'");
            if ($query) {
                ?>
                <script>
                    swal.fire({
                        title: 'success',
                        text: 'Berhasil Menghapus Mobil <?= $namamobil; ?>',
                        icon: 'success',
                    }).then((result) => {
                        if (result.value) {
                            window.location.href = 'mobil.php';
                        }
                    });
                </script>
                <?php
            } else {
                ?>
                <script>
                    swal.fire({
                        title: 'Gagal',
                        text: 'Gagal Menghapus Mobil <?= $namamobil; ?>',
                        icon: 'error',
                    }).then((result) => {
                        if (result.value) {
                            window.location.href = 'mobil.php';
                        }
                    });
                </script>
                <?php
            }
        }
        ?>
    </body>
    <?php
}
;
?>

</html>