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
            <h3> Tambah Data Produk</h3>
            <div class="box">
                <form action="" method="post" enctype="multipart/form-data">
                    <select name="kategori" class="input-control" required>
                        <option value="">--Pilih--</option>
                    <?php
                        $kategori = mysqli_query($conn, "SELECT * FROM tb_kategori ORDER BY id_kategori DESC");
                        while($r = mysqli_fetch_array($kategori)){
                    ?>
                        <option value="<?php echo $r['id_kategori'] ?>"><?php echo $r['nama_kategori'] ?></option>
                    <?php } ?>
                    </select>
                    <input type="text" name="nama" class="input-control" placeholder="Nama Produk" required>
                    <input type="text" name="harga" class="input-control" placeholder="Harga" required>
                    <input type="file" name="gambar" class="input-control" required>
                    <textarea name="deskripsi" class="input-control" placeholder="Deskripsi"></textarea><br>
                    <select class="input-control" name="status">
                        <option value="">--Pilih--</option>
                        <option value="1">Aktif</option>
                        <option value="0">Tidak Aktif</option>
                    </select>
                    <input type="submit" name="submit" value="Submit" class="btn">
                </form>
                <?php
                    if(isset($_POST['submit'])){

                        // print_r($_FILES['gambar']);
                        // menampung inputan dari form
                        $kategori  = $_POST['kategori'];
                        $nama      = $_POST['nama'];
                        $harga     = $_POST['harga'];
                        $deskripsi = $_POST['deskripsi'];
                        $status    = $_POST['status'];

                        //menampung data file yang di upload
                        $filename = $_FILES['gambar']['name'];
                        $tmp_name = $_FILES['gambar']['tmp_name'];

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
                            //jika format file sesuai dengan yang ada di dalam array tipe yang diizinkan
                            // proses upload file sekaligus insert ke database
                            move_uploaded_file($tmp_name, './produk/'.$newname);

                            $insert = mysqli_query($conn, "INSERT INTO tb_produk VALUES (
                                null,
                                '".$kategori."',
                                '".$nama."',
                                '".$harga."',
                                '".$deskripsi."',
                                '".$newname."',
                                '".$status."',
                                null
                                )");

                            if($insert){
                                echo '<script>alert("Tambah data berhasil")</script>';
                                echo '<script>window.location="data_produk.php"</script>';
                            }else{
                                echo 'gagal' .msyqli_error($conn);
                            }

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