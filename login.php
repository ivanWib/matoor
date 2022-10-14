<?php
session_start();
require "utilities.php";

global $connect;
if (isset($_POST["login"])) {
    $username = htmlspecialchars(mysqli_real_escape_string($connect, $_POST["username"]));
    $password = htmlspecialchars(mysqli_real_escape_string($connect, $_POST["password"]));

    $hasil = mysqli_query($connect, "SELECT * FROM users WHERE username = '$username'");

    if (mysqli_num_rows($hasil) === 1) {
        $row = mysqli_fetch_assoc($hasil);

        if (password_verify($password, $row["password"])) {
            if ($row["status"] == "active" || $row["status"] == "admin") {
                $_SESSION["login"] = true;
                $_SESSION["id_user"] = $row["id_user"];
                header("Location: index.php");
                exit;
            } else {
                echo "<script>
                        alert('Akun Anda di banned');
                        document.location.href = 'login.php';
                    </script>";
            }
        }
    }
    $error = true;
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

    <title>Login</title>
</head>

<body style="background-color:#010409"
    class="d-flex position-absolute top-50 start-50 translate-middle justify-content-center">
    <div class="card" style="background-color:#C8CDD1; border-radius:15px; width: 18rem;">
        <img src="foto/banner.png" class="card-img-top" alt="...">
        <div class="card-body">
            <form action="" method="post">
                <div>
                    <div class="form-group mt-3">
                        <input type="text" class="form-control" name="username" placeholder="Username">
                    </div>
                    <div class="form-group mt-3">
                        <input type="password" class="form-control" name="password" placeholder="Password">
                    </div>
                    <div>
                        <a href="forgot_password.php" class="mt-2 d-grid justify-content-end">Forgot Password?</a>
                    </div>
                    <div class="form-group ">
                        <button type="submit" class="btn btn-primary mt-4 d-grid justify-content-center w-100"
                            name="login">Login</button>
                    </div>
                    <div class="mt-3 d-grid justify-content-center">
                        <span>Don't have an account?</span>
                        <a href="register.php" class="d-grid justify-content-center">Register Now!</a>
                    </div>
                    <div class="mt-1 d-grid justify-content-center">
                        <span>Login as a guest?</span>
                        <a href="index.php" class="d-grid justify-content-center">Click Here!</a>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js"
        integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous">
    </script>
</body>

</html>

</html>