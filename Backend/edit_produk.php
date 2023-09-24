<?php
    session_start();
    include 'db.php';
    if($_SESSION['status_login'] != true){
        echo '<script>window.location="login.php"</script>';
    }

    $produk = mysqli_query($conn, "SELECT * FROM tb_produk WHERE id_produk = '".$_GET['id']."' ");
    if(mysqli_num_rows($produk) == 0){
        echo '<script>window.location="data_produk.php"</script>';
    }
    $p = mysqli_fetch_object($produk);
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
    <script src="https://cdn.ckeditor.com/4.20.1/standard/ckeditor.js"></script>
    <title>Tambah Data Produk | RStore</title>
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
            <h3>Edit Data Produk</h3>
            <div class="box">
                <form action="" method="post" enctype="multipart/form-data">
                    <select name="kategori" class="input-control" required>
                        <option value="">--Pilih--</option>
                    <?php
                        $kategori = mysqli_query($conn, "SELECT * FROM tb_kategori ORDER BY id_kategori DESC");
                        while($r = mysqli_fetch_array($kategori)){
                    ?>
                        <option value="<?php echo $r['id_kategori'] ?>" <?php echo($r['id_kategori'] == $p->id_kategori)? 'selected':'' ?>><?php echo $r['nama_kategori'] ?></option>
                    <?php } ?>
                    </select>
                    <input type="text" name="nama" class="input-control" placeholder="Nama Produk" value="<?php echo $p->nama_produk ?>" required>
                    <input type="text" name="harga" class="input-control" placeholder="Harga" value="<?php echo $p->harga_produk ?>" required>
                    <img src="produk/<?php echo $p->gambar_produk ?>" width="100px">
                    <input type="hidden" name="foto" value="<?php echo $p->gambar_produk ?>">
                    <input type="file" name="gambar" class="input-control">
                    <textarea name="deskripsi" class="input-control" placeholder="Deskripsi"><?php echo $p->deskripsi_produk ?></textarea><br>
                    <select class="input-control" name="status">
                        <option value="">--Pilih--</option>
                        <option value="1" <?php echo ($p->status_produk == 1)? 'selected':''?>>Aktif</option>
                        <option value="0" <?php echo ($p->status_produk == 0)? 'selected':''?>>Tidak Aktif</option>
                    </select>
                    <input type="submit" name="submit" value="Submit" class="btn">
                </form>
                <?php
                    if(isset($_POST['submit'])){

                        // data inputan dari form
                        $kategori  = $_POST['kategori'];
                        $nama      = $_POST['nama'];
                        $harga     = $_POST['harga'];
                        $deskripsi = $_POST['deskripsi'];
                        $status    = $_POST['status'];
                        $foto      = $_POST['foto'];

                        // data gambar yang baru
                        $filename = $_FILES['gambar']['name'];
                        $tmp_name = $_FILES['gambar']['tmp_name'];

                        // jika admin ganti gambar
                        if($filename != ''){
                            $type1 = explode('.', $filename);
                            $type2 = $type1[1]; //1 untuk format file

                            $newname = 'produk'.time().'.'.$type2;

                            //menampung data format file yang diizinkan
                            $tipe_diizinkan = array('jpg','jpeg','png','gif');

                            //membuat validasi file
                        if(!in_array($type2, $tipe_diizinkan)){
                            //jika format file tidak ada di dalam tipe diizinkan
                            echo '<script>alert("Format file tidak diizinkan!")</script>';
                        
                        }else{
                            unlink('./produk/'.$foto);
                            move_uploaded_file($tmp_name, './produk/'.$newname);
                            $namagambar = $newname;
                            }   

                        }else{
                            // jika admin tidak ganti gambar
                            $namagambar = $foto;
                            }
                        

                        // query update data produk
                        $update = mysqli_query($conn, "UPDATE tb_produk SET
                                                id_kategori      = '".$kategori."',
                                                nama_produk      = '".$nama."',
                                                harga_produk     = '".$harga."',
                                                deskripsi_produk = '".$deskripsi."',
                                                gambar_produk    = '".$namagambar."',
                                                status_produk    = '".$status."'
                                                WHERE id_produk  = '".$p->id_produk."'  ");

                                                if($update){
                                                    echo '<script>alert("Edit data berhasil")</script>';
                                                    echo '<script>window.location="data_produk.php"</script>';
                                                }else{
                                                    echo 'gagal' .msyqli_error($conn);
                                                }

                    }
                ?>
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
    <script>
        CKEDITOR.replace( 'deskripsi' );
    </script>
</body>
</html>