<?php
    session_start();
    include 'db.php';
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
    <title>Data Kategori | RStore</title>
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
            <h3>Data Kategori</h3>
            <div class="box">
                <p><a href="tambah_kategori.php" class="btn-tambah">Tambah Data</a></p>
                <table border="1" cellspacing="0" class="table">
                    <thead>
                        <tr>
                            <th width="60px">No</th>
                            <th>Kategori</th>
                            <th width="150px">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                            $kategori = mysqli_query($conn, "SELECT * FROM tb_kategori ORDER BY id_kategori DESC");
                            if(mysqli_num_rows($kategori) > 0){
                            while($row = mysqli_fetch_array($kategori)){

                            
                        ?>
                        <tr>
                            <td> <?php echo $no++ ?> </td>
                            <td> <?php echo $row['nama_kategori'] ?> </td>
                            <td>
                                <a href="edit_kategori.php?id=<?php echo $row['id_kategori'] ?>" class="btn-tambah">Edit</a> ||
                                <a href="hapus_kategori.php?idk=<?php echo $row['id_kategori'] ?>" onclick="return confirm('Yakin ingin hapus ?')" class="btn-tambah">Hapus</a>
                            </td>
                        </tr>
                        <?php }}else{ ?>
                            <tr>
                                <td colspan="7">Tidak ada data</td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
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