<?php
session_start();
require "utilities.php";

if ($_SESSION["login"] == false) {
    header("Location: login.php");
    exit;
}

$data = query("SELECT * FROM users WHERE id_user = $_SESSION[id_user]")[0];
$add = query("SELECT * FROM posts");

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
        <div id="profile" class="w-25">
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
                    <div class="d-flex flex-column w-50">
                        <h2><?= $data["username"]; ?></h2>
                        <h2><?= $data["nama_lengkap"]; ?></h2>
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
            <div class="justify-content-center d-flex align-items-center">
                <h1># DASHBOARD</h1>
            </div>

            <?php foreach ($add as $row) :
                $user = query("SELECT * FROM users WHERE id_user = " . $row["id_user"])[0];
                $like = query("SELECT COUNT(id_user) 'likes' FROM likes_post WHERE id_post = " . $row["id_post"])[0];
                $comment = query("SELECT COUNT(id_post) 'comments' FROM comments WHERE id_post = " . $row["id_post"])[0];
            ?>
                <!-- <div class="d-flex flex-column gap-2">
                    <div class="d-flex flex-row gap-2">
                        <div class="card w-50 p-3">
                            <div class="d-flex"> -->
                <div class="container-fluid">
                    <div class="col-md-12">
                        <div class="card mb-2">
                            <div class="card-header">
                                <div class="media flex-wrap w-100 align-items-center"> 
                                    <img src="foto/<?= $user["foto"] ?>" alt="foto" class="d-block rounded-circle" width="100" />
                                    <div class="media-body ml-2">
                                        <h3><?= $user["username"] ?></h3>
                                    </div>
                                    <div class="text-muted medium ml-3">
                                        <h3></h3>
                                        <div>
                                            <strong>Category: </strong><p>#<?= $row["category"]; ?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <p><?= $row["content"]; ?></p>
                            </div>
                            <div class="card-footer d-flex flex-wrap justify-content-between align-items-center">
                                <div class="px-4 pt-3"> 
                                    <a href="like.php?id=<?= $row["id_post"] ?>"> 
                                    <iconify-icon icon="fontisto:like" width="30" height="30"></iconify-icon>
                                    </a>
                                    <p><?= $like["likes"] ?></p>
                                </div>
                                <div class="px-4 pt-3">
                                    <a href="comment.php?id=<?= $row["id_post"] ?>">
                                        <iconify-icon icon="heroicons:chat-bubble-oval-left-ellipsis-solid" width="30" height="30"></iconify-icon>
                                    </a>
                                    <p><?= $comment["comments"] ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

                <script src="https://code.iconify.design/iconify-icon/1.0.1/iconify-icon.min.js"></script>
                <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
                </script>
                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous">
                </script>
</body>

</html>

</html>