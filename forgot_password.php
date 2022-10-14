<?php
require 'utilities.php';

if (isset($_POST["change"])) {
    if (forgot_password($_POST) > 0) {
        echo "<script>
                alert('Password Berhasil Diubah');
                document.location.href = 'login.php';
            </script>";
    } else {
        echo "<script>
                alert('Password Gagal Diubah');
                document.location.href = 'forgot_password.php';
            </script>";
        echo mysqli_error($connect);
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Secular+One&display=swap" rel="stylesheet">
    <title>Forget Password</title>
</head>

<body style="background-color:#010409" class="d-flex justify-content-center">
    <div id="BUNGKUS" class="container d-flex flex-column align-items-center">
        <div id="navbar" class="navbar fixed-top d-flex justify-content-between">
            <div class="container">
                <div>
                    <a style="text-decoration:none; color:#C8CDD1" href="login.php">
                        <iconify-icon icon="akar-icons:arrow-back-thick-fill" width="30" height="30"></iconify-icon>
                    </a>
                </div>
            </div>
        </div>
        <div class="w-25 card d-flex justify-content-center position-absolute top-50 start-50 translate-middle"
            style="background-color:#C8CDD1; border-radius:15px; width: 18rem;">
            <img src="foto/banner.png" class="card-img-top" alt="...">
            <div class="p-4">
                <form action="" method="post">
                    <div class="d-flex justify-content-center mb-0">
                        <h5>Forgot Password</h5>
                    </div>
                    <div class="form-group mt-3">
                        <input type="email" class="form-control" name="email" placeholder="Email">
                    </div>
                    <div class="form-group mt-3">
                        <input type="password" class="form-control" name="password" placeholder="Password">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary mt-4 d-grid justify-content-center w-100"
                            style="border-radius:10px" name="change">
                            Change Password
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://code.iconify.design/iconify-icon/1.0.1/iconify-icon.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js"
        integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous">
    </script>

</body>

</html>