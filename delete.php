<?php

require 'utilities.php';

if (isset($_GET["id"])) {
    $id_post = $_GET["id"];
    $header = $_GET["header"];
    $table = $_GET["table"];
    $category = $_GET["data"];

    // var_dump($id_post);
    // var_dump($header);
    // var_dump($table);
    // var_dump($category);
    // die;

    if ($header == "index" or $header == "category") {
        $query = "DELETE FROM $table WHERE id_post = $id_post";
        mysqli_query($connect, $query);
        // header("Location:" . $header . ".php?category=" . $category);

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
        // header("Location:" . $header . ".php?id=" . $category);
        echo "<script>
            alert('Comment deleted successfully');
            document.location.href = 'comment.php?id=$category';
        </script>";
    } else if ($header == "profile") {
        $query = "DELETE FROM $table WHERE id_user = $id_post";
        mysqli_query($connect, $query);
        // header("Location:" . $header . ".php?id=" . $category);
        echo "<script>
            alert('User deleted successfully');
            document.location.href = 'index.php';
        </script>";
    }
}