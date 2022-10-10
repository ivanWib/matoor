<?php
session_start();
require "utilities.php";

if ($_SESSION["login"] == false) {
    header("Location: login.php");
    exit;
}
$data = query("SELECT * FROM users WHERE id_user = $_SESSION[id_user]")[0];
// $posts = query("SELECT * FROM")
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Secular+One&display=swap" rel="stylesheet">
    <title>Login</title>
</head>

<body>
    <div class="d-flex">
        <div id="profile" class="w-50">
            <h1>Ini Home Page</h1>
            <h2><a href="login.php">Login</a></h2>
            <h2><a href="post.php">Matoor</a></h2>
            <h2><a href="logout.php">Logout</a></h2>
            <div>
                <h1>Profile</h1>
                <div class="d-flex flex-row gap-2">
                    <div class="w-auto">
                        <img src="foto/<?= $data["foto"]; ?>" alt="foto" width="100" />
                    </div>
                    <div class="d-flex align-items-center w-50">
                        <h2><?= $data["username"]; ?></h2>
                    </div>
                </div>
                <br>
                <div>
                    <h3>
                        <a href="edit_profile.php?id=<?= $data['id_user'] ?>">Edit Profile</a>
                    </h3>
                </div>
            </div>
        </div>
        <div id="post" class="w-50">
            <h1>POST</h1>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous">
    </script>
</body>

</html>

</html>