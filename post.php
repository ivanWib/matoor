<?php
session_start();
require_once 'utilities.php';

if (isset($_POST["post"])) {
    if (!isset($_SESSION["login"])) {
        echo "<script>
        alert('Login Dulu Brooo');
        document.location.href = 'index.php';
        </script>";
    } else if (postingan($_POST) > 0) {
        echo "<script>
                alert('Data telah ditambahkan');
                document.location.href = 'index.php';
            </script>";
    } else {
        echo mysqli_error($connect);
    }
}

$tanggal = date("d M Y");

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
    <title>Post</title>
</head>

<body style="background-color:#010409" class="d-flex justify-content-center">
    <div id="BUNGKUS" class="container d-flex flex-column align-items-center">
        <div id="navbar" class="navbar fixed-top d-flex justify-content-between">
            <div class="container">
                <div>
                    <a style="text-decoration:none; color:#C8CDD1" href="index.php">
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
                    <input type="hidden" name="tanggal" value="<?= $tanggal ?>">
                    <div class="form-group p-1">
                        <textarea class="form-control mt-3" style="border-radius:10px" name="content"
                            placeholder="Post Your Matoor"></textarea>
                    </div>
                    <div class="form-group p-1">
                        <label for="nama-category">Topic</label>
                        <select class="form-control" name="category" required>
                            <option value=""> -- Topic -- </option>
                            <option value="php">PHP</option>
                            <option value="python">Python</option>
                            <option value="javascript">R</option>
                            <option value="c">C</option>
                            <option value="java">Java</option>
                            <option value="sql">SQL</option>
                            <option value="kotlin">Kotlin</option>
                            <option value="prolog">Prolog</option>
                            <option value="ruby">Ruby</option>
                            <option value="jaksel script">Jaksel Script</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary mt-2 d-grid justify-content-center w-100"
                            style="border-radius:10px" name="post">
                            Post
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