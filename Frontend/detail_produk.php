<?php
    error_reporting(0);
    include '../backend/db.php';
    $kontak = mysqli_query($conn, "SELECT telp_admin, email_admin, alamat_admin FROM tb_admin WHERE id_admin = 1");
    $a = mysqli_fetch_object($kontak);

    $dproduk = mysqli_query($conn, "SELECT * FROM tb_produk WHERE id_produk = '".$_GET['id']."' ");
    $dp = mysqli_fetch_object($dproduk);
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
    <title>RStore</title>
</head>
<body>
    <header>
        <div class="header">
            <div class="container">
                <div class="nav">
                    <div class="brand">
                        <img src="image/logo.png" alt="">
                        <h1><a href="index.php" target="_blank">store</a></h1>
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
                <input type="text" name="search" placeholder="Cari Produk" class="inputsearch" value="<?php echo $_GET['search'] ?>">
                <input type="hidden" name="kat" value="<?php echo $_GET['kat'] ?>">
                <input type="submit" name="cari" value="Cari Produk" class="btnsearch">
            </form>
        </div>
    </div>
    </header>

    <div class="">
        <div class="">
            <div class="">
                <?php
                    if($_GET['search'] != '' || $_GET['kat'] != ''){
                        $where = "AND nama_produk LIKE '%".$_GET['search']."%' AND id_kategori LIKE '%".$_GET['kat']."%' ";
                    }
                    
                    $produk = mysqli_query($conn, "SELECT * FROM tb_produk WHERE status_produk = 1 $where ORDER BY id_produk DESC");
                    if(mysqli_num_rows($produk) > 0){
                        while($p = mysqli_fetch_array($produk)){
                ?>

                <?php }}else{ ?>
                    <p>Produk Tidak ada!</p>
                <?php } ?>
            </div>
        </div>
    </div>

    <div class="section">
        <div class="container">
            <h2><a>Detail Produk</a></h2>
            <div class="box">
                <div class="col-2">
                    <img src="../backend/produk/<?php echo $dp->gambar_produk ?>" width="100%">
                </div>
                <div class="col-2">
                    <h1><?php echo $dp->nama_produk ?></h1>
                    <h3>Rp. <?php echo number_format($dp->harga_produk) ?></h3>
                    <p><h4>Deskripsi</h4><br>
                    <?php echo $dp->deskripsi_produk ?>
                    </p> <br>
                    <h2>
                        <a href="https://api.whatsapp.com/send?phone=<?php echo $a->telp_admin?>&text=Hai, Saya tertarik dengan produk yang Anda jual!" target="_blank">Hubungi via WhatsApp</a>
                        <a><img src="image/wa.png" width="25px"></a>
                    </h2>
                </div>
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