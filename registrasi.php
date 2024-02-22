<?php
	include 'db.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>WEB Galeri Foto</title>
<link rel="stylesheet" type="text/css" href="css/stylee.css">
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
      <li><a href="index.php">Home</a></li>
        <li><a href="login.php">Login</a></li>
        <li><a href="registrasi.php">Registrasi</a></li>
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
            <h3>Registrasi Akun</h3>
            <div class="box">
               <form action="" method="POST">
                   <input type="text" name="nama" placeholder="Nama User" class="input-control" required>
                   <input type="text" name="user" placeholder="Username" class="input-control" required>
                   <input type="text" name="pass" placeholder="Password" class="input-control" required>
                   <input type="text" name="tlp" placeholder="Nomor Telpon" class="input-control" required>
                   <input type="text" name="email" placeholder="E-mail" class="input-control" required>
                   <input type="text" name="almt" placeholder="Alamat" class="input-control" required>
                   <input type="submit" name="submit" value="Submit" class="btn">
               </form>
               <?php
                   if(isset($_POST['submit'])){
					   
					   $nama = ucwords($_POST['nama']);
					   $username = $_POST['user'];
					   $password = $_POST['pass'];
					   $telpon = $_POST['tlp'];
					   $mail = $_POST['email'];
					   $alamat = ucwords($_POST['almt']);
					   
					   $insert = mysqli_query($conn, "INSERT INTO tb_admin VALUES (
					                        null,
											'".$nama."',
											'".$username."',
											'".$password."',
											'".$telpon."',
											'".$mail."',
											'".$alamat."')
											
											");
						if($insert){
							echo '<script>alert("Registrasi berhasil")</script>';
							echo '<script>window.location="login.php"</script>';
						}else{
						    echo 'gagal '.mysqli_error($conn);
						}
						
					   }
			   ?>
            </div>
            
            </div>
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