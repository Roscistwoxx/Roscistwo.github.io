<?php

require 'function.php';

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
        <title>Login - SB Admin</title>
        <link href="css/styles.css" rel="stylesheet" />
        <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.11.0/dist/sweetalert2.min.css" rel="stylesheet">
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    </head>

    <body class="bg-dark">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header">
                                        <h3 class="text-center font-weight-light my-4">Login</h3>
                                    </div>
                                    <div class="card-body">
                                        <form method="post">
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="inputEmail" name="username" type="text"
                                                    placeholder="Username" required />
                                                <label for="inputEmail">Username</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="inputPassword" name="password"
                                                    type="password" placeholder="Password" required />
                                                <label for="inputPassword">Password</label>
                                            </div>
                                            <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                                <button type="submit" name="login" class="btn btn-primary">Login</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
        </div>
        <script>

        </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
            crossorigin="anonymous"></script>
        <script src="dist/sweetalert2.all.min.js"></script>
        <script src="dist/sweetalert2.min.js"></script>
        <?php
        // Login
        if (isset($_POST['login'])) {
            $username = $_POST['username'];
            $password = $_POST['password'];

            $check = mysqli_query($c, "SELECT * FROM user WHERE username='$username' and password='$password'");
            $hitung = mysqli_num_rows($check);

            if ($hitung > 0) {
                $_SESSION['login'] = 'True';
                ?>
                <script>
                    swal.fire({
                        title: 'Selamat Datang',
                        text: '<?= $username; ?>',
                        icon: 'success',
                    }).then((result) => {
                        if (result.value) {
                            window.location.href = 'mobil.php';
                        }
                    });
                </script>;
                <?php
            } else {
                ?>
                <script>
                    swal.fire({
                        title: 'Gagal',
                        text: 'username atau password salah',
                        icon: 'error',
                    });
                </script>
                <?php
            }
        }
        ?>
        <?php
}
;
?>
</body>

</html>