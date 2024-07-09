<?php

session_start();

// Bikin Tersambung dengan database
$c = mysqli_connect('localhost', 'root', '', 'rentalmobil');

// // Login
// if (isset($_POST['login'])) {
//     $username = $_POST['username'];
//     $password = $_POST['password'];

//     $check = mysqli_query($c, "SELECT * FROM user WHERE username='$username' and password='$password'");
//     $hitung = mysqli_num_rows($check);

//     if ($hitung > 0) {
//         $_SESSION['login'] = 'True';
//         header('location:index.php');
//     } else {
//         echo '
//         <script>alert("Username atau Password salah!!!");
//         window.location.href="login.php"
//         </script>
//         ';
//     }
// }

// // tambah barang baru
// if (isset($_POST['tambahbarang'])) {
//     $namamobil = $_POST['namamobil'];
//     $platmobil = $_POST['platmobil'];
//     $warnamobil = $_POST['warnamobil'];
//     $hargasewamobil = $_POST['hargasewamobil'];

//     $insert = mysqli_query($c, "insert into mobil (namamobil,platmobil,warnamobil,hargasewamobil) values ('$namamobil','$platmobil','$warnamobil','$hargasewamobil')");

//     if ($insert) {
//         header('location:mobil.php');
//     } else {
//         echo '
//         <script>alert("Gagal Menambah Mobil baru");
//         window.location.href="mobil.php"</script>';
//     }
// }

// // tambah pelanggan baru
// if (isset($_POST['tambahpelanggan'])) {
//     $namapelanggan = $_POST['namapelanggan'];
//     $nohp = $_POST['nohp'];
//     $alamat = $_POST['alamat'];
//     $email = $_POST['email'];

//     $insert = mysqli_query($c, "insert into pelanggan (namapelanggan,nohp,alamat,email) values ('$namapelanggan','$nohp','$alamat','$email')");

//     if ($insert) {
//         header('location:pelanggan.php');
//     } else {
//         echo '
//         <script>alert("Gagal Menambah Pelanggan baru");
//         window.location.href="pelanggan.php"</script>';
//     }
// }

// // tambah peminjam baru
// if (isset($_POST['tambahpeminjam'])) {
//     $idpelanggan = $_POST['idpelanggan'];

//     $insert = mysqli_query($c, "insert into peminjaman (idpelanggan) values ($idpelanggan)");

//     if ($insert) {
//         header('location:index.php');
//     } else {
//         echo '
//         <script>alert("Gagal Menambah Peminjam baru");
//         window.location.href="index.php"</script>';
//     }
// }

// // tambah data mobil
// if (isset($_POST['addmobil'])) {
//     $idmobil = $_POST['idmobil'];
//     $idp = $_POST['idp'];
//     $qty = $_POST['qty']; //qty artinya Jumlah
//     $tanggalpeminjaman = $_POST['tanggalpeminjaman'];
//     $tanggalpengembalian = $_POST['tanggalpengembalian'];

//     $insert = mysqli_query($c, "insert into detailpeminjaman (idpeminjaman,idmobil,qty,tanggalpeminjaman,tanggalpengembalian) values ('$idp','$idmobil','$qty','$tanggalpeminjaman','$tanggalpengembalian')");

//     if ($insert) {
//         header('location:view.php?idp=' . $idp);
//     } else {
//         echo '
//         <script>alert("Gagal Menambah Peminjam baru");
//         window.location.href="view.php?idp="' . $idp . '</script>';
//     }
// }

// // edit mobil
// if (isset($_POST['editmobil'])) {
//     $nm = $_POST['namamobil'];
//     $platm = $_POST['platmobil'];
//     $wm = $_POST['warnamobil'];
//     $hargasewamobil = $_POST['hargasewamobil'];
//     $idm = $_POST['idm'];

//     $query = mysqli_query($c, "update mobil set namamobil='$nm', platmobil='$platm', warnamobil='$wm', hargasewamobil='$hargasewamobil' where idmobil='$idm'");

//     if ($query) {
//         header('location:mobil.php');
//     } else {
//         echo '
//         <script>alert("Gagal");
//         window.location.href="mobil.php"
//         </script>';
//     }
// }

// // Hapus Mobil
// if (isset($_POST['hapusmobil'])) {
//     $idm = $_POST['idm'];

//     $query = mysqli_query($c, "delete from mobil where idmobil='$idm'");
//     if ($query) {
//         header('location:mobil.php');
//     } else {
//         echo '
//     <script>alert("Gagal");
//     window.location.href="mobil.php"
//     </script>';
//     }
// }

