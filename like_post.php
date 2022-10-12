<?php
session_start();
require "utilities.php";

if (!isset($_SESSION["login"])) {
    echo "<script>
    alert('Login Dulu Brooo');
    document.location.href = 'index.php';
    </script>";
}

if (isset($_GET["id"])) {
    $id = $_GET["id"];
    $id_user = $_SESSION["id_user"];

    $check = query("SELECT id_user FROM likes_post WHERE id_user = '$id_user' AND id_post = '$id'");
    if (count($check) === 0) {
        $query = "INSERT INTO likes_post VALUES ('$id', '$id_user')";
        mysqli_query($connect, $query);
        header("Location: index.php");
        exit;
    } else {
        $query = "DELETE FROM likes_post WHERE id_post = $id AND id_user = $id_user";
        mysqli_query($connect, $query);
        header("Location: index.php");
    }
}
?>