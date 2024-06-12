<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<style>
     body{
            background: linear-gradient(135deg, #71b7e6, #9b59b6);
            color: #000000;
            font-family: Verdana;
            font-size: 12px;
        }

        .main{
            height: 100vh;
        }

        .login-box{
            width: 500px;
            height: 300px;
            box-sizing: border-box;
            border-radius: 10px;
        }
</style>
<body>
<div class="main d-flex flex-column justify-content-center align-items-center">
        <div class="login-box p-5 shadow">

            <form action="" method="post">
                <div>
                    <label for="username">Username</label>
                    <input type="text" class="form-control" name="username" id="username">
                </div>
                <div>
                    <label for="password">Password</label>
                    <input type="password" class="form-control" name="password" id="password">
                </div>
                <div>
                    <button class="btb btn-success form-control mt-3" type="submit" name="submit">Login</button>
                </div>
            </form>
            <?php
                if(isset($_POST['submit'])){
                    session_start();
                    include 'db.php';

                    $username = $_POST['username'];
                    $password = $_POST['password'];

                    $cek = mysqli_query($conn, "SELECT * FROM tb_admin WHERE username = '".$username."' AND password = '".MD5($pass)."'");
                    if(mysqli_num_rows($cek) > 0){
                        $d = mysqli_fetch_object($cek);
                        $_SESSION['status_login'] = true;
                        $_SESSION['a_global'] = $d;
                        $_SESSION['id'] = $d->admin_id;
                        echo '<script>window.location="dashboard.php"</script>';
                    } else {
                        echo '<script>alert("Username atau Password salah")</script>';
                    }
                }
            ?>
        </div>
       
</div>
</body>
</html>