<?php 
session_start();
include "update_pendaftaran/config.php"; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Login</title>
    <link rel="stylesheet" href="update_pendaftaran/assets/css/bootstrap.min.css">
    <style>
        .login-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .login-form {
            width: 60%; /* Sesuaikan lebar formulir sesuai kebutuhan */
        }

        .logo-container img {
            width: 200px; /* Sesuaikan lebar logo sesuai kebutuhan */
            height: auto;
        }
    </style>
</head>

<body>

    <div class="container" style="margin-top: 100px;">
        <div class="row justify-content-center">

            <div class="col-md-9">
                <h1 font-style="impact">LOGIN ADMIN</h1>
                <h3 font-style="calibry">WEBSITE SISTEM PENDUKUNG KEPUTUSAN</h3>
                <h5 font-style="calibry">Penerimaan Beasiswa STMIK ELRAHMA YOGYAKARTA</h5>
                <h5>__________________________________________________________________</h5>
                <div class="login-container">
                    <div class="login-form">
                        <form method="post">
                            <div class="form-group">
                                <label for="username">Username:</label>
                                <input type="text" class="form-control" id="username" name="username" required>
                            </div>
                            <div class="form-group">
                                <label for="password">Password:</label>
                                <input type="password" class="form-control" id="password" name="password" required>
                            </div>
                            <button name="login" type="submit" class="btn btn-primary">Login</button>
                        </form>
                        <?php
                        if (isset($_GET['msg']) && $_GET['msg'] == "n") {
                            echo '<div class="alert alert-danger mt-3" role="alert">Login failed. Please check your username and password.</div>';
                        }
                        ?>
                    </div>
                    <body>

                        <div class="container" style="margin-top: 0px;">
                            <div class="row justify-content-center">
                                <div class="col-md-2">
                                </div>
                                <div class="logo-container">
                                    <img src="logo.png" hight="400" width="400" alt="Logo">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php 
if (isset($_POST['login'])) {

    $username = $_POST['username'];
    $password = $_POST['password'];

    // ngecek apakah ada data nya 
    $ambil = $conn->query("SELECT * FROM users WHERE username='$username' AND pass='$password'");

    // menghitung kolom data pada tabel users
    $hitung = $ambil->num_rows;
    
    // jika ada data nya maka 1 tidak ada maka 0
    if ($hitung==1) {


        // memasukan data admin kedalam session ,  mausk ke bioskop dengan membawa tiket 
      $_SESSION['admin'] = $ambil->fetch_assoc();
      echo '<script>alert("Login Success")</script>';  
      echo "<script>location='update_pendaftaran/'</script>";
  }
  else{

    echo "<script>location='login.php?msg=n'</script>";
}




}
?>

<script src="assets/js/jquery-3.7.0.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
</body>

</html>
