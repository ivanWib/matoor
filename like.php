<?php
session_start();
require "utilities.php";

if ($_SESSION["login"] === false) {
    header("Location: login.php");
    exit;
}

if (isset($_GET["id"])) {
    $id = $_GET["id"];
    $id_user = $_SESSION["id_user"];
    // $validate = query("SELECT * FROM likes WHERE id_post = $idm AND id_user = $id_user");
    
    $check = query("SELECT id_user FROM likes WHERE id_user = '$id_user' AND id_post = '$id'");
    if (count($check) === 0){
        $query = "INSERT INTO likes VALUES ('$id', '$id_user')";
        mysqli_query($connect, $query);
        header("Location: index.php");
        exit;
    } else {
        $query = "DELETE FROM likes WHERE id_post = $id AND id_user = $id_user";
        mysqli_query($connect, $query);
        header("Location: index.php");
    }

    // if($id_user === $confirm["id_user"]) {
    //     $query = "DELETE FROM likes WHERE id_post = $id";
    //     mysqli_query($connect, $query);
    //     header("Location: index.php");
    //     exit;
    // } else {
    //     $query = "INSERT INTO likes VALUES ('', '$id', '$id_user')";
    //     mysqli_query($connect, $query);
    //     header("Location: index.php");
    // }
    // var_dump($id);
    // var_dump($id_user);
    // die;
    
}

?>