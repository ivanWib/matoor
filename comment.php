<?php
session_start();
require 'utilities.php';

// if (!isset($_SESSION["login"])){
//     echo "<script>
//     alert('Login Dulu Brooo');
//     document.location.href = 'index.php';
//     </script>";
// }

if (isset($_POST["comment"])) {
    if (!isset($_SESSION["login"])){
        echo "<script>
        alert('Login Dulu Brooo');
        document.location.href = 'index.php';
        </script>";
    } else if (comment($_POST) > 0) {
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
    <div id="BUNGKUS" class="container d-flex flex-column align-items-center">
        <div id="NAVBAR" class="d-flex justify-content-between">
            <a href="index.php"><h1>balik bos</h1></a>
            <h1>ini untuk navbar</h1>
        </div>
        <div id="CONTENT">
            <div id="POSTINGAN" class="d-flex flex-column align-items-center">
                <div class="card p-4" style="width:600px; border-radius:20px;">
                    <div class="d-flex">
                        <img style="width:50px" class="card-img-top rounded-circle" src="foto/<?= $user[0]["foto"] ?>" alt="foto" width="100" />
                        <div class="d-flex align-items-center ml-3">
                            <h4><?= $user[0]["username"] ?></h4>
                        </div>
                    </div>
                    <div class="mt-3 d-flex flex-column">
                        <div class="card p-3 shadow p-3 mb-3 bg-body" style="border-radius:15px;">
                            <p><?= $add[0]["content"]; ?></p>
                            <p class="text-uppercase mb-0">#<?= $add[0]["category"]; ?></p>
                        </div>
                        <div class="d-flex align-items-center ml-2 mt-2">
                            <iconify-icon icon="fontisto:like" width="30" height="30"></iconify-icon>
                            <p style="font-size:20px" class="mb-0 ml-2"><?= $like[0]["likes"] ?></p>
                            <iconify-icon class="ml-2" icon="heroicons:chat-bubble-oval-left-ellipsis-solid" width="30" height="30">
                            </iconify-icon>
                            <p style="font-size:20px" class="mb-0 ml-2"><?= $jumlahcom[0]["jumlahcom"] ?></p>
                        </div>
                    </div>
                    <div id="COMMENT INPUT">
                        <form action="" method="post">
                            <input type="hidden" name="id" value="<?= $id ?>">
                            <div class="form-group p-1">
                                <textarea class="form-control mt-3" style="border-radius:10px" name="content" placeholder="Reply Your Matoor"></textarea>
                                <button type="submit" class="btn btn-primary mt-2" style="border-radius:10px" name="comment">Post</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div id="COMMENT">
                <h1>ini untuk nampilin comment</h1>
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