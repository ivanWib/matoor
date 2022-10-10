<?php
session_start();
require "utilities.php";

if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}

$id = $_GET["id"];
$data = query("SELECT * FROM users WHERE id_user = $id")[0];


if (isset($_POST["change"])) {
    if (edit($_POST) > 0) {
        echo "<script>
                alert('Data berhasil diubah!');
                document.location.href = 'index.php';
            </script>";
    } else {
        echo "<script>
                alert('Data gagal diubah!');
                document.location.href = 'index.php';
            </script>";
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
    <title>Profile</title>
</head>

<body>
    <h1>Edit Profile</h1>

    <div>
        <form action="" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="foto_lama" value="<?= $data["foto"] ?>">
            <img src="foto/<?= $data["foto"]; ?>" alt="foto" width="100" />
            <br>
            <input class="mt-2" type="file" name="foto" value="<?= $data["foto"]; ?>">
            <br>
            <br>
            <input type="text" name="username" value="<?= $data["username"]; ?>" />
            <br>
            <input type="text" name="namalengkap" placeholder="Nama Lengkap" value="<?= $data["nama_lengkap"]; ?>" />
            <br>
            <input type="text" name="email" value="<?= $data["email"]; ?>" />
            <br>
            <button class="mt-2" type="submit" name="change">Change</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js"
        integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous">
    </script>
</body>

</html>