<?php
session_start();
include 'db.php';
if ($_SESSION['status_login'] != true) {
    echo '<script>window.location="login.php"</script>';
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WEB Galeri Foto - Tambah Data Foto</title>
    <link rel="stylesheet" type="text/css" href="css/stylee.css">
    <!-- Tambahkan stylesheet untuk CKEditor -->
    <script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
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
    <!-- header -->
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
            <h3>Tambah Data Foto</h3>
            <div class="box">
                <form action="" method="POST" enctype="multipart/form-data">
                    <?php
                    $result = mysqli_query($conn, "SELECT * FROM tb_category");
                    $jsArray = "var prdName = new Array();\n";
                    echo '<select class="input-control" name="kategori" onchange="document.getElementById(\'prd_name\').value = prdName[this.value]" required>';
                    echo '<option>-Pilih Kategori Foto-</option>';
                    while ($row = mysqli_fetch_array($result)) {
                        echo '<option value="' . $row['category_id'] . '">' . $row['category_name'] . '</option>';
                        $jsArray .= "prdName['" . $row['category_id'] . "'] = '" . addslashes($row['category_name']) . "';\n";
                    }
                    echo '</select>';
                    ?>
                    <input type="hidden" name="nama_kategori" id="prd_name">
                    <input type="hidden" name="adminid" value="<?php echo $_SESSION['a_global']->admin_id ?>">
                    <input type="text" name="namaadmin" class="input-control" value="<?php echo $_SESSION['a_global']->admin_name ?>" readonly="readonly">
                    <input type="text" name="nama" class="input-control" placeholder="Nama Foto" required>
                    <textarea class="input-control" name="deskripsi" placeholder="Deskripsi"></textarea><br />
                    <input type="file" name="gambar" class="input-control" required>
                    <select class="input-control" name="status">
                        <option value="">--Pilih--</option>
                        <option value="1">Aktif</option>
                        <option value="0">Tidak Aktif</option>
                    </select>
                    <input type="submit" name="submit" value="Submit" class="btn">
                </form>
                <?php
                if (isset($_POST['submit'])) {
                    $kategori  = $_POST['kategori'];
                    $nama_ka   = $_POST['nama_kategori'];
                    $ida       = $_POST['adminid'];
                    $user      = $_POST['namaadmin'];
                    $nama      = $_POST['nama'];
                    $deskripsi = $_POST['deskripsi'];
                    $status    = $_POST['status'];

                    $filename = $_FILES['gambar']['name'];
                    $tmp_name = $_FILES['gambar']['tmp_name'];

                    $type1 = explode('.', $filename);
                    $type2 = $type1[1];

                    $newname = 'foto' . time() . '.' . $type2;

                    $tipe_diizinkan = array('jpg', 'jpeg', 'png', 'gif');

                    if (!in_array($type2, $tipe_diizinkan)) {
                        echo '<script>alert("Format file tidak diizinkan")</script>';
                    } else {
                        move_uploaded_file($tmp_name, './foto/' . $newname);

                        $insert = mysqli_query($conn, "INSERT INTO tb_image VALUES (
                                       null,
                                       '" . $kategori . "',
                                       '" . $nama_ka . "',
                                       '" . $ida . "',
                                       '" . $user . "',
                                       '" . $nama . "',
                                       '" . $deskripsi . "',
                                       '" . $newname . "',
                                       '" . $status . "',
                                       null
                                           ) ");

                        if ($insert) {
                            echo '<script>alert("Tambah Foto berhasil")</script>';
                            echo '<script>window.location="data-image.php"</script>';
                        } else {
                            echo 'gagal' . mysqli_error($conn);
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

    <!-- Load CKEditor script -->
    <script>
        CKEDITOR.replace('deskripsi');
    </script>

    <!-- Load JavaScript for dynamic dropdown -->
    <script type="text/javascript">
        <?php echo $jsArray; ?>
    </script>
</body>

</html>
