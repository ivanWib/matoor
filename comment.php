<?php
session_start();
require 'utilities.php';

if (isset($_POST["comment"])) {
    if (comment($_POST) > 0) {
        echo "<script>
                alert('Data telah ditambahkan');
                document.location.href = 'index.php';
            </script>";
    } else {
        echo mysqli_error($connect);
    }
}
$id = $_GET["id"];
$add = query("SELECT * FROM posts WHERE id_post = $id");
$user = query("SELECT * FROM users WHERE id_user = " . $add[0]["id_user"]);
$like = query("SELECT COUNT(id_user) 'likes' FROM likes_post WHERE id_post = " . $add[0]["id_post"]);
$jumlahcom = query("SELECT COUNT(id_comment) 'jumlahcom' FROM comments WHERE id_post = " . $add[0]["id_post"]);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Comment</title>
</head>

<body>
    <div class="d-flex flex-column align-items-center">
        <div id="post" class="w-50">
            <h1>Coments</h1>
            <div class="d-flex flex-column gap-2">
                <div class="d-flex flex-row gap-2">
                    <div class="card w-50 p-3">
                        <div class="d-flex">
                            <img src="foto/<?= $user[0]["foto"] ?>" alt="foto" width="100" />
                            <div class="d-flex justify-content-center">
                                <h3><?= $user[0]["username"] ?></h3>
                            </div>
                        </div>
                        <div class="d-flex justify-content-space-between">
                            <div class="w-75">
                                <p><?= $add[0]["content"]; ?></p>
                                <p>#<?= $add[0]["category"]; ?></p>
                            </div>
                            <div class="w-25 d-flex flex-column align-items-end">
                                <iconify-icon icon="fontisto:like" width="30" height="30"></iconify-icon>
                                <p><?= $like[0]["likes"] ?></p>
                            </div>
                            <div class="w-25 d-flex flex-column align-items-end">
                                <iconify-icon icon="heroicons:chat-bubble-oval-left-ellipsis-solid" width="30" height="30">
                                </iconify-icon>
                                <p><?= $jumlahcom[0]["jumlahcom"] ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="w-50">
            <div class="justify-content-center">
                <h2 class="text-capitalize">Comment</h2>
            </div>
            <div class="card w-50">
                <form action="" method="post">
                    <input type="hidden" name="id" value="<?= $id ?>">
                    <div class="form-group mt-3 p-3">
                        <label for="nama-content">Comment</label>
                        <textarea class="form-control" name="content"></textarea>
                    </div>
                    <div class="form-group p-3">
                        <button type="submit" class="btn btn-primary" name="comment">Post</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://code.iconify.design/iconify-icon/1.0.1/iconify-icon.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous">
    </script>
</body>

</html>