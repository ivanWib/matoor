<?php
session_start();
require_once 'utilities.php';

if (isset($_POST["post"])) {
    if (postingan($_POST) > 0) {
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Post</title>
</head>

<body>
    <div id="container" class="d-flex flex-column align-items-center">
        <div id="navbar" class="navbar fixed-top d-flex justify-content-between">
            <div class="container">
                <div>
                    <a href="index.php">
                        <iconify-icon icon="akar-icons:arrow-back-thick-fill" width="30" height="30"></iconify-icon>
                    </a>
                </div>
            </div>
        </div>
        <div id="form" class="mt-5 w-50">
            <div class="container card mt-4 w-50" style="border-radius:15px">
                <form action="" method="post">
                    <input type="hidden" name="tanggal" value="<?= $tanggal ?>">
                    <div class="form-group p-1">
                        <textarea class="form-control mt-3" style="border-radius:10px" name="content" placeholder="Post Your Matoor"></textarea>
                    </div>
                    <div class="form-group p-1">
                        <label for="nama-category">Topic</label>
                        <select class="form-control" name="category" required>
                            <option value=""> -- Topic -- </option>
                            <option value="php">PHP</option>
                            <option value="python">PYTHON</option>
                            <option value="javascript">JAVASCRIPT</option>
                            <option value="c++">C++</option>
                            <option value="c#">C#</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary mt-2" style="border-radius:10px" name="post">
                            Post
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- <div class="justify-content-center">
        <h2 class="text-capitalize">Post</h2>
    </div>
    <div class="container">
        <form action="" method="post">
            <input type="hidden" name="tanggal" value="<?= $tanggal ?>">
            <div class="form-group mt-3">
                <label for="nama-category">Topic</label>
                <select class="form-control" name="category" required>
                    <option value=""> -- Topic -- </option>
                    <option value="php">PHP</option>
                    <option value="python">PYTHON</option>
                    <option value="javascript">JAVASCRIPT</option>
                    <option value="c++">C++</option>
                    <option value="c#">C#</option>
                </select>
            </div>
            <div class="form-group mt-3">
                <label for="nama-content">Comment</label>
                <textarea class="form-control" name="content"></textarea>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary" name="post">Post</button>
            </div>
        </form>
    </div> -->

    <script src="https://code.iconify.design/iconify-icon/1.0.1/iconify-icon.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js"
        integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous">
    </script>
</body>

</html>