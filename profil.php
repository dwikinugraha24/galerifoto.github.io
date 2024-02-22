<?php
session_start();
include 'db.php';
if ($_SESSION['status_login'] != true) {
    echo '<script>window.location="login.php"</script>';
}
$query = mysqli_query($conn, "SELECT * FROM tb_admin WHERE admin_id ='" . $_SESSION['id'] . "'");
$d = mysqli_fetch_object($query);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WEB Galeri Foto - Profil</title>
    <link rel="stylesheet" type="text/css" href="css/stylee.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
        }

        header {
            background-color: #2a72f8;
            color: #fff;
            padding: 15px 0;
            text-align: center;
        }

        header h1 {
            margin: 0;
        }

        .lol ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .lol li {
            display: inline-block;
            margin-right: 20px;
        }

        .lol a {
            text-decoration: none;
            color: #fff;
            font-weight: bold;
        }

        .section {
            padding: 20px 0;
            text-align: center;
        }

        .container {
            width: 80%;
            margin: 0 auto;
        }

        .box {
            background-color: #fff;
            border: 1px solid #ccc;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            box-sizing: border-box;
            margin-top: 20px;
        }

        .input-control {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            box-sizing: border-box;
        }

        .btn {
            padding: 10px 15px;
            background-color: #2a72f8;
            color: #fff;
            border: none;
            cursor: pointer;
            display: block;
            margin-left: auto;
            margin-right: auto;
        }

        footer {
            padding: 25px 0;
            background-color: #333;
            color: #fff;
            text-align: center;
        }

        footer p {
            margin-bottom: 10px;
        }

        footer small {
            margin-top: 25px;
            display: inline-block;
        }
    </style>
</head>

<body>
<header>
  <div class="condebar">
    <div class="overlay" onclick="closeSidebar()"></div>
    <aside class="sidebar" id="sidebar">
      <!-- Sidebar Content Here -->
      <header>
        <span onclick="closeSidebar()"></span>
        <div class="title">
        <img src="img/logo-dwiki.png" alt="Logo" class="logo">
</div>
      </header>
      <ul class="links">
        <li><a href="dashboard.php">Home</a></li>
        <li><a href="profil.php">Profil</a></li>
        <li><a href="data-image.php">tambah foto</a></li>
        <li><a href="galeri.php">galeri</a></li>
        <li><a href="about.php">about</a></li>
        <li><a href="keluar.php">keluar</a></li>
        <!-- Add more links as needed -->
      </ul>
    </aside>
    <div class="main-content">
    <button class="open-btn" onclick="toggleSidebar()">☰</button>
      <!-- Main Content Goes Here -->
    </div>
  </div>
  <script src="js.js"></script>
    </div>
		<div class="title">
        <img src="img/logo-dwiki.png" alt="Logo" class="logo">
        <h1>GALERI FOTO</h1>
        </div>
    </header>
    <!-- content -->
    <div class="section">
        <div class="container">
            <h3>Profil</h3>
            <div class="box">
                <form action="" method="POST">
                    <input type="text" name="nama" placeholder="Nama Lengkap" class="input-control" value="<?php echo $d->admin_name ?>" required>
                    <input type="text" name="user" placeholder="Username" class="input-control" value="<?php echo $d->username ?>" required>
                    <input type="text" name="hp" placeholder="No Hp" class="input-control" value="<?php echo $d->admin_telp ?>" required>
                    <input type="email" name="email" placeholder="Email" class="input-control" value="<?php echo $d->admin_email ?>" required>
                    <input type="text" name="alamat" placeholder="Alamat" class="input-control" value="<?php echo $d->admin_address ?>" required>
                    <input type="submit" name="submit" value="Ubah Profil" class="btn">
                </form>
                <?php
                if (isset($_POST['submit'])) {
                    $nama   = $_POST['nama'];
                    $user   = $_POST['user'];
                    $hp     = $_POST['hp'];
                    $email  = $_POST['email'];
                    $alamat = $_POST['alamat'];

                    $update = mysqli_query($conn, "UPDATE tb_admin SET 
                                      admin_name = '" . $nama . "',
                                      username = '" . $user . "',
                                      admin_telp = '" . $hp . "',
                                      admin_email = '" . $email . "',
                                      admin_address = '" . $alamat . "'
                                      WHERE admin_id = '" . $d->admin_id . "'");
                    if ($update) {
                        echo '<script>alert("Ubah data berhasil")</script>';
                        echo '<script>window.location="profil.php"</script>';
                    } else {
                        echo 'gagal ' . mysqli_error($conn);
                    }
                }
                ?>
            </div>

            <h3>Ubah password</h3>
            <div class="box">
                <form action="" method="POST">
                    <input type="password" name="pass1" placeholder="Password Baru" class="input-control" required>
                    <input type="password" name="pass2" placeholder="Konfirmasi Password Baru" class="input-control" required>
                    <input type="submit" name="ubah_password" value="Ubah Password" class="btn">
                </form>
                <?php
                if (isset($_POST['ubah_password'])) {

                    $pass1 = $_POST['pass1'];
                    $pass2 = $_POST['pass2'];

                    if ($pass2 != $pass1) {
                        echo '<script>alert("Konfirmasi Password Baru tidak sesuai")</script>';
                    } else {
                        $u_pass = mysqli_query($conn, "UPDATE tb_admin SET 
                                      password = '" . $pass1 . "'
                                      WHERE admin_id = '" . $d->admin_id . "'");
                        if ($u_pass) {
                            echo '<script>alert("Ubah data berhasil")</script>';
                            echo '<script>window.location="profil.php"</script>';
                        } else {
                            echo 'gagal ' . mysqli_error($conn);
                        }
                    }
                }
                ?>
            </div>
        </div>
    </div>

    <!-- footer -->
    <footer>
        <div class="container">
            <small>Copyright &copy; 2024 - Web Galeri Foto.</small>
        </div>
    </footer>
</body>

</html>
