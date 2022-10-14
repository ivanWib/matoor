<?php

require 'utilities.php';

if (isset($_GET["id"])) {
    $id_post = $_GET["id"];
    $header = $_GET["header"];
    $table = $_GET["table"];
    $category = $_GET["data"];

    $user_details = query("SELECT * FROM users WHERE id_user = $id_post");

    // var_dump($id_post);
    // var_dump($header);
    // var_dump($table);
    // var_dump($category);
    // die;

    if ($header == "index" or $header == "category") {
        $query = "DELETE FROM $table WHERE id_post = $id_post";
        mysqli_query($connect, $query);
        if ($category == "null") {
            echo "<script>
            alert('Post deleted successfully');
            document.location.href = '$header.php';
        </script>";
        } else {
            echo "<script>
            alert('Post deleted successfully');
            document.location.href = '$header.php?category=$category';
            </script>";
        }
    } else if ($header == "comment") {
        $query = "DELETE FROM $table WHERE id_comment = $id_post";
        mysqli_query($connect, $query);
        echo "<script>
            alert('Comment deleted successfully');
            document.location.href = 'comment.php?id=$category';
        </script>";
    } else if ($header == "profile") {
        if ($user_details[0]["status"] == "admin") {
            echo "<script>
            alert('Admin cannot be deleted');
            document.location.href = 'profile.php?id=$id_post';
        </script>";
        } else {
            $query = "DELETE FROM $table WHERE id_user = $id_post";
            mysqli_query($connect, $query);
            echo "<script>
            alert('User deleted successfully');
            document.location.href = 'index.php';
        </script>";
        }
    }
}