// // edit data pelanggan
// if (isset($_POST['editpelanggan'])) {
//     $np = $_POST['namapelanggan'];
//     $nt = $_POST['nohp'];
//     $alamat = $_POST['alamat'];
//     $email = $_POST['email'];
//     $idpl = $_POST['idpl'];

//     $query = mysqli_query($c, "update pelanggan set namapelanggan='$np', nohp='$nt', alamat='$alamat', email='$email' where idpelanggan='$idpl'");

//     if ($query) {
//         header('location:pelanggan.php');
//     } else {
//         echo '
//         <script>alert("Gagal");
//         window.location.href="pelanggan.php"
//         </script>';
//     }
// }

// // hapus pelanggan
// if (isset($_POST['hapuspelanggan'])) {
//     $idpl = $_POST['idpl'];

//     $query = mysqli_query($c, "delete from pelanggan where idpelanggan='$idpl'");
//     if ($query) {
//         header('location:pelanggan.php');
//     } else {
//         echo '
//     <script>alert("Gagal");
//     window.location.href="pelanggan.php"
//     </script>';
//     }
// }

// // hapus peminjam
// if (isset($_POST['hapuspeminjam'])) {
//     $idpmm = $_POST['idpmm'];

//     $cekdata = mysqli_query($c, "select * from detailpeminjaman dp where idpeminjaman='$idpmm'");

//     while ($ok = mysqli_fetch_array($cekdata)) {
//         $querydelete = mysqli_query($c, "delete from detailpeminjaman where iddetailpeminjaman='$iddp'");
//     }

//     $query = mysqli_query($c, "delete from peminjaman where idpeminjaman='$idpmm'");
//     if ($query) {
//         header('location:index.php');
//     } else {
//         echo '
//     <script>alert("Gagal");
//     window.location.href="index.php"
//     </script>';
//     }
// }

// // EDIT DETAIL PEMINJAMAN
// if (isset($_POST['editdetailpeminjaman'])) {
//     $qty = $_POST['qty'];
//     $iddp = $_POST['iddp'];
//     $idp = $_POST['idp'];
//     $tanggalpeminjaman = $_POST['tanggalpeminjaman'];
//     $tanggalpengembalian = $_POST['tanggalpengembalian'];

//     // cari tahu berapa hari disewa
//     $caritahu = mysqli_query($c, "select * from detailpeminjaman where iddetailpeminjaman='$iddp'");
//     $caritahu2 = mysqli_fetch_array($caritahu);
//     $qtysekarang = $caritahu2['qty'];

//     if ($qty >= $qtysekarang) {
//         // kalau inputan lebih besar daripada qty yg tercatat
//         // hitung selisih
//         $selisih = $qty - $qtysekarang;

//         $query = mysqli_query($c, "update detailpeminjaman set qty='$qty' where iddetailpeminjaman='$iddp'");
//         $query2 = mysqli_query($c, "update detailpeminjaman set tanggalpeminjaman='$tanggalpeminjaman', tanggalpengembalian='$tanggalpengembalian' where iddetailpeminjaman='$iddp'");

//         if ($query && $query2) {
//             header('location:view.php?idp=' . $idp);
//         } else {
//             echo '
//         <script>alert("Gagal");
//         window.location.href="view.php?idp=' . $idp . '"
//         </script>';
//         }
//     } else {
//         // kalau lebih kecil
//         // hitung selisih
//         $selisih = $qtysekarang - $qty;

//         $query = mysqli_query($c, "update detailpeminjaman set qty='$qty' where iddetailpeminjaman='$iddp'");
//         $query2 = mysqli_query($c, "update detailpeminjaman set tanggalpeminjaman='$tanggalpeminjaman', tanggalpengembalian='$tanggalpengembalian' where iddetailpeminjaman='$iddp'");

//         if ($query && $query2) {
//             header('location:view.php?idp=' . $idp);
//         } else {
//             echo '
//         <script>alert("Gagal");
//         window.location.href="view.php?idp=' . $idp . '"
//         </script>';
//         }
//     }
// }

// // 
// if (isset($_POST['hapusdetailpeminjaman'])) {
//     $idmb = $_POST['idmb'];

//     $query = mysqli_query($c, "delete from detailpeminjaman where idmobil='$idmb'");
//     if ($query) {
//         header('location:view.php');
//     } else {
//         echo '
//     <script>alert("Gagal");
//     window.location.href="view.php"
//     </script>';
//     }
// }
?>