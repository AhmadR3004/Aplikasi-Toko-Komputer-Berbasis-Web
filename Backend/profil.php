<?php
    session_start();
    include 'db.php';
    if($_SESSION['status_login'] != true){
        echo '<script>window.location="login.php"</script>';
    }

    $query = mysqli_query($conn, "SELECT * FROM tb_admin WHERE id_admin = '".$_SESSION['id']."' ");
    $d = mysqli_fetch_object($query);
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
    <title>Profil | RStore</title>
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
            <h3> Ubah Profil</h3>
            <div class="box">
                <form action="" method="post">
                    <input type="text" name="nama" placeholder="Nama Lengkap" class="input-control" value="<?php echo $d->nama_admin ?>" required>
                    <input type="text" name="user" placeholder="Username" class="input-control" value="<?php echo $d->username ?>" required>
                    <input type="text" name="hp" placeholder="Nomer Hp" class="input-control" value="<?php echo $d->telp_admin ?>" required>
                    <input type="text" name="email" placeholder="Email" class="input-control" value="<?php echo $d->email_admin ?>" required>
                    <input type="text" name="alamat" placeholder="Alamat" class="input-control" value="<?php echo $d->alamat_admin ?>" required>
                    <input type="submit" name="submit" value="Ubah Profil" class="btn">
                </form>
                <?php
                    if(isset($_POST['submit'])){

                        $nama   = ucwords($_POST['nama']);
                        $user   = $_POST['user'];
                        $hp     = $_POST['hp'];
                        $email  = $_POST['email'];
                        $alamat = ucwords($_POST['alamat']);

                        $update = mysqli_query($conn, "UPDATE tb_admin SET
                                                        nama_admin   = '".$nama."',
                                                        username     = '".$user."',
                                                        telp_admin   = '".$hp."',
                                                        email_admin  = '".$email."',
                                                        alamat_admin = '".$alamat."'
                                                        WHERE id_admin = '".$d->id_admin."' ");
                        if($update){
                            echo '<script>alert("Berhasil mengubah Profil!")</script>';
                            echo '<script>window.location="profil.php</script>';
                        }else{
                            echo '<script>alert("Gagal mengubah Profil!")</script>' .mysqli_error($conn);
                        }

                    }
                ?>
            </div>
        </div>
    </div>

    <div class="container">
            <h3>Ubah Password</h3>
            <div class="box">
                <form action="" method="post">
                    <input type="password" name="pass1" placeholder="Password Baru" class="input-control" required>
                    <input type="password" name="pass2" placeholder="konfirmasi Password" class="input-control" required>
                    <input type="submit" name="ubah_password" value="Ubah Password" class="btn">
                </form>
                <?php
                    if(isset($_POST['ubah_password'])){

                        $pass1 = $_POST['pass1'];
                        $pass2 = $_POST['pass2'];

                        if($pass2 != $pass1){
                            echo '<script>alert("Konfirmasi Password tidak sesuai!")</script>';
                        }else{

                            $u_pass = mysqli_query($conn, "UPDATE tb_admin SET
                                                        password = '".md5($pass1)."'
                                                        WHERE id_admin = '".$d->id_admin."' ");

                            if($u_pass){
                                echo '<script>alert("Berhasil mengubah Profil!")</script>';
                                echo '<script>window.location="profil.php</script>';
                            }else{
                                echo '<script>alert("Gagal mengubah Profil!")</script>' .mysqli_error($conn);
                            }

                        }
                        
                    }

                ?>
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