<?php
    include '../backend/db.php';
    $kontak = mysqli_query($conn, "SELECT telp_admin, email_admin, alamat_admin FROM tb_admin WHERE id_admin = 1");
    $a = mysqli_fetch_object($kontak);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="icon" type="image/png" sizes="16x16" href="image/favicon.png">
    <link rel="stylesheet" href="<link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">  
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">                                                                                                        
    <title>RStore</title>
</head>
<body>
    <header>
        <div class="header">
            <div class="container">
                <div class="nav">
                    <div class="brand">
                        <img src="image/logo.png" alt="">
                        <h1><a href="index.php" target="_blank">Store</a></h1>
                    </div>
                    <div class="navmenu">
                        <ul>
                            <li><a href="index.php">Home</a></li>
                            <li><a href="produk.php">Product</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

    <div class="search">
        <div class="container">
            <form action="produk.php">
                <input type="text" name="search" placeholder="Cari Produk" class="inputsearch">
                <input type="submit" name="cari" value="Cari Produk" class="btnsearch">
            </form>
        </div>
    </div>
    </header>

    <div class="hero">
        <div class="container">
            <div class="wrapper">
                <div class="hero-desc">
                    <h2>Get Our Gaming Laptop Promo Off Sale Up to 25%</h2>
                    <p>Pentingnya memiliki laptop yang terkadang tanpa disadari memang sudah tak bisa terhindarkan lagi, Perangkat satu ini sudah jamak ditemukan dalam keseharian kita.</p>
                    <a href="">Dapatkan disini</a>
                </div>
                <div class="hero-img">
                    <img src="image/gaming1.jpg" alt="" class="img-responsive">
                </div>
            </div>
        </div>
    </div>

    <div class="section">
        <div class="container">
            <h1><a>Kategori</a></h1>
            <div class="box">
                <?php
                    $kategori = mysqli_query($conn, "SELECT * FROM tb_kategori ORDER BY id_kategori DESC");
                    if(mysqli_num_rows($kategori)){
                        while($k = mysqli_fetch_array($kategori)){ 
                ?>
                    <a href="produk.php?kat=<?php echo $k['id_kategori'] ?>">
                    <div class="col-5">
                        <img src="image/category_icon.png" alt="" width="30%" style="margin-bottom: 5px;">
                        <h2><p><?php echo $k['nama_kategori'] ?></p></h2>
                    </div>
                    </a>
                <?php }}else{?>
                    <p>Kategori Tidak Ada!</p>
                <?php } ?>
            </div>
        </div>
    </div>

    <div class="section">
        <div class="container">
            <h1><a>Produk Terbaru</a></h1>
            <div class="box">
            <?php
                    $produk = mysqli_query($conn, "SELECT * FROM tb_produk WHERE status_produk = 1 ORDER BY id_produk DESC LIMIT 8 ");
                    if(mysqli_num_rows($produk) > 0){
                        while($p = mysqli_fetch_array($produk)){
                ?>
                    <a href="detail_produk.php?id= <?php echo $p['id_produk'] ?>">
                    <div class="col-4">
                        <img src="../backend/produk/<?php echo $p['gambar_produk'] ?>" alt="">
                        <p class="nama"><?php echo substr($p['nama_produk'], 0, 30) ?></p>
                        <p class="harga">Rp. <?php echo number_format($p['harga_produk']) ?> </p>
                    </div>
                    </a>
                <?php }}else{ ?>
                    <p>Produk Tidak ada!</p>
                <?php } ?>
            </div>
        </div>
    </div>

    <div class="footer">
        <div class="container">
            <div class="fcontainer">
                <h3>Alamat</h3>
                <p><?php echo $a->alamat_admin ?></p>
                <h3>Email</h3>
                <p><?php echo $a->email_admin ?></p>
                <h3>Nomer Admin</h3>
                <p><?php echo $a->telp_admin ?></p>
            </div>
        </div>
    </div>
</body>
</html>