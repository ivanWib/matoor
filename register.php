<?php
require 'utilities.php';

if (isset($_POST["registrasi"])) {
    if (registration($_POST) > 0) {
        echo "<script>
                alert('Registrasi Berhasil');
                document.location.href = 'login.php';
            </script>";
    } else {
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

    <title>Register</title>
</head>

<body>
    <div class="card" style="width: 18rem;">
        <img src="https://cdn.discordapp.com/attachments/1028895661753651332/1028940958928216065/Untitled_design.png"
            class="card-img-top" alt="">
        <div class="card-body">
            <form action="" method="post">
                <div>
                    <div class="form-group mt-3">
                        <input type="text" class="form-control" name="username" placeholder="Username">
                    </div>
                    <div class="form-group mt-3">
                        <input type="email" class="form-control" name="email" placeholder="Email">
                    </div>
                    <div class="form-group mt-3">
                        <input type="password" class="form-control" name="password" placeholder="Password">
                    </div>
                    <div class="form-group mt-3">
                        <input type="password" class="form-control" name="confirm_password"
                            placeholder="Confirm Password">
                    </div>
                    <div class="form-group ">
                        <button type="submit" name="registrasi"
                            class="btn btn-primary mt-4 d-grid justify-content-center w-100">Register</button>
                    </div>
                    <div class="mt-3 d-grid justify-content-center">
                        <span>have an account already?</span>
                        <a href="index.php" class="d-grid justify-content-center">Sign In</a>
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