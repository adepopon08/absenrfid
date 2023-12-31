<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Absensi | Register</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="admin/plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="admin/dist/css/adminlte.min.css">
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo"><b>Absensi</b>Siswa
        </div>
        <!-- /.login-logo -->
        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg">Register a new membership</p>

                <form action="" method="post">
                    <div class="input-group mb-3">
                        <input type="text" name="username" class="form-control" placeholder="Username" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                        <br>
                    </div>

                    <div class="input-group mb-3">
                        <input type="password" name="pwd" class="form-control" placeholder="Password" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                        <br>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" name="pwd2" class="form-control" placeholder="Retype Password" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                        <br>
                    </div>
                    <div class="input-group mb-3">
                        <select class="custom-select form-control" id="level" name="level">
                            <option value="1">Admin</option>
                            <option value="2">User</option>
                        </select>
                        <br>
                    </div>
                    <div class="row">
                        <div class="col">
                            sdsgfd <?php if ($err) {
                                        echo $err;
                                    }
                                    ?>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-8">

                        </div>
                        <!-- /.col -->
                        <div class="col-4">
                            <button type="submit" name="register" class="btn btn-primary btn-block">Register</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>


            </div>
            <!-- /.login-card-body -->
        </div>
    </div>
    <!-- /.login-box -->

    <!-- jQuery -->
    <script src="admin/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="admin/dist/js/adminlte.min.js"></script>

    <?php
    include "koneksi.php";
    if (isset($_POST['register'])) {
        $user = $_POST['username'];
        $pwd = $_POST['pwd'];
        $pwd2 = $_POST['pwd2'];
        $level = $_POST['level'];
        $err = "";

        if ($pwd != $pwd2) {
            $err = "Password Tidak Sama";
        } else {
            $pasword = md5($_POST['pwd']);
            $sql = mysqli_query($konek, "INSERT INTO user VALUES('', '$user', '$pasword', '$level')");
            header('location:login.php');
        }
    }
    ?>
</body>

</html>