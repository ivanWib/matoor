<?php
session_start();
require "utilities.php";

// if ($_SESSION["login"] == false) {
//     header("Location: login.php");
//     exit;
// }
if(isset($_SESSION["login"])) {
    $data = query("SELECT * FROM users WHERE id_user = $_SESSION[id_user]")[0];
} else {
    $data = array(
        "foto" => "default.png",
        "username" => "Guest",
        "nama_lengkap" => "Login dulu benk:v",
        "id_user" => 0
    );
}
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
    <div id="container" class="container d-flex flex-column align-items-center">
        <div id="navbar" class="navbar fixed-top d-flex justify-content-between">
            <div class="container">
                <div>
                    <h2>Matoor</h2>
                </div>
                <?php if(!isset($_SESSION["login"])) { ?>
                <div>
                    <a href="login.php"><h2>Login</h2></a>
                </div>
                <?php } else { ?>
                <div>
                    <a href="logout.php"><h2>Logout</h2></a>
                </div>
                <?php } ?>
            </div>
        </div>
        <div id="content" class=" d-flex flex-row mt-5 pt-5">
            <div id="PROFILE" class="w-25 h-25 d-flex justify-content-center">
                <div class="w-75 card d-flex flex-column align-items-center shadow p-3 mb-3 bg-body">
                    <img class="card-img-top rounded-circle mt-3" style="width:100px" src="foto/<?= $data["foto"] ?>" alt="Card image cap">
                    <div class="card-body">
                       <h3 class="card-title text-center"><?= $data["username"]; ?></h3>
                       <h4 class="card-title text-center"><?= $data["nama_lengkap"]; ?></h4>
                    </div>
                    <?php if(isset($_SESSION["login"])) { ?>
                    <div class="card-body">
                        <a href="edit_profile.php?id=<?= $data['id_user'] ?>">Edit Profile</a>
                    </div>
                    <?php } ?>
                    
                </div>
            </div>
            <div id="DASHBOARD" class="w-75 d-flex justify-content-center" style="width:500px">
                <div id="bungkus" class="w-50">
                    <div class="justify-content-between d-flex align-items-center">
                        <h1>DASHBOARD</h1>
                    </div>
                    <?php foreach ($add as $row) :
                        $user = query("SELECT * FROM users WHERE id_user = " . $row["id_user"])[0];
                        $like = query("SELECT COUNT(id_user) 'likes' FROM likes_post WHERE id_post = " . $row["id_post"])[0];
                        $comment = query("SELECT COUNT(id_post) 'comments' FROM comments WHERE id_post = " . $row["id_post"])[0];
                    ?> 
                    <div class="column">
                        <div class="card mb-4 shadow p-3 mb-3 bg-body">
                            <div class="media d-flex flex-wrap align-items-center justify-content-between"> 
                                <div class="justify-content-between d-flex flex-wrap align-items-center gap-3">
                                    <img src="foto/<?= $user["foto"] ?>" alt="foto" class="d-block rounded-circle" width=60 >
                                    <h5><?= $user["username"] ?></h5>
                                </div>
                                <div class="text-muted medium ml-3">
                                    <h3></h3>
                                    <strong>Category: </strong><p class="text-uppercase">#<?= $row["category"]; ?></p>
                                </div>
                            </div>
                            <div class="card p-2 mt-2">
                                <p><?= $row["content"]; ?></p>
                            </div>
                            <div class="d-flex flex-row justify-content-between align-items-center mt-2">
                                <div class="px-2 pt-2 d-flex gap-2"> 
                                    <a href="like.php?id=<?= $row["id_post"] ?>"> 
                                    <iconify-icon icon="fontisto:like" width="30" height="30"></iconify-icon>
                                    </a>
                                    <p style="font-size:20px" class="mb-0 ml-2"><?= $like["likes"] ?></p>
                                </div>
                                <div class="px-2 pt-2 d-flex gap-2">
                                    <a href="comment.php?id=<?= $row["id_post"] ?>">
                                    <iconify-icon icon="heroicons:chat-bubble-oval-left-ellipsis-solid" width="30" height="30"></iconify-icon>
                                    </a>
                                    <p style="font-size:20px" class="mb-0 ml-2"><?= $comment["comments"] ?></p>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>
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

</html>