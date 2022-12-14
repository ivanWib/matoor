<?php
$connect = mysqli_connect("localhost", "root", "", "matoor");

function query($query)
{
    global $connect;

    $result = mysqli_query($connect, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

function registration($data)
{
    global $connect;
    $username = mysqli_real_escape_string($connect, strtolower(stripslashes($data["username"])));
    $email = strtolower(stripslashes($data["email"]));
    $password = mysqli_real_escape_string($connect, $data["password"]);
    $password2 = mysqli_real_escape_string($connect, $data["confirm_password"]);
    $status = "active";

    $result = mysqli_query($connect, "SELECT username FROM users WHERE username = '$username'");

    if (mysqli_fetch_assoc($result)) {
        echo "<script>
                alert('Username sudah terdaftar!');
            </script>";
        return false;
    }

    if ($password !== $password2) {
        echo "<script>
                alert('Konfirmasi password tidak sesuai!');
            </script>";
        return false;
    }

    $password = password_hash($password, PASSWORD_BCRYPT);

    mysqli_query($connect, "INSERT INTO users VALUES('', '$username', '', '$email','$password', 'default.png', '$status')");

    return mysqli_affected_rows($connect);
}

function postingan($add)
{
    global $connect;
    $category = htmlspecialchars($add["category"]);
    $content = htmlspecialchars($add["content"]);
    $date = htmlspecialchars($add["tanggal"]);

    $id_user = $_SESSION["id_user"];

    $query = "INSERT INTO posts VALUES ('', '$id_user', '$category', '$content', '$date')";

    mysqli_query($connect, $query);

    return mysqli_affected_rows($connect);
}


function edit($data)
{
    global $connect;
    session_start();
    $id = $_SESSION["id_user"];

    $username = htmlspecialchars($data["username"]);
    $namalengkap = htmlspecialchars($data["namalengkap"]);
    $email = htmlspecialchars($data["email"]);
    $foto_lama = htmlspecialchars($data["foto_lama"]);

    if ($_FILES["foto"]["error"] === 4) {
        $foto = $foto_lama;
    } else {
        $foto = upload();
    }


    $query = "UPDATE users SET
                username = '$username',
                nama_lengkap = '$namalengkap',
                email = '$email',
                foto = '$foto'
                WHERE id_user = $id
            ";

    mysqli_query($connect, $query);

    return mysqli_affected_rows($connect);
}

function upload()
{
    $namaFile = $_FILES['foto']['name'];
    $ukuranFile = $_FILES['foto']['size'];
    $error = $_FILES['foto']['error'];
    $tmpName = $_FILES['foto']['tmp_name'];

    if ($error === 4) {
        echo "<script>
                alert('Pilih gambar terlebih dahulu!');
            </script>";
        return false;
    }

    $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
    $ekstensiGambar = explode('.', $namaFile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));
    if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
        echo "<script>
                alert('Yang anda upload bukan gambar!');
            </script>";
        return false;
    }

    if ($ukuranFile > 1000000) {
        echo "<script>
                alert('Ukuran gambar terlalu besar!');
            </script>";
        return false;
    }

    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $ekstensiGambar;

    move_uploaded_file($tmpName, 'foto/' . $namaFileBaru);

    return $namaFileBaru;
}

// function reset_password($data){

// }


// algoritma trend post berdasarkan jumlah like post tertinggi dan comment tertinggi
function trend()
{
    global $connect;
    // jumlah like post tertinggi dan comment tertinggi diambil dari tabel likes dan comments dan diurutkan dari yang tertinggi
    $query = "SELECT * FROM posts ORDER BY (SELECT COUNT(*) FROM likes WHERE likes.id_post = posts.id_post) DESC, 
    (SELECT COUNT(*) FROM comments WHERE comments.id_post = posts.id_post) DESC";

    $result = mysqli_query($connect, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

// algoritma trend post
function trend_post()
{
    global $connect;
    $query = "SELECT * FROM posts ORDER BY id_post DESC";
    $result = mysqli_query($connect, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

function comment($add)
{
    global $connect;
    $id_user = $_SESSION["id_user"];
    $id_post = $add["id"];
    $comment = htmlspecialchars($add["content"]);
    $date = htmlspecialchars($add["tanggal"]);

    $query = "INSERT INTO comments VALUES ('', '$id_post', '$id_user', '$comment', '$date')";
    mysqli_query($connect, $query);
    // $_POST["content"] === "";
    return mysqli_affected_rows($connect);
}

function forgot_password($data)
{

    global $connect;
    $email = $data["email"];
    $password = $data["password"];
    $query = "SELECT * FROM users WHERE email = '$email'";

    $result = mysqli_query($connect, $query);

    foreach ($result as $row) {
        if ($email == $row["email"]) {
            $password = password_hash($password, PASSWORD_BCRYPT);
            $query = "UPDATE users SET password = '$password' WHERE email = '$email'";
            mysqli_query($connect, $query);
            echo "<script>
                    alert('Password berhasil diubah!');
                    document.location.href = 'login.php';
                </script>";
            return mysqli_affected_rows($connect);
        } else {
            echo "<script>
                alert('Email tidak terdaftar!');
                document.location.href = 'forgot_password.php';
            </script>";
        }
    }
}