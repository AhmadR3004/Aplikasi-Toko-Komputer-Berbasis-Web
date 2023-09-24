<?php
    session_start();
    if($_SESSION['status_login'] != true){
        echo '<script>window.location="login.php"</script>';
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet">
    <title>Dashboard | RStore</title>
</head>
<body>
    <header>
        <div class="container">
            <div class="nav">
                <div class="brand">
                <img src="image/logo.png" alt="">
                <h1><a href="../frontend/index.php" target="_blank">store</a></h1>
                </div>
                <ul>
                    <li><a href="dashboard.php">dashboard</a></li>
                    <li><a href="profil.php">profil</a></li>
                    <li><a href="data_kategori.php">data kategori</a></li>
                    <li><a href="data_produk.php">data produk</a></li>
                    <li><a href="keluar.php" onclick="return confirm('Yakin ingin Keluar?')">keluar</a></li>
                </ul>
            </div>
        </div>
    </header>

    <div class="konten">
        <div class="container">
            <h3>Dashboard</h3>
            <div class="box">
                <h4>Selamat datang <?php echo $_SESSION['a_global']->nama_admin ?> di Dashboard RStore</h4>
            </div>
        </div>
    </div>

    <div class="footer">
        <div class="container">
            <small>
                copyright &copy; 2022 - RStore
            </small>
        </div>
    </div>
</body>
</html>