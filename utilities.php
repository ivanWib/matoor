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
    $username = strtolower(stripslashes($data["username"]));
    $email = strtolower(stripslashes($data["email"]));
    $password = mysqli_real_escape_string($connect, $data["password"]);
    $password2 = mysqli_real_escape_string($connect, $data["confirm_password"]);

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

    $password = password_hash($password, PASSWORD_DEFAULT);

    mysqli_query($connect, "INSERT INTO users VALUES('', '$username', '$email','$password', 'default.png')");

    return mysqli_affected_rows($connect);
}

function postingan($add)
{
    global $connect;
    $category = htmlspecialchars($add["category"]);
    $content = htmlspecialchars($add["content"]);

    $query = "INSERT INTO posts VALUES ('', '', '$category', '$content')";

    mysqli_query($connect, $query);

    return mysqli_affected_rows($connect);
}
