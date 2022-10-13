<?php
session_start();
require "utilities.php";

if (isset($_SESSION["login"])) {
    $data = query("SELECT * FROM users WHERE id_user = $_SESSION[id_user]")[0];
} else {
    $data = array(
        "foto" => "default.png",
        "username" => "Guest",
        "nama_lengkap" => "Login dulu benk:v",
        "id_user" => 0
    );
}
$add = query("SELECT * FROM posts WHERE id_user = $_SESSION[id_user]");

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
    <title>Matoor</title>
</head>

<body style="background-color:#010409">
    <div id="container" class="d-flex flex-column align-items-center">
        <div id="navbar" class="navbar fixed-top d-flex justify-content-between">
            <div class="container d-flex justify-content-end gap-4">
                <div>
                    <a style="text-decoration:none; color:#C8CDD1" href="index.php">
                        <iconify-icon icon="bxs:home-alt-2" width="30" height="30"></iconify-icon>
                    </a>
                </div>
                <?php if (!isset($_SESSION["login"])) { ?>
                <div>
                    <a class="d-flex" style="text-decoration:none; color:#C8CDD1" href="login.php">
                        <iconify-icon class="d-flex align-items-center" icon="clarity:login-solid" width="30" height="30"></iconify-icon>
                        <h4 class="mb-0">Login</h4>
                    </a>
                </div>
                <?php } else { ?>
                    <div>
                        <a class="d-flex" style="text-decoration:none; color:#C8CDD1" href="logout.php">
                            <iconify-icon class="d-flex align-items-center" icon="clarity:logout-solid" width="30" height="30"></iconify-icon>
                            <h4 class="mb-0">Logout</h4>
                        </a>
                    </div>
                <?php } ?>
            </div>
        </div>
        <div id="body" style="height:570px; width:1200px; margin-top:80px; background-color:#21262D; color:#F9F8F8" class="card overflow-auto">
            <div id="content" class="d-flex flex-row w-100">
                <div id="PROFILE" class="w-25 d-flex justify-content-center position-fixed">
                    <div style="height:350px; background-color:#161B22; color:#C8CDD1" class="w-75 mt-5 card d-flex flex-column align-items-center shadow p-3 mb-3">
                        <img class="card-img-top rounded-circle mt-3" style="width:100px"
                            src="foto/<?= $data["foto"] ?>" alt="Card image cap">
                        <div class="card-body">
                            <h3 class="card-title text-center"><?= $data["username"]; ?></h3>
                            <h5 class="card-title text-center"><?= $data["nama_lengkap"]; ?></h5>
                        </div>
                        <?php if (isset($_SESSION["login"])) { ?>
                        <div class="card-body">
                            <a style="text-decoration:none; color:#C8CDD1" href="edit_profile.php?id=<?= $data['id_user'] ?>">Edit Profile</a>
                        </div>
                        <?php } ?>
                    </div>
                </div>
                <div id="DASHBOARD" style="width:90%" class="d-flex justify-content-end" style="width:500px">
                    <div id="bungkus" class="w-50">
                        <div style="color:#C8CDD1" class="d-flex justify-content-center mt-5">
                            <h1>Your Matoor (<?= count($add) ?>)</h1>
                        </div>
                        <?php foreach ($add as $row) :
                            $user = query("SELECT * FROM users WHERE id_user = " . $row["id_user"])[0];
                            $like = query("SELECT COUNT(id_user) 'likes' FROM likes_post WHERE id_post = " . $row["id_post"])[0];
                            $comment = query("SELECT COUNT(id_post) 'comments' FROM comments WHERE id_post = " . $row["id_post"])[0];
                        ?>
                        <div class="column">
                            <div style="background-color:#161B22" class="card mb-4 shadow p-3 mb-3">
                                <div class="media d-flex flex-wrap align-items-center justify-content-between">
                                    <div style="color:#C8CDD1" class="justify-content-between d-flex flex-wrap align-items-center gap-3">
                                        <img src="foto/<?= $user["foto"] ?>" alt="foto" class="d-block rounded-circle"
                                            width=60>
                                        <h5><?= $user["username"] ?></h5>
                                    </div>
                                    <div style="color:#C8CDD1" class="medium ml-3">
                                        <strong>Category: </strong>
                                        <p class="text-uppercase">#<?= $row["category"]; ?></p>
                                    </div>
                                </div>
                                <div style="background-color:#C8CDD1; color:#000000" class="card p-2 mt-2">
                                    <p class="mb-0"><?= $row["content"]; ?></p>
                                    <div>
                                        <p style="font-size:12px" class="mb-0 mt-2"><?= $row["date"] ?></p>
                                    </div>
                                </div>
                                <div class="d-flex flex-row justify-content-between align-items-center mt-2">
                                    <div style="color:#C8CDD1" class="px-2 pt-2 d-flex gap-2">
                                        <a style="text-decoration:none; color:#C8CDD1" href="like_post.php?id=<?= $row["id_post"] ?>">
                                            <iconify-icon icon="fontisto:like" width="20" height="20"></iconify-icon>
                                        </a>
                                        <p style="font-size:15px" class="mb-0 ml-2"><?= $like["likes"] ?></p>
                                    </div>
                                    <div style="color:#C8CDD1" class="px-2 pt-2 d-flex gap-2">
                                        <a style="text-decoration:none; color:#C8CDD1" href="comment.php?id=<?= $row["id_post"] ?>">
                                            <iconify-icon icon="heroicons:chat-bubble-oval-left-ellipsis-solid"
                                                width="20" height="20"></iconify-icon>
                                        </a>
                                        <p style="font-size:15px" class="mb-0 ml-2"><?= $comment["comments"] ?></p>
                                    </div>
                                </div>
                            </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
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

</html>