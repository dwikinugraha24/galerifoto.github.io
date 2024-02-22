<?php
error_reporting(0);
include 'db.php';
$kontak = mysqli_query($conn, "SELECT admin_telp, admin_email, admin_address FROM tb_admin WHERE admin_id = 2");
$a = mysqli_fetch_object($kontak);

$produk = mysqli_query($conn, "SELECT * FROM tb_image WHERE image_id = '" . $_GET['id'] . "' ");
$p = mysqli_fetch_object($produk);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>WEB Galeri Foto</title>
    <link rel="stylesheet" type="text/css" href="css/stylee.css">
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
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

        header .title {
            display: flex;
            align-items: center;
        }

        header .logo {
            width: 50px;
            margin-right: 10px;
        }

        header h1 {
            margin: 0;
        }

        .section {
            padding: 20px 0;
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

        .col-2 img {
            max-width: 100%;
            border-radius: 8px;
        }

        .deskripsi {
            margin-top: 20px;
        }

        .deskripsi h3,
        .deskripsi h4 {
            margin: 0;
        }

        .user-info {
            margin-top: 10px;
        }

        .user-info p {
            margin: 5px 0;
        }

        .description {
            margin-top: 15px;
        }

        .description p {
            margin: 5px 0;
        }

        footer {
            padding: 25px 0;
            background-color: #333;
            color: #fff;
            text-align: center;
        }

        footer small {
            margin-top: 25px;
            display: inline-block;
        }

        .post {
            background-color: #fff;
            border: 1px solid #ccc;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            margin-top: 20px;
        }

        .actions {
            display: flex;
            justify-content: space-between;
            margin-top: 15px;
        }

        .like-btn {
            background-color: transparent;
            border: none;
            cursor: pointer;
            font-size: 20px;
        }

        .liked {
            color: #ff5252;
        }

        .comment-btn {
            font-size: 20px;
            cursor: pointer;
        }

        .comments {
            margin-top: 15px;
        }

        .comment {
            background-color: #f0f0f0;
            padding: 10px;
            border-radius: 4px;
            margin-bottom: 10px;
        }
    </style>
</head>

<body>
    <!-- header -->
    <header>
        <div class="container">
            <div class="title">
                <img src="img/logo-dwiki.png" alt="Logo" class="logo">
                <h1>GALERI FOTO</h1>
            </div>
        </div>
    </header>

    <!-- product detail -->
    <div class="section">
        <div class="container">
            <h3>Detail Foto</h3>
            <div class="box">
                <div class="col-2">
                    <img src="foto/<?php echo $p->image ?>" alt="Image" />
                </div>

                <div class="deskripsi">
                    <h3><?php echo $p->image_name ?></h3>
                    <h4>Kategori: <?php echo $p->category_name ?></h4>
                    <div class="user-info">
                        <p>Nama User: <?php echo $p->admin_name ?></p>
                        <p>Upload Pada Tanggal: <?php echo $p->date_created ?></p>
                    </div>
                    <div class="description">
                        <p>Deskripsi:</p>
                        <p><?php echo $p->image_description ?></p>
                    </div>
                </div>
            </div>

            <style>
        .liked {
            color: red;
        }
        .comment {
            margin-bottom: 5px;
        }
    </style>
</head>
<body>

<div class="post">
    <div class="actions">
        <div class="like-comment">
            <button class="like-btn" onclick="toggleLike()">&#x2764;</button>
            <span id="likeCount">0 likes</span>
        </div>
        <div class="comment-btn" onclick="showCommentForm()">💬</div>
    </div>
    <div class="comments" id="commentsSection">
        <!-- Comment Section -->
        <!-- You can dynamically add comments using JavaScript -->
    </div>
    <div class="comment-form" id="commentForm">
        <form onsubmit="addCommentFromForm(event)">
            <textarea id="commentText" placeholder="Add your comment"></textarea>
            <button type="submit">kirim</button>
        </form>
    </div>
</div>

<!-- footer -->
<footer>
    <div class="container">
        <small>Copyright &copy; 2024 - Web Galeri Foto.</small>
    </div>
</footer>

<script>
    var likeCount = 0;

    function toggleLike() {
        var likeButton = document.querySelector('.like-btn');
        likeButton.classList.toggle('liked');

        likeCount += likeButton.classList.contains('liked') ? 1 : -1;
        document.getElementById('likeCount').textContent = likeCount + (likeCount === 1 ? ' like' : ' likes');
    }

    function showCommentForm() {
        var commentForm = document.getElementById('commentForm');
        commentForm.style.display = 'block';
    }

    function addCommentFromForm(event) {
        event.preventDefault();
        var commentText = document.getElementById('commentText').value;
        if (commentText !== null && commentText !== '') {
            addComment(commentText);
            document.getElementById('commentText').value = ''; // Mengosongkan input setelah menambahkan komentar
            hideCommentForm();
        }
    }

    function addComment(commentText) {
        var commentsSection = document.getElementById('commentsSection');
        var newComment = document.createElement('div');
        newComment.classList.add('comment');
        newComment.textContent = commentText;
        commentsSection.appendChild(newComment);
    }

    function hideCommentForm() {
        var commentForm = document.getElementById('commentForm');
        commentForm.style.display = 'none';
    }
</script>

</body>

</html>
