<?php
    session_start();
    session_destroy();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logout</title>
    <!-- Tambahkan stylesheet atau style langsung di sini -->
    <style>
        body {
            background-color: #f5f5f5;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
            font-family: Arial, sans-serif;
        }

        .logout-container {
            text-align: center;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .logout-message {
            color: #333;
            font-size: 1.2em;
            margin-bottom: 20px;
        }

        .redirect-message {
            color: #555;
        }
    </style>
</head>
<body>
    <div class="logout-container">
        <p class="logout-message">Anda telah berhasil keluar.</p>
        <p class="redirect-message">Kembali ke halaman login...</p>
    </div>
    <?php
        echo '<script>
                setTimeout(function() {
                    window.location="login.php";
                }, 3000); // Redirect after 3 seconds
            </script>';
    ?>
</body>
</html>
