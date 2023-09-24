<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="login.css">
    <link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet">
    <title>Login | RStore</title>
</head>
<body id="bg-login">
    <div class="box-login">
        <h2>Dashboard RStore</h2>
        <h2>Login Admin</h2>
        <form method="post" class="main">
            <input type="text" name="user" placeholder="Username" class="input-control">
            <input type="password" name="pass" placeholder="Password" class="input-control">
            <button type="submit" name="submit" class="btn">Login</button>
        </form>
        <?php
            if(isset($_POST['submit'])){
                session_start();
                include 'db.php'; 
            
                $username = mysqli_real_escape_string($conn, $_POST['user']);
                $password = mysqli_real_escape_string($conn, $_POST['pass']);
            
                $cek = mysqli_query($conn, "SELECT * FROM tb_admin WHERE username = '$username' AND password = md5('$password')");
                if(mysqli_num_rows($cek) == 1){
                    $d = mysqli_fetch_object($cek);
                    $_SESSION['status_login'] = true;
                    $_SESSION['a_global'] = $d;
                    $_SESSION['id'] = $d->id_admin;
                    echo '<script>window.location="dashboard.php"</script>';
                }else{
                    echo '<script>alert("Mohon masukkan Username dan Password yang benar!")</script>';
                    }
            }
        ?>
    </div>
</body>
</html>